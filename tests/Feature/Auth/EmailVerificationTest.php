<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use PHPUnit\Framework\Attributes\Test;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function verification_email_is_sent_when_user_registers()
    {
        Notification::fake();

        $userData = [
            'username' => 'testuser',
            'email' => 'testemail@test.test',
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword',
        ];

        $this->post('/register', $userData);

        $this->assertDatabaseHas('users', ['email' => $userData['email']]);

        $user = User::where(['email' => $userData['email']])->first();

        Notification::assertSentTo($user, VerifyEmail::class);
    }
}
