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
                'name' => 'Jasmin Bektic',
                'email' => 'jaskio@gmail.com',
                'password' => bcrypt('000000'),
                'account_type' => 0
            ],
            [
                'name' => 'John Snow',
                'email' => 'john.s@gmail.com',
                'password' => bcrypt('000000'),
                'account_type' => 1
            ],
            [
                'name' => 'Margarita Tremlin',
                'email' => 'margarita.t@gmail.com',
                'password' => bcrypt('000000'),
                'account_type' => 1
            ],[
                'name' => 'Sebastian Pawl',
                'email' => 'sebastian.p@gmail.com',
                'password' => bcrypt('000000'),
                'account_type' => 1
            ],[
                'name' => 'Tom Taylor',
                'email' => 'tom.t@gmail.com',
                'password' => bcrypt('000000'),
                'account_type' => 1
            ]
        ];
    }
}
