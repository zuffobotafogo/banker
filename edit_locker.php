<?php
include('includes/config.php');

if(isset($_GET['id'])) {
    $lockerId = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM lockers WHERE id = '$lockerId'");
    $row = mysqli_fetch_assoc($query);

    // Formulário de edição do locker
    echo '<form action="update_locker.php" method="post">';
    echo '<input type="hidden" name="id" value="'.$lockerId.'">';
    echo 'Número: <input type="text" name="numero" value="'.$row['numero'].'"><br>';
    echo 'Andar: <input type="text" name="andar" value="'.$row['andar'].'"><br>';
    echo 'Disponibilidade: <input type="text" name="disponibilidade" value="'.$row['disponibilidade'].'"><br>';
    echo 'Pessoa: <input type="text" name="pessoa" value="'.$row['pessoa'].'"><br>';
    echo '<input type="submit" value="Salvar">';
    echo '</form>';
}
?>
