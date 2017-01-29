<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Exceptions\Api;

use Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

/**
 * General Wrike Api Exception
 *
 * Thrown when the Wrike API returns an HTTP error that isn't handled by other dedicated exceptions.
 */
class ApiException extends Exception
{
    /** @var  \Exception */
    protected $responseException;

    /**
     * ApiException constructor.
     *
     * @param Exception $e
     */
    public function __construct(\Exception $e)
    {
        parent::__construct($e->getMessage(), $e->getCode(), $e);
    }

    /**
     * @param \Exception $e
     *
     * @return mixed
     */
    public static function create(\Exception $e)
    {
        if ($e instanceof ClientException === false && $e instanceof ServerException === false) {
            return new ApiException($e);
        }
        /** @var ClientException $e */
        $errorResponse = $e->getResponse();
        $bodyString = (string) $errorResponse->getBody();
        $body = json_decode($bodyString, true);
        $errorStatusCode = $errorResponse->getStatusCode();
        $errorName = $body['error'];

        switch ($errorStatusCode . $errorName) {
            case (AccessForbiddenException::STATUS_CODE . AccessForbiddenException::STATUS_NAME):
                return new AccessForbiddenException($e);
            case (InvalidParameterException::STATUS_CODE . InvalidParameterException::STATUS_NAME):
                return new InvalidParameterException($e);
            case (InvalidRequestException::STATUS_CODE . InvalidRequestException::STATUS_NAME):
                return new InvalidRequestException($e);
            case (MethodNotFoundException::STATUS_CODE . MethodNotFoundException::STATUS_NAME):
                return new MethodNotFoundException($e);
            case (NotAllowedException::STATUS_CODE . NotAllowedException::STATUS_NAME):
                return new NotAllowedException($e);
            case (NotAuthorizedException::STATUS_CODE . NotAuthorizedException::STATUS_NAME):
                return new NotAuthorizedException($e);
            case (ParameterRequiredException::STATUS_CODE . ParameterRequiredException::STATUS_NAME):
                return new ParameterRequiredException($e);
            case (ResourceNotFoundException::STATUS_CODE . ResourceNotFoundException::STATUS_NAME):
                return new ResourceNotFoundException($e);
            case (ServerErrorException::STATUS_CODE . ServerErrorException::STATUS_NAME):
                return new ServerErrorException($e);
        }

        return new ApiException($e);
    }
}
