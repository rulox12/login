<?php

namespace Zinobe\Tests\Unit;

use App\Helpers\UserHelper;
use Zinobe\Tests\BaseTestCase;

class UserHelperTest extends BaseTestCase
{
    /**
     * @test
     */
    public function SearchUserByDocument()
    {
        $document = '123123123';
        $email = 'example@example.com';

        $data = [
            UserHelper::OBJECTS => [
                [
                    UserHelper::DOCUMENT => $document,
                    UserHelper::EMAIL => $email,
                ],
                [
                    UserHelper::DOCUMENT => '21312321321',
                    UserHelper::EMAIL => 'example2@example.com',
                ]
            ]
        ];

        $user = UserHelper::searchUser($data, $document);

        $this->assertEquals($document, $user[UserHelper::DOCUMENT]);
        $this->assertEquals($email, $user[UserHelper::EMAIL]);

    }

    /**
     * @test
     */
    public function SearchUserByEmail()
    {
        $document = '123123123';
        $email =  'example2@example2.com';

        $data = [
            UserHelper::OBJECTS => [
                [
                    UserHelper::DOCUMENT => '123123123',
                    UserHelper::EMAIL => 'example@example.com',
                ],
                [
                    UserHelper::DOCUMENT => $document,
                    UserHelper::EMAIL => $email,
                ]
            ]
        ];

        $user = UserHelper::searchUser($data, $email);

        $this->assertEquals($document, $user[UserHelper::DOCUMENT]);
        $this->assertEquals($email, $user[UserHelper::EMAIL]);
    }
}
