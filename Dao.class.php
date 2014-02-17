<?php
include_once 'Connection.class.php';

class Dao extends Connection{
    //Funcao Insere no banco
    function Insert(){
        $firstID = 2;
        $campo = "Salgadinho";
        try{
            $conn = new PDO('mysql:host='.$this->hostname.';dbname='.$this->dbname, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
            $stmt = $conn->prepare("INSERT INTO listadd (firstID,campo) VALUES ('$firstID','$campo')");
            $stmt->execute();
            echo "INSERIDO COM SUCESSO!"."\n";
        } catch (Exception $ex) {echo "ERROR: " . $ex->getMessage();}
    }
    
    //Funcao Delete elementos do banco
    function Delete(){
        $id = 1;
        try{
            $conn = new PDO('mysql:host='.$this->hostname.';dbname='.$this->dbname, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            $stmt = $conn->prepare('DELETE FROM listadd WHERE firstID = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            if($stmt->execute()){
                echo "OPERAÇÂO REALIZADA COM SUCESSO!"."\n";
            }else{
                echo "OPERAÇÂO NÂO REALIZADA!";
            }
        } catch (Exception $ex) {
            echo "ERROR: " . $ex->getMessage();
        }
    }
    
    function Update(){
        $id = 2;
        $campo = "ALTERADO";
        try{
            $conn = new PDO('mysql:host='.$this->hostname.';dbname='.$this->dbname, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare('UPDATE listadd SET campo = :campo WHERE firstID = :id'); 
            $stmt->execute(array(':id' => $id, ':campo' => $campo)); 
            if($stmt->execute()){
                echo "OPERAÇÂO REALIZADA COM SUCESSO!";
            }else{
                echo "OPERAÇÂO NÂO REALIZADA!";
            }
        } catch (Exception $ex) {echo "ERROR: " . $ex->getMessage();}
    }
}
?>