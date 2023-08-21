$(document).ready(function(){
	$('.field input').on('mouseout', function() {
		let empty = false;
	
		$('.field input').each(function() {
		  empty = $(this).val().length == 0;
		  console.log(empty);
		});
	
		if (empty)
		  $('.actions input').attr('disabled', 'disabled');
		else
		  $('.actions input').attr('disabled', false);
	  });
});
$(document).ready( function() {
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
					console.log(response);
					// обрабатываем успешный ответ от сервера
					if (response.success === true) {
                        $(document).ajaxStop(function() { location.reload(true); });
                    }
				},
				error: function(xhr, status, error) {
					// обрабатываем ошибку
					console.log(xhr.responseText);
				}
			})
		})
	}
);
function hideRow(i) {
	var id = 'comment'+i;
	var row = document.getElementById(id);
    	row.classList.add("hiden");
	var buttonid = '#deleteComment'+i;
	var idInp = '#id'+i;
	$(buttonid).submit(function(e) {
		e.preventDefault();
		console.log(buttonid);
		var id = $(idInp).val();
		console.log(id);
		//console.log(id);
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
					const comment0 = document.querySelector('#comment0');
					const comment1 = document.querySelector('#comment1');
					const comment2 = document.querySelector('#comment2');
					var hidden0 = comment0.classList.contains("hiden");
					var hidden1 = comment1.classList.contains("hiden");
					var hidden2 = comment2.classList.contains("hiden");
				
					if(comment0 && hidden0){
						//console.log('1 скрыт');
						if(comment1 && hidden1){
							//console.log('2 скрыт');
							if(comment2 && hidden2){
								//console.log('3 скрыт');
								$(document).ajaxStop(function() { location.reload(true); });
							}
						}
					}
			},
			error: function(xhr, status, error) {
				// обрабатываем ошибку
				console.log(xhr.responseText);
				console.log(status.responseText);
				console.log(error.responseText);
			}
		})})
};


    


            
       


