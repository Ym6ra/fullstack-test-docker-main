<?php namespace App\Controllers;

use App\Models\CommentModel;
use CodeIgniter\Controller;

class Comment extends Controller
{	
    public function add()
    {
		$this->form_validation = \Config\Services::validation();
		
		$currentPage = $this->request->getPost('currentPage');
		$name = $this->request->getPost('email');
		$text = $this->request->getPost('text');
		$date = $this->request->getPost('date');
		$productID = $this->request->getPost('productID');
		$data = [
			'name'=>$name,
			'text'=>$text,
			'date'=>$date
		]; 
		$this->form_validation->setRules([
			'name' => 'required',
			'text' => 'required',
			'date' => 'required',
		]);

		if ($this->form_validation->run($data)!==false){
			$model = new CommentModel();
            // Добавление нового комментария
            $model->save([
                'name' => $name,
				'text' => $text,
				'date' => $date,
				'productID' => $productID
            ]);
			return $this->response->setJSON(['success' => true]);
		}else{
			return $this->response->setJSON(['success' => false, "vals" => $data]);
		};
    }

	public function delete()
	{
		$id = $this->request->getPost('id');

		// Проверка наличия параметра ID
		if ($id === null) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Не указан ID комментария для удаления.');
		}

		// Загрузка модели комментария
		$model = new CommentModel();

		// Получение комментария по ID
		$comment = $model->find($id);

		// Проверка существования комментария
		if ($comment === null) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Комментарий с ID ' . $id . ' не найден.');
		}

		// Удаление комментария по ID
		$model->delete($id);
		return $this->response->setJSON(['success' => true, 'value' => $id]);
	}
}