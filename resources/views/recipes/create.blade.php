@extends('layouts.web')

@section('content')

    <div class="contact-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Create tu receta</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="contact-form-area">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="{{url('recipe')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Nombre">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!--<div class="col-12 col-lg-6">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                </div>-->
                                <div class="col-12">
                                    <textarea  id="summernote" name="description" class="form-control" id="message" cols="30" rows="10"
                                              placeholder="Descripcion"></textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 py-3">
                                    <select size="1" name="category" class="form-control" id="">
                                        <option value="">Seleccionar categoría</option>
                                        @if($categories->isNotEmpty())
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"> {{$category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-4">
                                    <input type="text" name="prep" class="form-control" id="title" placeholder="Tiempo preparación">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <input type="text" name="cook" class="form-control" id="title" placeholder="Tiempo cocinado">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <input min="0" max="99" type="number" name="yields" class="form-control" id="title" placeholder="Nº Personas">
                                </div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="file" name="files[]" class="form-control"
                                               id="exampleFormControlFile1">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="file" name="files[]" class="form-control"
                                               id="exampleFormControlFile2">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="file" name="files[]" class="form-control"
                                               id="exampleFormControlFile2">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="file" name="files[]" class="form-control"
                                               id="exampleFormControlFile2">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h4>Ingredientes</h4>
                                </div>
                            </div>

                            <div class="field_wrapper">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" name="ingredients[]" id=""
                                               placeholder="Ingrediente">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control" name="quantity[]" id=""
                                               placeholder="Cantidad">
                                    </div>
                                    <div class="col-lg-2">
                                        <select size="1" name="measure[]" class="form-control" id="exampleFormControlSelect1">
                                            <option value="Kg">Kg</option>
                                            <option value="Litros">Litros</option>
                                            <option value="Unidades">Unidades</option>
                                        </select></div>
                                    <label class="col-sm-2 "><a href="javascript:void(0);"
                                                                class="add_button" title="Add field"><i
                                                class="fa fa-plus-circle fa-3x"></i></a></label>

                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn delicious-btn mt-30" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    <link href="{{ asset('summernote/summernote-lite.css') }}" rel="stylesheet">
    <script src="{{ asset('summernote/summernote-lite.js') }}"></script>
    <script type="text/javascript">

        jQuery(document).ready(function () {
            $('#summernote').summernote({
                height:200,
                tabsize: 2,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview']]
                ]

            });

            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            // var fieldHTML = '<div class="form-group row"><div class="col-sm-10"><input type="text"  class="form-control" name="field_name[]" value=""/></div><label class="col-sm-2 col-form-label"><a href="javascript:void(0);" class="remove_button" title="Add field"><i class="fa fa-minus-circle fa-3x"></i></a></label></div>'; //New input field html
            var fieldHTML = '<div class="form-group row">\n' +
                '                                    <div class="col-lg-4">\n' +
                '                                        <input type="text" class="form-control"  name="ingredients[]" id="" placeholder="Ingrediente">\n' +
                '                                    </div>\n' +
                '                                    <div class="col-lg-2">\n' +
                '                                        <input type="text" class="form-control"  name="quantity[]" id="" placeholder="Cantidad">\n' +
                '                                    </div>\n' +
                '                                    <div class="col-lg-2">\n' +
                '                                        <select size="1" name="measure[]" class="form-control" id="exampleFormControlSelect">\n' +
                '                                            <option>Kg</option>\n' +
                '                                            <option>Litros</option>\n' +
                '                                        </select>                                    </div>\n' +
                '                                    <label class="col-sm-2 "><a href="javascript:void(0);"\n' +
                '                                                                              class="remove_button" title="Remvoe field"><i\n' +
                '                                                class="fa fa-minus-circle fa-3x"></i></a></label>\n' +
                '\n' +
                '                                </div>';
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function () {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parent('label').parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });

    </script>
@endsection
