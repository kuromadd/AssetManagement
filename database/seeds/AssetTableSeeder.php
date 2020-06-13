<?php

use Illuminate\Database\Seeder;

class AssetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fournisseur = \App\Fournisseur::create([
            'libel'=>'dzelectro',
            'address'=>'babzoar alger',
            'tel'=>'0666251324',
            'email'=>'dz_electro@gmail.com',
            'website'=>'dzelectro.com',
        ]);

        $fournisseur2 = \App\Fournisseur::create([
            'libel'=>'bazar',
            'address'=>'babzoar alger',
            'tel'=>'0696214354',
            'email'=>'dz_bazar@gmail.com',
            'website'=>'dzbazar.com',
        ]);


        $block = \App\block::create([
            'name'=>'block1',
            'adress' => 'oulhaca',
            'sous' => -2,
            'nbre_etage' => 5,
        ]);

        $bureau1 = \App\bureau::create([
            'name' => 'bureau1',
            'type' => 'stock',
            'etage' => -2,
            'block_id' => $block->id,
        ]);    

        $bureau2 = \App\bureau::create([
            'name' => 'bureau1',
            'type' => 'stock',
            'etage' => -1,
            'block_id' => $block->id,
        ]);

        \App\asset::create([
            'name' =>'pc',
            'description' => 'azus new edition',
            'prix' => '170000',
            'category' => 'office',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur->id,
        
        ]);
        \App\asset::create([
            'name' =>'printer',
            'description' => 'hp full color printer',
            'prix' => '40000',
            'category' => 'office',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur->id,

        ]);
        \App\asset::create([
            'name' =>'table',
            'description' => 'glass table',
            'prix' => '30000',
            'category' => 'furniture',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur2->id,
        ]);
        \App\asset::create([
            'name' =>'sofa',
            'description' => 'leather sofa',
            'prix' => '27000',
            'category' => 'furniture',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur2->id,
        ]);
        \App\asset::create([
            'name' =>'miror',
            'description' => 'wall size miror',
            'prix' => '11000',
            'category' => 'furniture',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur2->id,
        ]);
        \App\asset::create([
            'name' =>'avast antivirus',
            'description' => 'licence pour tous les pc',
            'prix' => '25000',
            'category' => 'software',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur->id,
        ]);
        \App\asset::create([
            'name' =>'Laptop',
            'description' => 'lenovo ideapad',
            'prix' => '71000',
            'category' => 'office',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur->id,
        ]);
        \App\asset::create([
            'name' =>'scanner',
            'description' => 'hp printer',
            'prix' => '34000',
            'category' => 'office',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur->id,
        ]);
        \App\asset::create([
            'name' =>'desktop',
            'description' => 'it\'s new asset',
            'prix' => '32500',
            'category' => 'office',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur2->id,
        
        ]);
            \App\asset::create([
            'name' =>'symbole',
            'description' => '5 seats car',
            'prix' => '1800000',
            'category' => 'vehicle',
            'dateService' => null,
            'duree_vie' => '10ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur2->id,
        ]);

        \App\asset::create([
            'name' =>'truck',
            'description' => 'heavy weight vehicle',
            'prix' => '3000000',
            'category' => 'vehicle',
            'dateService' => null,
            'duree_vie' => '10ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur2->id,
        ]);
            \App\asset::create([
            'name' =>'new office publicity ',
            'description' => 'the right to broadcast the the new office publicity in channel 4',
            'prix' => '1200000',
            'category' => 'intangible',
            'dateService' => null,
            'duree_vie' => '1ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur2->id,
        ]);
        \App\asset::create([
            'name' =>'the new office',
            'description' => 'the construction of the new office',
            'prix' => '400000',
            'category' => 'building',
            'dateService' => null,
            'duree_vie' => '10ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur->id,
        ]);
                \App\asset::create([
            'name' =>'emplyee management',
            'description' => 'softwares for handling the employee',
            'prix' => '20000',
            'category' => 'software',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur->id,
        ]);
                \App\asset::create([
            'name' =>'sofa 2',
            'description' => 'leather sofa',
            'prix' => '21000',
            'category' => 'furniture',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur2->id,
        ]);
    }
}
