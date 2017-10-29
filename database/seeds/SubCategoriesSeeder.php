<?php

use Illuminate\Database\Seeder;
use App\Table;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->sub_categories() as $sub_category) {
            DB::table(Table::SUB_CATEGORIES)->insert($sub_category);
        }
    }

    private function sub_categories() {
        return [
            [
                'title' => 'Shirts',
                'category_id' => 1
            ],
            [
                'title' => 'Cars',
                'category_id' => 2
            ],
            [
                'title' => 'Bicycles',
                'category_id' => 2
            ],
            [
                'title' => 'Computers',
                'category_id' => 3
            ],
            [
                'title' => 'Laptops',
                'category_id' => 3
            ],
            [
                'title' => 'Guitars',
                'category_id' => 4
            ],
            [
                'title' => 'Drums',
                'category_id' => 4
            ]
        ];
    }
}
