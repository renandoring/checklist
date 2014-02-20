<?php
include_once 'Connection.class.php';

class Dao extends Connection{
    //Funcao de busca no banco
    function Select(){
        try{
           $conn = new PDO('mysql:host='.$this->hostname.';dbname='.$this->dbname, $this->username, $this->password);
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
           $query = "SELECT firstID, campo FROM listadd";
           foreach ($conn->query($query) as $row){
               echo $row['campo']."<br>";
           }
           echo "PRODUTOS SELECIONADOS COM SUCESSO!";
        } catch (Exception $ex) {echo "ERROR: " . $ex->getMessage();}
    }
    //Funcao Insere no banco
    function Insert($firstID,$campo){        
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