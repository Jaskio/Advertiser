<?php

use Illuminate\Database\Seeder;

use App\Table;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories() as $category) {
            DB::table(Table::CATEGORIES)->insert($category);
        }
    }

    private function categories() 
    {
        return [
            [
                'title' => 'Fashion'
            ],
            [
                'title' => 'Motors'
            ],
            [
                'title' => 'Electronics'
            ],
            [
                'title' => 'Musical instruments'
            ]
        ];
    }
}
