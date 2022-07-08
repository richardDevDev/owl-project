<?php

/**
* 
*/
class sections
{
  
  function css16(){
  global $server;
      echo "
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."/app/includes/css/fonts/fonts.css'>
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/bootstrap/bootstrap.css'>
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/custom/styles.css'>
      ";
    }
  function css(){
  global $server;
      echo "
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/fonts/fonts.css'>
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/bootstrap/bootstrap4.1.css'>
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/bootstrap/toggle.css'>
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/custom/styles.css'>
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/sweetalert2/sweetalert2.css'>
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/animsition/animsition.css'>
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/custom/custom.css'>
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/tags/bootstrap-tagsinput.css'>
      ";
    }
    function cssJkeyboard(){
      global $server;
      echo "
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/jkeyboard/jkeyboard.css'>
      ";
    }

     function cssDatetime(){
      global $server;
      echo "
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/datetime/bootstrap-datepicker.css'>
      ";
    }

    function login(){
      global $server;
      echo "
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/custom/login.css'>
      ";
    }
    function tableSorterCSS(){
      global $server;
      echo "
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/table-sorter/jquery-ui.css'>
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/table-sorter/theme.dropbox.css'>

      ";
    }

    function js(){
      global $server;
      echo "
        <script src='".$server->dirServer()."app/includes/js/jquery/jquery-3.2.1.min.js'></script>
        <script src='".$server->dirServer()."app/includes/js/bootstrap/popper.js'></script>
        <script src='".$server->dirServer()."app/includes/js/bootstrap/bootstrap.js'></script>
        <script src='".$server->dirServer()."app/includes/js/bootstrap/toggle.js'></script>
        <script src='".$server->dirServer()."app/includes/js/sweetalert2/sweetalert2.js'></script>
        <script src='".$server->dirServer()."app/includes/js/animsition/animsition.js'></script>
        <script src='".$server->dirServer()."app/includes/js/tags/bootstrap-tagsinput.js'></script>
      ";
    }
    function jsLogin(){
      global $server;
      echo "
        <script src='".$server->dirServer()."app/includes/js/custom/login.js'></script>
        <script src='".$server->dirServer()."app/includes/js/md5/md5.js'></script>
      ";
    }

    function jsMD5(){
      global $server;
      echo "
        <script src='".$server->dirServer()."app/includes/js/md5/md5.js'></script>
      ";
    }

    function jsTimer(){
      global $server;
      echo "
        <script src='".$server->dirServer()."app/includes/js/jqueryTimer/timer.js'></script>
      ";
    }

    function jsTesseract(){
      global $server;
      echo "
        <script src='".$server->dirServer()."app/includes/js/tesseract/modernizr.min.js'></script>
        <script src='".$server->dirServer()."app/includes/js/tesseract/jquery.Jcrop.js'></script>
        <script src='".$server->dirServer()."app/includes/js/tesseract/glfx.min.js'></script>
        <script src='".$server->dirServer()."app/includes/js/tesseract/tesseract.min.js'></script>
      ";
    }
    function jsCharts(){
      global $server;
      echo "<script src='".$server->dirServer()."app/includes/js/jsCharts/charts.js'></script>";
    }

     function jsFileSaver(){
      global $server;
      echo "
        <script src='".$server->dirServer()."app/includes/js/fileSaver/FileSaver.min.js'></script>
      ";
    }

    function jsJkeyboard(){
      global $server;
      echo "
        <script src='".$server->dirServer()."app/includes/js/jkeyboard/jkeyboard.js'></script>
      ";
    }

    function jsSistema(){
      global $server;
      echo "
        <script src='".$server->dirServer()."app/includes/js/custom/functions.js'></script>
        <script src='".$server->dirServer()."app/includes/js/custom/validacion.js'></script>
      ";
    }

    function jsDatetime(){
      global $server;
      echo "
        <script src='".$server->dirServer()."app/includes/js/datetime/bootstrap-datepicker.js'></script>
        <script src='".$server->dirServer()."app/includes/js/datetime/bootstrap-datepicker.es.min.js'></script>
      ";
    }

    function tableSorterJS(){
      global $server;
      echo "
        <script src='".$server->dirServer()."app/includes/js/table-sorter/jquery-ui.js'></script>
        <script src='".$server->dirServer()."app/includes/js/table-sorter/jquery.tablesorter.min.js'></script>
        <script src='".$server->dirServer()."app/includes/js/table-sorter/jquery.tablesorter.widgets.js'></script>
      ";
      
    }

    function summernote(){
      global $server;
      echo "
      <link rel='stylesheet' type='text/css' href='".$server->dirServer()."app/includes/css/summernote/summernote.css'>
      <script src='".$server->dirServer()."app/includes/js/summernote/summernote.js'></script>
      ";
    }

    function menu(){
      global $server;
      include($_SERVER['DOCUMENT_ROOT']."".$server->dirSections()."/app/view/sections/menu.php");
    }

    function products(){
      global $server;
      include($_SERVER['DOCUMENT_ROOT']."".$server->dirSections()."app/view/index/products.php");
    }

    function panelCompra(){
      global $server;
      include($_SERVER['DOCUMENT_ROOT']."".$server->dirSections()."app/view/index/panelCompra.php");
    }

     function panelCompraVertical(){
      global $server;
      include($_SERVER['DOCUMENT_ROOT']."".$server->dirSections()."app/view/index/panelCompraVertical.php");
    }
    

    function venta(){
      global $server;
      include($_SERVER['DOCUMENT_ROOT']."".$server->dirSections()."app/view/index/venta.php");
    }

    function support(){
      global $server;
      include($_SERVER['DOCUMENT_ROOT']."".$server->dirSections()."app/view/index/support.php");
    }



    function footer(){
      include($_SERVER['DOCUMENT_ROOT']."".$server->dirSections()."app/view/index/footer.php");
    }

    function tags(){
      global $server;
      include($_SERVER['DOCUMENT_ROOT']."".$server->dirSections()."app/view/index/tags.php");
    }

    function incidencias(){
      global $server;
      include($_SERVER['DOCUMENT_ROOT']."".$server->dirSections()."app/view/sections/incidencias.php");
    }

    
    

}
?>