<?php
    
     include "config/routes.php";
    $server=new Routes;
    
    //Modelo
    include("view/sections/errors.php");
    include("config/conection-mysql.php");
    
    include("model/mysql.class.php");

    //Base de datos
    include("controller/controller.select.class.php");
    include("controller/controller.insert.class.php");
    include("controller/controller.update.class.php");
    include("controller/controller.delete.class.php");
    include("controller/controller.mail.class.php");
    include("controller/controller.logon.class.php");
    include("controller/controller.encrypt.class.php");
    include("controller/controller.reports.class.php");

    include_once 'includes/lib/PHPExcel/PHPExcel.php';

    //Secciones
    include("controller/controller.sections.class.php");

    //Handler HTML
    include("handlers/html.handler.class.php");

    include("controller/controller.upload.class.php");

    //Librerias

    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'includes/lib/PHPMailer/Exception.php';
    require 'includes/lib/PHPMailer/PHPMailer.php';
    require 'includes/lib/PHPMailer/SMTP.php';
    //Globals

    $sections = new sections;
    $upload = new upload;
    $report = new report;
    $logon = new logon;

    $encrypt = new encrypt;


    $mailer = new PHPMailer;
    $mail = new correo;

    //Globals Base de datos
    $insert=new insert;
    $update=new update;
    $select=new select;
    $call=new call;
    $delete=new delete;

    //Globals Controller
    $controllerInsert   = new insertClass;
    $controllerSelect   = new selectClass;
    $controllerUpdate   = new updateClass;
    $controllerDelete   = new deleteClass;
    
    
    $html     =new handler;


    ?>