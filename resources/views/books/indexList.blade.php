<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Knygų sąrašas
        </h2>
    </x-slot>

@extends('books.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table d-flex justify-content-center">
        @if (count($book) == 0)
            <tr>
                <td colspan="3">{{ __('No books found') }}</td>
            </tr>
        @else 
            <tr>
                <th scope="col">Nr.</th>
                <th scope="col">{{ __('Book name') }}</th>
                <th scope="col">{{ __('Author') }}</th>
                <th scope="col">{{ __('Release date') }}</th>
                @if(Auth::user()->isAdmin())
                    <th width="280px"></th>
                @endif
            </tr>
            @foreach ($book as $books)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $books->book_name }}</td>
                <td>{{ $books->author }}</td>
                <td>{{ $books->release_date }}</td>
                @if(Auth::user()->isAdmin())
                    <td> 
                        <form action="{{ route('books.destroy',$books->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('books.show',$books->id) }}">Rodyti</a>

                            <a class="btn btn-success" href="{{ route('books.edit', $books->id) }}">Redaguoti</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-outline-danger">Trinti</button>
                        </form>
                    </td>
                @endif
            </tr>
            @endforeach
        @endif
    </table>
    @if(Auth::user()->isAdmin())
        <a class="btn btn-secondary ml-5" href="{{ route('books.create') }}"> + Pridėti naują knygą</a>
    @endif
    <div class="mr-5 ml-5"> {!! $book->links() !!} </div>

</x-app-layout>
@endsection
