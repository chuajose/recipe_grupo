@extends('layouts.web')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Recetas</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-posts-area">
                         @if($recipes->count()>0)
                             @foreach($recipes as $recipe)
                                 <!-- Single Blog Area -->
                                     <div class="single-blog-area mb-80">
                                         <!-- Thumbnail -->
                                         <div class="blog-thumbnail">
                                             <img src="{{$recipe->file_url}}" alt="">
                                             <!-- Post Date -->
                                             <div class="post-date">
                                                 @if($recipe->created_at)
                                                 <a href="{{url('/recipe/'.$recipe->id)}}"><span>{{$recipe->created_at->format('d')}}</span>{{$recipe->created_at->format('F')}} <br> {{$recipe->created_at->format('Y')}}</a>
                                                     @endif
                                             </div>
                                         </div>
                                         <!-- Content -->
                                         <div class="blog-content">
                                             <a href="#" class="post-title">{{$recipe->title}}</a>
                                             <div class="meta-data">por <a href="#">{{$recipe->user->name}}</a> in <a href="#">{{ $recipe->category->name }}</a>
                                             </div>
                                             <p>{!! Str::limit($recipe->description, 400, ' ...') !!}
                                             </p>
                                             <a href="{{url('/recipe/'.$recipe->id)}}" class="btn delicious-btn mt-30">Ver Receta</a>
                                         </div>
                                     </div>
                                 @endforeach
                             @endif




                    </div>
                    {{ $recipes->appends(['search' => $search])->links() }}
                </div>


            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

@endsection
