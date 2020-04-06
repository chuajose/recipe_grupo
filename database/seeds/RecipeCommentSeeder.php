<?php

use Illuminate\Database\Seeder;

class RecipeCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($j = 0; $j < 25; $j++) {
            $recipe = \App\RecipeComment::create( array(
                'user_id'     => 1,
                'recipe_id' => rand( 1, 25 ),
                'comment'       => Str::random( 100 ),
                'value'       => rand(1,5),
                'created_at'  => Carbon\Carbon::now(),
                'updated_at'  => Carbon\Carbon::now()
            ) );



        }
    }
}
