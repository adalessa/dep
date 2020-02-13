<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /** @test */
    public function it_some()
    {
        $prod1 = factory(Product::class)->create(['price' => 1]);
        $prod2 = factory(Product::class)->create(['price' => 1]);

        $sale = new DeskSale();
        $sale->addItem(new Item($prod1, 1));
        $sale->addItem(new Item($prod2, 1));

        $sale->confirm();

        $this->assertEquals(3, $sale->total());
        $this->assertCount(2, $sale->items);
    }

}
