<?php

use App\Livewire\Products\ProductFilterComponent;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Livewire\Livewire;

use function Pest\Laravel\{actingAs};

it('filters products by name', function () {
    $category = Category::factory()->create();
    $brand = Brand::factory()->create();

    Product::factory()->create([
        'name' => 'Tênis Esportivo Azul',
        'category_id' => $category->id,
        'brand_id' => $brand->id,
    ]);

    Product::factory()->create([
        'name' => 'Camisa Social Branca',
        'category_id' => $category->id,
        'brand_id' => $brand->id,
    ]);

    Livewire::test(ProductFilterComponent::class)
        ->set('name', 'Tênis')
        ->assertSee('Tênis Esportivo Azul')
        ->assertDontSee('Camisa Social Branca');
});

it('filters products by category', function () {
    $cat1 = Category::factory()->create();
    $cat2 = Category::factory()->create();
    $brand = Brand::factory()->create();

    Product::factory()->create([
        'name' => 'Produto A',
        'category_id' => $cat1->id,
        'brand_id' => $brand->id,
    ]);

    Product::factory()->create([
        'name' => 'Produto B',
        'category_id' => $cat2->id,
        'brand_id' => $brand->id,
    ]);

    Livewire::test(ProductFilterComponent::class)
        ->set('category_ids', [$cat1->id])
        ->assertSee('Produto A')
        ->assertDontSee('Produto B');
});

it('filters products by brand', function () {
    $cat = Category::factory()->create();
    $brand1 = Brand::factory()->create();
    $brand2 = Brand::factory()->create();

    Product::factory()->create([
        'name' => 'Produto X',
        'category_id' => $cat->id,
        'brand_id' => $brand1->id,
    ]);

    Product::factory()->create([
        'name' => 'Produto Y',
        'category_id' => $cat->id,
        'brand_id' => $brand2->id,
    ]);

    Livewire::test(ProductFilterComponent::class)
        ->set('brand_ids', [$brand2->id])
        ->assertSee('Produto Y')
        ->assertDontSee('Produto X');
});

it('can combine all filters', function () {
    $cat = Category::factory()->create();
    $brand = Brand::factory()->create();

    Product::factory()->create([
        'name' => 'Produto Especial',
        'category_id' => $cat->id,
        'brand_id' => $brand->id,
    ]);

    Product::factory()->create([
        'name' => 'Outro Produto',
        'category_id' => $cat->id,
        'brand_id' => $brand->id,
    ]);

    Livewire::test(ProductFilterComponent::class)
        ->set('name', 'Especial')
        ->set('category_ids', [$cat->id])
        ->set('brand_ids', [$brand->id])
        ->assertSee('Produto Especial')
        ->assertDontSee('Outro Produto');
});

it('can clear filters', function () {
    $cat = Category::factory()->create();
    $brand = Brand::factory()->create();

    Product::factory()->create([
        'name' => 'Produto Alpha',
        'category_id' => $cat->id,
        'brand_id' => $brand->id,
    ]);

    Livewire::test(ProductFilterComponent::class)
        ->set('name', 'Alpha')
        ->call('clearFilters')
        ->assertSet('name', '')
        ->assertSet('category_ids', [])
        ->assertSet('brand_ids', []);
});
