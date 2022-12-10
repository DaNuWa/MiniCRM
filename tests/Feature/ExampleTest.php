<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_should_logged_in_to_see_company_records()
    {
        $response = $this->get('companies');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }
}
