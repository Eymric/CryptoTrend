@extends('layouts.app')

@section('content')
    <x-header />

    <div class="flex justify-center">
        <div class="mt-12 overflow-x-auto w-full max-w-7xl mx-auto">
            <div class="flex justify-end mb-4">
                @livewire('search')
            </div>
            @livewire('crypto-table')
        </div>
    </div>
@endsection
