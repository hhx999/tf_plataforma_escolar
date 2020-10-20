<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Limpiamos la tabla
    	User::truncate();
    	//Creamos registros
        $user = new User;
        $user->name = "Usuario Test";
        $user->email = "usuario@test.com";
        $user->password = bcrypt('test123');
        $user->save();
    }
}
