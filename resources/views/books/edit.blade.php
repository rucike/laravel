@extends('books.layout')

@section('content')
<div style="background-color:#f3f4f6" class="m-4 p-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Redaguoti knygos informaciją</h2>
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

    <form action="{{ route('books.update',$book->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>{{ __('Author') }}:</strong>
                    <input type="text" name="author" value="{{ $book->author }}" class="form-control">
                </div>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Book name') }}:</strong>
                    <input type="text" name="book_name" value="{{ $book->book_name }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Release date') }}:</strong>
                    <input type="text" name="release_date" value="{{ $book->release_date }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Patvirtinti</button>
            </div>
        </div>

    </form>
</div>
@endsection 