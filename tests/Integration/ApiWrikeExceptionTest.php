<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Integration;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Zibios\WrikePhpSdk\Api\Client;
use Zibios\WrikePhpSdk\Api\Factories\ApiFactory;
use Zibios\WrikePhpSdk\Exceptions\Api\AccessForbiddenException;
use Zibios\WrikePhpSdk\Exceptions\Api\InvalidParameterException;
use Zibios\WrikePhpSdk\Exceptions\Api\InvalidRequestException;
use Zibios\WrikePhpSdk\Exceptions\Api\MethodNotFoundException;
use Zibios\WrikePhpSdk\Exceptions\Api\NotAllowedException;
use Zibios\WrikePhpSdk\Exceptions\Api\NotAuthorizedException;
use Zibios\WrikePhpSdk\Exceptions\Api\ParameterRequiredException;
use Zibios\WrikePhpSdk\Exceptions\Api\ResourceNotFoundException;
use Zibios\WrikePhpSdk\Exceptions\Api\ServerErrorException;
use Zibios\WrikePhpSdk\Exceptions\Api\ApiException;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Api Wrike Exception Test
 */
class ApiWrikeExceptionTest extends TestCase
{
    /**
     * @return array
     */
    public function wrikeExceptionsProvider()
    {
        return [
            // [wrikeException, responseCode, errorName, exceptionClass]
            [true, 200, '', ''],
            [true, 201, '', ''],
            [true, 401, 'wrong_error', ApiException::class],
            [true, 402, 'wrong_error', ApiException::class],
            [true, 403, 'wrong_error', ApiException::class],
            [true, 404, 'wrong_error', ApiException::class],
            [true, 500, 'wrong_error', ApiException::class],
            [true, 501, 'wrong_error', ApiException::class],
            [true, 502, 'wrong_error', ApiException::class],
            [true, 503, 'wrong_error', ApiException::class],

            [true, 403, 'access_forbidden', AccessForbiddenException::class],
            [true, 400, 'invalid_parameter', InvalidParameterException::class],
            [true, 400, 'invalid_request', InvalidRequestException::class],
            [true, 404, 'method_not_found', MethodNotFoundException::class],
            [true, 403, 'not_allowed', NotAllowedException::class],
            [true, 401, 'not_authorized', NotAuthorizedException::class],
            [true, 400, 'parameter_required', ParameterRequiredException::class],
            [true, 404, 'resource_not_found', ResourceNotFoundException::class],
            [true, 500, 'server_error', ServerErrorException::class],

            [false, 200, '', ''],
            [false, 201, '', ''],
            [false, 401, 'wrong_error', ClientException::class],
            [false, 402, 'wrong_error', ClientException::class],
            [false, 403, 'wrong_error', ClientException::class],
            [false, 404, 'wrong_error', ClientException::class],
            [false, 500, 'wrong_error', ServerException::class],
            [false, 501, 'wrong_error', ServerException::class],
            [false, 502, 'wrong_error', ServerException::class],
            [false, 503, 'wrong_error', ServerException::class],

            [false, 403, 'access_forbidden', ClientException::class],
            [false, 400, 'invalid_parameter', ClientException::class],
            [false, 400, 'invalid_request', ClientException::class],
            [false, 404, 'method_not_found', ClientException::class],
            [false, 403, 'not_allowed', ClientException::class],
            [false, 401, 'not_authorized', ClientException::class],
            [false, 400, 'parameter_required', ClientException::class],
            [false, 404, 'resource_not_found', ClientException::class],
            [false, 500, 'server_error', ServerException::class],

        ];
    }

    /**
     * @param bool $wrikeException
     * @param int $responseCode
     * @param string $errorName
     * @param string $expectedExceptionClass
     *
     * @dataProvider wrikeExceptionsProvider
     */
    public function test_wrikeExceptions($wrikeException, $responseCode, $errorName, $expectedExceptionClass)
    {
        $mock = new MockHandler([
            new Response(
                $responseCode,
                [],
                sprintf('{"errorDescription":"description", "error":"%s"}', $errorName)
            ),
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);
        $api = ApiFactory::createApiForBearerToken('test');
        $api->getConfig()->setClient($client);
        $api->getConfig()->setWrikeExceptionsMode($wrikeException);

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
            self::assertFalse($exceptionOccurred, sprintf('Request should not throw exception but "%s" exception occurred!', $exceptionClass));
        }
        if ($expectedExceptionClass !== '') {
            self::assertTrue($exceptionOccurred, sprintf('Request should throw exception but exception not occurred!'));
            self::assertInstanceOf($expectedExceptionClass, $e, sprintf('Request should throw %s exception but %s exception occurred!', $expectedExceptionClass, $exceptionClass));
        }
    }
}
