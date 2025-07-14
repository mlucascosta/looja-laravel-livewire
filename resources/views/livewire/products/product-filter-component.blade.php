<div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm space-y-6 text-sm text-neutral-800">
    <form wire:submit.prevent="submit">
        {{-- Nome do Produto --}}
        <div style="margin-bottom:2px">
            <label class="block text-sm font-medium text-neutral-700 mb-1">Nome do Produto</label>
            <input type="text"
                   wire:model.defer="name"
                   placeholder="Digite o nome..."
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-xl bg-gray-50 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm mb-2" />
        </div>

        {{-- Categorias --}}
        <div x-data="{ open: true, selectedCategories: @entangle('categories_array') }" class="border-t pt-5">
            <button @click="open = !open"
                    type="button"
                    class="w-full flex justify-between items-center font-semibold text-neutral-900 mb-2">
                CATEGORIAS
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" class="space-y-2 pl-1 max-h-36 overflow-y-auto pr-1">
                @foreach($categories as $category)
                    <label class="flex items-center space-x-2 text-neutral-700">
                        <input type="checkbox"
                               :value="'{{ $category->id }}'"
                               x-model="selectedCategories"
                               class="rounded border-gray-300 text-blue-500 focus:ring-blue-400">
                        <span>{{ $category->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Marcas com busca --}}
        <div x-data="{ open: true, search: '', selectedBrands: @entangle('brands_array') }" class="border-t pt-4">
            <button @click="open = !open"
                    type="button"
                    class="w-full flex justify-between items-center font-semibold text-neutral-900 mb-2">
                MARCAS
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" class="space-y-2">
                <input x-model="search"
                       type="text"
                       placeholder="Buscar marca..."
                       class="w-full px-3 py-2 text-sm border border-gray-300 rounded-xl bg-gray-50 focus:ring-blue-400 focus:border-blue-400 shadow-sm" />
                <div class="max-h-36 overflow-y-auto pr-1 space-y-1">
                    @foreach($brands as $brand)
                        <template x-if="search === '' || '{{ strtolower($brand->name) }}'.includes(search.toLowerCase())">
                            <label class="flex items-center space-x-2 text-neutral-700">
                                <input type="checkbox"
                                       :value="'{{ $brand->id }}'"
                                       x-model="selectedBrands"
                                       class="rounded border-gray-300 text-blue-500 focus:ring-blue-400">
                                <span>{{ $brand->name }}</span>
                            </label>
                        </template>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2 pt-4">
            <button type="submit"
                    class="bg-gray-900 text-white text-sm font-semibold py-2.5 rounded-xl hover:bg-gray-800 transition-all duration-200">
                Aplicar
            </button>
            <button type="button"
                    wire:click="resetFilters"
                    class="bg-gray-100 text-neutral-700 text-sm font-medium py-2.5 rounded-xl hover:bg-gray-200 transition-all duration-200">
                Limpar
            </button>
        </div>
        <input type="hidden" name="brands" value="{{ implode(',', $brands_array) }}">
    </form>
</div>
