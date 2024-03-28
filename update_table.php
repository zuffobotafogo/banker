<?php
// Inclua a configuração do banco de dados
include('includes/config.php');

// Consulta para buscar os dados atualizados da tabela lockers
$query = mysqli_query($con, "SELECT * FROM lockers");

// Construa o HTML da tabela com os dados atualizados
$table_html = '<tr><th>ID</th><th>Número</th><th>Andar</th><th>Disponibilidade</th><th>Pessoa</th></tr>';
while ($row = mysqli_fetch_assoc($query)) {
    $table_html .= "<tr><td>{$row['id']}</td><td>{$row['numero']}</td><td>{$row['andar']}</td><td>{$row['disponibilidade']}</td><td>{$row['pessoa']}</td></tr>";
}

// Retorne o HTML da tabela
echo $table_html;
?>