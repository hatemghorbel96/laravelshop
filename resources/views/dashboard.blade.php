{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('welcome')
@section('content')
</div>
<section class="container mt-2 my-3 py-5">
<div class="container mt-2 text-center">
    <h2>Welcome {{Auth::user()->name}}!</h2>
    <h2>Welcome {{Auth::user()->email}}!</h2>
    
    
</div>
</section>

@endsection
