<?php namespace Vista;
ob_start();
session_start();
$template = new Template();
    
class Template{
  public function __construct(){
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mesa de Partes Online GRJ</title>
  <!-- Latest compiled and minified CSS -->
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Merriweather:300,400,400i|Montserrat:400,700|Roboto+Slab:300,400" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="<?php echo URL; ?>Vista/template/img/favicon.ico"/>
  <link href="<?php echo URL; ?>Vista/template/css/estilos.css" rel="stylesheet">
  <link href="<?php echo URL; ?>Vista/template/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet">
  <!-- Bootstrap 3.3.4 -->
  <link href="<?php echo URL; ?>Vista/template/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= URL; ?>Vista/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= URL; ?>Vista/template/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= URL; ?>Vista/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?= URL; ?>Vista/template/css.css" rel="stylesheet">
  <script src="<?= URL; ?>Vista/template/bootstrap4/js/bootstrap.min.js"></script>
  <script src="<?= URL; ?>Vista/template/jquery-3.4.1.min.js"></script>
  <script src="https://checkout.culqi.com/js/v3"></script>
  <script src="<?php echo URL; ?>Vista/template/js/jquery/jquery-1.8.2.min.js"></script>
  <script src="<?php echo URL; ?>Vista/template/js/jquery/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
  <script src="<?php echo URL; ?>Vista/template/js/jquery-validation-1.10.0/jquery.metadata.js" type="text/javascript"></script>
  <script src="<?php echo URL; ?>Vista/template/js/jquery-validation-1.10.0/jquery.validate.min.js" type="text/javascript"></script>
  <script src="<?php echo URL; ?>Vista/template/js/jquery-validation-1.10.0/localization/messages_es.js" type="text/javascript"></script>
  <!-- Latest compiled Fontawesome-->
  <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
</head>
<body id="page-top">
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar header">
          <?php include("header/header.php");?>
          <ul class="navbar-nav ml-auto">
          </nav> 
</div>
<!-- content -->
<div class="bg-gradient-light">
  <div class="row justify-content-center">   
        <?php 
    }
    public function __destruct(){
      include("footer/footer.php");
?>
    </div>
  </div>
  <script src="<?= URL; ?>Vista/template/miscript.js"></script>
  <script src="<?= URL; ?>Vista/template/vendor/jquery/jquery.min.js"></script>
  <script src="<?= URL; ?>Vista/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= URL; ?>Vista/template/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= URL; ?>Vista/template/js/sb-admin-2.min.js"></script>
  <script src="<?= URL; ?>Vista/template/vendor/chart.js/Chart.min.js"></script>
  <script src="<?= URL; ?>Vista/template/js/demo/chart-area-demo.js"></script>
  <script src="<?= URL; ?>Vista/template/js/demo/chart-pie-demo.js"></script>
  <script src="<?= URL; ?>Vista/template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= URL; ?>Vista/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= URL; ?>Vista/template/js/demo/datatables-demo.js"></script>
</body>
</html>
<?php }
}?>