<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Telefonia</title>  

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/logo.png">
    <meta name="theme-color" content="#7952b3">

    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <main class="form-signin">
      <form action="?page=acesso" method="POST">
        <input type="hidden" name="acesso" value="acesso">

        <img class="mb-4" src="img/logo.png" alt="" width="250" height="250">

        <div class="col mt-5">
          <?php
              include('acesso.php');
          ?>
        </div>

        <div class="form-floating">
          <input type="email" class="form-control" id="Inputmatricula" name="email" placeholder="matricula">
          <label for="Inputmatricula">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="Inputsenha" name="senha" placeholder="senha">
          <label for="Inputsenha">Senha</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" name="entrar" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; Jânio Eugênio</p>
      </form>   
    </main>

  </body>
</html>
