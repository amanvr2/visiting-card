@extends('layouts.app')

@section('content')




<table class="table">
    <thead>
      <tr>
        <th>name</th>
        <th>email</th>
        <th>number</th>
        <th>Time</th>
      </tr>
    </thead>

@foreach($data as $user)
    <tbody>
      <tr>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email}}</td>
        <td>{{ $user->number}}</td>
        <td>{{ $user->dateTime}}</td>
      </tr>
     
    </tbody>
@endforeach
  </table>




@endsection