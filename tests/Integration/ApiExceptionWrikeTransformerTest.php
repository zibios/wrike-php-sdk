<?php

/*
 * This file is part of the zibios/wrike-php-sdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Integration;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Zibios\WrikePhpGuzzle\Client\GuzzleClient;
use Zibios\WrikePhpGuzzle\Transformer\ApiException\GuzzleTransformer;
use Zibios\WrikePhpLibrary\Api;
use Zibios\WrikePhpLibrary\Exception\Api\AccessForbiddenException;
use Zibios\WrikePhpLibrary\Exception\Api\ApiException;
use Zibios\WrikePhpLibrary\Exception\Api\InvalidParameterException;
use Zibios\WrikePhpLibrary\Exception\Api\InvalidRequestException;
use Zibios\WrikePhpLibrary\Exception\Api\MethodNotFoundException;
use Zibios\WrikePhpLibrary\Exception\Api\NotAllowedException;
use Zibios\WrikePhpLibrary\Exception\Api\NotAuthorizedException;
use Zibios\WrikePhpLibrary\Exception\Api\ParameterRequiredException;
use Zibios\WrikePhpLibrary\Exception\Api\ResourceNotFoundException;
use Zibios\WrikePhpLibrary\Exception\Api\ServerErrorException;
use Zibios\WrikePhpLibrary\Transformer\Response\RawResponseTransformer;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Api Exception Wrike Transformer Test.
 */
class ApiExceptionWrikeTransformerTest extends TestCase
{
    /**
     * @return array
     */
    public function wrikeExceptionsProvider()
    {
        return [
            // [responseCode, errorName, exceptionClass]
            [200, '', ''],
            [201, '', ''],
            [401, 'wrong_error', ApiException::class],
            [402, 'wrong_error', ApiException::class],
            [403, 'wrong_error', ApiException::class],
            [404, 'wrong_error', ApiException::class],
            [500, 'wrong_error', ApiException::class],
            [501, 'wrong_error', ApiException::class],
            [502, 'wrong_error', ApiException::class],
            [503, 'wrong_error', ApiException::class],

            [403, 'access_forbidden', AccessForbiddenException::class],
            [400, 'invalid_parameter', InvalidParameterException::class],
            [400, 'invalid_request', InvalidRequestException::class],
            [404, 'method_not_found', MethodNotFoundException::class],
            [403, 'not_allowed', NotAllowedException::class],
            [401, 'not_authorized', NotAuthorizedException::class],
            [400, 'parameter_required', ParameterRequiredException::class],
            [404, 'resource_not_found', ResourceNotFoundException::class],
            [500, 'server_error', ServerErrorException::class],
        ];
    }

    /**
     * @param int    $responseCode
     * @param string $errorName
     * @param string $expectedExceptionClass
     *
     * @dataProvider wrikeExceptionsProvider
     */
    public function test_wrikeExceptions($responseCode, $errorName, $expectedExceptionClass)
    {
        $apiExceptionTransformer = new GuzzleTransformer();
        $responseTransformer = new RawResponseTransformer();
        $responseMock = new MockHandler([
            new Response(
                $responseCode,
                [],
                sprintf('{"errorDescription":"description", "error":"%s"}', $errorName)
            ),
        ]);
        $handler = HandlerStack::create($responseMock);
        $client = new GuzzleClient(['handler' => $handler]);
        $api = new Api($client, $responseTransformer, $apiExceptionTransformer, 'testToken');

        $e = null;
        $exceptionOccurred = false;
        $exceptionClass = '';
        try {
            $api->getContactResource()->getAll();
        } catch (\Exception $e) {
            $exceptionOccurred = true;
            $exceptionClass = get_class($e);
        }

        if ($expectedExceptionClass === '') {
            self::assertFalse(
                $exceptionOccurred,
                sprintf('Request should not throw exception but "%s" exception occurred!', $exceptionClass)
            );
        }
        if ($expectedExceptionClass !== '') {
            self::assertTrue(
                $exceptionOccurred,
                sprintf('Request should throw exception but exception not occurred!')
            );
            self::assertInstanceOf(
                $expectedExceptionClass,
                $e,
                sprintf(
                    'Request should throw %s exception but %s exception occurred!',
                    $expectedExceptionClass,
                    $exceptionClass
                )
            );
        }
    }
}
