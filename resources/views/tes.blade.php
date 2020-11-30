@extends('layouts.app')
 
@section('content')

<form action="/go" method="POST" enctype="multipart/form-data">
  @csrf
  <input name="image" type="file" required >

  <button type="submit" class="btn btn-primary">submit</button>




</form>













@endsection