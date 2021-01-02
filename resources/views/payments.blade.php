@extends('layouts.app')

@section('content') 




  <table class="table table-striped">
    <thead>
      <tr>
        <th>no </th>
        <th>Order Id</th>
        <th>Plan Type</th>
        <th>Billing Date - Time</th>
        <th> Invoice </th>
      </tr>
    </thead>
    <tbody>

      @foreach($data as $user)
      <tr>
        <td> {{ $user->id }} </td>
        <td>{{ $user->orderId }}</td>
        <td>{{ $user->planType }}</td>
        <td>{{ $user->dateTime }}</td>
        <td> <a href="/download-invoice/{{$user->id}}" role="button" class="btn btn-primary">Download </a> </td>
      </tr>
      @endforeach
    
    </tbody>
  </table>




@endsection