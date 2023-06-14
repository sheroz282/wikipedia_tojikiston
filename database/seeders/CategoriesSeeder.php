<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "\nStarting Category";
        $data = [
            ['title' => 'Культура', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()],
            ['title' => 'Герои', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()],
            ['title' => 'Поэты', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()],
            ['title' => 'Ученые', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()],
            ['title' => 'Писатели', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()],
            ['title' => 'Врачи', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()],
            ['title' => 'Инженеры', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()],
            ['title' => 'Шашмаком', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()],
            ['title' => 'Кинотеатр', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()],
            ['title' => 'История', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()],
            ['title' => 'Танец', 'status' => '1', 'created_by' => 'Sheroz', 'created_at' => Carbon::now()]
        ];

        foreach ($data as $row) {
            try {
                $model = new Category();
                $model->title = $row['title'];
                $model->status = $row['status'];
                $model->created_by = $row['created_by'];
                $model->created_at = $row['created_at'];
                $model->save();
                echo "\nCategory " . $model['title'] . ' - ' . $model['status'] . ' Seeded!';
            } catch (\Exception $e) {
                echo $e->getMessage();
                echo "\nModule " . $model['title'] . ' Error';
            }
        }
        echo "\nCategory Ended!\n";
    }
}
