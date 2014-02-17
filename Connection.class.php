<?php
/**
 * Description of Connection
 *
 * @author renan
 */

class Connection{
    public $hostname;
    public $dbname;
    public $username;
    public $password;
    
    function __construct(){
        $this->hostname = "localhost";
        $this->dbname = "checklist";
        $this->username = "root";
        $this->password = "020906";
    }
    
    function Connect()
    {
     try{
        $conn = new PDO('mysql:host='.$this->hostname.';dbname='.$this->dbname, $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "CONECTADO COM SUCESSO!"."\n";
     } catch (Exception $exc) {
         echo "ERROR: " . $exc->getMessage();
     } 
    }
}
?>