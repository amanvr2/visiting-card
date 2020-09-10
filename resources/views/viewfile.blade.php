@extends('layouts.app')

@section('content')

@foreach($stud as $user)

  <!-- //////////////////   banner /////////////////////////////////////////////// -->

  <div class="banner">


    <img src="{{ asset('/public/Cover-img/' . $user->image2) }}" id="cover"> 

    <img src="{{ asset('/public/img/' . $user->image1) }}" id="log">

  </div>

<!-- 
  ////////////////////////  Info - part ////////////////////////////////////////////// -->


  <div class="info">
  <div class="info-list">
      <div class="info-head">
          <h1>{{ $user->businessname}}</h1>
          <h3>{{ $user->tagline}}</h3>
          <h3> {{ $user->name}}</h3>
          <h3> {{ $user->number }} </h3>
      </div>

      <div class="social-media">

          @if($user->fbLink != NULL)

          <div class="social-item">
              <a href="{{ $user->fbLink }}"><img src="/images/facebook.png"></a>

          </div>

          @endif
          
         

          @if($user->twitterLink != NULL)

          <div class="social-item">
              <a href="{{ $user->twitterLink }}"><img src="/images/twitter.png"></a>

          </div>

          @endif

          @if($user->instaLink != NULL)

          <div class="social-item">

              <a href="{{ $user->instaLink }}"><img src="/images/instagram.png"></a>

          </div>
          @endif

          @if($user->linkedinLink != NULL)

          <div class="social-item">
              <a href="{{ $user->linkedinLink }}"><img src="/images/linkedin.png"></a>

          </div>

          @endif

          <div class="social-item">
            <a href="https://api.whatsapp.com/send?phone={{ $user->number }}"><img src="/images/whatsapp.png"></a>

          </div>


      </div>



  </div>
  </div>


<!-- ///////////////////////////////////////   Save me / Call me ////////////////////////////////////////////////// -->

  <div class="call">
      <div class="call-item">
          <a href="{{ asset('/public/vcf/' . $user->vcf) }}" role="button" class="btn btn-success" download=""><i class="fa fa-download" aria-hidden="true"></i> Save me</a>

      </div>

      <div class="call-item">

          <a href="tel:{{$user->number}}" role="button" class="btn btn-danger"><i class="fa fa-phone" aria-hidden="true"></i> Call me</a>

      </div>

  </div>



<!-- //////////////////////////////////////////  Aboutus, services, projects ///////////////////////////////////// -->

  <div class="panels">

  <div class="container">

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="fa fa-user-circle-o" aria-hidden="true"></i>About Us</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"> 
          <div class="about-brief">

            <h2> {{ $user->aboutUs}} </h2>
      

          </div>

          
    

        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="fa fa-cogs" aria-hidden="true"></i> Services </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">

          @foreach($serviceData as $user)

            <div class="service-item">
                <h2> <i class="fa fa-angle-double-right" aria-hidden="true"></i>{{ $user->title }} </h2>
                <p> {{ $user->body }} </p>
            </div>

          @endforeach
          
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class="fa fa-pencil-square" aria-hidden="true"></i>Projects </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">

           @foreach($projectData as $user)

            <div class="project-item">

                <div class="projectItem-list">
  
                    <div class="project-image">
                      <img src="{{ asset('/public/project-images/' . $user->image) }}" >
                      @if($user->image1 != NULL)
                      <img src="{{ asset('/public/project-images/' . $user->image1) }}" >
                      @endif
                    
                     
                    </div>

                    <div class="project-content">

                        <h2> {{ $user->title }} </h2>
                        <p> {{ $user->body }} </p><br>
                        @foreach($stud as $user)

                          <a href="https://api.whatsapp.com/send?phone={{ $user->number }}" role="button" class="btn btn-primary">Enquiry</a>
                        @endforeach
                    </div> 

                    
                </div>

            </div>

            @endforeach

        </div>
      </div>
    </div>
  </div> 

</div>

</div>

</div>








@endforeach



<!-- 
//////////////////////////////////  Map and Address ////////////////////////////// -->

@foreach($stud as $user)

<div class="address">

    <div class="add-list">

        <div class="add-item">
            <div style="width: 500px; height: 300px;">
	            {!! Mapper::render() !!}
            </div>
           

        </div>

        <div class="add-item">

            <div class="add-content">

                <p> <i class="fa fa-envelope" aria-hidden="true"></i>Email : {{ $user->email }} </p>
                <p> <i class="fa fa-phone-square" aria-hidden="true"></i>Mobile : {{ $user->number }} </p>
                <p> <i class="fa fa-address-book" aria-hidden="true"></i>Address : {{ $user->address . ' , '. $user->pincode }} </p>

            </div>

        </div>


    </div>


</div>

@endforeach



<!-- ////////////////////////////////      Contactus email   //////////////////////////////////////////// -->


@foreach($stud as $user)
    <div class="contact-section">

		<div class="contact-list">
    
			<div class="contact-content">

				<h2>Contact Us</h2><br>

				<p>Our professional sales representatives will provide you the suggestions of metal wire and applications. Just tell us your requirements and your problems, we will help you solve them.</p>


			</div>

			<div class="vl"></div>

			<div class="contact-form">

        @if(Session::has('success'))

          <p class="alert alert-success">Your Message has been successfully sent !</p>

        @endif
        
 
				<div class="container">
					<form action="/mail-sent/{{$user->email}}" method="POST">

             {{ csrf_field() }}
					  <div class="row">
						<div class="col-25">
						  <label for="fname">Full Name</label>
						</div>
						<div class="col-75">
						  <input type="text" id="fname" name="name" placeholder="    Your name.." required>
						</div>
					  </div>
					  <div class="row">
						<div class="col-25">
						  <label for="lname">Email Address</label>
						</div>
						<div class="col-75">
						  <input type="text" id="fname" name="email" placeholder="    Email Address.." required>
						</div>
					  </div>

					  <div class="row">
						<div class="col-25">
						  <label for="lname">Phone Number</label>
						</div>
						<div class="col-75">
						  <input type="text" id="fname" name="number" placeholder="    Phone Number" required>
						</div>
					  </div>

					  <div class="row">
						<div class="col-25">
						  <label for="subject">Message</label>
						</div>
						<div class="col-75">
						  <textarea id="fname" rows="4" name="subject" placeholder="Write something.." style="height:100px" required></textarea>
						</div>
					  </div>

					  <br>
					  <div class="btn-row">
						<button type="submit" id="s"type="submit" class="btn btn-lg">Submit</button>
					  </div>
					</form>
				</div>


			</div>
		</div>
	</div>


@endforeach





@foreach($stud as $user)

<!-- 
//////////////////////////////////////        Share card     //////////////////////////////////////////// -->

<div class="share">
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" id="share-btn"><i class="fa fa-share-square-o" aria-hidden="true"></i>Share My Card</button>
  <div id="demo" class="collapse">
  
    <div class="share-list">

        <div class="share-item">

            <a href="https://api.whatsapp.com/send?text=This%20is%20{{ $user->name }}'s%20digital%20Visiting%20card:%20{{ $user->link }}" role="button" class="btn btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i>Whatsapp </a>

        </div>

        <div class="share-item">

            <a href="mailto:?body=This is my digital visting card: {{ $user->link }}" role="button" class="btn btn-danger"><i class="fa fa-envelope" aria-hidden="true"></i>Mail </a>

        </div>

        <div class="share-item">

            <a href="https://www.facebook.com/sharer.php?u={{$user->link}}" role="button" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i>Facebook</a>

        </div>

        <div class="share-item">

            <a href="https://twitter.com/intent/tweet?text=VCard&url={{$user->link}}" role="button" class="btn btn-info"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter </a>

        </div>

        <div class="share-item">

            <a href="https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2FshareArticle%3Fmini%3Dtrue%26url%3D{{$user->link}}" role="button" class="btn btn-info"><i class="fa fa-linkedin" aria-hidden="true"></i>Linkedin </a>

        </div>

        <div class="share-item">

            <a href="sms:?body=This is my digital visting card: {{ $user->link }}!" role="button" class="btn btn-warning"><i class="fa fa-comments-o" aria-hidden="true"></i>SMS </a>

        </div>

    </div>

  </div>
</div>

@endforeach

















@endsection
