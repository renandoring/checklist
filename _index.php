<?php
include_once 'Dao.class.php';
include_once 'Connection.class.php';

$conn = new Connection();
$conn->Connect();

//$dao = new Dao();
//$dao->Insert();
//$dao->Select();
?>
<html>
    <body>
        <form action="GetMethod.php">
            <input type="hidden" name="firstID">
            <label>Digite seu nome:</label><input type="text" name="nome">
            <input type="submit" value="Enviar" name="action">
        </form>
    </body>
</html>
