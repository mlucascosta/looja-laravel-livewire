<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductListComponent extends Component
{
    use WithPagination;

    public $name = '';
    public $categories_array = [];
    public $brands_array = [];

    protected $listeners = ['apply-filters' => 'applyFilters'];

    protected $paginationTheme = 'tailwind';

    public function applyFilters($data)
    {
        $this->name = $data['name'] ?? '';
        $this->categories_array = $data['category_ids'] ?? [];
        $this->brands_array = $data['brand_ids'] ?? [];

        $this->resetPage();
    }

    public function render()
    {
        $products = Product::query()
            ->with(['brand', 'category'])
            ->when($this->name, fn($q) => $q->where('name', 'like', '%' . $this->name . '%'))
            ->when($this->categories_array, fn($q) => $q->whereIn('category_id', $this->categories_array))
            ->when($this->brands_array, fn($q) => $q->whereIn('brand_id', $this->brands_array))
            ->latest()
            ->paginate(6);

        return view('livewire.products.product-list-component', [
            'products' => $products,
        ]);
    }
}
