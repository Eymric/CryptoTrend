<div class="relative">
    <input wire:model.lazy="searchTerm" type="text" placeholder="Search..." class="input-class">
    @if (!empty($searchTerm))
        @if (empty($searchResults))
            <div class="absolute z-10 w-full bg-white shadow-lg max-h-60 overflow-y-auto mt-1">
                <div class="flex items-center justify-between p-2 border-b border-gray-200">
                    No results found.
                </div>
            </div>
        @else
            <div class="absolute z-10 w-full bg-white shadow-lg max-h-60 overflow-y-auto mt-1">
                @foreach ($searchResults as $result)
                    @livewire('result-row', ['result' => $result], key($result['id']))
                @endforeach
            </div>
        @endif
    @endif
</div>
