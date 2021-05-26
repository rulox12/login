<?php

namespace Zinobe\Tests\Cases;

use App\Helpers\UserHelper;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class UserClientMock extends Client
{
    public const URI = 'http://www.mocky.io/v2/5d9f38fd3000005b005246ac';

    public function request(string $method, $uri = '', array $options = []): ResponseInterface
    {
        if ($method == 'GET' && $uri == self::URI) {
            return $this->response('200', json_encode(self::returnData()));
        }
    }

    /**
     * @param $code
     * @param $body
     * @param array $headers
     * @param null $reason
     * @return Response
     */
    public function response($code, $body, $headers = [], $reason = null): Response
    {
        if (is_array($body)) {
            $body = json_encode($body);
        }

        $headers = array_replace([
            'Server' => 'Microsoft-IIS/10.0',
            'Strict-Transport-Security' => 'max-age=15768000',
            'Cache-Control' => 'no-cache,no-cache, no-store, must-revalidate, private',
            'Pragma' => 'no-cache,no-cache',
            'Content-Type' => 'application/json; charset=utf-8',
            'Expires' => '-1',
            'X-Content-Type-Options' => 'nosniff',
            'X-XSS-Protection' => '1; mode=block',
            'X-Frame-Options' => 'sameorigin',
            'Keep-Alive' => 'timeout=5, max=100',
            'Connection' => 'Keep-Alive',
        ], $headers);

        return new Response($code, $headers, utf8_decode($body), '1.1', utf8_decode($reason));
    }

    public static function returnData(): array
    {
        return [
            UserHelper::OBJECTS => [
                [
                    UserHelper::DOCUMENT => '123123123',
                    UserHelper::EMAIL => 'example@example.com',
                ],
                [
                    UserHelper::DOCUMENT => 'dasdsa23131dasd',
                    UserHelper::EMAIL => 'example2@example2.com',
                ],
                [
                    UserHelper::DOCUMENT => '1223123',
                    UserHelper::EMAIL => 'example2@example2.com',
                ],
                [
                    UserHelper::DOCUMENT => '92137321938',
                    UserHelper::EMAIL => 'example2@example2.com',
                ],
            ]
        ];
    }
}
