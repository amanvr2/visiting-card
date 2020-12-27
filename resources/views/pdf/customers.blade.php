
<img src="./images/logo.png"><br>


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




<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      
    </tr>
  </thead>
  <tbody>
  
  </tbody>
</table>

