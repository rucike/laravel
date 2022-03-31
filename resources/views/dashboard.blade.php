<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

@extends('books.layout')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    <h4>Seiki atvykę! </h4><br>
                    <button class="btn btn-outline-secondary" onclick="window.location='{{ route("mail") }}'">Noriu gauti laišką.</button>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection