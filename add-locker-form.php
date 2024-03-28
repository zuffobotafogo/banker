<?php 
session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0) { 
    header('location:index.php');
} else {
    if(isset($_POST['submit'])){
        $numero=$_POST['numero'];
        $andar=$_POST['andar'];
        $tamanho=$_POST['tamanho'];
        $disponibilidade=$_POST['disponibilidade'];
        $pessoa=$_POST['pessoa'];

        $query=mysqli_query($con,"INSERT INTO tbllockertype(numero, andar, tamanho, disponibilidade, pessoa) 
                                   VALUES('$numero','$andar','$tamanho','$disponibilidade','$pessoa')");
        if($query){
            echo "<script>alert('Registro adicionado com sucesso.');</script>";
            echo "<script type='text/javascript'> document.location = 'add-locker-form.php'; </script>";
        } else {
            echo "<script>alert('Ocorreu um erro. Por favor, tente novamente.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exxon | Add Locker Form</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->
  <?php include_once("includes/sidebar.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Locker Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Locker Form</li>
              <li class="breadcrumb-item"><a href="manage-locker-type.php">Manage Locker Type</a></li> <!-- Added link to Manage Locker Type -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Seu formulário de adição de armários aqui -->
        <form method="post" action="manage-locker.php">
            <!-- Campos do formulário -->
            <input type="text" name="numero" placeholder="Número do armário" required><br>
            <input type="text" name="andar" placeholder="Andar" required><br>
            <input type="text" name="disponibilidade" placeholder="Disponibilidade" required><br>
            <input type="text" name="pessoa" placeholder="Usuário" required><br>
            <!-- Botão de envio -->
            <button type="submit" name="submit">Adicionar Locker</button>
        </form>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once('includes/footer.php');?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
