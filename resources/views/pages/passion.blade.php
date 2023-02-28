@extends('layouts.master_home')
@section('home_content')
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Passion</h2>
      <ol>
        <li><a href="./">Home</a></li>
        <li>Passion</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Services Section ======= -->

@php
$passions = DB::table('services')->get();
@endphp

<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <!-- insert data from DB(service) here -->
        <div class="row">
            @foreach($passions as $passion)    
            <div class="col-lg-12 col-md-12 align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box iconbox-blue">
                    <h4><a href="">{{$passion->title}}</a></h4>
                    <p>{{$passion->description}}</p>
                </div>
            </div>
            @endforeach
        </div>
        

    </div>
</section><!-- End Services Section -->

</main><!-- End #main -->
@endsection