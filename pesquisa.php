<div>
  <h1>Resultado da pesquisa</h1>

  <form method="post" action="?page=pesquisa">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Pesquisar..." name="pesquisa">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">Buscar</button>
      </div>
    </div>
  </form>

</div>

<?php

if (isset($_POST['pesquisa'])) {

  $pesquisa = mysqli_real_escape_string($conn, $_POST['pesquisa']);

  $sql = "SELECT * FROM tabela_telecom WHERE DDD LIKE '{$pesquisa}%' 
                          OR Numeracao_Equatorial_Telecom LIKE '{$pesquisa}%'  
                          OR Numeracao_Ramal LIKE '{$pesquisa}%'
                          OR Tipo LIKE '{$pesquisa}%'  
                          OR Utilizacao LIKE '{$pesquisa}%'
                          OR Modulo LIKE '{$pesquisa}%'  
                          OR Status LIKE '{$pesquisa}%'
                          OR Mascara LIKE '{$pesquisa}%'
                          OR Area LIKE '{$pesquisa}%'";

  $res = $conn->query($sql);

  $qdt = $res->num_rows;

  if ($qdt > 0) {

    print "<div class='table-responsive'>";
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<tr class='table-dark'>";
    print "<th>DDD</th>";
    print "<th>NUM TELECOM</th>";
    print "<th>NUM RAMAL</th>";
    print "<th>TIPO</th>";
    print "<th>UTILIZAÇÃO</th>";
    print "<th>MÓDULO</th>";
    print "<th>STATUS</th>";
    print "<th>MÁSCARA</th>";
    print "<th>ÁREA</th>";
    print "<th>EDITAR</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
      print "<tr>";
      print "<td>" . $row->DDD . "</td>";
      print "<td>" . $row->Numeracao_Equatorial_Telecom . "</td>";
      print "<td>" . $row->Numeracao_Ramal . "</td>";
      print "<td>" . $row->Tipo . "</td>";
      print "<td>" . $row->Utilizacao . "</td>";
      print "<td>" . $row->Modulo . "</td>";
      print "<td>" . $row->Status . "</td>";
      print "<td>" . $row->Mascara . "</td>";
      print "<td>" . $row->Area . "</td>";
      print "<td>
              <button onclick=\"location.href='?page=editar&id=" . $row->id . "'\" class='btn btn-success' >Editar</button>
           </td>";
      print "</tr>";
    }

    print "</table>";
    print "</div>";
  } else {
    print "<p class='alert alert-danger'>Sua lista está vazia!</p>";
  }

  mysqli_close($conn);
}
?>