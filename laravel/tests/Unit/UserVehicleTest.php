<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserVehicleTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_user_can_have_multiple_vehicles(): void
    {
        $user = User::factory()->create();

        Vehicle::factory()->for($user)->count(3)->create();

        $this->assertCount(3, $user->vehicles);
    }
}
