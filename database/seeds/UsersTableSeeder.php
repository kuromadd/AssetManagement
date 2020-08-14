<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
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
        $user = \App\User::create([
            'name' => 'khiro',
            'email' => 'khiro@kuro.com',
            
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),
            'qrcode'=>'hi i\'m khireddine',
        ]);

        \App\profile::create([
            'user_id' => $user->id,
            'image' => '/uploads/profile.png',
            'back_image'=> '/uploads/back.jpeg',
            'about' => 'this is the obout section',
            'birthdate' =>now(),
            'birthplace' => 'algeria, wilaya',
            'job'=>'junior engineer',
            'university'=>'Houari Boumediene University of Science and Technology'
            ]);

            
            $role = Role::create(['name' => 'Admin']);
    
            $permissions = Permission::pluck('id','id')->all();
    
            $role->syncPermissions($permissions);
    
            $user->assignRole([$role->id]);
        
    }
}
