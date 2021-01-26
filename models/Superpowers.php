<?php
include_once 'Model.php';

class Superpowers extends Model{
    
    protected $taula="superpowers";

    public function add($descripcio) {
 		$sql ="insert into superpowers(description) values 
			 (:descripcio)";
		$ordre = $this->bd->prepare($sql);		
		$ordre->bindValue(':descripcio',$descripcio);	
		$res = $ordre->execute();              
        return $res;
    }

    public function update($codi,$descripcio) {
	 	$sql ="update superpowers set description=:descripcio where id=:codi";
		$ordre = $this->bd->prepare($sql);	 
	    $ordre->bindValue(':codi',$codi);	
		$ordre->bindValue(':descripcio',$descripcio);	
			
		$res = $ordre->execute(); 
	    return $res;

    }

}
    
