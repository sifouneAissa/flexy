<?php

namespace Database\Seeders;

use App\Models\SNavitem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SNavitemSeeder extends Seeder
{
    public $items = [
        [
            'name' => 'Settings',
            'parent_id' => null,
            'icon' => 'bi-gear',
            'isNew' => true,
            'route' => 'test',
            'children' => [
                [
                    'name' => 'Roles',
                    'parent_id' => null,
                    'icon' => 'bi-person-gear',
                    'isNew' => true,
                    'route' => 'test'
                ],
                [
                    'name' => 'Permissions',
                    'parent_id' => null,
                    'icon' => 'bi-person-lock',
                    'isNew' => true,
                    'route' => 'test'
                ]
            ]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach($this->items as $item){

            $citem = SNavitem::where('name',$item['name'])->first();

            if(!$citem)
            $citem = SNavitem::query()->create(filterRequest($item,SNavitem::class));
            else $citem->update(filterRequest($item,SNavitem::class));

            $children = key_exists('children',$item) ? $item['children'] : null;

            if($children){

                foreach($children as $child){

                    $ccitem = $citem->children()->where('name',$child['name'])->first();
                    $child['parent_id'] = $citem->id;
                    if(!$ccitem)
                        $ccitem = SNavitem::query()->create(filterRequest($child,SNavitem::class));
                    else $ccitem->update(filterRequest($child,SNavitem::class));
                }
            }
        }
    }
}