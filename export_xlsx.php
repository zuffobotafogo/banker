<?php
// Inclua o arquivo de configuração do banco de dados e outras dependências
include('includes/config.php');

// Inclua a biblioteca PHPSpreadsheet
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crie uma nova planilha
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Defina os cabeçalhos da planilha
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Coluna1');
$sheet->setCellValue('C1', 'Coluna2');
// Adicione mais cabeçalhos conforme necessário

// Consulta para obter os dados da tabela
$query = "SELECT * FROM exported_data";
$result = mysqli_query($con, $query);

// Preencha os dados da tabela na planilha
$i = 2;
while ($row = mysqli_fetch_array($result)) {
    $sheet->setCellValue('A' . $i, $row['id']);
    $sheet->setCellValue('B' . $i, $row['coluna1']);
    $sheet->setCellValue('C' . $i, $row['coluna2']);
    // Adicione mais células conforme necessário
    $i++;
}

// Defina o tipo de arquivo e o nome do arquivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="dados_tabela.xlsx"');
header('Cache-Control: max-age=0');

// Crie um escritor para XLSX e saída
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Feche a conexão com o banco de dados
mysqli_close($con);
?>
