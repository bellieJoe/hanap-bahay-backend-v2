<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function sendVerificationCode()
    {
        $response = $this->post('/users/send-code', ['code' => 123456, 'email_address' => 'bertdc@riniiya.com']);

        $response->assertStatus(200);
    }
}
