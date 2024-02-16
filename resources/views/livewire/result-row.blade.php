<div class="flex items-center justify-between p-2 border-b border-gray-200 hover:bg-gray-100 cursor-pointer">
    <img src="{{ $result['thumb'] }}" alt="{{ $result['name'] }}" class="w-6 h-6 mr-2">
    <a href="{{ url('/crypto-details/' . $result['id']) }}" class="flex items-center w-full">
        <span class="flex-1">{{ $result['name'] }} <span class="text-gray-500">({{ $result['symbol'] }})</span></span>
    </a>
</div>
