<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Model\RoomCapacityManager;

class RoomCapacityTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function it_will_store_roomCapacity()
    {
        
    	$response = $this->post(route('roomCapacity.store'), [
    		'room_capacity_name' => 'Test Capacity']);
        
        $response->assertStatus(201);
        $this->assertDatabaseHas('room_capacity_managers', [
            'room_capacity_name' => 'Test Capacity'
        ]);
    }


    /** @test */
    public function it_will_display_a_roomCapacity()
    {
    	$response = $this->post(route('roomCapacity.store'), [
    		'room_capacity_name' => 'Test Capacity']);

    	$roomCapacityManager = RoomCapacityManager::all()->first();
    	$response = $this->get(route('roomCapacity.show', $roomCapacityManager->id));

        $response->assertStatus(200);

        $response->assertJson($roomCapacityManager->toArray());
    }

    /** @test */
    public function it_will_update_roomCapacity()
    {
    	$response = $this->post(route('roomCapacity.store'), [
    		'room_capacity_name' => 'Test Capacity']);

    	$roomCapacityManager = RoomCapacityManager::all()->first();

    	$response = $this->put(route('roomCapacity.update', $roomCapacityManager->id), ['room_capacity_name' => 'Updated Capacity']);

        $response->assertStatus(200);

        $roomCapacityManager = $roomCapacityManager->fresh();
        $this->assertEquals($roomCapacityManager->room_capacity_name, 'Updated Capacity');

    }


    /** @test */
    public function it_will_delete_roomCapacity()
    {
    	$response = $this->post(route('roomCapacity.store'), [
    		'room_capacity_name' => 'Test Capacity']);

    	$roomCapacityManager = RoomCapacityManager::all()->first();

    	$response = $this->delete(route('roomCapacity.delete', $roomCapacityManager->id));

        $response->assertStatus(204);
        
    }
}
