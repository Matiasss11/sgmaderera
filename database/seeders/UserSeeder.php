<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name'                  =>  'Nico',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'nico@email.com',
            'persona_id'            =>  4,
            'estado_id'             =>  1

        ]);

        $user2 = User::create([
            'name'                  =>  'caroo',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'caroa@email.com',
            'persona_id'            =>  5,
            'estado_id'             =>  1
        ]);

        $user3 = User::create([
            'name'                  =>  'agus',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'agus@email.com',
            'persona_id'            =>  6,
            'estado_id'             =>  1
        ]);

        $user4 = User::create([
            'name'                  =>  'alumn4',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn4@email.com',
            'persona_id'            =>  7,
            'estado_id'             =>  1
        ]);

        $user5 = User::create([
            'name'                  =>  'alumn5',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn5@email.com',
            'persona_id'            =>  8,
            'estado_id'             =>  1
        ]);

        $user6 = User::create([
            'name'                  =>  'alumn6',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn6@email.com',
            'persona_id'            =>  9,
            'estado_id'             =>  1
        ]);

        $user7 = User::create([
            'name'                  =>  'alumn7',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn7@email.com',
            'persona_id'            =>  10,
            'estado_id'             =>  1
        ]);

        $user8 = User::create([
            'name'                  =>  'alumn8',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn8@email.com',
            'persona_id'            =>  11,
            'estado_id'             =>  1
        ]);

        $user9 = User::create([
            'name'                  =>  'alumn9',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn9@email.com',
            'persona_id'            =>  12,
            'estado_id'             =>  1
        ]);

        $user10 = User::create([
            'name'                  =>  'alumn10',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn10@email.com',
            'persona_id'            =>  13,
            'estado_id'             =>  1
        ]);

        //segunda tanda de alumnos
        $user11 = User::create([
            'name'                  =>  'alumn11',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn11@email.com',
            'persona_id'            =>  14,
            'estado_id'             =>  1

        ]);

        $user12 = User::create([
            'name'                  =>  'alumn12',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn12@email.com',
            'persona_id'            =>  15,
            'estado_id'             =>  1
        ]);

        $user13 = User::create([
            'name'                  =>  'alumn13',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn13@email.com',
            'persona_id'            =>  16,
            'estado_id'             =>  1
        ]);

        $user14 = User::create([
            'name'                  =>  'alumn14',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn14@email.com',
            'persona_id'            =>  17,
            'estado_id'             =>  1
        ]);

        $user15 = User::create([
            'name'                  =>  'alumn15',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn15@email.com',
            'persona_id'            =>  18,
            'estado_id'             =>  1
        ]);

        $user16 = User::create([
            'name'                  =>  'alumn16',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn16@email.com',
            'persona_id'            =>  19,
            'estado_id'             =>  1
        ]);

        $user17 = User::create([
            'name'                  =>  'alumn17',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn17@email.com',
            'persona_id'            =>  20,
            'estado_id'             =>  1
        ]);

        $user18 = User::create([
            'name'                  =>  'alumn18',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn18@email.com',
            'persona_id'            =>  21,
            'estado_id'             =>  1
        ]);

        $user19 = User::create([
            'name'                  =>  'alumn19',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn19@email.com',
            'persona_id'            =>  22,
            'estado_id'             =>  1
        ]);

        $user20 = User::create([
            'name'                  =>  'alumn20',
            'password'              =>  bcrypt(12345678),
            'remember_token'        =>  bcrypt(12345678),
            'foto'                  =>  'default.png',
            'email'                 =>  'alumn20@email.com',
            'persona_id'            =>  23,
            'estado_id'             =>  1
        ]);

        $role = Role::create(['name' => 'Alumno']);

        $user1->assignRole([$role->id]);
        $user2->assignRole([$role->id]);
        $user3->assignRole([$role->id]);
        $user4->assignRole([$role->id]);
        $user5->assignRole([$role->id]);
        $user6->assignRole([$role->id]);
        $user7->assignRole([$role->id]);
        $user8->assignRole([$role->id]);
        $user9->assignRole([$role->id]);
        $user10->assignRole([$role->id]);

        $user11->assignRole([$role->id]);
        $user12->assignRole([$role->id]);
        $user13->assignRole([$role->id]);
        $user14->assignRole([$role->id]);
        $user15->assignRole([$role->id]);
        $user16->assignRole([$role->id]);
        $user17->assignRole([$role->id]);
        $user18->assignRole([$role->id]);
        $user19->assignRole([$role->id]);
        $user20->assignRole([$role->id]);
    }
}
