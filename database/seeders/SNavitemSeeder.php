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
            'name' => 'Dashboard',
            'parent_id' => null,
            'icon' => 'bi-house-door',
            'isNew' => true,
            'order' => 1,
            'route' => 'index',
//            'permission' => 'view-partners',
            'need_login' => true,
        ],
        [
            'name' => 'Percentages',
            'parent_id' => null,
            'icon' => 'bi-percent',
            'isNew' => true,
            'order' => 2,
            'route' => 'percentage.index',
            'permission' => 'view-partners',
            'need_login' => true,
        ],
        [
            'name' => 'Bonus',
            'parent_id' => null,
            'icon' => 'bi-gift-fill',
            'isNew' => true,
            'route' => null,
            'permission' => 'view bonus',
            'need_login' => true,
            'order' => 4,
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
            'order' => 3,
            'route' => 'partner.index',
            'permission' => 'view-partners',
            'need_login' => true,
        ],
        [
            'name' => 'Packs',
            'parent_id' => null,
            'icon' => 'bi-box2-heart',
            'isNew' => true,
            'order' => 5,
            'route' => 'pack.index',
            'permission' => 'view provider pack',
            'need_login' => true,
        ],
        [
            'name' => 'Numbers',
            'parent_id' => null,
            'icon' => 'bi-telephone',
            'isNew' => true,
            'order' => 6,
            'route' => 'number.index',
            'need_login' => true
        ],
        [
            'name' => 'Settings',
            'parent_id' => null,
            'icon' => 'bi-gear',
            'isNew' => true,
            'route' => null,
            'permission' => 'view setting',
            'order' => 7,
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
                [
                    'name' => 'Settings general',
                    'parent_id' => null,
                    'icon' => 'bi-gear',
                    'isNew' => true,
                    'route' => 'setting.index',
                    'permission' => 'view setting general',
                    'need_login' => true,
                    'order' => 4,
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
