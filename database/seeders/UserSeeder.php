<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        echo "\nStarting USER Seeder";
        $data = [
            ['name' => 'Sheroz', 'email' => 'zoidov@gmail.com', 'password' => 'sheroz123'],
        ];

        foreach ($data as $row) {
            try {
                $model = new User();
                $model->name = $row['name'];
                $model->email = $row['email'];
                $model->password = Hash::make($row['password']);
                $model->created_by = 1;
                $model->assignRole('Admin');
                $model->save();
                echo "\n USER" . $model->name .'   Seeded!';
            } catch (\Exception $e) {
                echo $e->getMessage();
                echo "\nModule " . $model->name  . 'Error';
            }
        }
        echo "\nUSER Seeder Ended\n";
    }
}
