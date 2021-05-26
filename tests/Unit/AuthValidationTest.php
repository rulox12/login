<?php

namespace Zinobe\Tests\Unit;

use App\Validations\AuthValidation;
use Zinobe\Tests\BaseTestCase;

class AuthValidationTest extends BaseTestCase
{
    /**
     * @test
     */
    public function validateInvalidData()
    {
        $expectedErrors = [
            'email' => [
                'required' => 'The Email is required'
            ],
            'password' => [
                'required' => 'The Password is required'
            ]
        ];

        [$status, $errors] = AuthValidation::validation();

        $this->assertFalse($status);
        $this->assertEquals($expectedErrors, $errors->toArray());
    }

    /**
     * @test
     */
    public function validateRequiredEmail()
    {
        $_POST['password'] = '12371289371283912';

        $expectedErrors = [
            'email' => [
                'required' => 'The Email is required'
            ],
        ];

        [$status, $errors] = AuthValidation::validation();

        $this->assertFalse($status);
        $this->assertEquals($expectedErrors, $errors->toArray());
    }

    /**
     * @test
     */
    public function validateRequiredPassword()
    {
        $_POST['email'] = 'danielpcpx@hotmail.com';

        $expectedErrors = [
            'password' => [
                'required' => 'The Password is required'
            ]
        ];

        [$status, $errors] = AuthValidation::validation();

        $this->assertFalse($status);
        $this->assertEquals($expectedErrors, $errors->toArray());
    }
}
