<?php

namespace Zinobe\Tests;

use App\Models\User;
use Illuminate\Database\Capsule\Manager as DB;
use PHPUnit\Framework\TestCase;


class BaseTestCase extends TestCase
{
    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        require dirname(__DIR__) . '/vendor/autoload.php';
        require dirname(__DIR__) . '/config/constants.php';

        unset($_POST);
        $_POST['initial'] = true;

        $this->configureDatabase();
        $this->migrateTable();
    }

    private function configureDatabase()
    {
        $db = new DB;
        $db->addConnection(array(
            'driver'    => 'sqlite',
            'database'  => ':memory:',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));
        $db->bootEloquent();
        $db->setAsGlobal();

    }

    private function migrateTable()
    {
        DB::schema()->create('users', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('country');
            $table->string('document');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function createUser(): User
    {
        $user = new User();

        $user->name = 'hola';
        $user->email = 'example@example.com';
        $user->country = 'Colombia';
        $user->document = '102131231';
        $user->password = 'test';

        $user->save();

        return $user;
    }
}
