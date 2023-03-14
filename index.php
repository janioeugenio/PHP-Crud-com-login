<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // Se não estiver logado, redireciona para a página de login
  echo "<script> window.location.replace('login.php'); </script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
  <link href="css/grafico.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/logo.png">

  <link rel="stylesheet" type="text/css" href="https://github.s3.amazonaws.com/downloads/lafeber/world-flags-sprite/flags32.css" />

  <title>Crud - Login</title>
</head>

<body class="w-100 mw-100 flex-column pt-0">
  <header class="w-100 ">
    <nav class="navbar navbar-expand-lg navbar navbar-dark " style="background-color: #0059d4;">

      <div class="container-fluid">

        <a class="navbar-brand mx-5" href="index.php">
          <img src="img/logo.png" alt="" width="50" height="50">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end  md-3" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-2" style="margin-right: 10%!important;">
            <li class="nav-item">
              <a class="nav-link text-white" aria-current="page" href="index.php">INÍCIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="?page=novo">CADASTRAR PRODUTO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="?page=listar">LISTAR PRODUTO</a>
            </li>

            <li class="nav-item dropdown">
              <?php print '<a class="nav-link dropdown-toggle mx-5 text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . strtoupper($_SESSION['nome']) . '</a>'; ?>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                <li><a class="dropdown-item" href="?page=exibeperfil">Meu perfil</a></li>
                <?php print "<li><button onclick=\"location.href='?page=editarusuario&id=" . $_SESSION['id'] . "'\" class='dropdown-item' >Editar Perfil</button></li>"; ?>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <form method="post">
                  <input class="dropdown-item" style="background-color: #00000000; border: none;" type="submit" name="logout" value="SAIR">
                </form>

              </ul>
            </li>

          </ul>

        </div>
      </div>
    </nav>

  </header>

  <div class="container">
    <div class="row">

      <div class="col mt-5">
        <?php

        include('config.php');

        switch (@$_REQUEST['page']) {
          case 'novo':
            include('novo-produto.php');
            break;

          case 'listar':
            include('listar-produtos.php');
            break;

          case 'salvar':
            include('crud-produtos.php');
            break;

          case 'editar':
            include('editar-produto.php');
            break;

          case 'excluir':
              include('excluir-produto.php');
              break;

          case 'pesquisa':
            include('pesquisa.php');
            break;

          case 'editarusuario':
            include('editar-usuario.php');
            break;

          case 'usuario':
            include('usuario.php');
            break;

          case 'exibeperfil':
            include('perfil-usuario.php');
            break;

          default:
            print '<h2>Bem Vindo - ' . strtoupper($_SESSION['nome']) . '</h2>';
        }

        if (isset($_POST['logout'])) {
          //Finaliza a sessão e redireciona para o login
          session_destroy();
          echo "<script> window.location.replace('login.php'); </script>";
          exit;
        }

        ?>
      </div>
    </div>
  </div>
  </div>

</body>

<footer class="border-top bg-secondary bottom-0 w-100 h-25 d-flex justify-content-center align-items-end" style='height: 50px!important; '>
  <p class="text-white">Feito por <a class="link text-white" target="_blank" href="https://github.com/janioeugenio">Jânio Eugênio</a></p>
</footer>

<!--Import do JS do bootstrap-->
<script src="js/bootstrap.bundle.min.js"></script>

</html>