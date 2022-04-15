@extends('books.layout')

@section('content')
<div style="background-color:#f3f4f6">
    <div class="row m-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-4">
                <h2>Failai</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard') }}">Grįžti</a>
            </div>
        </div>
    </div>

    <div class="row ml-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table d-flex">
                    @if (count($file) == 0)
                        <tr>
                            <td colspan="3">{{ __('No files found') }}</td>
                        </tr>
                    @else 
                        <tr>
                            <th scope="col">Nr.</th>
                            <th scope="col">{{ __('Action Name') }}</th>
                            @if (Route::has('login'))
                                @auth
                                <th width="150px"></th>
                                @endauth
                            @endif

                        </tr>
                        @foreach ($file as $files)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $files->filenames_orig }}</td>
                            @if (Route::has('login'))
                                @auth        
                                    <td class="d-flex justify-content-center"> 
                                        <form action="{{ route('download',$files->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Atsiųsti</button>
                                        </form>
                                    </td>
                                @endauth
                            @endif
                        </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</div> 
@endsection