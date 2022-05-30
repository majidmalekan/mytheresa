<?php

namespace Tests\Feature;

use App\Http\Requests\product\IndexProductRequest;
use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use  WithFaker, RefreshDatabase;

    protected array $params;

    public function setUp(): void
    {
        parent::setUp();
        $this->params = [
            'category' => $this->faker->randomElement(['boots', 'sandals', 'sneakers', 't-shirt', 'purse']),
            'priceLessThan' => $this->faker->numberBetween($min = 1000, $max = 100000)
        ];

        $this->rules = (new IndexProductRequest())->rules();
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_return_a_collection_of_paginated_products()
    {
        Product::factory(10)->create();
        $response = $this->getJson('/api/v1/products');
        $response->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "message",
                'data' => [
                    'current_page',
                    'data' => [
                        '*' => [
                            'id',
                            'sku',
                            'name',
                            'category',
                            'price' => [
                                'original', 'final', 'discount_percentage', 'currency'
                            ],
                            'created_at'
                        ]
                    ],
                    "links",
                    "first_page_url",
                    "from",
                    "last_page",
                    "last_page_url",
                    "next_page_url",
                    "path",
                    "per_page",
                    "prev_page_url",
                    "to",
                    "total"
                ]
            ]);
    }


    public function can_return_a_collection_of_paginated_products_with_filter()
    {
        Product::factory(10)->create([
            'category' => $this->params["category"],
            'price' => $this->params["priceLessThan"]
        ]);
        $response = $this->getJson('/api/v1/products', $this->params);
        $response->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "message",
                'data' => [
                    'current_page',
                    'data' => [
                        '*' => [
                            'id',
                            'sku',
                            'name',
                            'category',
                            'price' => [
                                'original', 'final', 'discount_percentage', 'currency'
                            ],
                            'created_at'
                        ]
                    ],
                    "links",
                    "first_page_url",
                    "from",
                    "last_page",
                    "last_page_url",
                    "next_page_url",
                    "path",
                    "per_page",
                    "prev_page_url",
                    "to",
                    "total"
                ]
            ]);
    }
}
