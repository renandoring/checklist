<?php
include_once 'Dao.class.php';
include_once 'Connection.class.php';

$conn = new Connection();
$conn->Connect();

$dao = new Dao();
?>
<script type="text/javascript">
    
</script> 
<html>
    <form>
        <input type="text" name="user">
        <br>
        <input type="checkbox" name="bike">
            Andar de bicicleta.
            <br>
        <input type="checkbox" name="car">
            Andar de carro.
        <br>
        <input type="submit" value="Inserir" <?php $dao->Insert()?>>
        <input type="submit" value="Alterar">
        <input type="submit" value="Delete">
        <!--<input type="submit" value="Procurar">-->
    </form>
</html>