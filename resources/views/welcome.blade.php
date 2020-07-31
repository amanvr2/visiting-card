@extends('layouts.app')
@section('content')

<div class="banner">

<img src="/images/logo.png" id="log">

</div>

<div class="info">
<div class="info-list">
    <div class="info-head">
        <h1>MUDRAINFOTECH</h1>
        <h3>IT service for everyone</h3>
        <h3> Varun Lau</h3>
        <h3> 8130388050</h3>
    </div>

    <div class="social-media">

        <div class="social-item">
            <a href=""><img src="images/fb.png"></a>

        </div>

        <div class="social-item">
            <a href=""> <img src="./images/twitter.png"></a>

        </div>

        <div class="social-item">

            <a href=""><img src="./images/insta.png"></a>

        </div>

        <div class="social-item">
            <a href=""><img src="./images/youyube.png"></a>

        </div>

        <div class="social-item">
             <a href=""><img src="./images/whatsapp.png"></a>

        </div>
    </div>



</div>
</div>

<div class="call">
    <div class="call-item">
        <a href="/v-cards/aman.vcf" role="button" class="btn btn-success" download=""><i class="fa fa-download" aria-hidden="true"></i> Save me</a>

    </div>

    <div class="call-item">

        <a href="tel:8130388050" role="button" class="btn btn-danger"><i class="fa fa-phone" aria-hidden="true"></i> Call me</a>

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













@endsection
