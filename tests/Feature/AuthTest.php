<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class AuthTest extends TestCase
{
    private $email;

    private $password;

    private $name;

    public function setUp(): void
    {
        parent::setUp();

        $this->email = $this->faker->email;
        $this->password = $this->faker->password;
        $this->name = $this->faker->name;
    }

    public function testItCanRegisterAndLogin()
    {
        $response = $this->post(route('register'), [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password,
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseCount('users', 1);

        $response = $this->post(route('login'), [
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_in'
            ]);
    }
}
