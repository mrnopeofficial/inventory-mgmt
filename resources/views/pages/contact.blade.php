@extends('layouts.master_home')
@section('home_content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Contact</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Contact</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<div class="map-section">
  <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15935.06969541313!2d101.709853!3d3.1559189!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4e3a7233f4dc0a89!2sMenara%20Prestige%20-%20Main%20Lobby%20%7C%20Concierge!5e0!3m2!1sen!2smy!4v1663816691066!5m2!1sen!2smy" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" allowfullscreen></iframe>
</div>

<section id="contact" class="contact">
  <div class="container">

    <div class="row justify-content-center" data-aos="fade-up">

      <div class="col-lg-10">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-4 info">
              <i class="icofont-google-map"></i>
              <h4>Location:</h4>
              <p>{{$contacts->address}}</p>
            </div>

            <div class="col-lg-4 info mt-4 mt-lg-0">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>{{$contacts->email}}</< /p>
            </div>

            <div class="col-lg-4 info mt-4 mt-lg-0">
              <i class="icofont-phone"></i>
              <h4>Call:</h4>
              <p>{{$contacts->phone}}</< /p>
            </div>
          </div>
        </div>

      </div>

    </div>

    <div class="row mt-5 justify-content-center" data-aos="fade-up">
      <div class="col-lg-10">
        <form action="{{route('contact.form')}}" method="post">
          @csrf
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" placeholder="Your Name" />

            </div>
            <div class="col-md-6 form-group">
              <input type="email" class="form-control" name="email" placeholder="Your Email" />

            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" placeholder="Subject" />
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
          </div>
          <button class="btn btn-success" type="submit">Send Message</button>
        </form>
      </div>
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
    </div>

  </div>
</section><!-- End Contact Section -->

@endsection