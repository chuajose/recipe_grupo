<?php

namespace App\Http\Controllers;

use App\Category;
use App\File;
use App\Ingredient;
use App\Recipe;
use App\RecipeFile;
use App\Repositories\RecipeRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Image;

class RecipeController extends Controller {
    public function __construct() {
        $this->middleware( 'auth', [ 'except' => [ 'show' ] ] );
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $recipeRepository = new RecipeRepository();
        $data = $request->only('search', 'page');
        $recipes= $recipeRepository->search($data['search']??'');

        return view( 'recipes.list', [
            'recipes' => $recipes,
            'search' => $data['search']??''
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $ingredients = Ingredient::all();
        $categories  = Category::all();

        return view( 'recipes.create', [
            'ingredients' => $ingredients,
            'categories'  => $categories
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

        $validatedData = $request->validate( [
            'title'       => 'required',
            'description' => 'required',
            'category'    => 'required'
        ] );


        $data        = $request->all();
        $user        = Auth::user();
        $ingredients = [];


        $recipe = \App\Recipe::create( array(
            'user_id'     => $user->id,
            'category_id' => $data['category'] ?? 1,
            'title'       => $data['title'],
            'prep'       => $data['prep']??'-',
            'cook'       => $data['cook']??'-',
            'yields'       => $data['yields']??1,
            'description' => $data['description'],
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ) );

        if ( is_array( $data['ingredients'] ) ) {
            foreach ( $data['ingredients'] as $key => $ingredient ) {
                if ( $ingredient === null ) {
                    continue;
                }
                $integientes = \App\RecipeIngredient::create( array(
                    'recipe_id'  => $recipe->id,
                    'name'       => $ingredient,
                    'quantity'   => $data['quantity'][ $key ],
                    'measure'    => $data['measure'][ $key ],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ) );
            }
        }

        if (isset($data['files']) && !empty($data['files'])) {
            foreach ( $data['files'] as $file ) {
                $hash     = md5( $file->getClientOriginalName() . time() ) . '.' . $file->getClientOriginalExtension();
                $fileRecipe =  \App\File::create( [
                    'name'          => $hash,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => '/',
                    'type' =>  $file->getClientOriginalExtension(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ] );
                $recipeFile = new RecipeFile();
                $recipeFile->file_id = $fileRecipe->id;
                $recipeFile->recipe_id = $recipe->id;
                $recipeFile->save();
                $ImageUpload = \Intervention\Image\Facades\Image::make($file->getPathName());
                $originalPath =storage_path('app/public/original_');
                $ImageUpload->save($originalPath.$hash);

                $ImageUpload->crop(1920,600);
                $ImageUpload->save(storage_path('app/public/big_' . $hash));

                $ImageUpload->crop(1000,400);
                $ImageUpload->save(storage_path('app/public/medium_' . $hash));
                // for save thumnail image
                $ImageUpload->crop(770,225);
                $ImageUpload->save(storage_path('app/public/thumb_' . $hash));
                // Storage::disk('public')->put($hash, $ImageUpload);
            }
        }


        return redirect( 'recipe/create' )->with( 'message', 'Receta añadida!' );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Recipe $recipe ) {
        return view( 'recipes.show', [
            'recipe' => $recipe,
        ] );    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        //
    }
}
