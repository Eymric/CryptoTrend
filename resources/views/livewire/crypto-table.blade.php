<div>
    <table class="items-center bg-transparent w-full border-collapse whitespace-nowrap">
        <thead class="bg-gray-50 text-sm">
            @foreach ($columns as $field => $label)
                <th class="cursor-pointer" wire:click="sortBy('{{ $field }}')" x-data="{ isHovering: false, sortField: @entangle('sortField'), sortDirection: @entangle('sortDirection') }"
                    @mouseenter="isHovering = true" @mouseleave="isHovering = false">
                    <div class="flex items-center">
                        <i x-show="isHovering || sortField === '{{ $field }}'" class="mr-2 fas"
                            :class="sortField === '{{ $field }}' && sortDirection === 'asc' ? 'fa-caret-up' :
                                'fa-caret-down'"
                            class="text-black"></i>
                        <span>{{ $label }}</span>
                    </div>
                </th>
            @endforeach
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($cryptos as $crypto)
                @livewire('crypto-row', ['crypto' => $crypto], key($crypto['name']))
            @endforeach
        </tbody>
    </table>

    <div class="flex items-center justify-between m-12">
        <div class="flex-grow flex justify-center">
            <button wire:click="changePage('previous')" {{ $currentPage === 1 ? 'disabled' : '' }}
                class="mr-4 inline-block rounded border-2 border-neutral-800 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-800 transition duration-150 ease-in-out hover:border-neutral-800 hover:bg-neutral-600 hover:text-neutral-800 focus:border-neutral-800 focus:text-neutral-800 focus:outline-none focus:ring-0 active:border-neutral-900 active:text-neutral-900 dark:border-neutral-900 dark:text-neutral-900 dark:hover:border-neutral-900 dark:hover:bg-neutral-700 dark:hover:text-neutral-900 dark:focus:border-neutral-900 dark:focus:text-neutral-900 dark:active:border-neutral-900 dark:active:text-neutral-900">
                Previous
            </button>
            <span>Page {{ $currentPage }}</span>
            <button wire:click="changePage('next')"
                class="ml-4 inline-block rounded border-2 border-neutral-800 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-800 transition duration-150 ease-in-out hover:border-neutral-800 hover:bg-neutral-600 hover:text-neutral-800 focus:border-neutral-800 focus:text-neutral-800 focus:outline-none focus:ring-0 active:border-neutral-900 active:text-neutral-900 dark:border-neutral-900 dark:text-neutral-900 dark:hover:border-neutral-900 dark:hover:bg-neutral-700 dark:hover:text-neutral-900 dark:focus:border-neutral-900 dark:focus:text-neutral-900 dark:active:border-neutral-900 dark:active:text-neutral-900">
                Next
            </button>
        </div>

        <div class="flex items-center">
            <label for="perPage" class="text-xs font-medium text-neutral-800 mr-2">Show rows:</label>
            <select wire:model.live="perPage" id="perPage"
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline text-neutral-800">
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="150">150</option>
                <option value="200">200</option>
            </select>
        </div>
    </div>

</div>

</div>
