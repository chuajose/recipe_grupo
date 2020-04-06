<?php

use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($j = 0; $j < 25; $j++) {
            $recipe = \App\Recipe::create( array(
                'user_id'     => 1,
                'category_id' => rand( 1, 5 ),
                'title'       => Str::random( 10 ),
                'value'       => 1,
                'level'       => 'dsfa',
                'description' => Str::random( 100 ),
                'created_at'  => Carbon\Carbon::now(),
                'updated_at'  => Carbon\Carbon::now()
            ) );

            for ( $i = 0; $i < 5; $i ++ ) {

                $integientes = \App\RecipeIngredient::create( array(
                    'recipe_id'     => $recipe->id,
                    'name' =>Str::random( 100 ),
                    'quantity'      => rand( 1, 500 ),
                    'measure'       => 'gr',
                    'created_at'    => Carbon\Carbon::now(),
                    'updated_at'    => Carbon\Carbon::now()
                ) );
            }

        }
    }
}
