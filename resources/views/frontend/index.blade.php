@extends('layouts.layout-frontend')
 @section('content')
    <div class="row">
        <div class="col-md-12 mt-1">
            <div class="row">
                <div class="col-md-12 info-bar" >
                    <h4>Information and Social sharing bar</h4>
                </div>

                <div class="col-md-12 breaking-news" >
                        Breaking News GOes here
                </div>


                <div class="col-md-8 left-section" >

                    <div class="col-md-12 featured">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <img class="d-block w-100 img-fluid" src="{{ asset('images/latest.gif') }}"
                                            alt="First slide">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block w-100 img-fluid" src="{{ asset('images/img1.gif') }}" alt="Slide 2">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block w-100 img-fluid" src="" alt="Third slide">
                                      </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                            </div>
                    </div>
                <!-- Latest News Section -->
                        <div class="row">
                            <div class="col-md-12 mr-1 mt-2 mb-2 section-header">Latest News</div>

                        </div>

                            <div class="col-md-12">

                                <div class="row">

                                    <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                        <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                            <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                            <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                        </div>
                                </div>

                            </div>


                            <div class="col-md-12 news-block">

                                    <div class="row">

                                        <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                            <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                                <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                                <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                            </div>
                                    </div>

                            </div>
                <!--End  Latest News Section -->


                <!-- Women & Kids Section -->
                            <div class="col-md-12 mr-1 mt-4  section-header">Women & Children News</div>

                            <div class="col-md-12">

                                <div class="row">

                                    <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                        <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                            <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                            <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                        </div>
                                </div>

                            </div>

                            <div class="col-md-12 news-block">

                                <div class="row">

                                    <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                        <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                            <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                            <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                        </div>
                                </div>

                            </div>
                <!-- End Women & Kids Section -->


                <div class="col-md-12 mr-1 mt-4 section-header">Minority News</div>

                <div class="col-md-12 news-block">

                    <div class="row">

                        <div class="col-md-4 col-sm-4 mt-1 mb-1">
                            <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                            </div>
                    </div>


                    <div class="row">

                            <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                    <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                    <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                </div>
                        </div>

                </div>

                <div class="col-md-12 mr-1 mt-4  section-header">Free Speech News</div>

                <div class="col-md-12">

                    <div class="row">

                        <div class="col-md-4 col-sm-4 mt-1 mb-1">
                            <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                            </div>
                    </div>


                    <div class="row">

                            <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                    <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                    <img src="{{ asset('images/img1.gif') }}" alt="" class="img-fluid">
                                </div>
                        </div>

                </div>



                </div>


                <div class="col-md-4 right-section" >
                        right-section
                </div>
            </div>
        </div>
    </div>
 @endsection
