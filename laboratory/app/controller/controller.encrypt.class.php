<?php

/**
 * Clase para la encryptacion de archivos, esta es la primera vez que se usa y servirá para controlar el acceso a las aplicaciones desarrolladas.
 */
 error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

class encrypt
{
  function encrypting($string){
      $key = 'LAPUERCAESTAENLAPOCILGA';

      return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
  }

  function decrypt($string){
      $key = 'LAPUERCAESTAENLAPOCILGA';
      return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
  }
}
?>