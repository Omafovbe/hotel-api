<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Model\RoomTypeManager;

class RoomTypeTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function it_will_store_roomType()
    {
        
    	$response = $this->post(route('roomType.store'), [
    		'room_type_name' => 'Test Type']);
        
        $response->assertStatus(201);
        $this->assertDatabaseHas('room_type_managers', [
            'room_type_name' => 'Test Type'
        ]);
    }


    /** @test */
    public function it_will_display_a_roomType()
    {
    	$response = $this->post(route('roomType.store'), [
    		'room_type_name' => 'Test Type']);

    	$roomTypeManager = RoomTypeManager::all()->first();
    	$response = $this->get(route('roomType.show', $roomTypeManager->id));

        $response->assertStatus(200);

        $response->assertJson($roomTypeManager->toArray());
    }

    /** @test */
    public function it_will_update_roomType()
    {
    	$response = $this->post(route('roomType.store'), [
    		'room_type_name' => 'Test Type']);

    	$roomTypeManager = RoomTypeManager::all()->first();

    	$response = $this->put(route('roomType.update', $roomTypeManager->id), ['room_type_name' => 'Updated Type']);

        $response->assertStatus(200);

        $roomTypeManager = $roomTypeManager->fresh();
        $this->assertEquals($roomTypeManager->room_type_name, 'Updated Type');

    }


    /** @test */
    public function it_will_delete_roomType()
    {
    	$response = $this->post(route('roomType.store'), [
    		'room_type_name' => 'Test Type']);

    	$roomTypeManager = RoomTypeManager::all()->first();

    	$response = $this->delete(route('roomType.delete', $roomTypeManager->id));

        $response->assertStatus(204);
        
    }
}
