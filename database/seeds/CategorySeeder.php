<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'entrantes',
            'postres',
            'ensaladas',
            'carnes',
            'pescado'
        ];
        foreach ($categories as $category) {
            DB::table( 'categories' )->insert( [
                'name'       => $category,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ] );
        }

    }
}
