<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\Category;
use App\Models\Brand;
use App\Data\Products\ProductFilterDTO;
use App\Http\Products\FilterProducts;

class ProductFilterComponent extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $name = '';

    #[Url(as: 'categories', history: true)]
    public string $category_ids = '';

    #[Url(as: 'brands', history: true)]
    public string $brand_ids = '';

    #[Url(as: 'page', history: true)]
    public ?int $page = 1;

    public array $categories_array = [];
    public array $brands_array = [];

    protected $queryString = [
        'name' => ['except' => ''],
        'categories_array' => ['except' => []],
        'brands_array' => ['except' => []],
        'page' => ['except' => 1], // para manter a paginação na URL
    ];

    public function mount()
    {
        $this->categories_array = $this->category_ids ? explode(',', $this->category_ids) : [];
        $this->brands_array = $this->brand_ids ? explode(',', $this->brand_ids) : [];
    }

    public function updatedCategoriesArray()
    {
        $this->category_ids = implode(',', $this->categories_array);
        $this->resetPage();
    }

    public function updatedBrandsArray()
    {
        $this->brand_ids = implode(',', $this->brands_array);
        $this->resetPage();
    }

    public function updatedName()
    {
        $this->resetPage();
    }

    public function getProductsProperty()
    {
        $dto = ProductFilterDTO::fromArray([
            'name' => $this->name,
            'category_ids' => $this->categories_array,
            'brand_ids' => $this->brands_array,
        ]);

        return app(FilterProducts::class)($dto)
            ->paginate(6)
            ->appends(request()->query());
    }

    public function submit()
    {
        $this->dispatch('apply-filters', [
            'name' => $this->name,
            'category_ids' => $this->categories_array,
            'brand_ids' => $this->brands_array,
        ]);
    }

    public function resetFilters()
    {
        $this->reset([
            'name',
            'categories_array',
            'brands_array',
            'category_ids',
            'brand_ids',
        ]);

        $this->resetPage();
        $this->submit();
    }

    public function paginationView()
    {
        return 'pagination::tailwind';
    }

    public function render()
    {
        return view('livewire.products.product-filter-component', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'products' => $this->products,
        ]);
    }
}
