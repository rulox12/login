<?php

namespace Zinobe\Tests\Unit;

use App\Validations\UserValidation;
use Zinobe\Tests\BaseTestCase;

class UserValidationTest extends BaseTestCase
{
    /**
     * @test
     */
    public function validateInvalidName()
    {
        [$status, $errors] = UserValidation::validation();

        $this->assertFalse($status);
        $this->assertEquals($this->getData(), $errors->toArray());
    }

    /**
     * @test
     */
    public function validateEmailUnique()
    {
        $_POST['email'] = 'example@example.com';

        $expectedErrors = $this->getData([
            'email' => [
                'unique' => 'Email example@example.com has been used'
            ]
        ]);

        $this->createUser();

        [$status, $errors] = UserValidation::validation();

        $this->assertFalse($status);
        $this->assertEquals($expectedErrors, $errors->toArray());
    }

    /**
     * @test
     */
    public function validateDocumentUnique()
    {
        $_POST['document'] = '102131231';

        $expectedErrors = $this->getData([
            'document' => [
                'unique' => 'Document 102131231 has been used'
            ]
        ]);

        $this->createUser();

        [$status, $errors] = UserValidation::validation();

        $this->assertFalse($status);
        $this->assertEquals($expectedErrors, $errors->toArray());
    }

    private function getData(array $data = array()): array
    {
        return array_merge([
            'name' => [
                'required' => 'The Name is required'
            ],
            'email' => [
                'required' => 'The Email is required'
            ],
            'document' => [
                'required' => 'The Document is required'
            ],
            'country' => [
                'required' => 'The Country is required'
            ],
            'password' => [
                'required' => 'The Password is required'
            ],
            'confirm_password' => [
                'required' => 'The Confirm password is required'
            ],
        ], $data);
    }
}
