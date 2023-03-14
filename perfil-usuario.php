<h1>Meu Perfil</h1>

<form action="?page=usuario" class="mt-5" method="POST">

	<div class="mb-3">
		<label>Nome</label>
		<h3 class="ms-3"><?php echo $_SESSION['nome'] ?></h3>
	</div>

	<div class="mb-5 ">
		<label>Email</label>
		<h3 class="ms-3"><?php echo $_SESSION['email'] ?></h3>
	</div>

</form>