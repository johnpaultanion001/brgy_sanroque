<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token' => null,
                'contact_number' => '09123223121',
                'date_of_birth'  => '2000-02-21',
                'role' => 'admin',
                'address' => 'Test',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 2,
                'name'           => 'Sample Resident',
                'email'          => 'user@user.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                'remember_token' => null,
                'contact_number' => '09123223121',
                'date_of_birth'  => '2000-02-21',
                'role' => 'resident',
                'address' => 'Test',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            
        ];

        User::insert($users);
    }
}
