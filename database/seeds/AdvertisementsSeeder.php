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

    private function advertisements() {
        return [
            [
                'title' => 'Advertisement 1',
                'description' => 'Description for advertisement 1',
                'price' => '50',
                'user_id' => 2,
                'img_path' => '/uploads/image_01.jpg'
            ],
            [
                'title' => 'Advertisement 2',
                'description' => 'Description for advertisement 2',
                'price' => '40',
                'user_id' => 2,
                'img_path' => '/uploads/image_02.jpg'
            ],
            [
                'title' => 'Advertisement 3',
                'description' => 'Description for advertisement 3',
                'price' => '80',
                'user_id' => 3,
                'img_path' => '/uploads/image_03.jpg'
            ],
            [
                'title' => 'Advertisement 4',
                'description' => 'Description for advertisement 4',
                'price' => '90',
                'user_id' => 3,
                'img_path' => '/uploads/image_04.jpg'
            ],
            [
                'title' => 'Advertisement 5',
                'description' => 'Description for advertisement 5',
                'price' => '1000',
                'user_id' => 4,
                'img_path' => '/uploads/image_05.jpg'
            ]
        ];
    }
}
