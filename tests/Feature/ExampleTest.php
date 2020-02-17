<?php

namespace Tests\Feature;

use App\Product;
use App\DeskSale;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Item;
use Exception;

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
        $prod2 = factory(Product::class)->create(['price' => 2]);

        $sale = new DeskSale();
        $sale->addItem(new Item($prod1, 1));
        $sale->addItem(new Item($prod2, 1));

        $sale->confirm();

        $this->assertEquals(3, $sale->total());
        $this->assertCount(2, $sale->items());
    }

    /** @test */
    public function it_()
    {

    }

    /** @test */
    public function it_cannot_add_items_after_is_confirmed()
    {
        $prod1 = factory(Product::class)->create(['price' => 1]);
        $prod2 = factory(Product::class)->create(['price' => 2]);

        $sale = new DeskSale();
        $sale->addItem(new Item($prod1, 1));

        $sale->confirm();

        $this->expectException(Exception::class);

        $sale->addItem(new Item($prod2, 1));
    }
}
