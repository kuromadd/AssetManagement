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
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\profile::create([
            'user_id' => $user->id,
            'image' => '/uploads/profile.png',
            'back_image'=> '/uploads/back.jpeg',
            'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus et tempore, porro iste saepe aperiam hic facilis quos unde sapiente at nihil laborum cumque obcaecati eius id nesciunt maiores damagedi.',
            'facebook' =>'facebook.com',
            'youtube' => 'youtube.com'
            ]);

            
            $role = Role::create(['name' => 'Admin']);
    
            $permissions = Permission::pluck('id','id')->all();
    
            $role->syncPermissions($permissions);
    
            $user->assignRole([$role->id]);
        
    }
}
