
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
           'role-permission-edit',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'user-permission-edit',
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
           
           'reparation-list',
           'reparation-create',
           'reparation-edit',
           'reparation-delete',

           'transfert-list',
           'transfert-create',
           'transfert-edit',
           'transfert-delete',

           'division-list',
           'division-create',
           'division-edit',
           'division-delete',

           'departement-list',
           'departement-create',
           'departement-edit',
           'departement-delete',

           'service-list',
           'service-create',
           'service-edit',
           'service-delete',
        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}