<?php 
session_start();
// Database Connection
include('includes/config.php');
// Validating Session
if(strlen($_SESSION['aid']) == 0) { 
    header('location:index.php');
} else {
    if(isset($_POST['submit'])){
        $numero = $_POST['numero'];
        $andar = $_POST['andar'];
        $disponibilidade = $_POST['disponibilidade'];
        $pessoa = $_POST['pessoa'];

        // Corrigindo o nome da tabela na consulta SQL
        $query = mysqli_query($con,"INSERT INTO lockers(numero, andar, disponibilidade, pessoa) 
                                    VALUES('$numero','$andar','$disponibilidade','$pessoa')");
        if($query){
            echo "<script>alert('Locker added successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'manage-locker-form.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exxon | Add Locker</title>
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
    <!-- Main Sidebar Container -->
    <?php include_once("includes/sidebar.php");?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Locker</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Locker</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Fill the Info</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form name="locker" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="numero">Locker Number</label>
                                        <input type="text" class="form-control" id="numero" name="numero" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="andar">Floor</label>
                                        <input type="text" class="form-control" id="andar" name="andar" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="disponibilidade">Availability</label>
                                        <select class="form-control" id="disponibilidade" name="disponibilidade">
                                            <option value="SIM">SIM</option>
                                            <option value="NAO">NAO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pessoa">User</label>
                                        <input type="text" class="form-control" id="pessoa" name="pessoa" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include_once('includes/footer.php');?>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
