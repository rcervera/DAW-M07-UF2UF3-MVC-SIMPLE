<?php
include_once 'Model.php';

class Superheroes extends Model{
    
   protected $taula="heroes"; 

   // Afegir a la BD un nou superheroi
    public function add($heroname,$realname,$gender,$race) {

       	$sql ="insert into heroes(heroname,realname,gender,race) values 
      			 (:heroname,:realname,:gender,:race)";
      	$ordre = $this->bd->prepare($sql);	 
      	$ordre->bindValue(':heroname',$heroname);
      	$ordre->bindValue(':realname',$realname);
      	$ordre->bindValue(':gender',$gender);
      	$ordre->bindValue(':race',$race);
      
      	$res = $ordre->execute(); 
        return $res;
    }

    // Actualitzar les dades d'un superheroi
    public function update($codi,$heroname,$realname,$gender,$race) {
       	$sql ="update heroes set heroname=:heroname,realname=:realname, gender=:gender, race=:race where id=:codi";
      	$ordre = $this->bd->prepare($sql);	 
        $ordre->bindValue(':codi',$codi);
      	$ordre->bindValue(':heroname',$heroname);
        $ordre->bindValue(':realname',$realname);
        $ordre->bindValue(':gender',$gender);
        $ordre->bindValue(':race',$race);
      	
        $res = $ordre->execute(); 
        return $res;

    }
      
    // Obtenir els superpoders d'un superheroi
    public function getPowers($idhero) {
       $sql = "select * from superpowers where id in (SELECT idpower from heroeshabilities where idheroe = :idhero)";
       $sentencia = $this->bd->prepare($sql);
       $sentencia->bindValue(':idhero',$idhero);
       $sentencia->execute();
       $powers = $sentencia->fetchAll(PDO::FETCH_ASSOC);       
       return $powers;
    }

    // Obtenir els superpoders que no té un superheroi
    public function getNoPowers($idhero) {
       $sql = "select * from superpowers where id not in (SELECT idpower from heroeshabilities where idheroe = :idhero)";
       $sentencia = $this->bd->prepare($sql);
       $sentencia->bindValue(':idhero',$idhero);
       $sentencia->execute();
       $powers = $sentencia->fetchAll(PDO::FETCH_ASSOC);       
       return $powers;
    }

   
    // Eliminar un poder d'un superheroi
    public function removePower($codihero, $codipower) {
        $sql ="delete from heroeshabilities where idheroe=:codihero AND idpower=:codipower";
        $ordre = $this->bd->prepare($sql);	 
        $ordre->bindValue(':codihero',$codihero);
        $ordre->bindValue(':codipower',$codipower);
	      $res = $ordre->execute();
        return $res;
    }

    // Afegir un poder a un superheroi
    public function setPower($codi, $codipower) {                        
       $sqlinsert ="insert into heroeshabilities(idheroe,idpower) values (:codihero,:codipower)";
       $ordreInsert = $this->bd->prepare($sqlinsert);  
       $ordreInsert->bindValue(':codihero',$codi);
       $ordreInsert->bindValue(':codipower',$codipower);
       $res = $ordreInsert->execute(); 
       return $res;
    }
    
    
     // treure molts poders a un superheroi
    public function removePowers($codi, $powers) {                        
       $sql ="delete from heroeshabilities where idheroe=:codihero AND idpower=:codipower";
       
       $ordre = $this->bd->prepare($sql);  
       $ordre->bindValue(':codihero',$codi);
       $this->bd->beginTransaction();
       foreach($powers as $codipower) {
            $ordre->bindValue(':codipower',$codipower);
            $ordre->execute(); 
       }
       $res = $this->bd->commit();
       return $res;
    }
    
    // Afegir molts poders a un superheroi
    public function setPowers($codi, $powers) {                        
       $sqlinsert ="insert into heroeshabilities(idheroe,idpower) values (:codihero,:codipower)";
      
       
       try {
            $ordreInsert = $this->bd->prepare($sqlinsert);  
            $ordreInsert->bindValue(':codihero',$codi);
            $this->bd->beginTransaction();
           foreach($powers as $codipower) {
                $ordreInsert->bindValue(':codipower',$codipower);
                $ordreInsert->execute(); 
           }
           $this->bd->commit();
           return true;
       } catch(Exception $e) {
             $this->bd->rollBack();
            return false;
       }
    }
    
    

}

?>
