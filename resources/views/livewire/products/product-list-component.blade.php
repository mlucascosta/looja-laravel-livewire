<div class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2 gap-4">
        @forelse($products as $product)
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-200 group">
                <div class="relative">
                    <img src="https://picsum.photos/seed/{{ $product->id }}/600/500"
                         alt="{{ $product->brand->name ?? 'Produto' }} - {{ $product->name }}"
                         loading="lazy"
                         class="w-full h-64 object-cover transition duration-200 group-hover:scale-[1.015]">
                    <div class="absolute top-2 right-2 bg-white border border-gray-300 text-gray-800 text-xs font-semibold px-2 py-0.5 rounded">
                        -{{ rand(10, 60) }}%
                    </div>
                </div>
                <div class="p-4 space-y-1">
                    <h3 class="font-semibold text-base text-neutral-900">
                        {{ $product->name }}
                    </h3>
                    <p class="text-sm text-neutral-700">Marca: {{ $product->brand->name ?? '-' }}</p>
                    <p class="text-sm text-neutral-500">Categoria: {{ $product->category->name ?? '-' }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-neutral-600">
                Nenhum produto encontrado com os filtros selecionados.
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
