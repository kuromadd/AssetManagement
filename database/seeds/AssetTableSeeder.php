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
            'name' =>'asset1',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
        
        ]);
        \App\asset::create([
            'name' =>'asset2',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
        ]);
        \App\asset::create([
            'name' =>'asset3',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
        ]);
        \App\asset::create([
            'name' =>'asset4',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
        ]);
        \App\asset::create([
            'name' =>'asset5',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
        ]);
        \App\asset::create([
            'name' =>'asset6',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
        ]);
        \App\asset::create([
            'name' =>'asset7',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
        ]);
        \App\asset::create([
            'name' =>'asset8',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau1->id,
        ]);
        \App\asset::create([
            'name' =>'asset9',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
        
        ]);
            \App\asset::create([
            'name' =>'asset10',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
        ]);

        \App\asset::create([
            'name' =>'asset11',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
        ]);
            \App\asset::create([
            'name' =>'asset12',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
        ]);
        \App\asset::create([
            'name' =>'asset13',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
        ]);
                \App\asset::create([
            'name' =>'asset14',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
        ]);
                \App\asset::create([
            'name' =>'asset15',
            'description' => 'it\'s new asset',
            'prix' => '3434000000',
            'category' => 'op2',
            'dateService' => null,
            'duree_vie' => '5ans',
            'status' => 0,
            'occupied' => 0,
            'bureau_id' => $bureau2->id,
        ]);
    }
}
