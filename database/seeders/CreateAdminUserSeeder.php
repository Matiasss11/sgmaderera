<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name'                  =>  'Matias',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'email'                 =>  'matias.sucursal1@mail.com',
            'sucursal_id'           =>  1

        ]);

        $user2 = User::create([
            'name'                  =>  'Nicolas',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'email'                 =>  'nicolas.sucursal2@mail.com',
            'sucursal_id'           =>  2

        ]);

        $user3 = User::create([
            'name'                  =>  'Diego',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'email'                 =>  'diegoecke1@hotmail.com',
            'sucursal_id'           =>  1
        ]);

        $role = Role::create(['name' => 'Admin'],);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user1->assignRole([$role->id]);
        $user2->assignRole([$role->id]);
        $user3->assignRole([$role->id]);
    }
}
