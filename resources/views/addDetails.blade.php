 @extends('layouts.app')

@section('content')

<div class="dash-body">

  <div class="container">

    <div class="dash-head">

      <h2> Kindly fill the below details to create your Visiting Card </h2>

    </div>


  </div>


  @if(Session::has('success'))
    <p class="alert alert-success">Data has been saved successfully !</p>
  @elseif(Session::has('email'))
    <p class="alert alert-danger">Link Sent !</p>  
  @elseif(Session::has('vcfUploaded'))
    <p class="alert alert-danger">VCF Uploaded Successfully !</p>
  @elseif(Session::has('error'))
    <p class="alert alert-danger">Data Already Present !</p>
  @endif


  <div class="form-list">


    <div class="form-item"> 
     

        @if($count == 0)

      

        <div class="basic">
          <p> Step 1 </p>
          <h3> Basic Details </h3>
          <p id="fields"> Fields marked with * are mandatory to be filled . </p> 
          <br> 


          

          <form action="/save" class="form-group" method="POST" enctype="multipart/form-data">


            @csrf

            Business Name * : <input type="text" name="businessname" class="form-control" required>

            Business Tagline * : <input type="text" name="tagline" class="form-control" required>

            Name * : <input type="text" name="name" class="form-control" required>

            Number * : <input type="text" name="number" class="form-control" required>

            Email * : <input type="text" name="email" class="form-control" required>

            Full Address * : <input type="text" name="address" class="form-control" required>

            Pincode * : <input type="text" name="pincode" class="form-control" required>

            Website Link : <input type="text" name="website" class="form-control">

            Facebook Link : <input type="text" name="fbLink" class="form-control"> 

            Twitter Link : <input type="text" name="twitterLink" class="form-control">

            Instagram Link : <input type="text" name="instaLink" class="form-control">

            linkedin Link : <input type="text" name="linkedinLink" class="form-control">

            Google Map Link : <input type="text" name="maplink" class="form-control">

            About Us * : <input type="text" name="aboutUs" class="form-control" required>

            Profile Image * : <input name="image1" type="file" required >

            Cover Image * : <input name="image2" type="file" required >  

            <!-- VCF  : <input name="vcf" type="file"  > <a data-toggle="modal" href="#myModal">How to get your VCF ?</a> <br>
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  
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
              </div> -->

            <br>

            <button type="submit" name="submit" id="saveBtn"class="btn btn-success"><i id="saveIcon" class="fa fa-floppy-o" aria-hidden="true"></i>Save & Continue</button>


          </form>

        </div>
      @endif
      




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
          @elseif(Session::has('image_error'))
                  <p class="alert alert-success">large!</p>

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
                        <td><input type="file" name="image[]"></td>
                        <td><input type="file" name="image1[]"></td> 
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
    
    @if($vcfcount == 0)
    <div class="vcf">
      <div class="vcf-list">
        <div class="vcf-item">

          <h4> Few More Steps </h4><br>
          <p>1. Go to <a href="https://contacts.google.com/" target="_blank">Google Contacts.</a></p>
          <p>2. Click on Create Contact and fill your details.</p>
          <p>3. Click on more actions and select Export and then Export as vCard.</p>
          <p>4. VCF File will be downloaded .</p>
          <p>5. Upload VCF File .</p>
          <form action="/vcf-save" method="POST" class="form-group" enctype="multipart/form-data">
            @csrf
            <label>VCF: </label>
            <input name="vcf" type="file" class="form-control"required > <br>

            <button type="submit" name="submit" class="btn btn-success">Upload </button>
          </form>
        </div> 
      </div>
    </div>
  </div>
    @endif



  </div>
 

 

</div>
 








@endsection
