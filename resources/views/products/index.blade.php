@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <div class="mx-auto max-w-8xl px-4">
        <div class="grid grid-cols-1 md:grid-cols-6">
            <!-- Filtro lateral -->
            <aside class="md:col-span-2">
                <livewire:products.product-filter-component />
            </aside>

            <!-- Listagem de produtos -->
            <main class="md:col-span-4">
                <livewire:products.product-list-component />
            </main>
        </div>
    </div>
@endsection

