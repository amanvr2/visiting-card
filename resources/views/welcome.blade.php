@extends('layouts.app')
@section('content')

<div class="banner">

<img src="/images/mudrainfotech.png" id="log">

</div>

<div class="info">
<div class="info-list">
    <div class="info-head">
        <h3> Varun Lau</h3>
        <h3> 8130388050</h3>
        <h1>MUDRAINFOTECH</h1>
        <h3>IT service for everyone</h3>
      
    </div>

    <div class="social-media">

        <div class="social-item">
            <a href="https://www.facebook.com/mudrainfotec/"><img src="images/facebook.png"></a>

        </div>

        <div class="social-item">
            <a href="#"> <img src="./images/twitter.png"></a>

        </div>

        <div class="social-item">

            <a href="#"><img src="./images/instagram.png"></a>

        </div>

        <div class="social-item">
            <a href="https://www.linkedin.com/company/mudrainfotec"><img src="./images/linkedin.png"></a>

        </div> 

        <div class="social-item">
             <a href="https://api.whatsapp.com/send?phone=+918130388050"><img src="./images/whatsapp.png"></a>

        </div>
    </div>



</div>
</div>

<div class="call">
    <div class="call-item">
        <a href="/v-cards/varun.vcf" role="button" class="btn btn-success" download=""><i class="fa fa-download" aria-hidden="true"></i> Save me</a>

    </div>

    <div class="call-item">

        <a href="tel:8130388050" role="button" class="btn btn-danger"><i class="fa fa-phone" aria-hidden="true"></i> Call me</a>

    </div>

</div>

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

            <p>We are people who would help bridge gap between job seekers and companies and IT services We understand how much pain is it to find a suitable job as well as a candidate. Our team comprises of people who have been at both the ends and they know how tricky this situation gets. We hold expertise in Big Data, QA, SAP and Web Development and can provide excellent solutions in short span of time</p>
      

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

      

            <div class="service-item">
                <h2> <i class="fa fa-angle-double-right" aria-hidden="true"></i> Web Development </h2>
                <p> It is the combination of server side scripts and client side scripts In server side scripting to handle the storage information but in client side scripts to presents information to user </p>
            </div>

            <div class="service-item">
                <h2> <i class="fa fa-angle-double-right" aria-hidden="true"></i>Mobile Application Development </h2>
                <p> Portable App advancement is one of the significant angles for development of any association. At Mudrainfotech , we structure local/cross stage applications according to the necessities of the client. We give Custom App Development ,Android App Development. </p>
            </div>

            <div class="service-item">
                <h2> <i class="fa fa-angle-double-right" aria-hidden="true"></i>Digital Marketing</h2>
                <p> Digital marketing is the marketing of products or services using digital technologies, mainly on the Internet, but also including mobile phones, display advertising. </p>
            </div>

     
          
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

            <div class="project-item">

                <div class="projectItem-list">

                    <div class="project-image">
                        <img src="{{ asset('/images/mudrahome.PNG') }}" >
                    </div>

                    <div class="project-content">

                        <h2> Mudrahome </h2>
                        <p> Mudrahome is a Finance website where anyone can apply for all type of loans online </p>
                        <p> Made in LARAVEL (PHP Framework) with frontend - HTML5, CSS3, javascript and Backend - PHP using Database - MYSQL .</p>

                    </div>
                </div>

            </div>

              <div class="project-item">

                <div class="projectItem-list">

                    <div class="project-image">
                        <img src="{{ asset('/images/recherchePNG.png') }}" >
                    </div>

                    <div class="project-content">

                        <h2> Recherche-India </h2>
                        <p>  An Online Portal for Research Stuff prepared by company. <br>Made in React js, HTML5, CSS3, Javascript.</p>

                    </div>
                </div>

              </div>

              <div class="project-item">

                <div class="projectItem-list">

                    <div class="project-image">
                        <img src="{{ asset('/images/esperto.PNG') }}" >
                    </div>

                    <div class="project-content">

                        <h2> Esperto Model </h2>
                        <p>  An In-House Project for predicting Market Sentiments.</p>
                        <p> Made in React js, HTML5, CSS3, Javascript.</p>

                    </div>
                </div>

              </div>

              <div class="project-item">

                <div class="projectItem-list">

                    <div class="project-image">
                        <img src="{{ asset('/images/capture.PNG') }}" >
                    </div>

                    <div class="project-content">

                        <h2> Shoperkart App </h2>
                        <p> Shoperkart is an E-Commerce Mobile Application</p>
                        
                    </div>
                </div>

              </div>

         

        </div>
      </div>
    </div>
  </div> 

</div>

</div>

</div>











<div class="address">

    <div class="add-list">

        <div class="add-item">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.9115890902185!2d77.14682201505164!3d28.692291188124614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d02334efaaaab%3A0xd14c3f20957e02d7!2sMudraInfotec!5e0!3m2!1sen!2sin!4v1592991937067!5m2!1sen!2sin" width="500" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

        </div>

        <div class="add-item">

            <div class="add-content">

                <p> Email: varun@mudrahome.com </p>
                <p> Mobile: 8130388050 </p>
                <p> Address: MudraInfotec <br>
                    Best Sky Tower, 808, Netaji Subhash Place, <br>Pitam Pura, New Delhi, Delhi 110034
                </p>

            </div>

        </div>


    </div>


</div>


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
					<form action="#" method="POST">

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



<div class="share">
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" id="share-btn"><i class="fa fa-share-square-o" aria-hidden="true"></i>Share My Card</button>
  <div id="demo" class="collapse">
  
    <div class="share-list">

        <div class="share-item">

            <a href="https://api.whatsapp.com/send?text=This%20is%20my%20digital%20Visiting%20card:%20/card/demo" role="button" class="btn btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i>Whatsapp </a>

        </div>

        <div class="share-item">

            <a href="mailto:?body=This is my digital visting card: /card/demo" role="button" class="btn btn-danger"><i class="fa fa-envelope" aria-hidden="true"></i>Mail </a>

        </div>

        <div class="share-item">

            <a href="https://www.facebook.com/sharer.php?u=/card/demo" role="button" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i>Facebook</a>

        </div>

        <div class="share-item">

            <a href="https://twitter.com/intent/tweet?text=VCard&url=/card/demo" role="button" class="btn btn-info"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter </a>

        </div>

        <div class="share-item">

            <a href="https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2FshareArticle%3Fmini%3Dtrue%26url%3D/card/demo" role="button" class="btn btn-info"><i class="fa fa-linkedin" aria-hidden="true"></i>Linkedin </a>

        </div>

        <div class="share-item">

            <a href="sms:?body=This is my digital visting card: /card/demo" role="button" class="btn btn-warning"><i class="fa fa-comments-o" aria-hidden="true"></i>SMS </a>

        </div>

    </div>

  </div>
</div>































































<!-- 
<div class="share">

    <h1>Share Your Card </h1>

    <div class="share-list">

        <div class="share-item">

            <a href="https://api.whatsapp.com/send?phone=+918130388050" role="button" class="btn btn-success">Whatsapp </a>

        </div>

        <div class="share-item">

            <a href="mailto:varun@mudrahome.com" role="button" class="btn btn-danger">Mail </a>

        </div>

        <div class="share-item">

            <a href="" role="button" class="btn btn-primary">Facebook </a>

        </div>

        <div class="share-item">

            <a href="" role="button" class="btn btn-info">Twitter </a>

        </div>

        <div class="share-item">

            <a href="" role="button" class="btn btn-info">Linkedin </a>

        </div>

        <div class="share-item">

            <a href="sms:+918130388050?body=Hello!" role="button" class="btn btn-warning">SMS </a>

        </div>


    </div>



</div>

 -->











@endsection
