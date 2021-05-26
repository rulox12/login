<?php

namespace Zinobe\Tests\Unit;

use App\Services\UserService;
use App\System\Settings;
use Zinobe\Tests\BaseTestCase;
use Zinobe\Tests\Cases\UserClientMock;

class UserServiceTest extends BaseTestCase
{
    /**
     * @test
     */
    public function SearchUserByDocument()
    {
        $service = new UserService($this->settingsConfigurationForMock());

        $users = $service->getUsers();
        $this->assertIsArray($users);
        $this->assertEquals(UserClientMock::returnData(),$users);
    }

    private function settingsConfigurationForMock(): Settings
    {
        $settings = new Settings();
        $settings->initUser();
        $settings->setClient(new UserClientMock());

        return $settings;
    }
}
