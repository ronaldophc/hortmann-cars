<?php

namespace Tests\Unit;

use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;
    
    public function testVehicleCreation()
    {
        $vehicle = Vehicle::factory()->create([
            'make' => 'Toyota',
            'model' => 'Corolla',
            'year' => 2020,
            'color' => 'Blue',
        ]);

        $this->assertEquals('Toyota', $vehicle->make);
        $this->assertEquals('Corolla', $vehicle->model);
        $this->assertEquals(2020, $vehicle->year);
        $this->assertEquals('Blue', $vehicle->color);
    }
}
