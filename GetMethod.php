<?php
/*
 * Description of GetMetod
 *
 * @author renan
 */

require_once 'Dao.class.php';

$dao = new Dao();

$action = $_GET['action'];
$firstID = $_GET['firstID'];
$campo = $_GET['nome'];

if($action === "Enviar"){
    $dao->Insert($firstID,$campo);
}
 


//$dao->Select();
//$dao->Delete();
?>
