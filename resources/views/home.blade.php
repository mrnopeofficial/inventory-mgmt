@extends('layouts.master_home')

<!-- ======= Slider Section ======= -->
@include('layouts.body.slider')

@section('home_content')
<!-- ======= About Us Section ======= -->
<section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>My Skill</strong></h2>
        </div>

        <!-- Chart  -->
        <div class="row content">
            <canvas id="doChart"></canvas>
        </div>
        <a href="https://drive.google.com/file/d/1VWr3zNfy53GUEsosvOiSGW138dMg0rbP/view?usp=sharing" target="_blank" class="pb-5 d-block text-center text-muted"><i class="mdi mdi-download mr-2"></i> Download resume</a>
        <div class="card-footer d-flex flex-wrap bg-white p-0">
            <div class="col-6">
                <div class="py-4 px-4">
                    <ul class="d-flex flex-column justify-content-between">
                        <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle mr-2" style="color: #4c84ff"></i>Web Development</li>
                        <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle mr-2" style="color: #80e1c1 "></i>Handling Client</li>
                        <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle mr-2" style="color: #8061ef "></i>Solving Problem</li>
                    </ul>
                </div>
            </div>
            <div class="col-6 border-left">
                <div class="py-4 px-4 ">
                    <ul class="d-flex flex-column justify-content-between">
                        <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle mr-2" style="color: #ffa128"></i>Software Testing</li>
                        <li><i class="mdi mdi-checkbox-blank-circle mr-2" style="color: #f51b4a"></i>Content Development</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section><!-- End About Us Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
        </div>

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
                    <a href="{{$portfolio->image}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"></a>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section><!-- End Portfolio Section -->

@endsection