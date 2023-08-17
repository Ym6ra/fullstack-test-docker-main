<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CommentModel;
use Config\Services;

use App\Models\Comment;

class Home extends BaseController
{
	public function index()
	{
		$page = [1,1,true,false,false,false];
		$data = json_encode($page);
		$urlData= urlencode($data);
		$url = 'http://localhost/' . $urlData;
		return redirect()->to($url);
	}
	public function product($data){

		$urlData = urldecode($data);
		$page = json_decode($urlData);
		$productPage =  $page[0];
		$commentPage = $page[1];
		$sortByIdUp = $page[2];
		$sortByIdDown = $page[3];
		$sortByDateUp = $page[4];
		$sortByDateDown = $page[5];

		$modelProduct = new ProductModel();
		$dataProducts['products'] = $modelProduct->findAll();
		$maxProductPage =  ceil(count($dataProducts['products']));
		if($productPage>=1){
			if ($productPage<=$maxProductPage){
				$dataProducts['products'] =  $modelProduct->paginate(1,'group',$productPage);
				$productID = $dataProducts['products'][0]['productID'];

				$modelComment = new CommentModel();
				$maxCommentPage = ceil(count($modelComment->where('productID',$productID)->find())/3);
				if ($commentPage<$maxCommentPage){
					if ($commentPage<=1){
						$visibleNext = true;
						$visiblePrev = false;
						if($sortByIdUp){
							$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('id', 'ASC')->paginate(3,'group',1);
							return view('Home/index',[
								'comments'       => $dataComments,
								'products'       => $dataProducts,
								'productPage'    => $productPage,
								'commentPage'    => $commentPage,
								'maxProductPage' => $maxProductPage,
								'maxCommentPage' => $maxCommentPage,
								'visibleNext'    => $visibleNext,
								'visiblePrev'    => $visiblePrev,
								'sortByIdUp'     => $sortByIdUp,
								'sortByIdDown'   => $sortByIdDown,
								'sortByDateUp'   => $sortByDateUp,
								'sortByDateDown' => $sortByDateDown,
							]);
						}elseif($sortByIdDown){
							$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('id', 'DESC')->paginate(3,'group',1);
							return view('Home/index',[
								'comments'       => $dataComments,
								'products'       => $dataProducts,
								'productPage'    => $productPage,
								'commentPage'    => $commentPage,
								'maxProductPage' => $maxProductPage,
								'maxCommentPage' => $maxCommentPage,
								'visibleNext'    => $visibleNext,
								'visiblePrev'    => $visiblePrev,
								'sortByIdUp'     => $sortByIdUp,
								'sortByIdDown'   => $sortByIdDown,
								'sortByDateUp'   => $sortByDateUp,
								'sortByDateDown' => $sortByDateDown,
							]);
						}elseif($sortByDateUp){
							$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('date', 'ASC')->paginate(3,'group',1);
							return view('Home/index',[
								'comments'       => $dataComments,
								'products'       => $dataProducts,
								'productPage'    => $productPage,
								'commentPage'    => $commentPage,
								'maxProductPage' => $maxProductPage,
								'maxCommentPage' => $maxCommentPage,
								'visibleNext'    => $visibleNext,
								'visiblePrev'    => $visiblePrev,
								'sortByIdUp'     => $sortByIdUp,
								'sortByIdDown'   => $sortByIdDown,
								'sortByDateUp'   => $sortByDateUp,
								'sortByDateDown' => $sortByDateDown,
							]);
						}elseif($sortByDateDown){
							$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('date', 'DESC')->paginate(3,'group',1);
							return view('Home/index',[
								'comments'       => $dataComments,
								'products'       => $dataProducts,
								'productPage'    => $productPage,
								'commentPage'    => $commentPage,
								'maxProductPage' => $maxProductPage,
								'maxCommentPage' => $maxCommentPage,
								'visibleNext'    => $visibleNext,
								'visiblePrev'    => $visiblePrev,
								'sortByIdUp'     => $sortByIdUp,
								'sortByIdDown'   => $sortByIdDown,
								'sortByDateUp'   => $sortByDateUp,
								'sortByDateDown' => $sortByDateDown,
							]);
						}
					}else{
						$visibleNext = true;
						$visiblePrev = true;
						if($sortByIdUp){
							$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('id', 'ASC')->paginate(3,'group',$commentPage);
							return view('Home/index',[
								'comments'       => $dataComments,
								'products'       => $dataProducts,
								'productPage'    => $productPage,
								'commentPage'    => $commentPage,
								'maxProductPage' => $maxProductPage,
								'maxCommentPage' => $maxCommentPage,
								'visibleNext'    => $visibleNext,
								'visiblePrev'    => $visiblePrev,
								'sortByIdUp'     => $sortByIdUp,
								'sortByIdDown'   => $sortByIdDown,
								'sortByDateUp'   => $sortByDateUp,
								'sortByDateDown' => $sortByDateDown,
							]);
						}elseif($sortByIdDown){
							$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('id', 'DESC')->paginate(3,'group',$commentPage);
							return view('Home/index',[
								'comments'       => $dataComments,
								'products'       => $dataProducts,
								'productPage'    => $productPage,
								'commentPage'    => $commentPage,
								'maxProductPage' => $maxProductPage,
								'maxCommentPage' => $maxCommentPage,
								'visibleNext'    => $visibleNext,
								'visiblePrev'    => $visiblePrev,
								'sortByIdUp'     => $sortByIdUp,
								'sortByIdDown'   => $sortByIdDown,
								'sortByDateUp'   => $sortByDateUp,
								'sortByDateDown' => $sortByDateDown,
							]);
						}elseif($sortByDateUp){
							$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('date', 'ASC')->paginate(3,'group',$commentPage);
							return view('Home/index',[
								'comments'       => $dataComments,
								'products'       => $dataProducts,
								'productPage'    => $productPage,
								'commentPage'    => $commentPage,
								'maxProductPage' => $maxProductPage,
								'maxCommentPage' => $maxCommentPage,
								'visibleNext'    => $visibleNext,
								'visiblePrev'    => $visiblePrev,
								'sortByIdUp'     => $sortByIdUp,
								'sortByIdDown'   => $sortByIdDown,
								'sortByDateUp'   => $sortByDateUp,
								'sortByDateDown' => $sortByDateDown,
							]);
						}elseif($sortByDateDown){
							$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('date', 'DESC')->paginate(3,'group',$commentPage);
							return view('Home/index',[
								'comments'       => $dataComments,
								'products'       => $dataProducts,
								'productPage'    => $productPage,
								'commentPage'    => $commentPage,
								'maxProductPage' => $maxProductPage,
								'maxCommentPage' => $maxCommentPage,
								'visibleNext'    => $visibleNext,
								'visiblePrev'    => $visiblePrev,
								'sortByIdUp'     => $sortByIdUp,
								'sortByIdDown'   => $sortByIdDown,
								'sortByDateUp'   => $sortByDateUp,
								'sortByDateDown' => $sortByDateDown,
							]);
						}
					}
				}else{
					$visibleNext = false;
					$visiblePrev = true;
					
					if($sortByIdUp){
						$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('id', 'ASC')->paginate(3,'group',$commentPage);
						return view('Home/index',[
							'comments'       => $dataComments,
							'products'       => $dataProducts,
							'productPage'    => $productPage,
							'commentPage'    => $commentPage,
							'maxProductPage' => $maxProductPage,
							'maxCommentPage' => $maxCommentPage,
							'visibleNext'    => $visibleNext,
							'visiblePrev'    => $visiblePrev,
							'sortByIdUp'     => $sortByIdUp,
							'sortByIdDown'   => $sortByIdDown,
							'sortByDateUp'   => $sortByDateUp,
							'sortByDateDown' => $sortByDateDown,
						]);
					}elseif($sortByIdDown){
						$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('id', 'DESC')->paginate(3,'group',$commentPage);
						return view('Home/index',[
							'comments'       => $dataComments,
							'products'       => $dataProducts,
							'productPage'    => $productPage,
							'commentPage'    => $commentPage,
							'maxProductPage' => $maxProductPage,
							'maxCommentPage' => $maxCommentPage,
							'visibleNext'    => $visibleNext,
							'visiblePrev'    => $visiblePrev,
							'sortByIdUp'     => $sortByIdUp,
							'sortByIdDown'   => $sortByIdDown,
							'sortByDateUp'   => $sortByDateUp,
							'sortByDateDown' => $sortByDateDown,
						]);
					}elseif($sortByDateUp){
						$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('date', 'ASC')->paginate(3,'group',$commentPage);
						return view('Home/index',[
							'comments'       => $dataComments,
							'products'       => $dataProducts,
							'productPage'    => $productPage,
							'commentPage'    => $commentPage,
							'maxProductPage' => $maxProductPage,
							'maxCommentPage' => $maxCommentPage,
							'visibleNext'    => $visibleNext,
							'visiblePrev'    => $visiblePrev,
							'sortByIdUp'     => $sortByIdUp,
							'sortByIdDown'   => $sortByIdDown,
							'sortByDateUp'   => $sortByDateUp,
							'sortByDateDown' => $sortByDateDown,
						]);
					}elseif($sortByDateDown){
						$dataComments['comments'] = $modelComment->where('productID',$productID)->orderBy('date', 'DESC')->paginate(3,'group',$commentPage);
						return view('Home/index',[
							'comments'       => $dataComments,
							'products'       => $dataProducts,
							'productPage'    => $productPage,
							'commentPage'    => $commentPage,
							'maxProductPage' => $maxProductPage,
							'maxCommentPage' => $maxCommentPage,
							'visibleNext'    => $visibleNext,
							'visiblePrev'    => $visiblePrev,
							'sortByIdUp'     => $sortByIdUp,
							'sortByIdDown'   => $sortByIdDown,
							'sortByDateUp'   => $sortByDateUp,
							'sortByDateDown' => $sortByDateDown,
						]);
					}
				}
			}else{
				return redirect()->to('http://localhost/');
			}
		}else{
			return redirect()->to('http://localhost/');
		}
	}
}
