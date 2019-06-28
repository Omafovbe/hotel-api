<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Model\HotelDetails;

class HotelDetailsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function it_will_store_hotel()
    {
    	//Hotel Data
    	$data = [
    		'name' => 'Benizia Hotel',
    		'address' => '5 Summit road',
    		'city' => 'Asaba',
    		'state' => 'Delta',
    		'country' => 'Nigeria',
    		'zipcode' => '320001',
    		'phone_number' => '08023311445',
    		'email' => 'info@benizia.com',
    		'image' => 'pathtoimage.jpg',
    	];

    	$response = $this->json('POST',route('hotelDetails.store'),$data);
    	$response->assertStatus(201);
    	$this->assertDatabaseHas('hotel_details', [
            'name' => 'Benizia Hotel'
        ]);

    	//Delete Data
    	HotelDetails::where('name', 'Benizia Hotel')->delete();
    }

    //Get all hotels

    /** @test */
    public function getAllHotels()
    {
    	$response = $this->json('GET',route('hotelDetails.all'));
    	$response->assertStatus(200);
    	$response->assertJson(['created' => true]);
    }

    /** @test */
    public function it_will_update_hotel()
    {
    	//
    	//Hotel Data
    	$data = [
    		'name' => 'Benizia Hotel',
    		'address' => '5 Summit road',
    		'city' => 'Lagos',
    		'state' => 'Lagos',
    		'country' => 'Nigeria',
    		'zipcode' => '320001',
    		'phone_number' => '08023311445',
    		'email' => 'info@benizia.com',
    		'image' => 'pathtoimage.jpg',
    	];

    	$response = $this->json('POST',route('hotelDetails.update'),$data);
    	$response->assertStatus(200);
    }

    /** @test */
    public function it_will_delete_hotel()
    {
    	//

    	$response = $this->delete(route('hotelDetails.delete', $hotelDetails->id));
    	//$response->assertStatus(204);
    	$this->assertNull($hotelDetails);
    	$response->assertJsonStructure([
            'message'
        ]);
    }
}
