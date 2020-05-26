
<?php


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
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           
           'User-list',
           'User-create',
           'User-edit',
           'User-delete',
           
           'asset-list',
           'asset-create',
           'asset-edit',
           'asset-delete',

           'block-list',
           'block-create',
           'block-edit',
           'block-delete',
           
           'bureau-list',
           'bureau-create',
           'bureau-edit',
           'bureau-delete',
           
           'fournisseur-list',
           'fournisseur-create',
           'fournisseur-edit',
           'fournisseur-delete',
           
           'inventaire-list',
           'inventaire-create',
           'inventaire-edit',
           'inventaire-delete',
           
           'mission-list',
           'mission-create',
           'mission-edit',
           'mission-delete',
           
           'repararion-list',
           'repararion-create',
           'repararion-edit',
           'repararion-delete',
        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}