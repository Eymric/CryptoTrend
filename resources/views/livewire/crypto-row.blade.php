<tr class="hover:bg-gray-100 cursor:pointer">
    <td class="px-3 py-4">{{ $crypto['market_cap_rank'] }}</td>
    <td class="px-3 py-4">
        <a href="{{ url('/crypto-details/' . $crypto['id']) }}">
            <img src="{{ $crypto['image'] }}" alt="{{ $crypto['name'] }}" class="w-6 h-6 inline-block mr-2">
            {{ $crypto['name'] }} <span class="text-gray-500">{{ strtoupper($crypto['symbol']) }}</span>
        </a>
    </td>
    <td class="px-3 py-4">${{ number_format($crypto['current_price'], 2) }}</td>
    <td class="px-3 py-4">
        <div class="flex items-center">
            @if ($crypto['price_change_percentage_1h_in_currency'] < 0)
                <i class="fas fa-caret-down text-red-500 inline-block"></i>
            @else
                <i class="fas fa-caret-up text-green-500 inline-block"></i>
            @endif
            <span
                class="{{ $crypto['price_change_percentage_1h_in_currency'] < 0 ? 'text-red-500' : 'text-green-500' }}">
                {{ number_format(abs($crypto['price_change_percentage_1h_in_currency']), 2) }}%
            </span>
        </div>
    </td>
    <td class="px-3 py-4">
        <div class="flex items-center">
            @if ($crypto['price_change_percentage_24h_in_currency'] < 0)
                <i class="fas fa-caret-down text-red-500 inline-block"></i>
            @else
                <i class="fas fa-caret-up text-green-500 inline-block"></i>
            @endif
            <span
                class="{{ $crypto['price_change_percentage_24h_in_currency'] < 0 ? 'text-red-500' : 'text-green-500' }}">
                {{ number_format(abs($crypto['price_change_percentage_24h_in_currency']), 2) }}%
            </span>
        </div>
    </td>
    <td class="px-3 py-4">
        <div class="flex items-center">
            @if ($crypto['price_change_percentage_7d_in_currency'] < 0)
                <i class="fas fa-caret-down text-red-500 inline-block"></i>
            @else
                <i class="fas fa-caret-up text-green-500 inline-block"></i>
            @endif
            <span
                class="{{ $crypto['price_change_percentage_7d_in_currency'] < 0 ? 'text-red-500' : 'text-green-500' }}">
                {{ number_format(abs($crypto['price_change_percentage_7d_in_currency']), 2) }}%
            </span>
        </div>
    </td>

    <td class="px-3 py-4">${{ number_format($crypto['market_cap']) }}</td>
    <td class="px-3 py-4">${{ number_format($crypto['total_volume']) }}</td>
    <td class="px-3 py-4">${{ number_format($crypto['circulating_supply']) }} </td>
    <td>
    </td>
</tr>
