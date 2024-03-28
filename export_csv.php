<?php
// Inclua o arquivo de configuração do banco de dados e outras dependências
include('includes/config.php');
$query = "SELECT * FROM exported_data";
$result = mysqli_query($con, $query);


// Defina o tipo de arquivo e o nome do arquivo
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="dados_tabela.csv"');

// Abra a saída do arquivo para escrever
$file = fopen('php://output', 'w');

// Consulta para obter os dados da tabela
$query = "SELECT * FROM exported_data";
$result = mysqli_query($con, $query);

// Escreva os cabeçalhos CSV
fputcsv($file, array('ID', 'Coluna1', 'Coluna2')); // Adicione mais cabeçalhos conforme necessário

// Escreva os dados da tabela no arquivo CSV
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($file, $row);
}

// Feche o arquivo
fclose($file);

// Feche a conexão com o banco de dados
mysqli_close($con);
?>
