<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $permissions = [

            'listar roles',
            'crear rol',
            'editar rol',
            'eliminar rol',

            'listar usuarios',
            'crear usuario',
            'editar usuario',
            'eliminar usuario',

        ];



        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);

        }

    }

}