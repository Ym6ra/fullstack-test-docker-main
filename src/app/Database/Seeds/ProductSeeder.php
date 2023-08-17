<?php namespace App\Database\Seeds;

use App\Models\ProductModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $model = new ProductModel();

        // Создание массива данных и их заполнение случайными данными
        $data = [
            [
                'productID' => 1,
                'src' => 'https://img.corsocomo.com/image/cache/data/w/402-LM2P1P/402-LM2P1P%20(3)-1000x1000.jpg',
            ],[
                'productID' => 2,
                'src' => 'https://mida.style/content/uploads/images/zhenskie-botinki_%281%29.jpg',
            ],
        ];
        

        // Запись сгенерированных данных в базу данных с использованием модели CommentModel
        foreach($data as $product) {
            $model->insert($product);
        }
    }
}