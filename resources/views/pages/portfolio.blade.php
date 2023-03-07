@extends('layouts.master_home')
@section('home_content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Portolio</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Portolio</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="row" data-aos="fade-up">
      <div class="col-lg-12 d-flex justify-content-center">

      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up">

        @foreach($portfolios as $portfolio)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{$portfolio->image}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>{{$portfolio->name}}</h4>
                    <p>Website</p>
                    <a href="{{$portfolio->image}}" data-gall="portfolioGallery" class="venobox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"></a>
                </div>
        </div>
        @endforeach

  </div>
</section><!-- End Portfolio Section -->
@endsection