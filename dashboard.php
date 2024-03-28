<?php 
session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0) { 
    header('location:index.php');
} else { 
  // Code for Update  Sub Admin Details
if(isset($_POST['update'])){
  $lockersize=$_POST['lockersize'];
  $lockerprice=$_POST['lockerprice'];
  $ltid=intval($_GET['ltid']);
  $query=mysqli_query($con,"update tbllockertype set SizeofLocker='$lockersize',Priceoflocker='$lockerprice' where ID='$ltid'");
  if($query){
  echo "<script>alert('Locker type updated successfully.');</script>";
  echo "<script type='text/javascript'> document.location = 'manage-lockertype.php'; </script>";
  } else {
  echo "<script>alert('Something went wron. Please try again.');</script>";
  }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exxon | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- Coluna para listar os lockers -->
          <div class="col-lg-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Lockers</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <!-- Adicione um ID à tabela -->
                <table id="lockers-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Número</th>
                      <th>Andar</th>
                      <th>Disponibilidade</th>
                      <th>Pessoa</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $query_lockers = mysqli_query($con, "SELECT * FROM lockers");
                    if(mysqli_num_rows($query_lockers) > 0) {
                      while($row = mysqli_fetch_assoc($query_lockers)) {
                        echo "<tr>";
                        echo "<td>".$row['numero']."</td>";
                        echo "<td>".$row['andar']."</td>";
                        echo "<td>".($row['disponibilidade'] == 1 ? 'SIM' : 'NÃO')."</td>";
                        echo "<td>".$row['pessoa']."</td>";
                        echo "<td><a href='.php?id=".$row['id']."' class='btn btn-primary'>Editar</a></td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan='5'>Nenhum locker encontrado</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php include_once('includes/footer.php');?>
</div><!-- ./wrapper -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>

<!-- Função para atualizar a tabela via AJAX -->
<script>
function updateTable() {
    $.ajax({
        url: 'update_table.php', // Arquivo PHP para atualizar a tabela
        method: 'GET',
        success: function(response) {
            $('#lockers-table').html(response); // Atualize o conteúdo da tabela
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

// Chame a função de atualização da tabela após a atualização bem-sucedida do locker
// Por exemplo, após atualizar o locker com sucesso, chame updateTable();
</script>

</body>
</html>
<?php } ?>
