<?php

namespace Zinobe\Tests\Unit;

use App\Domain\User\CreateOrUpdateUserAction;
use App\Models\User;
use Zinobe\Tests\BaseTestCase;

class CreateOrUpdatedUserActionTest extends BaseTestCase
{
    /**
     * @test
     */
    public function storeUserSuccess()
    {
        $data = [
            'name' => 'example',
            'document' => '123123123123',
            'country' => 'Colombia',
            'email' => 'email@example.com',
            'password' => 'test',
        ];

        $user = CreateOrUpdateUserAction::execute($data, new User());

        $this->assertEquals($user->toArray(), User::first()->toArray());
    }

    /**
     * @test
     */
    public function updateUserSuccess()
    {
        $data = [
            'name' => 'example',
            'document' => '123123123123',
            'country' => 'Colombia',
            'email' => 'email@example.com',
            'password' => 'test',
        ];

        $user = $this->createUser();
        $user = CreateOrUpdateUserAction::execute($data, $user);

        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['document'], $user->document);
        $this->assertEquals($data['country'], $user->country);
        $this->assertEquals($data['email'], $user->email);
    }


}
