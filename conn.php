<?php
class DB extends PDO{
    public function __construct($sdn,$username=NULL,$password=NULL,$options=[]){
        $default_options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $options = array_replace($default_options,$options);
        parent::__construct($sdn,$username,$password,$options);
    }

    public function run($sql,$args=NULL){
        if (!$args) {
            return $this->query($sql);
        }
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
}
?>
