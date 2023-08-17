
<?php 
//$deletID = 4;
//	function setID($id){
//		$deletID = $id;
//	}?>
<div class="container">
	<div class="row">
		<div class="col-12 col-lg-6">
			<?php 
				$nextProductPage = $productPage +1;
				$nextProductData = [$nextProductPage,$commentPage];
				$dataNext = json_encode($nextProductData);
				$urlDataNext= urlencode($dataNext);
				$urlNext = 'http://localhost/' . $urlDataNext;

				$prevProductPage = $productPage -1;
				$prevProductData = [$prevProductPage,$commentPage];
				$dataPrev = json_encode($prevProductPage);
				$urlDataPrev= urlencode($dataPrev);
				$urlPrev = 'http://localhost/' . $urlDataPrev;
			?>
			<div><img src ='<?php echo $products['products'][0]['src'];?>' width = '500px' heiht = '600px'></div>
			<div class="col-md-auto justify-content-md-center"><a href="<?php echo $urlPrev ?>"><button class="btn btn-light">Назад</button></a>
			<a href="<?php echo $urlNext ?>"><button class="btn btn-light">Вперед</button></a></div>
		</div>
		<div class="col-12 col-lg-6">
			<div>
				<table class="table table-bordered">
				<thead class="thead-dark">
					<th scope="col">Почта</th>
					<th scope="col">Комментарий</th>
					<th scope="col">Дата создания</th>
					<th scope="col">Управление</th>
					</thead>
						<?php for($i = 0; $i<3; $i++){ ?>
							<?php if($comments['comments'][$i]) { 
								$trid ="comment".(string)$i;?>
								<tr id="comment<?php echo $i ?>">
							<td scope="row"><?php echo $comments['comments'][$i]['name']; ?></td>
							<td scope="row"><?php echo $comments['comments'][$i]['text']; ?></td>
							<td scope="row"><?php echo $comments['comments'][$i]['date']; ?></td>
							<form id='deleteComment<?php echo $i ?>' method='post'>
								<input type='hidden' name='id' id='id' value='<?php echo $comments['comments'][$i]['id']; ?>'>
								<td><input type="submit" name="delet" value ='Удалить' class="btn btn-light" onclick="hideRow('<?php echo $trid ?>')"></td>
							</form>
						 	</tr>
							<?php }}?>
				</table>
			</div>
			<div class="col-md-auto justify-content-md-center">
			<?php 
				$nextCommentPage = $commentPage +1;
				$nextCommentData = [$productPage,$nextCommentPage];
				$dataNext = json_encode($nextCommentData);
				$urlDataNext= urlencode($dataNext);
				$urlNext = 'http://localhost/' . $urlDataNext;
				$prevCommentPage = $commentPage -1;
				$prevCommentData = [$productPage,$prevCommentPage];
				$dataPrev = json_encode($prevCommentData);
				$urlDataPrev= urlencode($dataPrev);
				$urlPrev = 'http://localhost/' . $urlDataPrev;

			?>
				<?php if($visiblePrev){?>
				<a href="<?php echo $urlPrev ?>"><button class="btn btn-light">Назад</button></a>
				<?php }?>
				<?php if($visibleNext){ ?>
				<a href="<?php echo $urlNext ?>"><button class="btn btn-light">Вперед</button></a>
				<?php }?>
			</div>
			<div>
				<h3>Оставьте ваш комментарий</h3>
					<form id = 'createComent' method = 'post'>
						<?php $currentPage = [$productPage,$commentPage];
						$data = json_encode($currentPage);
						$urlData = urlencode($data);
						$url = 'http://localhost/' . $urlData;
						?>
						<input type="hidden" name='currentPage' id='currentPage' value='<?php echo $url?>'>
						<input type="hidden" name='productID' id='productID' value='<?php echo $productPage?>'>
						<table>
						<tr>
							<td>Email</td>
							<td><input type="text" class="form-control" name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder = 'email@mail.ru'/></td>
						</tr>
						<tr>
							<td>Comment</td>
							<td><input type="text"  class="form-control" name="comment" id="comment" required /></td>
						</tr>
						<tr>
							<td>Date</td>
							<td><input type="date" class="form-control" name="date" id="date" required /></td>
						</tr>
						<tr>
							<td><input type="submit" class="btn btn-light" name="create" id="create" value="create" /></td>
						</tr>
					</table>
					</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(
	function() {
		$("#createComent").submit(function(e) {
			e.preventDefault();
			var currentPage = $('#currentPage').val();
			var email = $('#email').val();
			var text = $('#comment').val();
			var date = $('#date').val();
			var productID = $('#productID').val();
			$.ajax({
				url: "Comment/add",
				type: "POST",
				data: {
					currentPage: currentPage,
					email: email,
					text: text,
					date: date,
					productID: productID,
					},
				dataType: "json",
				success: function(response) {
					// обрабатываем успешный ответ от сервера
					console.log(response);
				},
				error: function(xhr, status, error) {
					// обрабатываем ошибку
					console.log(xhr.responseText);
				}
			})
		})
	}
);
$(document).ready(function() {
		for(var i = 0; i<3 ; i++){
			var buttonid = '#deleteComment'+i;
			$(buttonid).submit(function(e) {
			e.preventDefault();
			var id = $('#id').val();
			$.ajax({
				url: "Comment/delete",
				type: "POST",
				data: {
					id: id,
					},
				dataType: "json",
				success: function(response) {
					// обрабатываем успешный ответ от сервера
					console.log(response);
				},
				error: function(xhr, status, error) {
					// обрабатываем ошибку
					console.log(xhr.responseText);
				}
			})
		})
		}
	}
);
function hideRow(id) {
	var row = document.getElementById(id);
  row.style.display = "none";
  }
$(document).ready(function () {
    $("#date").inputmask({"mask": "*{3,20}@*{3,20}.*{2,7}"});
});
</script>