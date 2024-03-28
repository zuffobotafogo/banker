<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Locker | BLMS</title>

  <!-- Links para os estilos CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('includes/navbar.php');?>
  <!-- Main Sidebar Container -->
  <?php include_once('includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar Locker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Editar Locker</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Formulário de edição do locker -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <!-- Formulário de edição do locker será carregado aqui -->
                <?php
                include('includes/config.php');
                if(isset($_GET['id'])) {
                  $lockerId = $_GET['id'];
                  $query = mysqli_query($con, "SELECT * FROM lockers WHERE id = '$lockerId'");
                  $row = mysqli_fetch_assoc($query);
                  ?>
                  <form action="update_locker.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $lockerId; ?>">
                    Número: <input type="text" name="numero" value="<?php echo $row['numero']; ?>"><br>
                    Andar: <input type="text" name="andar" value="<?php echo $row['andar']; ?>"><br>
                    Disponibilidade: <input type="text" name="disponibilidade" value="<?php echo $row['disponibilidade']; ?>"><br>
                    Pessoa: <input type="text" name="pessoa" value="<?php echo $row['pessoa']; ?>"><br>
                    <input type="submit" value="Salvar">
                  </form>
                  <?php
                }
                ?>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php include_once('includes/footer.php');?>
</div><!-- ./wrapper -->

<!-- Links para os scripts JavaScript -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
