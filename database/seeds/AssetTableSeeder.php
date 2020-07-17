<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'sous' => 2,
            'nbre_etage' => 5,
        ]);

        $bureau1 = \App\bureau::create([
            'name' => 'bureau1',
            'type' => 'Office',
            'etage' => 1,
            'block_id' => $block->id,
        ]); 
        
        $bureau2 = \App\bureau::create([
            'name' => 'stock',
            'type' => 'Stock',
            'etage' => 1,
            'block_id' => $block->id,
        ]); 

        $garage1 = \App\bureau::create([
            'name' => 'bureau1',
            'type' => 'Garage',
            'etage' => -1,
            'block_id' => $block->id,
        ]);

        \App\asset::create([
            'name' =>'pc',
            'description' => 'azus new edition',
            'prix' => '170000',
            'category' => 'Office equipement',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 1,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur->id,  
            'qrcode'=>Str::random(15),                    
        
        ]);
        \App\asset::create([
            'name' =>'printer',
            'description' => 'hp full color printer',
            'prix' => '40000',
            'category' => 'Office equipement',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 1,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur->id, 
            'qrcode'=>Str::random(15),                    

        ]);
        \App\asset::create([
            'name' =>'table',
            'description' => 'glass table',
            'prix' => '30000',
            'category' => 'Furniture and fixtures',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 1,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur2->id,  
            'qrcode'=>Str::random(15),                    
        ]);
        \App\asset::create([
            'name' =>'sofa',
            'description' => 'leather sofa',
            'prix' => '27000',
            'category' => 'Furniture and fixtures',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 1,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur2->id,  
            'qrcode'=>Str::random(15),                    
        ]);
        \App\asset::create([
            'name' =>'miror',
            'description' => 'wall size miror',
            'prix' => '11000',
            'category' => 'Furniture and fixtures',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 1,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur2->id,  
            'qrcode'=>Str::random(15),                    
        ]);
        \App\asset::create([
            'name' =>'avast antivirus',
            'description' => 'licence pour tous les pc',
            'prix' => '25000',
            'category' => 'Software',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 1,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur->id,  
            'qrcode'=>Str::random(15),                    
        ]);
        \App\asset::create([
            'name' =>'Laptop',
            'description' => 'lenovo ideapad',
            'prix' => '71000',
            'category' => 'Office equipement',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 1,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur->id,  
            'qrcode'=>Str::random(15),                    
        ]);
        \App\asset::create([
            'name' =>'scanner',
            'description' => 'hp printer',
            'prix' => '34000',
            'category' => 'Office equipement',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 1,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur->id,  
            'qrcode'=>Str::random(15),                    
        ]);
        \App\asset::create([
            'name' =>'desktop',
            'description' => 'it\'s new asset',
            'prix' => '32500',
            'category' => 'Office equipement',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 1,
            'bureau_id' => $bureau1->id,
            'fournisseur_id'=>$fournisseur2->id,  
            'qrcode'=>Str::random(15),                    
        
        ]);
            \App\asset::create([
            'name' =>'symbole',
            'description' => '5 seats car',
            'prix' => '1800000',
            'category' => 'Vehicle',
            'dateService' => now(),
            'duree_vie' => '10',
            'status' => 1,
            'occupied' => 2,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur2->id,  
            'qrcode'=>Str::random(15),                    
        ]);

        \App\asset::create([
            'name' =>'truck',
            'description' => 'heavy weight vehicle',
            'prix' => '3000000',
            'category' => 'Vehicle',
            'dateService' => now(),
            'duree_vie' => '10',
            'status' => 1,
            'occupied' => 2,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur2->id,  
            'qrcode'=>Str::random(15),                    
        ]);
            \App\asset::create([
            'name' =>'new office publicity ',
            'description' => 'the right to broadcast the the new office publicity in channel 4',
            'prix' => '1200000',
            'category' => 'Intangible assets',
            'dateService' => now(),
            'duree_vie' => '1',
            'status' => 1,
            'occupied' => 2,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur2->id,  
            'qrcode'=>Str::random(15),                    
        ]);
        \App\asset::create([
            'name' =>'the new office',
            'description' => 'the construction of the new office',
            'prix' => '400000',
            'category' => 'Building',
            'dateService' => now(),
            'duree_vie' => '10',
            'status' => 1,
            'occupied' => 2,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur->id,  
            'qrcode'=>Str::random(15),                    
        ]);
                \App\asset::create([
            'name' =>'emplyee management',
            'description' => 'softwares for handling the employee',
            'prix' => '20000',
            'category' => 'Software',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 2,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur->id,  
            'qrcode'=>Str::random(15),                    
        ]);
                \App\asset::create([
            'name' =>'sofa 2',
            'description' => 'leather sofa',
            'prix' => '21000',
            'category' => 'Furniture and fixtures',
            'dateService' => now(),
            'duree_vie' => '5',
            'status' => 1,
            'occupied' => 2,
            'bureau_id' => $bureau2->id,
            'fournisseur_id'=>$fournisseur2->id,  
            'qrcode'=>Str::random(15),                    
        ]);
    }
}
