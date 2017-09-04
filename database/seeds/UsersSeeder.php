<?php

use Illuminate\Database\Seeder;

use App\Table;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users() as $user) {
            DB::table(Table::USERS)->insert($user);
        }
    }

    private function users() {
        return [
            [
                'full_name' => 'Jasmin Bektic',
                'email' => 'jaskio@gmail.com',
                'password' => bcrypt('000000'),
                'avatar_path' => '',
                'account_type' => 0
            ],
            [
                'full_name' => 'John Snow',
                'email' => 'john.s@gmail.com',
                'password' => bcrypt('000000'),
                'avatar_path' => '/uploads/avatar/john.jpg',
                'account_type' => 1
            ],
            [
                'full_name' => 'Margarita Tremlin',
                'email' => 'margarita.t@gmail.com',
                'password' => bcrypt('000000'),
                'avatar_path' => '',
                'account_type' => 1
            ],[
                'full_name' => 'Sebastian Pawl',
                'email' => 'sebastian.p@gmail.com',
                'password' => bcrypt('000000'),
                'avatar_path' => '',
                'account_type' => 1
            ],[
                'full_name' => 'Tom Taylor',
                'email' => 'tom.t@gmail.com',
                'password' => bcrypt('000000'),
                'avatar_path' => '',
                'account_type' => 1
            ]
        ];
    }
}
