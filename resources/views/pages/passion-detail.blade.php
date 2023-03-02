@extends('layouts.master_home')
@section('home_content')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Passion</h2>
        <ol>
          <li><a href="http://127.0.0.1:8000">Home</a></li>
          <li>Passion</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container" data-aos="fade-up">
      <div class="portfolio-details-container">

        <div class="owl-carousel portfolio-details-carousel">
          <img src="{{url($passions->image)}}" class="img-fluid rounded" alt="">
        </div>

        <div class="portfolio-description">
          <h2>{{$passions->title}}</h2>
          <div style="white-space: pre-line; text-align: justify;"> 
          <p>
            {{$passions->story}}
          </p>
          </div>
        </div>

      </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection