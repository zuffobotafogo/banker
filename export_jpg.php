<?php
// Inclua o arquivo de configuração do banco de dados e outras dependências
include('includes/config.php');

// Consulta para obter os dados da tabela
$query = "SELECT * FROM exported_data";
$result = mysqli_query($con, $query);

// Crie uma imagem em branco
$image = imagecreatetruecolor(800, 600);

// Preencha o fundo com uma cor
$background_color = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $background_color);

// Defina as cores para o texto
$text_color = imagecolorallocate($image, 0, 0, 0);

// Defina a fonte e o tamanho do texto
$font = 'arial.ttf';
$font_size = 16;

// Defina a posição inicial para desenhar o texto
$x = 10;
$y = 30;

// Desenhe os cabeçalhos da tabela
imagettftext($image, $font_size, 0, $x, $y, $text_color, $font, 'ID   Coluna1   Coluna2');
$y += 20; // Aumente a posição y para desenhar os dados da tabela abaixo dos cabeçalhos

// Desenhe os dados da tabela na imagem
while ($row = mysqli_fetch_assoc($result)) {
    $data = $row['id'] . '   ' . $row['coluna1'] . '   ' . $row['coluna2'];
    imagettftext($image, $font_size, 0, $x, $y, $text_color, $font, $data);
    $y += 20; // Aumente a posição y para desenhar os próximos dados abaixo dos anteriores
}

// Defina o tipo de arquivo e o nome do arquivo
header('Content-Type: image/jpeg');
header('Content-Disposition: attachment;filename="dados_tabela.jpg"');

// Saída da imagem como JPEG
imagejpeg($image);

// Libere a memória utilizada para a imagem
imagedestroy($image);

// Feche a conexão com o banco de dados
mysqli_close($con);
?>
 
