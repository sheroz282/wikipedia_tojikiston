<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AccessSeeder extends Seeder
{
    public function run()
    {
        echo "\nStarting Permissions";

        $data = [
            //Доступы для раздела Парметры. Пункт "Пользователи" --- CRUD Пользователей
            ['name' => 'Просмотр пользователей', 'guard_name' => 'web'],
            ['name' => 'Добавить пользователя', 'guard_name' => 'web'],
            ['name' => 'Изменить пользователя', 'guard_name' => 'web'],
            ['name' => 'Удалить пользователя', 'guard_name' => 'web'],

            //Доступы для раздела Парметры. Пункт "Пользователи" --- CRUD Ролы
            ['name' => 'Просмот ролей', 'guard_name' => 'web'],
            ['name' => 'Добавить роль', 'guard_name' => 'web'],
            ['name' => 'Изменить роль', 'guard_name' => 'web'],
            ['name' => 'Удалить роль', 'guard_name' => 'web'],

            //Доступы для раздела Парметры. Пункт "Пользователи" --- CRUD Доступы
            ['name' => 'Просмотр доступы', 'guard_name' => 'web'],
            ['name' => 'Добавить доступ', 'guard_name' => 'web'],
            ['name' => 'Изменить доступ', 'guard_name' => 'web'],
            ['name' => 'Удалить доступ', 'guard_name' => 'web'],
        ];

        foreach ($data as $row) {
            try {
                $model = new Permission();
                $model->name = $row['name'];
                $model->guard_name = $row['guard_name'];
                $model->save();
                echo "\nPermissions " . $model['name'] . ' - ' . $model['guard_name'] . ' Seeded!';
            } catch (\Exception $e) {
                echo $e->getMessage();
                echo "\nModule " . $model['name'] . 'Error';
            }
        }
        echo "\nPermissions Ended!\n";
    }
}
