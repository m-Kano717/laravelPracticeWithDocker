<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase {
    /**
     * A basic feature test example.
     */
    public function test_logIn(): void {
        $this->seed();
        $response = $this->post('/formPractice', [
            "mail" => "mail@testmail",
            "pass" => "1111",
        ]);

        $response->assertRedirect("/showTop");
    }

    public function test_logIn_Fail(): void {
        $this->seed();
        $response = $this->post('/formPractice', [
            "mail" => "mail@testmail",
            "pass" => "1234",
        ]);

        $response->assertSessionHasErrors("mes");
    }
}
