<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>

    .table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 2px solid #ddd;
    padding:8px;
    }

    table{   
    border-collapse: collapse;
    border-spacing: 0;}

    tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
    }
tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}


  </style>
</head>
<body>


<img src="https://www.mycredential.in/public/images/logo.png" alt="aman"><br>

 

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Invoice No </th>
        <th>Date</th>
       
      </tr>
    </thead>
    <tbody>

      @foreach($test as $user)
      <tr>
        <td> {{ $invoice_no }} </td>
        <td>{{ $user->dateTime }}</td>
        
      </tr>
      @endforeach
    
    </tbody>
  </table>




<h2>MH INFOTECH SERVICES PVT. LTD.</h2>
<h3>IA 13B, Ashok Vihar Phase-1, New Delhi-110052</h3>
<p>Email: info@shoperkart.in</p>
<p>Contact no: 9827679993</p>
<p>GSTIN: 07AAMCM6299C1Z3</p>

<h3>Bill To: </h3>

@foreach($data as $customer)
    
      
  <p>{{ $customer->name }}</p>
  <p>{{ $customer->address }}</p>
  <p>{{ $customer->email }}</p>
  <p>{{ $customer->number }}</p>
      
@endforeach








<table class="table">
  <thead>
    <tr>
      <th>DESCRIPTION</th>
      <th>QTY</th>
      <th>UNIT PRICE</th>
      <th>Amount</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($test as $customer)
    <tr>
      <td>  {{ $customer->planType }} </td>
      <td> 1 </td>
      <td>  {{$customer->planAmount}} </td>
      <td>  {{$customer->planAmount}} </td>

    </tr>

    <tr>
      <td></td>
      <td></td>
      <td> Sub total </td>
      <td>{{$customer->planAmount}}</td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td> IGST 18% </td>
      <td>{{$igst}} </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td> Total </td>
      <td>{{$total}}</td>
    </tr>

     <tr>
      <td></td>
      <td></td>
      <td>Round off </td>
      <td>{{$roundOff}}</td>
    </tr>

     <tr>
      <td></td>
      <td></td>
      <td> Grand total </td>
      <td>{{$grandTotal}}</td>
    </tr>

    @endforeach
  
  </tbody>
</table>



</body>
</html>





