<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LicenseControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testValidateLicense()
    {
        $response = $this->post('/validate-license', ['key' => config('licensing.license_key')]);
        $response->assertStatus(200)
                 ->assertJson([
                     'status' => 'valid',
                 ]);  
    }

    public function testDeleteResources() 
    {
        $response = $this->post('/delete-resources', ['key' => config('licensing.license_key')]);
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Resources deleted successfully',
                 ]);
    }
}