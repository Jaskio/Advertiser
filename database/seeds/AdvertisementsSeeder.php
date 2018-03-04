<?php

use Illuminate\Database\Seeder;

use App\Table;

class AdvertisementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->advertisements() as $advert) {
            DB::table(Table::ADVERTISEMENTS)->insert($advert);
        }
    }

    private function advertisements() 
    {
        return [
            [
                'title' => 'Supermen t-shirt',
                'description' => 'Description for Supermen t-shirt',
                'price' => '50',
                'user_id' => 2,
                'category_id' => 1,
                'sub_category_id' => 1,
                'img_path' => '/uploads/advertisements/image_01.jpg'
            ],
            [
                'title' => 'Unicorn t-shirt',
                'description' => 'Description for Unicorn t-shirt',
                'price' => '40',
                'user_id' => 2,
                'category_id' => 1,
                'sub_category_id' => 1,
                'img_path' => '/uploads/advertisements/image_02.jpg'
            ],
            [
                'title' => 'Audi R8',
                'description' => 'Description for Audi R8',
                'price' => '80',
                'user_id' => 3,
                'category_id' => 2,
                'sub_category_id' => 2,
                'img_path' => '/uploads/advertisements/image_03.jpg'
            ],
            [
                'title' => 'BMW E30',
                'description' => 'Description for BMW E30',
                'price' => '90',
                'user_id' => 3,
                'category_id' => 2,
                'sub_category_id' => 2
            ],
            [
                'title' => 'Razer mouse',
                'description' => 'Description for Razer mouse',
                'price' => '1000',
                'user_id' => 4,
                'category_id' => 3,
                'sub_category_id' => 4,
                'img_path' => '/uploads/advertisements/image_05.jpg'
            ],
            [
                'title' => 'Asus monitor',
                'description' => 'Description for Asus monitor',
                'price' => '1000',
                'user_id' => 4,
                'category_id' => 3,
                'sub_category_id' => 4,
                'img_path' => '/uploads/advertisements/image_06.jpg'
            ],
            [
                'title' => 'Dell XPS laptop',
                'description' => 'Description for Dell XPS laptop',
                'price' => '1000',
                'user_id' => 4,
                'category_id' => 3,
                'sub_category_id' => 5,
                'img_path' => '/uploads/advertisements/image_07.jpg'
            ],
            [
                'title' => 'Pro microphone',
                'description' => 'Description for Pro microphone',
                'price' => '1000',
                'user_id' => 4,
                'category_id' => 4,
                'sub_category_id' => 6,
                'img_path' => '/uploads/advertisements/image_08.jpg'
            ],
            [
                'title' => 'Sonor drums',
                'description' => 'Description for Sonor drums',
                'price' => '1000',
                'user_id' => 4,
                'category_id' => 4,
                'sub_category_id' => 7,
                'img_path' => '/uploads/advertisements/image_09.jpg'
            ],
            [
                'title' => 'Ibanez guitar',
                'description' => 'Description for Ibanez guitar',
                'price' => '1000',
                'user_id' => 4,
                'category_id' => 4,
                'sub_category_id' => 6,
                'img_path' => '/uploads/advertisements/image_10.jpg'
            ]
        ];
    }
}
