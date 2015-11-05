$(document).ready(function(){
	/*$("#contDinamic").load("front/login.php", function(){
		accionarForm();
	});*/
	accionarForm();
	$(document).on("click", "#menu ul a", function(e){
		e.preventDefault();
		$("#menu").load("front/menuPrincipal.php");
		$("#contDinamic").load($(this).attr("href"), function(){
			accionarForm();
		});
	});
	$(document).on("click","#btnAccesar",function(e){
		e.preventDefault();
		$("#contDinamic").load($(this).attr("href"), function(){
			accionarForm();
		});
	});
});
$(document).on("click","#btnRegist",function(){
    $("#contDinamic").load("front/userRegist.php")
});
function accionarForm(){
	$("form").submit(function(e){
		e.preventDefault();
		var form= $(this);
		$.ajax({
			url: form.attr("action"),
			method: form.attr("method"),
			data: form.serialize(),
			cache: false,
			success: function(data){
				$("#contDinamic").html(data);
				$("#menu").load("front/menuPrincipal.php");
				accionarForm();
			}
		});
	});
}
