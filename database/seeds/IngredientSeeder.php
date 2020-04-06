<?php

use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'azucar',
            'sal',
            'harina',
            'chocolate',
            'aceite'
        ];
        foreach ($categories as $category) {
            DB::table( 'ingredients' )->insert( [
                'name'       => $category,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ] );
        }

    }
}
