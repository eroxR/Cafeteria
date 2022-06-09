<div>
    <div class="py-12">
        <h1 class="text-black text-4xl rounded-lg p-1">List of Categories</h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('category.create-category')
            <div class="flex items-center ">
                <span>Mostrar</span>

                <select wire:model="cant" name="" id="" class="mx-2">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>

                <span>entradas</span>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
                    <div class="w-full overflow-x-auto">
                        @if ($categories->count())
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="cursor-pointer pl-4 py-2" wire:click="order('id')">

                                            ID

                                            @if ($sort == 'id')

                                                @if ($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt "></i>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt "></i>
                                                @endif
                                            @else
                                                <i class="fas fa-sort "></i>
                                            @endif

                                        </th>
                                        <th class="cursor-pointer px-3 py-2" wire:click="order('category_name')">

                                            category_name

                                            @if ($sort == 'category_name')

                                                @if ($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt"></i>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt"></i>
                                                @endif
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif

                                        </th>
                                        <th class="px-3 py-2">

                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                                    @foreach ($categories as $category)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-2 py-1 text-sm">
                                                {{ $category->id }}
                                            </td>
                                            <td class="px-2 py-1">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <div>
                                                        <p class="font-semibold">{{ $category->category_name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-2 py-1">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    <button
                                                        class="
                                                        inline-flex items-center justify-center  bg-yellow-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 focus:outline-none focus:bg-yellow-700 focus:ring focus:ring-red-200 active:bg-yellow-700 disabled:opacity-25 transition"
                                                        aria-label="Edit" wire:click="edit({{ $category }})">
                                                        <svg class="w-5 h-5" aria-hidden="true"
                                                            fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <button
                                                        class="inline-flex items-center justify-center  bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
                                                        aria-label="Delete"
                                                        wire:click="$emit('deletecategory',{{ $category->id }})">
                                                        <svg class="w-5 h-5" aria-hidden="true"
                                                            fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="px-6 py-4 text-black dark:text-white">
                                No existe Usuarios que coincidan con lo que estas buscando...
                            </div>
                        @endif

                        <div class="px-6 py-3">
                            {{ $categories->links() }}
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name="title">
            Editar Categoria
        </x-slot>

        <x-slot name="content">

            <form class="px-4 my-32 max-w-3xl mx-auto space-y-6">

                <div class="flex space-x-4">

                    <div class="w-1-3">
                        <label class="text-gray-700 dark:text-gray-400">category_name</label>

                        <input
                            class="block w-full py-2 px-4 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="category_name" type="text" wire:model="category.category_name"
                            name="category_name" />

                        <x-jet-input-error for="category_name" />
                    </div>
                </div>

            </form>


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit', false)">
                Canlcelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="update">
                Editar Category
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>

@push('js')

@endpush
