<?php
// inicia sesión
session_start();
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Rastrear visitas previas a la p&aacute;gina</title>
  </head>
  <body>
    <h2>Rastrear visitas previas a la p&aacute;gina</h2>
    <?php
    if (!isset($_SESSION['visitas'])) {
      echo 'Esta es su primera visita.';
    } else {
      echo 'Visit&oacute; esta p&aacute;gina en: <br />';
      foreach ($_SESSION['visitas'] as $v) {
        echo date('d M Y h:i:s', $v) . '<br />';
      }
    }
    ?>
  </body>
</html>
<?php
// añade el sello temporal de la visita actual
$_SESSION['visitas'] [] = mktime();
?>
