<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public $settings  = [
        [
            'name' => 'Company name',
            'code' => 'company_name',
            'content' => 'Himpies',
        ],
        [
            'name' => 'Company description',
            'code' => 'company_description',
            'content' => 'Himpies is a hemp brand powered by SESHATA. Based in United Arab Emirates.We bring the best quality of HEMP products over the world to you.',
        ],
        [
            'name' => 'Phone',
            'code' => 'phone',
            'content' => '+971 55 302 4498',
        ],
        [
            'name' => 'Email',
            'code' => 'email',
            'content' => 'example@example.com',
        ],
        [
            'name' => 'Address',
            'code' => 'address',
            'content' => 'Dubai, UAE',
        ],
        [
            'name' => 'Facebook',
            'code' => 'facebook_link',
            'content' => 'https://www.facebook.com/himpies/',
        ],
        [
            'name' => 'Instagram',
            'code' => 'instagram_link',
            'content' => 'https://www.instagram.com/himpies/',
        ],
        [
            'name' => 'Youtube',
            'code' => 'youtube_link',
            'content' => 'https://www.youtube.com/channel/UCLMrtOqRr7kCn8uBvEAX9eQ?view_as=subscriber',
        ],
        [
            'name' => 'Twitter',
            'code' => 'twitter_link',
            'content' => 'https://twitter.com/Himpies_dxb',
        ],
        [
            'name' => 'Max inventory value',
            'code' => 'max_inventory_value',
            'content' => 100,
        ],
        [
            'name' => 'Logo',
            'code' => 'logo',
            'content' => '',
        ],
        [
            'name' => 'Flexy Photo',
            'code' => 'flexy_photo',
            'content' => ''
        ],
        [
            'name' => 'Flexy end to end',
            'code' => 'flexy_end_to_end',
            'content' => 'Flexy end to end'
        ],
        [
            'name' => 'Flexy wholesaler',
            'code' => 'flexy_wholesaler',
            'content' => 'Flexy wholesaler'
        ],



    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ($this->settings as $setting){
            $exist = Setting::where('code',$setting['code'])->first();

            if($exist){
                $exist->update([
                    'name' => $setting['name'],
                    'code' => $setting['code']
                ]);
            }
            else
                Setting::query()->create($setting);
        }
    }
}
