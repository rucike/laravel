@extends('books.layout')
@section('content')

<div class="container lst">

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Klaida!</strong> .<br><br>
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div> 
@endif

<h3 class="well">Bylos įkėlimas į serverį</h3>

<div class="pull-right">
  <a class="btn btn-primary mt-2 mb-3" href="{{ route('dashboard') }}">Grįžti</a>
</div>

<form method="post" action="{{url('file')}}" enctype="multipart/form-data">
    @csrf

    <div class="input-group hdtuto control-group lst increment" >
      <input type="file" name="filenames[]" class="myfrm form-control">
      <div class="input-group-btn"> 
        <button class="btn btn-success ml-2" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Pridėti</button>
      </div>
    </div>
    <div class="clone hide">
      <div class="hdtuto control-group lst input-group" style="margin-top:10px">
        <input type="file" name="filenames[]" class="myfrm form-control">
        <div class="input-group-btn"> 
          <button class="btn btn-danger ml-2" type="button"><i class="fldemo glyphicon glyphicon-remove"></i>Pašalinti</button>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-success" style="margin-top:10px">Patvirtinti</button>

</form>        
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
</script>

@endsection