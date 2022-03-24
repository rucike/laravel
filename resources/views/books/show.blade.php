@extends('books.layout')

@section('content')
<div style="background-color:#f3f4f6">
    <div class="row m-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-4">
                <h2>Knygos rodymas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}">Grįžti</a>
            </div>
        </div>
    </div>

    <div class="row ml-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Book name') }}:</strong>
                {{ $book->book_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Author') }}:</strong>
                {{ $book->author }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Release date') }}:</strong>
                {{ $book->release_date }}
            </div>
        </div>
    </div>
</div> 
@endsection