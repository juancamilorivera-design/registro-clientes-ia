<?php

namespace Tests\Feature;

use Tests\TestCase;

class ChatControllerTest extends TestCase
{
    public function test_chat_endpoint_returns_response(): void
    {
        $response = $this->postJson('/api/chat', [
            'mensaje' => 'Hola, ¿quién eres?'
        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'respuesta'
        ]);
    }
}
