<?php namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class Product extends Controller
{
    //public function index()
    //{
    //    // Загрузка модели продукта
    //    $model = new ProductModel();

    //    // Получение всех продуктов
    //    $data['products'] = $model->findAll();

    //    // Отображение представления с данными
    //    return view('Home/index', ['products' => $data]);
    //}

    public function add()
    {
        // Проверка отправки формы
        if ($this->request->getMethod() === 'post' && $this->validate([
            'src' => 'required'
        ])) {
            // Загрузка модели продукта
            $model = new ProductModel();

            // Добавление нового продукта
            $model->save([
                'src' => $this->request->getPost('src')
            ]);

            // Перенаправление на страницу списка продуктов
            return redirect()->to('/product');
        }

        // Отображение формы добавления продукта
        echo view('product_form');
    }
}