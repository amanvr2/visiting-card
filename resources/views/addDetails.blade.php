 @extends('layouts.app')

@section('content')

<div class="dash-body">

  <div class="container">

    <div class="dash-head">

      <h2> Kindly fill the below details to create your Visiting Card </h2>

    </div>


  </div>





  <div class="form-list">


    <div class="form-item"> 
      
        <div class="basic">
          <p> Step 1 </p>
          <h3> Basic Details </h3>
          <p id="fields"> Fields marked with * are mandatory to be filled . </p> 
          <br> 


            @if(Session::has('success'))
                  <p class="alert alert-success">Data has been saved successfully !</p>
            @elseif(Session::has('email'))
                  <p class="alert alert-danger">Link Sent !</p>  

            @elseif(Session::has('error'))
                  <p class="alert alert-danger">Data Already Present !</p>


            @endif

          <form action="/save" class="form-group" method="POST" enctype="multipart/form-data">


            @csrf

            Business Name * : <input type="text" name="businessname" class="form-control" required>

            Business Tagline * : <input type="text" name="tagline" class="form-control" required>

            Name * : <input type="text" name="name" class="form-control" required>

            Number * : <input type="text" name="number" class="form-control" required>

            Email * : <input type="text" name="email" class="form-control" required>

            Full Address * : <input type="text" name="address" class="form-control" required>
            Pincode * : <input type="text" name="pincode" class="form-control" required>
            Facebook Link : <input type="text" name="fbLink" class="form-control">

            Twitter Link : <input type="text" name="twitterLink" class="form-control">

            Instagram Link : <input type="text" name="instaLink" class="form-control">

            linkedin Link : <input type="text" name="linkedinLink" class="form-control">

            About Us * : <input type="text" name="aboutUs" class="form-control" required>

            Profile Image * : <input name="image1" type="file" required >

            Cover Image * : <input name="image2" type="file" required >  

            VCF  : <input name="vcf" type="file"  > <a data-toggle="modal" href="#myModal">How to get your VCF ?</a> <br>
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">How to get your VCF ?</h4>
                    </div>
                    <div class="modal-body">
                      <p>1. Go to <a href="https://contacts.google.com/">Google Contacts.</a></p>
                      <p>2. Click on Create Contact and fill your details.</p>
                      <p>3. Click on more actions and select Export and then Export as vCard.</p>
                      <p>4. VCF File will be downloaded .</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>

            <br>

            <button type="submit" name="submit" id="saveBtn"class="btn btn-success"><i id="saveIcon" class="fa fa-floppy-o" aria-hidden="true"></i>Save & Continue</button>


          </form>

        </div>
    




    </div>


    <div class="form-item">

      
        <div class="service-form" id="service-form">


          @if(Session::has('service_success'))
            <p class="alert alert-success">Data has been saved successfully</p>
          @endif
  

          <p> Step 2 </p>
          <h3>Add Services </h3>

          <form action="/service-save" method="POST">
            @csrf
            <section>

              
                <table class="table table-bordered">
                  <thead>
                    <tr> 
                      <th>Title</th>
                      <th>Body</th>
      
                      <th><a href="#service-form" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                    </tr>
                  </thead>
                  <tbody class="service-row">
                    <tr>
                      <td><input type="text" name="title[]" class="form-control" required></td>
                      <td><input type="text" name="body[]" class="form-control" required></td>

                      <td><a href="/dashboard#service-form" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                   
                  </tbody>
                  <tfoot>
                    <tr>
                       <td><button type="submit" name="submit" id="saveBtn"class="btn btn-success"><i id="saveIcon" class="fa fa-floppy-o" aria-hidden="true"></i>Save & Continue</button></td>
                      <!-- <td><input type="submit" name="submit" value="Save & Continue" class="btn btn-success"></td> -->
                    </tr>
                  </tfoot>
                </table>
           
            </section>
          </form>

        </div>
      
 
     
        <div class="project-form" id="project-form">

          @if(Session::has('project_success'))
		        <p class="alert alert-success">Data has been saved successfully </p>
          @endif
          <p> Step 3 </p>
          <h3>Add Business Details </h3>

            <form action="/project-save" method="POST" enctype="multipart/form-data">
              @csrf
              <section>

               
                <div style="overflow-x:auto;">
                  <table class="table table-bordered">
                    <thead>
                      <tr>  
                        <th>Title</th>
                        <th>Body</th>
                        <th>Image</th><th>More Image </th>
                        <th><a href="#project-form" class="addRows"><i class="glyphicon glyphicon-plus"></i></a></th>
                      </tr>
                    </thead>
                    <tbody class="project-row">
                      <tr>
                        <td><input type="text" name="title[]" class="form-control" required></td>
                        <td><input type="text" name="body[]" class="form-control" required></td>
                        <td><input type="file" name="image[]"required></td>
                        <td><input type="file" name="image1[]" required></td> 
                        <td><a href="/dashboard#project-form" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                      </tr> 
                      
                    </tbody>
                    <tfoot> 
                      <tr>

                        <td><button type="submit" name="submit" id="saveBtn"class="btn btn-success"><i id="saveIcon" class="fa fa-floppy-o" aria-hidden="true"></i>Save & Continue</button></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </section>
            </form>
        </div>
  

      @foreach($data as $user)

        @if($user->link != NULL)
        <div class="generate">
          <a href="/link-sent" role="button" class="btn btn-warning"> <i class="fa fa-cog" aria-hidden="true"></i>Generate Link </a>

        </div> 

        @endif

      @endforeach





      










    </div>




  </div>



</div>
 








@endsection
