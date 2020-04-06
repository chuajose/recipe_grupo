@extends('layouts.web')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Receta</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="receipe-post-area section-padding-80">

        <!-- Receipe Post Search -->
        <div class="receipe-post-search mb-80">
            <div class="container contact-form-area">
                <form action="{{url('/recipe')}}" method="get">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <select size="" class="form-control" name="select1" id="select1">
                                <option value="1">Categoria</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6">
                            <input type="search"  class="form-control"  name="search" placeholder="Buscar Receta">
                        </div>
                        <div class="col-12 col-lg-3 text-right">
                            <button type="submit" class="btn delicious-btn">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Receipe Slider -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="receipe-slider owl-carousel">
                        @if($recipe->files && $recipe->files->count()> 0)
                            @foreach($recipe->files as $file)
                                <img height="425" src="{{Storage::url('thumb_'.$file->file->name)}}" alt="">
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Receipe Content Area -->
        <div class="receipe-content-area">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                            <span>{{$recipe->created_at->format('j F, Y')}}</span>
                            <h2>{{$recipe->title}}</h2>
                            <div class="receipe-duration">
                                <h6>Prep: {{$recipe->prep}}</h6>
                                <h6>Cocinado: {{$recipe->cook}}</h6>
                                <h6>Personas: {{$recipe->yields}}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="receipe-ratings text-right my-5">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="btn delicious-btn">Principiantes</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                            <p>{!! $recipe->description !!}</p>
                        </div>
                        <!-- Single Preparation Step -->
                        <!--<div class="single-preparation-step d-flex">
                            <h4>02.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui. Suspendisse potenti. Vestibulum ac pellentesque tortor. Aenean congue sed metus in iaculis. Cras a tortor enim. Phasellus posuere vestibulum ipsum, eget lobortis purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                            <h4>03.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui. Suspendisse potenti. Vestibulum ac pellentesque tortor. Aenean congue sed metus in iaculis. Cras a tortor enim. Phasellus posuere vestibulum ipsum, eget lobortis purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                            <h4>04.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui. Suspendisse potenti. Vestibulum ac pellentesque tortor. Aenean congue sed metus in iaculis. Cras a tortor enim. Phasellus posuere vestibulum ipsum, eget lobortis purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                        </div>-->
                    </div>

                    <!-- Ingredients -->
                    <div class="col-12 col-lg-4">
                        <div class="ingredients">
                            <h4>Ingredientes</h4>
                            @if($recipe->ingredients()->count()>0)
                                   @foreach($recipe->ingredients as $ingredient)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1"  style = "text-transform:capitalize;">{{$ingredient->name}} ({{$ingredient->quantity}} {{ $ingredient->measure }})</label>
                                    </div>
                                       @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="section-heading text-left">
                            <h3>Deja un comentario</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="contact-form-area">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" id="name" placeholder="Nombre">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="subject" placeholder="Asunto">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Mensaje"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn delicious-btn mt-30" type="submit">Deja tu opinión</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
