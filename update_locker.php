<?php
session_start();
// Database Connection
include('includes/config.php');
// Validating Session
if(strlen($_SESSION['aid']) == 0) { 
    header('location:index.php');
} else { 
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $numero = $_POST['numero'];
        $andar = $_POST['andar'];
        $disponibilidade = $_POST['disponibilidade'];
        $pessoa = $_POST['pessoa'];

        // Atualizar os detalhes do locker no banco de dados
        $query = "UPDATE lockers SET numero = '$numero', andar = '$andar', disponibilidade = '$disponibilidade', pessoa = '$pessoa' WHERE id = '$id'";
        $result = mysqli_query($con, $query);

        if($result) {
            // Redirecionar de volta para a página de dashboard com uma mensagem de sucesso
            $_SESSION['msg'] = "Detalhes do locker atualizados com sucesso.";
            header('location:dashboard.php');
        } else {
            // Em caso de falha, redirecionar de volta para a página de dashboard com uma mensagem de erro
            $_SESSION['error'] = "Erro ao atualizar os detalhes do locker. Por favor, tente novamente.";
            header('location:dashboard.php');
        }
    } else {
        // Se o ID do locker não for fornecido, redirecionar de volta para a página de dashboard com uma mensagem de erro
        $_SESSION['error'] = "ID do locker não fornecido.";
        header('location:dashboard.php');
    }
}
?>
