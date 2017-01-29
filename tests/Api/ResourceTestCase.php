<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Api;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\TransferStats;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zibios\WrikePhpSdk\Api\Client;
use Zibios\WrikePhpSdk\Api\Config;
use Zibios\WrikePhpSdk\Api\Factories\ApiFactory;
use Zibios\WrikePhpSdk\Api\ResourceAbstract;
use Zibios\WrikePhpSdk\Api\ResourceInterface;
use Zibios\WrikePhpSdk\Documents\ResponseDocumentInterface;
use Zibios\WrikePhpSdk\Enums\ResponseModeEnum;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Resource Test Case
 */
abstract class ResourceTestCase extends TestCase
{
    const UNIQUE_ID = 'uniqueId';
    const VALID_ID = 'validId';
    const INVALID_ID = 'wrongId';

    /**
     * @var RequestInterface
     */
    protected $lastRequest;

    /**
     * @var ResponseInterface
     */
    protected $lastResponse;

    /**
     * @var string
     */
    protected $sourceClass;

    /**
     * @var ResourceInterface
     */
    protected $document;

    /**
     * Sets up the exception.
     */
    public function setUp()
    {
        $this->document = new $this->sourceClass(new Config());
    }

    /**
     * Test exception inheritance
     */
    public function test_ResourceDocument_ExtendProperClasses()
    {
        self::assertInstanceOf(ResourceAbstract::class, $this->document, sprintf('"%s" should extend "%s"', get_class($this->document), ResourceAbstract::class));
        self::assertInstanceOf(ResourceInterface::class, $this->document, sprintf('"%s" should extend "%s"', get_class($this->document), ResourceInterface::class));
    }

    /**
     * @return array
     */
    abstract public function methodsProvider();

    /**
     * @param array $methodData
     *
     * @dataProvider methodsProvider
     */
    public function test_wrikeExceptions($methodData)
    {
        foreach (ResponseModeEnum::toArray() as $responseMode) {
            $api = $this->prepareApiWithClientMock($methodData, $responseMode);
            $response = $this->prepareResponseForMethod($methodData, $api);
            $this->prepareAssertsForMethod($methodData, $responseMode, $response);
        }
    }

    /**
     * @param array $methodData
     * @param string $responseMode
     *
     * @return \Zibios\WrikePhpSdk\Api
     */
    private function prepareApiWithClientMock($methodData, $responseMode)
    {
        $mock = new MockHandler(
            [
                new Response(
                    200,
                    [],
                    $methodData['body']
                ),
            ]
        );
        $handler = HandlerStack::create($mock);

        $lastRequest = &$this->lastRequest;
        $lastResponse = &$this->lastResponse;
        $client = new Client(
            [
                'handler' => $handler,
                'on_stats' => function (TransferStats $stats) use (&$lastRequest, &$lastResponse) {
                    $lastRequest = $stats->getRequest();
                    $lastResponse = $stats->getResponse();
                }
            ]
        );
        $api = ApiFactory::createApiForBearerToken('test');
        $api->getConfig()->setClient($client)->setResponseMode($responseMode);

        return $api;
    }

    /**
     * @param array $methodData
     * @param \Zibios\WrikePhpSdk\Api $api
     *
     * @return mixed
     */
    private function prepareResponseForMethod(array $methodData, $api)
    {
        $this->lastRequest = null;
        $this->lastResponse = null;

        $response = null;
        switch (count($methodData['additionalParams'])) {
            case 0:
                $response = $api->{$methodData['resourceGetter']}()->{$methodData['methodName']}();
                break;
            case 1:
                $response = $api->{$methodData['resourceGetter']}()->{$methodData['methodName']}(
                    $methodData['additionalParams'][0]
                );
                break;
            case 2:
                $response = $api->{$methodData['resourceGetter']}()->{$methodData['methodName']}(
                    $methodData['additionalParams'][0],
                    $methodData['additionalParams'][1]
                );
                break;
            default:
                self::assertLessThanOrEqual(2, count($methodData['additionalParams']));
        }

        return $response;
    }

    /**
     * @param array $methodData
     * @param string $responseMode
     * @param mixed $response
     */
    private function prepareAssertsForMethod(array $methodData, $responseMode, $response)
    {
        $id = self::INVALID_ID;

        switch ($responseMode) {
            case ResponseModeEnum::RESPONSE_RAW:
                /** @var ResponseInterface $response */
                self::assertInstanceOf(ResponseInterface::class, $response);
                $body = json_decode((string) $response->getBody(), true);
                $id = $body['data'][0]['id'];
                break;
            case ResponseModeEnum::BODY_STRING:
                /** @var string $response */
                self::assertInternalType('string', $response);
                $body = json_decode($response, true);
                $id = $body['data'][0]['id'];
                break;
            case ResponseModeEnum::BODY_OBJECT:
                /** @var array $response */
                self::assertInternalType('array', $response);
                $id = $response['data'][0]['id'];
                break;
            case ResponseModeEnum::BODY_DOCUMENT:
                /** @var ResponseDocumentInterface $response */
                self::assertInstanceOf(ResponseDocumentInterface::class, $response);
                $id = $response->getData()[0]->{$methodData['propertyGetter']}();
                break;
            case ResponseModeEnum::DOCUMENT:
                /** @var array $response */
                self::assertInternalType('array', $response);
                $id = $response[0]->{$methodData['propertyGetter']}();
                break;
        }

        self::assertEquals($methodData['propertyValue'], $id);
        self::assertNotEquals(self::INVALID_ID, $id);
        self::assertEquals(sprintf('%s%s', Client::BASE_URI, $methodData['endpointPath']), (string) $this->lastRequest->getUri());
    }
}
