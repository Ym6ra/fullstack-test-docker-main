<?php namespace App\Database\Seeds;

use App\Models\CommentModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $model = new CommentModel();

        // Создание массива данных и их заполнение случайными данными
        $data = [];
        for($i = 0; $i < 25; $i++) {
            $data[] = [
                'name' => $faker->name,
                'text' => $faker->text(),
                'date' => $faker->date('Y-m-d'),
                'productID' => $faker->numberBetween(1, 2)
            ];
        }

        // Запись сгенерированных данных в базу данных с использованием модели CommentModel
        foreach($data as $comment) {
            $model->insert($comment);
        }
    }
}