<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        echo "\nStarting Role";
        $data = [
            ['name' => 'Admin', 'guard_name' => 'web']
        ];

        foreach ($data as $row) {
            try {
                $model = new Role();
                $model->name = $row['name'];
                $model->guard_name = $row['guard_name'];
                $model->syncPermissions(1,2,3,4,5,6,7,8,9,10,11,12);
                $model->save();
                echo "\nRole " . $model['name'] . ' - ' . $model['guard_name'] . ' Seeded!';
            } catch (\Exception $e) {
                echo $e->getMessage();
                echo "\nModule " . $model['name'] . ' Error';
            }
        }
        echo "\nRole Ended!\n";
    }
}
