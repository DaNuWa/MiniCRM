<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function not_logged_in_user_cant_see_records()
    {
        $response = $this->get('companies');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    /** @test */
    public function a_user_should_logged_in_to_see_company_records()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->actingAs($user)->get('companies');
        $response->assertStatus(200);
    }

    /** @test */
    public function can_create_record()
    {
        $company = Company::create(['name' => 'test', 'email' => 'test@test.com', 'website' => 'www.test.com']);
        $this->assertEquals('test', $company->name);
    }

    /** @test */
    public function can_update_record()
    {
        $company = Company::create(['name' => 'test', 'email' => 'test@test2.com', 'website' => 'www.test.com']);
        $company->update(['name' => 'updatedName']);
        $this->assertEquals('updatedName', $company->name);
    }

    /** @test */
    public function can_delete_record()
    {
        $company = Company::create(['name' => 'test', 'email' => 'test@test3.com', 'website' => 'www.test.com']);
        $company->delete();
        $this->assertNotEquals($company->deleted_at, null);
    }

    /** @test */
    public function can_create_user_record()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $this->assertEquals('admin@admin.com', $user->email);
    }

    /** @test */
    public function can_update_user_record()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'admin@admin2.com',
            'password' => Hash::make('password'),
        ]);
        $user->update(['email' => 'admin@admin2.com']);
        $this->assertEquals('admin@admin2.com', $user->email);
    }

    /** @test */
    public function can_delete_user_record()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'admin@admin3.com',
            'password' => Hash::make('password'),
        ]);
        $user->delete();
        $this->assertNotEquals($user->deleted_at, null);
    }
}
