<?php
/**
  * 
  */
  class includes
  {
    function _include(){
      include_once "app/config/conection.php";
      include_once "app/model/mysql.class.php";
      include_once "app/model/model.class.php";
      include_once "app/controller/controller.post.class.php";
    }

    function _includePHP(){
      include "../../config/conection.php";
      include "../../model/mysql.class.php";
      include "../../model/model.class.php";
      include "../../controller/controller.add.class.php";
      include "../../controller/controller.post.class.php";
      include "../handler/html.handler.class.php";
      //include "../handler/ajax.handler.class.php";
    }

    function _includeCMS(){
      include_once "../app/config/conection.php";
      include_once "../app/model/mysql.class.php";
      include_once "../app/model/model.class.php";
      include "../app/controller/controller.post.class.php";
      //include "../handler/ajax.handler.class.php";
    }
  	
  	function css(){
  		$css="
  		<link rel='stylesheet' type='text/css' href='app/view/default/css/bootstrap.css'>
      <link rel='stylesheet' type='text/css' href='app/view/default/css/styles.css'>
      <link rel='stylesheet' type='text/css' href='app/view/default/css/lib/theme.dropbox.css'>
  		";
      return $css;
  	}

  	function js(){
  		$js="
      <script src='app/view/default/js/jquery.js' ></script>
      <script src='app/view/default/js/popper.js' ></script>
  		<script src='app/view/default/js/bootstrap.js' ></script>
      <script src='app/view/default/js/tablesorter/jquery.tablesorter.min.js' ></script>
      <script src='app/view/default/js/tablesorter/jquery.tablesorter.widgets.js' ></script>
  		";
      return $js;
  	}
  }  ?>