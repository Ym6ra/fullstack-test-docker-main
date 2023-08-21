
<?php 
$sortByIdUp = true;
$sortByIdDown = false;
$sortByDateUp = false;
$sortByDateDown = false;

$sortByIdUpData = [$productPage,$commentPage,$sortByIdUp,$sortByIdDown,$sortByDateUp,$sortByDateDown];
$dataIdUp = json_encode($sortByIdUpData);
$urlDataIdUp= urlencode($dataIdUp);
$urlIdUp = 'http://localhost/' . $urlDataIdUp;

$sortByIdDownData = [$productPage,$commentPage,!$sortByIdUp,!$sortByIdDown,$sortByDateUp,$sortByDateDown];
$dataIdDown = json_encode($sortByIdDownData);
$urlDataIdDown= urlencode($dataIdDown);
$urlIdDown = 'http://localhost/' . $urlDataIdDown;

$sortByDateUpData = [$productPage,$commentPage,!$sortByIdUp,$sortByIdDown,!$sortByDateUp,$sortByDateDown];
$dataDateUp = json_encode($sortByDateUpData);
$urlDataDateUp= urlencode($dataDateUp);
$urlDateUp = 'http://localhost/' . $urlDataDateUp;

$sortByDateDownData = [$productPage,$commentPage,!$sortByIdUp,$sortByIdDown,$sortByDateUp,!$sortByDateDown];
$dataDateDown = json_encode($sortByDateDownData);
$urlDataDateDown= urlencode($dataDateDown);
$urlDateDown = 'http://localhost/' . $urlDataDateDown;
?>
<div class="container">
	<div class="row">
		<div class="col-12 col-lg-6">
			<?php 
				$nextProductPage = $productPage +1;
				$nextProductData = [$nextProductPage,$commentPage,$sortByIdUp,$sortByIdDown,$sortByDateUp,$sortByDateDown];
				$dataNext = json_encode($nextProductData);
				$urlDataNext= urlencode($dataNext);
				$urlNext = 'http://localhost/' . $urlDataNext;

				$prevProductPage = $productPage -1;
				$prevProductData = [$prevProductPage,$commentPage,$sortByIdUp,$sortByIdDown,$sortByDateUp,$sortByDateDown];
				$dataPrev = json_encode($prevProductPage);
				$urlDataPrev= urlencode($dataPrev);
				$urlPrev = 'http://localhost/' . $urlDataPrev;
			?>
			<div><img src ='<?php echo $products['products'][0]['src'];?>' width = '500px' heiht = '600px'></div>
			<div class="col-md-auto justify-content-md-center"><a href="<?php echo $urlPrev ?>"><button class="btn btn-dark">Назад</button></a>
			<a href="<?php echo $urlNext ?>"><button class="btn btn-dark">Вперед</button></a></div>
		</div>
		<div class="col-12 col-lg-6">
			<div>
				<table class="table table-bordered">
				<thead class="thead-dark">
					<th scope="col"><div>№</div>
					<div>
					<a href="<?php echo $urlIdUp ?>"><button class="btn btn-dark">↑</button></a></div>
					<a href="<?php echo $urlIdDown ?>"><button class="btn btn-dark">↓</button></a></div>
					</div>
					</th>
					<th scope="col">Почта</th>
					<th scope="col">Комментарий</th>
					<th scope="col">
						<div>Дата создания</div>
						<div>
					<a href="<?php echo $urlDateUp ?>"><button class="btn btn-dark">↑</button></a></div>
					<a href="<?php echo $urlDateDown ?>"><button class="btn btn-dark">↓</button></a></div>
					</div>
					</th>
					<th scope="col">Управление</th>
					</thead>
						<?php for($i = 0; $i<3; $i++){ ?>
							<?php if($comments['comments'][$i]) { 
								//$trid ="comment".(string)$i;?>
								<tr id="comment<?php echo $i ?>">
							<td scope="row"><?php echo $comments['comments'][$i]['id']; ?></td>
							<td scope="row"><?php echo $comments['comments'][$i]['name']; ?></td>
							<td scope="row"><?php echo $comments['comments'][$i]['text']; ?></td>
							<td scope="row"><?php echo $comments['comments'][$i]['date']; ?></td>
							<form id='deleteComment<?php echo $i ?>' method='post'>
								<input type='hidden' name='id<?php echo $i ?>' id='id<?php echo $i ?>' value='<?php echo $comments['comments'][$i]['id']; ?>'>
								<td><input type="submit" name="delet" value ='Удалить' class="btn btn-light" onclick="hideRow('<?php echo $i ?>')"></td>
							</form>
						 	</tr>
							<?php }}?>
				</table>
			</div>
			<div class="col-md-auto justify-content-md-center">
			<?php 
				$nextCommentPage = $commentPage +1;
				$nextCommentData = [$productPage,$nextCommentPage,$sortByIdUp,$sortByIdDown,$sortByDateUp,$sortByDateDown];
				$dataNext = json_encode($nextCommentData);
				$urlDataNext= urlencode($dataNext);
				$urlNext = 'http://localhost/' . $urlDataNext;
				$prevCommentPage = $commentPage -1;
				$prevCommentData = [$productPage,$prevCommentPage,$sortByIdUp,$sortByIdDown,$sortByDateUp,$sortByDateDown];
				$dataPrev = json_encode($prevCommentData);
				$urlDataPrev= urlencode($dataPrev);
				$urlPrev = 'http://localhost/' . $urlDataPrev;

			?>
				<?php if($visiblePrev){?>
				<a href="<?php echo $urlPrev ?>"><button class="btn btn-dark">Назад</button></a>
				<?php }?>
				<?php if($visibleNext){ ?>
				<a href="<?php echo $urlNext ?>"><button class="btn btn-dark">Вперед</button></a>
				<?php }?>
			</div>
			<div>
				<h3>Оставьте ваш комментарий</h3>
					<form id = 'createComent' method = 'post'>
						<?php $currentPage = [$productPage,$commentPage,$sortByIdUp,$sortByIdDown,$sortByDateUp,$sortByDateDown];
						$data = json_encode($currentPage);
						$urlData = urlencode($data);
						$url = 'http://localhost/' . $urlData;
						?>
						<input type="hidden" name='currentPage' id='currentPage' value='<?php echo $url?>'>
						<input type="hidden" name='productID' id='productID' value='<?php echo $productPage?>'>
						<table>
						<tr class = 'field'>
							<td>
								<label for="email">Почта</label>
								<input type="text" class="form-control" name="email" id="email" required placeholder = 'email@mail.ru'/>
							</td>
						</tr>
						<tr class = 'field'>
							<td>
								<label for="comment">Коммнетарий</label>
								<input type="text"  class="form-control" name="comment" id="comment" required />
							</td>
						</tr>
						<tr class = 'field'>
							<td>
								<label for="date">Дата</label>
								<input type="date" class="form-control" name="date" id="date" required />
							</td>
						</tr>
						<tr class = 'actions'>
							<td><input type="submit" class="btn btn-dark" name="create" id="create" value="Отправить" disabled="disabled"/></td>
						</tr>
					</table>
					</form>
			</div>
		</div>
	</div>
</div>
