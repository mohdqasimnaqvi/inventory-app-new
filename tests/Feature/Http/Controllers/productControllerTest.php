<?php

namespace Tests\Feature\Http\Controllers;

use App\Product;
use App\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\productController
 */
class productControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function monthly_displays_view()
    {
        $products = product::factory()->count(3)->create();

        $response = $this->get(route('product.monthly'));

        $response->assertOk();
        $response->assertViewIs('products.monthly');
        $response->assertViewHas('products');
    }


    /**
     * @test
     */
    public function daily_displays_view()
    {
        $products = product::factory()->count(3)->create();

        $response = $this->get(route('product.daily'));

        $response->assertOk();
        $response->assertViewIs('products.daily');
        $response->assertViewHas('products');
    }


    /**
     * @test
     */
    public function createMonthly_displays_view()
    {
        $response = $this->get(route('product.createMonthly'));

        $response->assertOk();
        $response->assertViewIs('products.create.monthly');
    }


    /**
     * @test
     */
    public function createDaily_displays_view()
    {
        $response = $this->get(route('product.createDaily'));

        $response->assertOk();
        $response->assertViewIs('products.create.daily');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\productController::class,
            'store',
            \App\Http\Requests\productStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $image = $this->faker->word;
        $price = $this->faker->randomFloat(/** decimal_attributes **/);
        $price_unit = $this->faker->word;
        $quantity = $this->faker->randomFloat(/** decimal_attributes **/);
        $quantity_unit = $this->faker->word;
        $is_daily = $this->faker->boolean;
        $is_hidden = $this->faker->boolean;
        $has_reminder = $this->faker->boolean;

        $response = $this->post(route('product.store'), [
            'title' => $title,
            'image' => $image,
            'price' => $price,
            'price_unit' => $price_unit,
            'quantity' => $quantity,
            'quantity_unit' => $quantity_unit,
            'is_daily' => $is_daily,
            'is_hidden' => $is_hidden,
            'has_reminder' => $has_reminder,
        ]);

        $products = Products::query()
            ->where('title', $title)
            ->where('image', $image)
            ->where('price', $price)
            ->where('price_unit', $price_unit)
            ->where('quantity', $quantity)
            ->where('quantity_unit', $quantity_unit)
            ->where('is_daily', $is_daily)
            ->where('is_hidden', $is_hidden)
            ->where('has_reminder', $has_reminder)
            ->get();
        $this->assertCount(1, $products);
        $product = $products->first();

        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('products.id', $products->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $product = product::factory()->create();

        $response = $this->get(route('product.show', $product));

        $response->assertOk();
        $response->assertViewIs('products.show');
        $response->assertViewHas('products');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $product = product::factory()->create();

        $response = $this->get(route('product.edit', $product));

        $response->assertOk();
        $response->assertViewIs('products.edit');
        $response->assertViewHas('products');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\productController::class,
            'update',
            \App\Http\Requests\productUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $product = product::factory()->create();
        $title = $this->faker->sentence(4);
        $image = $this->faker->word;
        $price = $this->faker->randomFloat(/** decimal_attributes **/);
        $price_unit = $this->faker->word;
        $quantity = $this->faker->randomFloat(/** decimal_attributes **/);
        $quantity_unit = $this->faker->word;
        $is_daily = $this->faker->boolean;
        $is_hidden = $this->faker->boolean;
        $has_reminder = $this->faker->boolean;

        $response = $this->put(route('product.update', $product), [
            'title' => $title,
            'image' => $image,
            'price' => $price,
            'price_unit' => $price_unit,
            'quantity' => $quantity,
            'quantity_unit' => $quantity_unit,
            'is_daily' => $is_daily,
            'is_hidden' => $is_hidden,
            'has_reminder' => $has_reminder,
        ]);

        $product->refresh();

        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('products.id', $products->id);

        $this->assertEquals($title, $product->title);
        $this->assertEquals($image, $product->image);
        $this->assertEquals($price, $product->price);
        $this->assertEquals($price_unit, $product->price_unit);
        $this->assertEquals($quantity, $product->quantity);
        $this->assertEquals($quantity_unit, $product->quantity_unit);
        $this->assertEquals($is_daily, $product->is_daily);
        $this->assertEquals($is_hidden, $product->is_hidden);
        $this->assertEquals($has_reminder, $product->has_reminder);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $product = product::factory()->create();
        $product = Products::factory()->create();

        $response = $this->delete(route('product.destroy', $product));

        $response->assertRedirect(route('products.index'));

        $this->assertDeleted($product);
    }
}
