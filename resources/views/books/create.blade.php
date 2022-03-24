@extends('books.layout')

@section('content')
<div style="background-color:#f3f4f6" class="m-4 p-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pridėti naują knygą</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}">Grįžti</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Uups!</strong>Kilo problemų dėl jūsų įvedimo.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="row ml-5 mt-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Book name') }}:</strong>
                    <input type="text" name="book_name" class="form-control" placeholder="Knygos pavadinimas">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Author') }}:</strong>
                    <input type="text" name="author" class="form-control" placeholder="Autorius">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Release date') }}:</strong>
                    <input type="text" name="release_date" class="form-control" placeholder="metai-mėnuo-diena">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Patvirtinti</button>
            </div>
        </div>

    </form>
</div>

@endsection 
