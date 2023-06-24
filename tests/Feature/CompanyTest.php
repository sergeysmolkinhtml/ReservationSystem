<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_only_admins_can_access_companies_list_page(): void
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->get(route('companies.index'));

        $response->assertStatus(200);
    }

    public function test_non_admin_user_cannot_access_companies_index_page(): void
    {
        $customer = User::factory()->create();

        $response = $this->actingAs($customer)->get(route('companies.index'));

        $response->assertForbidden();
    }
}
