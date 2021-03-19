<?php

namespace Tests;

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class ApiTestCase extends BaseTestCase
{
    protected $user;

    protected array $authHeaders;

    /**
     * Utility that helps to make a user and authorize him
     * @param null $user
     *
     * @return User
     */
    protected function actingAsUserWithJWT($user = null): User
    {
        if (!isset($user)) {
            $user = User::factory()->create();
        }

        $token = $this->authorize($user);
        $this->authHeaders = ['Authorization' => "Bearer $token"];
        $this->user = $user;

        return $user;
    }

    /**
     * Authorizes user and returns the auth token
     *
     * @param User $user
     * @return string
     */
    protected function authorize(User $user): string
    {
        return JWTAuth::fromUser($user);
    }

    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

}
