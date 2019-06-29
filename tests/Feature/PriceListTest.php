<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Model\PriceList;


class PriceListTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function it_will_store_priceList()
    {
        
    	$response = $this->post(route('priceList.store'), [
    		'room_capacity' => 'Price Capacity',
    		'room_type' => 'Price Type',
            'amount' => 32000,
    	]);
        
        $response->assertStatus(201);
        $this->assertDatabaseHas('price_lists', [
            'room_capacity' => 'Price Capacity'
        ]);
    }


    /** @test */
    public function it_will_display_priceList()
    {
    	$response = $this->post(route('priceList.store'), [
    		'room_capacity_name' => 'Test Capacity',
    		'room_type' => 'Price Type',
            'amount' => 32000,
    	]);

    	$priceList = PriceList::all()->first();
    	$response = $this->get(route('priceList.show', $priceList));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_will_update_priceList()
    {
    	$response = $this->post(route('priceList.store'), [
    		'room_capacity' => 'Capacity',
    		'room_type' => 'Type',
            'amount' => 55000,
    	]);

    	$priceList = PriceList::all()->first();

    	$response = $this->put(route('priceList.update', $priceList->id), ['room_capacity' => 'Updated Capacity',
    		'room_type' => 'Updated Type',
            'amount' => 34000,
    ]);

        $response->assertStatus(200);

        $priceList = $priceList->fresh();
        $this->assertEquals($priceList->room_capacity, 'Updated Capacity');

    }


    /** @test */
    public function it_will_delete_priceList()
    {
    	$response = $this->post(route('priceList.store'), [
    		'room_capacity' => 'Price Capacity',
    		'room_type' => 'Price Type',
            'amount' => 32000,
    	]);

    	$priceList = PriceList::all()->first();

    	$response = $this->delete(route('priceList.delete', $priceList->id));

        $response->assertStatus(204);
        
    }
}
