<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Limpiamos la tabla
    	Permission::truncate();
        
        $viewPostsPermission = Permission::create(['name' => 'View posts' , 'display_name' => 'Ver posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts' , 'display_name' => 'Crear posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts' , 'display_name' => 'Actualizar posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts' , 'display_name' => 'Eliminar posts']);

        $viewUsersPermission = Permission::create(['name' => 'View users', 'display_name' => 'Ver usuarios']);
        $createUsersPermission = Permission::create(['name' => 'Create users', 'display_name' => 'Crear usuarios']);
        $updateUsersPermission = Permission::create(['name' => 'Update users', 'display_name' => 'Actualizar usuarios']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users', 'display_name' => 'Eliminar usuarios']);

        $updateRolesPermission = Permission::create(['name' => 'Update roles']);
    }
}
