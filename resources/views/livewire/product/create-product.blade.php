<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Create new Product
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear Nuevo Producto
        </x-slot>

        <x-slot name="content">

            <form class="px-4 my-32 max-w-3xl mx-auto space-y-6">
                <div class="flex space-x-4">

                    <div class="w-1-3">
                        <label class="text-gray-700 dark:text-gray-400">product_name</label>

                        <input
                            class="block w-full py-2 px-4 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="product_name" type="text" wire:model.defer="product_name" name="product_name"/>

                            <x-jet-input-error for="product_name"/>
                    </div>
                </div>
                <div class="flex space-x-4">

                    <div class="w-6-12">
                        <label class="text-gray-700 dark:text-gray-400">reference</label>

                        <input
                            class="block w-full py-2 px-4 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="reference" type="text" wire:model.defer="reference" name="reference"/>

                        <x-jet-input-error for="reference"/>
                    </div>

                    <div class="w-6-12">
                        <label class="text-gray-700 dark:text-gray-400">price</label>

                        <input
                            class="block w-full py-2 px-4 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="price" type="text" wire:model.defer="price" name="price"/>

                        <x-jet-input-error for="price"/>
                    </div>
                </div>
                <div class="flex space-x-4">

                    <div class="w-6-12">
                        <label class="text-gray-700 dark:text-gray-400">weight</label>

                        <input
                            class="block w-full py-2 px-4 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="weight" type="text" wire:model.defer="weight" name="weight"/>

                        <x-jet-input-error for="weight"/>
                    </div>

                    <div class="w-6-12">
                        <label class="text-gray-700 dark:text-gray-400">category</label>

                            <select wire:model.defer="category" name="category" id="category"
                            class="block w-full py-2 px-4 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <option value="0">Selecciona la Categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="category"/>
                    </div>
                </div>
            </form>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Canlcelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="store">
                Create Product
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>


