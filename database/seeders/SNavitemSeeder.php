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
            'name' => 'Bonus',
            'parent_id' => null,
            'icon' => 'bi-gift-fill',
            'isNew' => true,
            'route' => null,
            'permission' => 'view bonus',
            'need_login' => true,
            'order' => 2,
            'children' => [
                [
                    'name' => 'Levels',
                    'parent_id' => null,
                    'icon' => 'bi-water',
                    'isNew' => true,
                    'route' => 'level.index',
                    'permission' => 'view level',
                    'need_login' => true,
                    'order' => 1,
                ],
                [
                    'name' => 'Providers',
                    'parent_id' => null,
                    'icon' => 'bi-boxes',
                    'isNew' => true,
                    'route' => 'provider.index',
                    'permission' => 'view provider',
                    'need_login' => true,
                    'order' => 2
                ],
                [
                    'name' => 'MemberShips',
                    'parent_id' => null,
                    'icon' => 'bi-award',
                    'isNew' => true,
                    'route' => 'membership.index',
                    'permission' => 'view membership',
                    'need_login' => true,
                    'order' => 3
                ]
            ]
        ],
        [
            'name' => 'Partners',
            'parent_id' => null,
            'icon' => 'bi-person-gear',
            'isNew' => true,
            'order' => 1,
            'route' => 'partner.index'
        ],
        [
            'name' => 'Settings',
            'parent_id' => null,
            'icon' => 'bi-gear',
            'isNew' => true,
            'route' => null,
            'permission' => 'view setting',
            'order' => 3,
            'children' => [
                [
                    'name' => 'Roles',
                    'parent_id' => null,
                    'icon' => 'bi-person-gear',
                    'isNew' => true,
                    'route' => 'role.index',
                    'permission' => 'view role',
                    'order' => 1,
                ],
                [
                    'name' => 'Permissions',
                    'parent_id' => null,
                    'icon' => 'bi-person-lock',
                    'isNew' => true,
                    'route' => 'permission.index',
                    'permission' => 'view permission',
                    'order' => 2,
                ],
                [
                    'name' => 'Users',
                    'parent_id' => null,
                    'icon' => 'bi-person-fill-gear',
                    'isNew' => true,
                    'route' => 'user.index',
                    'permission' => 'view user',
                    'need_login' => true,
                    'order' => 3,
                ],

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
