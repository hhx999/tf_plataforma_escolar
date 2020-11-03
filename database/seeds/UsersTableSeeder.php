<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
        Role::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $writterRole = Role::create(['name' => 'Writter']);

        //Limpiamos la tabla
    	User::truncate();
    	//Creamos registros
        $admin = new User;
        $admin->name = "Usuario Test";
        $admin->email = "usuario@test.com";
        $admin->password = bcrypt('test123');
        $admin->save();

        $admin->assignRole($adminRole);

        $writter = new User;
        $writter->name = "Segundo Usuario";
        $writter->email = "segundo@test.com";
        $writter->password = bcrypt('test123');
        $writter->save();

        $writter->assignRole($writterRole);
    }
}
