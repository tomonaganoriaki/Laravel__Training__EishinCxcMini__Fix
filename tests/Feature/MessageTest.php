<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\UserFactory;
use Database\Factories\OwnerFactory;
use App\Models\User;
use App\Models\Owner;

class MessageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testUserCanSendMessage()
    {
        $user = User::factory()->create();
        $owner = Owner::factory()->create();
        $messageContent = 'Hello, this is a test message';

        $response = $this->actingAs($user)
            ->post('/messages', [
                'owner_id' => $owner->id,
                'message' => $messageContent,
            ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('messages', [
            'user_id' => $user->id,
            'owner_id' => $owner->id,
            'message' => $messageContent,
        ]);
    }
}
