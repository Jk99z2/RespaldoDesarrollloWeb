<?php
	include ('../layouts/main.php');
    head();
?>

<div class="container">
	<div class="card mt-5 w-50 mx-auto">
		<div class="card-body">
			<form action="" id="login-form">

				<!--Div de email-->
				<div class="form-group mt-3">
					<label for="email">Usuario</label>
					<input type="email" class="form-control" id="email" placeholder="ejemplo@ejemplo.com" required>
				</div>
				<!--Div email end-->

				<!--Div contra-->
				<div class="form-group mt-3">
					<label for="password">Contraseña</label>
					<input type="password" class="form-control" id="password" name="password" required>
				</div>
				<!--Div contra end-->

				<!--Boton que envia el login-->
				<small class="form-text text-danger d-none md-2">Datos incorrectos</small>
				<center>
					<button type="button" class="btn btn-success mt-3" type="submit">
					<i class="bi bi-box-arrow-in-right"></i> Ingresar 
					</button>
				</center>	
				<!--Boton que envia el login end-->

			</form>
		</div><!--Card body-->
	</div><!--Contenedor de tipo card-->
</div><!--Contenedor principal-->

<?php scripts(); ?>
<script type="text/javascript">
	$(function(){
		const lf = $("#login-form");
		lf.on("submit",function(e){
			e.preventDefault();
			e.stopPropagation();
			const data = newFormData();
			data.append["email", $("#email").val()];
			data.append["password", $("#password").val()];
			data.append["_login",""];
			fetch(app.routes.login,{
				method:"POST",
				body: datos
			})
			.then(resp => response.json())
			.then(resp=>{
				//........Procesar respuesta de inicio de sesión
			}).catch(err=>console.error("Error"+ err));
		});
	});
</script>

<?php
    foot();