@extends('layouts.web')

@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            @if($lasts->count() > 0)
                @foreach($lasts as $last)
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url({{$last->file_url}});">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="300ms">{{$last->title}}</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">{!! Str::limit(strip_tags($last->description), 100, ' ...') !!}</p>
                                <a href="{{url('/recipe/'.$last->id)}}" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">Ver receta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
   <!-- <section class="top-catagory-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="single-top-catagory">
                        <img src="img/bg-img/bg2.jpg" alt="">
                        <div class="top-cta-content">
                            <h3>Strawberry Cake</h3>
                            <h6>Simple &amp; Delicios</h6>
                            <a href="receipe-post.html" class="btn delicious-btn">See Full Receipe</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="single-top-catagory">
                        <img src="img/bg-img/bg3.jpg" alt="">
                        <div class="top-cta-content">
                            <h3>Chinesse Noodles</h3>
                            <h6>Simple &amp; Delicios</h6>
                            <a href="receipe-post.html" class="btn delicious-btn">See Full Receipe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Las mejores</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Best Receipe Area -->
                @if(!$bestRecipes->isEmpty())
                    @foreach($bestRecipes as $best)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                        <img  src="{{$best->file_url}}" alt="">
                        <div class="receipe-content">
                            <a href="{{url('/recipe/'.$best->id)}}">
                                <h5>{{$best->title}}</h5>
                            </a>
                            <div class="ratings">
                                @for($i = 0; $i<4; $i++)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @endfor

                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- ##### Best Receipe Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <section class="cta-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg4.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content text-center">
                        <h2>Recetas veganas .... las metemos?</h2>
                        <p>Fusce nec ante vitae lacus aliquet vulputate. Donec scelerisque accumsan molestie. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed accumsan neque. Ut vulputate, lectus vel aliquam congue, risus leo elementum nibh</p>
                        <a href="#" class="btn delicious-btn">Descubrelas</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Small Receipe Area Start ##### -->
    <section class="small-receipe-area section-padding-80-0">
        <div class="container">
            <div class="row">

                <!-- Small Receipe Area -->
                @if($comments->isNotEmpty())
                    @foreach($comments as $comment)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-small-receipe-area d-flex">
                        <!-- Receipe Thumb -->
                        <div class="receipe-thumb">
                            <img src="img/bg-img/sr1.jpg" alt="">
                        </div>
                        <!-- Receipe Content -->
                        <div class="receipe-content">
                            <span>{{$recipe->created_at->format('j F, Y')}}</span>
                            <a href="{{url('/recipe/'.$comment->id)}}">
                                <h5>{{$comment->title}}</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>{{ $comment->comments()->count() }} Opiniones</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- ##### Small Receipe Area End ##### -->


    <!-- ##### Follow Us Instagram Area Start ##### -->
    <div class="follow-us-instagram">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>Siguenos en Instragram</h5>
                </div>
            </div>
        </div>
        <!-- Instagram Feeds -->
        <div class="insta-feeds d-flex flex-wrap">
            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta1.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta2.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta3.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta4.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta5.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta6.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta7.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Follow Us Instagram Area End ##### -->
@endsection
