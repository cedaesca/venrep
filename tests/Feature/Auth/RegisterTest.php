<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function registration_page_is_accessible()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    #[Test]
    public function user_can_register()
    {
        Notification::fake();

        $response = $this->post('/register', [
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
        $this->assertAuthenticated();

        $user = User::where('email', 'testuser@example.com')->first();
        $this->assertNotNull($user);
        $this->assertTrue(Hash::check('password', $user->password));
    }
}
