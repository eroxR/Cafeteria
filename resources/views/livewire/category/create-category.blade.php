<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Create new Category
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear Nueva Categoria
        </x-slot>

        <x-slot name="content">

            <form class="px-4 my-32 max-w-3xl mx-auto space-y-6">
                <div class="flex space-x-4">

                    <div class="w-1-3">
                        <label class="text-gray-700 dark:text-gray-400">category_name</label>

                        <input
                            class="block w-full py-2 px-4 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="category_name" type="text" wire:model.defer="category_name" name="category_name"/>

                            <x-jet-input-error for="category_name"/>
                    </div>
                </div>
            </form>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Canlcelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="store">
                Create Category
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
