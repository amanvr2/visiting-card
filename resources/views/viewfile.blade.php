@extends('layouts.app')

@section('content')

@foreach($stud as $user)



<div class="banner">

<img src="{{ asset('/public/img/' . $user->image1) }}" id="log">

</div>

<div class="info">
<div class="info-list">
    <div class="info-head">
        <h1>{{ $user->businessname}}</h1>
        <h3>{{ $user->tagline}}</h3>
        <h3> {{ $user->name}}</h3>
        <h3> {{ $user->number }} </h3>
    </div>

    <div class="social-media">

        <div class="social-item">
            <a href="{{ $user->fbLink }}"><img src="/images/fb.png"></a>

        </div>

        <div class="social-item">
            <a href="{{ $user->twitterLink }}"><img src="/images/twitter.png"></a>

        </div>

        <div class="social-item">

            <a href="{{ $user->instaLink }}"><img src="/images/insta.png"></a>

        </div>

        <div class="social-item">
            <a href="{{ $user->linkedinLink }}"><img src="/images/linkedin.png"></a>

        </div>

        <div class="social-item">
            <a href="https://api.whatsapp.com/send?phone={{ $user->number }}"><img src="/images/whatsapp.png"></a>

        </div>


    </div>



</div>
</div>




<div class="call">
    <div class="call-item">
        <a href="{{ asset('/public/vcf/' . $user->vcf) }}" role="button" class="btn btn-success" download=""><i class="fa fa-download" aria-hidden="true"></i> Save me</a>

    </div>

    <div class="call-item">

        <a href="tel:{{$user->number}}" role="button" class="btn btn-danger"><i class="fa fa-phone" aria-hidden="true"></i> Call me</a>

    </div>

</div>


<div class="aboutus"> 

  <div class="aboutus-sub">

    <h1> About Us </h1>

    <div class="about-brief">

      <h2> {{ $user->aboutUs}} </h2>
      

    </div>


    <div class="aboutUsDesc">

      <p>  {{ $user->aboutusDesc}} </p>

    </div>

  </div>


</div>





@endforeach







    <div class="service">



        <div class="service-list">

             <div class="service-head">
                <h1> SERVICES </h1>
            </div>

            @foreach($serviceData as $user)

            <div class="service-item">
                <h2> <i class="fa fa-angle-double-right" aria-hidden="true"></i>{{ $user->title }} </h2>
                <p> {{ $user->body }} </p>
            </div>

            @endforeach

        </div>




    </div>








    <div class="projects">



        <div class="project-list">

            <div class="project-head">

                <h1> Projects </h1>

            </div>

            @foreach($projectData as $user)

            <div class="project-item">

                <div class="projectItem-list">

                    <div class="project-image">
                        <img src="{{ asset('/public/project-images/' . $user->image) }}" >
                    </div>

                    <div class="project-content">

                        <h2> {{ $user->title }} </h2>
                        <h4> {{ $user->body }} </h4>

                    </div>
                </div>

            </div>

            @endforeach

        </div>


        </div>





    </div>








@foreach($stud as $user)

<div class="address">

    <div class="add-list">

        <div class="add-item">
            <div style="width: 600px; height: 300px;">
	            {!! Mapper::render() !!}
            </div>
           

        </div>

        <div class="add-item">

            <div class="add-content">

                <p> Email: {{ $user->email }} </p>
                <p> Mobile: {{ $user->number }} </p>
                <p> Address: {{ $user->address }} </p>

            </div>

        </div>


    </div>


</div>

@endforeach

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
						  <input type="text" id="fname" name="name" placeholder="    Your name..">
						</div>
					  </div>
					  <div class="row">
						<div class="col-25">
						  <label for="lname">Email Address</label>
						</div>
						<div class="col-75">
						  <input type="text" id="fname" name="email" placeholder="    Email Address..">
						</div>
					  </div>

					  <div class="row">
						<div class="col-25">
						  <label for="lname">Phone Number</label>
						</div>
						<div class="col-75">
						  <input type="text" id="fname" name="number" placeholder="    Phone Number">
						</div>
					  </div>

					  <div class="row">
						<div class="col-25">
						  <label for="subject">Message</label>
						</div>
						<div class="col-75">
						  <textarea id="fname" rows="4" name="subject" placeholder="Write something.." style="height:100px"></textarea>
						</div>
					  </div>

					  <br>
					  <div class="btn-row">
						<button type="submit" type="submit" class="btn btn-lg">Submit</button>
					  </div>
					</form>
				</div>


			</div>
		</div>
	</div>


@endforeach





@foreach($stud as $user)

<!-- <div class="share">

    <h1>Share Your Card </h1>

    <div class="share-list">

        <div class="share-item">

            <a href="https://api.whatsapp.com/send?text=This%20is%20my%20digital%20Visiting%20card:%20{{ $user->link }}" role="button" class="btn btn-success">Whatsapp </a>

        </div>

        <div class="share-item">

            <a href="mailto:?body=This is my digital visting card: {{ $user->link }}" role="button" class="btn btn-danger">Mail </a>

        </div>

        <div class="share-item">

            <a href="https://www.facebook.com/sharer.php?u={{$user->link}}" role="button" class="btn btn-primary">Facebook</a>

        </div>

        <div class="share-item">

            <a href="https://twitter.com/intent/tweet?text=VCard&url={{$user->link}}" role="button" class="btn btn-info">Twitter </a>

        </div>

        <div class="share-item">

            <a href="https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2FshareArticle%3Fmini%3Dtrue%26url%3D{{$user->link}}" role="button" class="btn btn-info">Linkedin </a>

        </div>

        <div class="share-item">

            <a href="sms:?body=This is my digital visting card: {{ $user->link }}!" role="button" class="btn btn-warning">SMS </a>

        </div>


    </div>



</div> -->





<div class="share">
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" id="share-btn"><i class="fa fa-share-square-o" aria-hidden="true"></i>Share My Card</button>
  <div id="demo" class="collapse">
  
    <div class="share-list">

        <div class="share-item">

            <a href="https://api.whatsapp.com/send?text=This%20is%20my%20digital%20Visiting%20card:%20{{ $user->link }}" role="button" class="btn btn-success">Whatsapp </a>

        </div>

        <div class="share-item">

            <a href="mailto:?body=This is my digital visting card: {{ $user->link }}" role="button" class="btn btn-danger">Mail </a>

        </div>

        <div class="share-item">

            <a href="https://www.facebook.com/sharer.php?u={{$user->link}}" role="button" class="btn btn-primary">Facebook</a>

        </div>

        <div class="share-item">

            <a href="https://twitter.com/intent/tweet?text=VCard&url={{$user->link}}" role="button" class="btn btn-info">Twitter </a>

        </div>

        <div class="share-item">

            <a href="https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2FshareArticle%3Fmini%3Dtrue%26url%3D{{$user->link}}" role="button" class="btn btn-info">Linkedin </a>

        </div>

        <div class="share-item">

            <a href="sms:?body=This is my digital visting card: {{ $user->link }}!" role="button" class="btn btn-warning">SMS </a>

        </div>

    </div>

  </div>
</div>

@endforeach





<!-- <div style="width: 500px; height: 500px;">
	{!! Mapper::render() !!}
</div> -->






@endsection
