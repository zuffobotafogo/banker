<?php
// Inclua o arquivo de configuração do banco de dados e outras dependências
include('includes/config.php');

// Importe a classe TCPDF
require_once('tcpdf/tcpdf.php');

// Crie uma nova instância do TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Defina informações do documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Dados da Tabela em PDF');
$pdf->SetSubject('Exportação de Dados');
$pdf->SetKeywords('PDF, Exportação, Tabela');

// Defina margens
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Defina o modo de fonte padrão
$pdf->SetFont('helvetica', '', 11);

// Adicione uma página
$pdf->AddPage();

// Consulta para obter os dados da tabela
$query = "SELECT * FROM exported_data";
$result = mysqli_query($con, $query);

// Crie uma tabela para exibir os dados
$html = '<table border="1">
            <tr>
                <th>ID</th>
                <th>Coluna1</th>
                <th>Coluna2</th>
                <!-- Adicione mais colunas conforme necessário -->
            </tr>';
while ($row = mysqli_fetch_array($result)) {
    $html .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['coluna1'] . '</td>
                <td>' . $row['coluna2'] . '</td>
                <!-- Adicione mais células conforme necessário -->
            </tr>';
}
$html .= '</table>';

// Adicione o conteúdo da tabela ao PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Saída do PDF (nome do arquivo)
$pdf->Output('dados_tabela.pdf', 'I');

// Feche a conexão com o banco de dados
mysqli_close($con);
?>
