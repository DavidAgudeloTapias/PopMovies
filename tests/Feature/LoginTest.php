<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        $response = $this->post('/login', [
            'email' => 'dave@gmail.com',
            'password' => '12345678',
        ]);

        $response->assertRedirect('/');

        $response->assertDontSeeText(trans('app.app_layout.logout'));
    }
}
