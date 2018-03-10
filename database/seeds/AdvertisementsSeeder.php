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
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '20',
                'user_id' => 2,
                'category_id' => 1,
                'sub_category_id' => 1,
                'img_path' => '/uploads/advertisements/image_01.jpg'
            ],
            [
                'title' => 'Unicorn t-shirt',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '25',
                'user_id' => 2,
                'category_id' => 1,
                'sub_category_id' => 1,
                'img_path' => '/uploads/advertisements/image_02.jpg'
            ],
            [
                'title' => 'Audi R8',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '30000',
                'user_id' => 3,
                'category_id' => 2,
                'sub_category_id' => 2,
                'img_path' => '/uploads/advertisements/image_03.jpg'
            ],
            [
                'title' => 'BMW E30',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '14000',
                'user_id' => 3,
                'category_id' => 2,
                'sub_category_id' => 2,
                'img_path' => '/uploads/advertisements/image_04.jpg'
            ],
            [
                'title' => 'Razer mouse',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '200',
                'user_id' => 4,
                'category_id' => 3,
                'sub_category_id' => 4,
                'img_path' => '/uploads/advertisements/image_05.jpg'
            ],
            [
                'title' => 'Asus monitor',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '350',
                'user_id' => 4,
                'category_id' => 3,
                'sub_category_id' => 4,
                'img_path' => '/uploads/advertisements/image_06.jpg'
            ],
            [
                'title' => 'Dell XPS laptop',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '1450',
                'user_id' => 4,
                'category_id' => 3,
                'sub_category_id' => 5,
                'img_path' => '/uploads/advertisements/image_07.jpg'
            ],
            [
                'title' => 'Pro microphone',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '1100',
                'user_id' => 4,
                'category_id' => 4,
                'sub_category_id' => 6,
                'img_path' => '/uploads/advertisements/image_08.jpg'
            ],
            [
                'title' => 'Sonor drums',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '1800',
                'user_id' => 4,
                'category_id' => 4,
                'sub_category_id' => 7,
                'img_path' => '/uploads/advertisements/image_09.jpg'
            ],
            [
                'title' => 'Ibanez guitar',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '1300',
                'user_id' => 4,
                'category_id' => 4,
                'sub_category_id' => 6,
                'img_path' => '/uploads/advertisements/image_10.jpg'
            ],
            [
                'title' => 'Bass guitar',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '800',
                'user_id' => 2,
                'category_id' => 4,
                'sub_category_id' => 6,
                'img_path' => '/uploads/advertisements/image_11.jpg'
            ],
            [
                'title' => 'Electric drums',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '2000',
                'user_id' => 2,
                'category_id' => 4,
                'sub_category_id' => 7,
                'img_path' => '/uploads/advertisements/image_12.jpg'
            ],
            [
                'title' => 'Double pedals',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '600',
                'user_id' => 2,
                'category_id' => 4,
                'sub_category_id' => 7,
                'img_path' => '/uploads/advertisements/image_13.jpg'
            ],
            [
                'title' => 'Paiste cymbal',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '500',
                'user_id' => 4,
                'category_id' => 4,
                'sub_category_id' => 7,
                'img_path' => '/uploads/advertisements/image_14.jpg'
            ],
            [
                'title' => 'Hyundai i30',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '20000',
                'user_id' => 5,
                'category_id' => 2,
                'sub_category_id' => 2,
                'img_path' => '/uploads/advertisements/image_15.jpg'
            ],
            [
                'title' => 'BMW X5',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '70000',
                'user_id' => 4,
                'category_id' => 2,
                'sub_category_id' => 2,
                'img_path' => '/uploads/advertisements/image_16.jpg'
            ],
            [
                'title' => 'Zastava 750',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '600',
                'user_id' => 4,
                'category_id' => 2,
                'sub_category_id' => 2,
                'img_path' => '/uploads/advertisements/image_17.jpg'
            ],
            [
                'title' => 'PC gaming',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '1400',
                'user_id' => 3,
                'category_id' => 3,
                'sub_category_id' => 4,
                'img_path' => '/uploads/advertisements/image_18.jpg'
            ],
            [
                'title' => 'iPad',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '1200',
                'user_id' => 4,
                'category_id' => 3,
                'sub_category_id' => 8,
                'img_path' => '/uploads/advertisements/image_19.jpg'
            ],
            [
                'title' => 'Samsung J5',
                'description' => 'Unique description for this article, every single detail is described here. You will not regret if you buy this one.',
                'price' => '350',
                'user_id' => 2,
                'category_id' => 3,
                'sub_category_id' => 8,
                'img_path' => '/uploads/advertisements/image_20.jpg'
            ],
        ];
    }
}
