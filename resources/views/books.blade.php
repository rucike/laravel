<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<head>
    <!--Template based on URL below-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Place your stylesheet here-->
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
    <table class="table d-flex justify-content-center">
        @if (count($books) == 0)
        <tr>
            <td colspan="3">{{ __('No books found') }}</td>
        </tr>
        @else <h3 class='m-3'>Knygų sąrašas</h3>
        
        <tr>
            <th scope="col">{{ __('Book name') }}</th>
            <th scope="col">{{ __('Author') }}</th>
            <th scope="col">{{ __('Release Date') }}</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->book_name }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->vnt }}</td>
        </tr>
        @endforeach
        @endif
    </table>
</body>
</x-app-layout>
</html>