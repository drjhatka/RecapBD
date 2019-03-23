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


                <div class="col-md-8 left-section mr-4 p-2" >
                                <div class="col-md-12 featured">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-interval="1500" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                </ol>

                                                <div class="carousel-inner" style="max-width:900px; max-height:600px !important;">
                                                    @php
                                                        $index=0;
                                                    @endphp
                                                    @foreach (FrontendController::getFeaturedNewsList() as $news)
                                                        @if ($index==0)
                                                            <div class="carousel-item active">
                                                                <a href="{{ route('show.frontend.news',$news->id) }}">
                                                                <img class="d-block w-100 img-fluid" src="{{ $news->image_path }}" alt="Slide 2">
                                                                    <div class="carousel-caption d-block" style="background:black; color:white;">
                                                                        <p>
                                                                            {{ $news->title  }}
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="carousel-item" >
                                                                <a href="{{ route('show.frontend.news',$news->id) }}">
                                                                    <img class="d-block w-100 img-fluid" src="{{ $news->image_path }}" alt="Slide 2">
                                                                    <div class="carousel-caption d-block" style="background:black; color:white;">
                                                                        <p>
                                                                            {{  $news->title }}
                                                                            </p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif

                                                        @php
                                                            $index++;
                                                        @endphp
                                                    @endforeach


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
                                <div class="col-md-12" style='border:1px solid red;'>
                                    <div class="row">
                                            @foreach (FrontendController::getLatestNewsList() as $news)
                                            <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                                    <a href="{{ route('show.frontend.news',$news->id) }}">
                                                            <img src="{{ $news->image_path }}" alt="" class="img-fluid">
                                                            <strong>{{ $news->title.' ID = '.$news->id }}</strong>
                                                    </a>
                                            </div>
                                            @endforeach
                                    </div>
                                </div>
                    <!--End  Latest News Section -->

                    <!-- Women & Kids Section -->
                                <div class="col-md-12 mr-1 mt-4  section-header">Women & Children News</div>
                                <div class="col-md-12">
                                    <div class="row">
                                        @if (count(FrontendController::getCategoryNewsList('Women & Children'))>0)
                                            @foreach(FrontendController::getCategoryNewsList('Women & Children') as $news)
                                            <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                                    <a href="{{ route('show.frontend.news',$news->id) }}">
                                                            <img src="{{ $news->image_path }}" alt="" class="img-fluid">
                                                            <strong>{{ $news->title.' ID = '.$news->id }}</strong>
                                                    </a>
                                            </div>
                                            @endforeach
                                        @else
                                            <h2 style="color:red;">No News Added Yet OR add at least 6 news of this category to be shown here</h2>
                                        @endif
                                    </div>
                                </div>
                    <!-- End Women & Kids Section -->

                    <!-- Minority Section -->
                    <div class="col-md-12 mr-1 mt-4 section-header">Minority News</div>

                    <div class="col-md-12 news-block">
                            <div class="row">
                                @if (count(FrontendController::getCategoryNewsList('Minority'))>0)
                                    @foreach(FrontendController::getCategoryNewsList('Minority') as $news)
                                        <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                                <a href="{{ route('show.frontend.news',$news->id) }}">
                                                        <img src="{{ $news->image_path }}" alt="" class="img-fluid">
                                                        <strong>{{ $news->title.' ID = '.$news->id }}</strong>
                                                </a>
                                        </div>
                                    @endforeach
                                @else
                                    <h2 style="color:red;">No News Added Yet OR add at least 6 news of this category to be shown here</h2>
                                @endif
                            </div>
                    </div>
                    <!-- End Minority Section -->

                    <!--  Free Speech Section -->
                    <div class="col-md-12 mr-1 mt-4  section-header">Free Speech News</div>
                    <div class="col-md-12">
                        <div class="row">
                            @if (count(FrontendController::getCategoryNewsList('Free Speech'))>0)
                                    @foreach(FrontendController::getCategoryNewsList('Free Speech') as $news)
                                        <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                            <img src="{{ $news->image_path }}" alt="" class="img-fluid">
                                            <strong>{{ $news->title.' ID = '.$news->id }}</strong>
                                        </div>
                                    @endforeach
                                @else
                                    <h2 style="color:red;">No News Added Yet OR add at least 6 news of this category to be shown here</h2>
                                @endif
                        </div>
                    </div>
                </div>
                <!--  End Free Speech Section -->

                <!--  Free Speech Section -->
                <div class="col-md-12 mr-1 mt-4  section-header">Democracy</div>
                <div class="col-md-12">
                    <div class="row">
                        @if (count(FrontendController::getCategoryNewsList('Democracy'))>0)
                                @foreach(FrontendController::getCategoryNewsList('Democracy') as $news)
                                <div class="col-md-4 col-sm-4 mt-1 mb-1">
                                        <a href="{{ route('show.frontend.news',$news->id) }}">
                                                <img src="{{ $news->image_path }}" alt="" class="img-fluid">
                                                <strong>{{ $news->title.' ID = '.$news->id }}</strong>
                                        </a>
                                </div>
                                @endforeach
                            @else
                                <h2 style="color:red;">No News Added Yet OR add at least 6 news of this category to be shown here</h2>
                            @endif
                    </div>
                </div>
                <!--  End Free Speech Section -->
            </div><!-- End left column -->


                    <!-- Start Right column -->
                    <div class="col-md-3 right-section">
                        <div class="row"><!-- container row -->
                                <!-- Editorial Section -->
                                @php
                                    $editorial = Editorial::orderBy('id', 'desc')->limit(1)->first();

                                @endphp
                                <div class="col-md-12 card">
                                        <div class="card-header bg-danger">Editorials</div>
                                    <img class="img-fluid" src="{{ $editorial->image_path }}" alt="Editorial">
                                    <strong>
                                        {{ $editorial->title }}

                                    </strong>
                                    {{ $editorial->short_description }}
                                    <a href="">View All Editorials</a>
                                </div>
                        </div>

                        <!-- stat box -->
                        <div class="row">
                            <div class="col-md-12">
                                <h2> <i class="fa fa-line-chart" aria-hidden="true"></i> Stat Box</h2>
                            </div>
                        </div>

                </div><!--end right section -->

            </div><!-- end row -->
        </div>
    </div>
 @endsection
