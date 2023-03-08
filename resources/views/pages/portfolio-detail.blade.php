@extends('layouts.master_home')
@section('home_content')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Portfolio</h2>
        <ol>
          <li><a href="http://iamsyahmi.com">Home</a></li>
          <li>Portfolio</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container" data-aos="fade-up">
      <div class="portfolio-details-container">

        <div class="owl-carousel portfolio-details-carousel">
          <img src="{{url($portfolios->image)}}" class="img-fluid rounded" alt="">
        </div>

        <div class="portfolio-description">
          <h2>Project Name : {{$portfolios->name}}</h2>
          <div style="white-space: pre-line; text-align: justify;">
            <p style="font-weight: bold;">
              Project Link : <a href="{{url($portfolios->link)}}" target="_blank">Click Here</a>
            </p>
            <p style="font-weight: bold;">
              TASK :
            </p>
            <p>{{$portfolios->task}}</p>
            <p style="font-weight: bold;">
              RESULT :
            </p>
            <p>
              {{$portfolios->result}}
            </p>
          </div>
        </div>

      </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection