<?php
include_once 'models/Model.php';

class Validation extends Model{
      
        private $errors = array();    
        
        //private $values = array();   
        // private $name;
        private $value="";
        
        public function name($name){
            
            $this->name = $name;
            return $this;        
        }
        
        public function value($value){
            
            $this->value = $value;
            $this->values[$this->name] = $value;
            return $this;
        
        }
                
        public function required(){
            
            if($this->value == '' || $this->value == null){
                $this->errors[$this->name] = 'El camp '.$this->name.' és obligatori.';
            }            
            return $this;
            
        }
                
        public function min($length){
           
            if($this->value=="") return $this; 
            
            if(is_string($this->value)){                
                if(strlen($this->value) < $length){
                    $this->errors[$this->name] = 'El valor del camp '.$this->name.' és massa curt.';
                }           
            }else{
                
                if($this->value < $length){
                    $this->errors[$this->name] = 'El valor del camp '.$this->name.' és inferior al valor mínim.';
                }
                
            }
            return $this;
            
        }
        
        public function max($length){
            if($this->value=="") return $this; 
            if(is_string($this->value)){
                
                if(strlen($this->value) > $length){
                    $this->errors[$this->name] = 'El valor del camp '.$this->name.' és massa llarg.';
                }
           
            }else{
                
                if($this->value > $length){
                    $this->errors[$this->name] = 'El valor del camp '.$this->name.' és superior al valor màxim.';
                }
                
            }
            return $this;
            
        }
                
        public function igual($value){
        
            if($this->value != $value){
                $this->errors[$this->name] = 'El valor del camp '.$this->name.' és incorrecte.';
            }
            return $this;            
        }        
                
        public function isSuccess(){
            if (count($this->errors) == 0) {
                 return true;
            }
        }
        
    
    
    public function getErrors(){
            return $this->errors;
    }
        
    public function getValues(){
            return $this->values;
    }
        
        
    public function getErrorsHTML(){

        $html = '<ul>';
            foreach($this->errors as $error){
                $html .= '<li>'.$error.'</li>';
            }
        $html .= '</ul>';

        return $html;

    }
        
        
    public function isInt(){
        if($this->value=="") return $this; 
        if(filter_var($this->value, FILTER_VALIDATE_INT)===FALSE) {
            $this->errors[$this->name] = 'El camp '.$this->name.' ha de ser un número enter.';
        }
        return $this;
    }

    public function isFloat(){
        if($this->value=="") return $this; 
        if(filter_var($this->value, FILTER_VALIDATE_FLOAT)===FALSE) {
            $this->errors[$this->name] = 'El camp '.$this->name.' ha de ser un número.';
        }
        return $this;            
    }

    public function isAlphanum(){
        if($this->value=="") return $this; 
        if(filter_var($this->value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z0-9]+$/")))===FALSE) {
                             $this->errors[$this->name] = 'El valor del camp '.$this->name.' no sembla un valor vàlid ';

        }
        return $this;            
    }

    public function isEmail(){    
        if($this->value=="") return $this; 
        if(filter_var($this->value, FILTER_VALIDATE_EMAIL)===FALSE) {
           $this->errors[$this->name] = 'El valor del camp '.$this->name.' no sembla un correu electrònic vàlid ';

        }
        return $this;
    }

    public function isOption($options){            
        if(!in_array($this->value,$options)) {
           $this->errors[$this->name] = 'El valor del camp '.$this->name.' no conté una opció vàlida.';

        }
        return $this;
    }

    private function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function isDate(){     
        if($this->value=="") return $this; 
        if($this->validateDate($this->value,'d/m/Y')==false) {
           $this->errors[$this->name] = 'El valor del camp '.$this->name.' no conté una data vàlida.';

        }
        return $this;
    }

    public function notExists($taula,$columna) {
        global $app;

        $sql = "SELECT * from ".$taula." where ".$columna."=:valor";     
        try {
            $sentencia = $this->bd->prepare($sql);
            $sentencia->bindValue(':valor',$this->value);

            $sentencia->execute();
            $resultat = $sentencia->fetch();
            if ($resultat!=null) {
                $this->errors[$this->name] = "Ja existeix aquest ".$this->name . ", no es pot repetir .";                
            }
        }   
        catch(PDOException $e){

            $this->errors[$this->name] = "No es pot comprovar el camp " . $this->name . " en aquests moments.";

        }
        return $this;

    }

 }
?>

