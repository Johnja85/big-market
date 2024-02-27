<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProductsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_products()
    {

        $this->withoutExceptionHandling();
        $product = Product::factory(2)->create()->toArray();
        // dd($product->toArray());k

        // $product2 = Product::create([
        //     // 'category_id' => '1',
        //     'description' => 'camiseta azul',
        //     'stock' => '2',
        //     'price' => '10000',
        //     'image' => 'images/423423134uuyuyyu.jpg',

        // ]);

        $response = $this->get(route('product.index'));

        $response->assertStatus(200);

        $response->assertViewIs('product.index');
        $response->assertViewHas('products');

        $response->assertSee($product[0]['description']);
        // $response->assertSee($product2->description);
    }
}
