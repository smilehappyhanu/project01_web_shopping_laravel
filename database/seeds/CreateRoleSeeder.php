<?php

use Illuminate\Database\Seeder;


class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'display_name' => 'Administration system'
            ],
            [
                'name' => 'Guest',
                'display_name' => 'Customer'
            ],
            [
                'name' => 'Developer',
                'display_name' => 'Developing system'
            ],
            [
                'name' => 'Content',
                'display_name' => 'Edit content'
            ]
            ]);
    }
}
