<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Limpiamos la tabla
    	Category::truncate();
    	//Creamos registros
        $category = new Category;
        $category->name = "Categoría 1";
        $category->save();

        $category = new Category;
        $category->name = "Categoría 2";
        $category->save();

        $category = new Category;
        $category->name = "Categoría 3";
        $category->save();
    }
}
