<?php
include_once 'helpers/request.php';
include_once 'helpers/Validation.php';

class ControlSuperpowers {

    private $superpowers;
    private $missatge;

    function __construct() {
        // Per gestinar els superherois s'ha de tenir el superpoder de ser
        // un usuari registrat!
        if (!isset($_SESSION['username'])) {
            header('Location: index.php?control=ControlLogin');
            exit;
        }         
        // Creem el model amb el que treballarem en aquest controlador
        include_once 'models/Superpowers.php';
        $this->superpowers = new Superpowers();
        $this->missatge = "";
    }

    // mètode que es crida per defecte si no especifiquem cap mètode en el paràmetre 
    // operacio
    public function index() {       
        // No mostrarem tots els superpoders de cop
        // els paginarem
        // $res = $this->superpowers->getAll();
        // El número de pàgina ens vindrà per paràmetre GET
        // En cas que no hi sigui mostrarem la primera pàgina
        if(isset($_GET['page'])) $numPagina=$_GET['page'];
        else $numPagina=1; 
        // Cada pàgina mostrarà 10 registres
        $numRegsPag=10;
        // Obtenim el número màxim de pàgines
        $total_pags = $this->superpowers->numPages($numRegsPag);
        // Si el número de pàgina és incorrecta mostrem la primera
        if($numPagina<=0 || $numPagina>$total_pags) $numPagina=1; 

        // Obtenim els superpoders de la pàgina indicada
        $res = $this->superpowers->getPage($numPagina,$numRegsPag);  
        
       
        include_once 'vistes/templates/header.php';        
        include_once 'vistes/superpowers/llistat.php';
        include_once 'vistes/templates/footer.php';
    }

    // Per afegir un superpoder 2 passos: 
    // - Mostrar el formulari d'alta
    // - Desar les dades del formulari en la BD


    // Mètode per mostrar el formulari per donar d'alta un nou superpoder
    public function showformnew() {

        include_once 'vistes/templates/header.php';
        include_once 'vistes/superpowers/formnew.php';
        include_once 'vistes/templates/footer.php';
    }

    // mètode per controlar l'emmagatzemar un superheroi a la BD
    public function store() {
        
        // Recuperem els camps del formulari
        $description = obtenir_camp('description');
        // Creem un objecte per facilitar la validació dels camps del formulari
        $validator = new Validation();
        // Comprovem les restriccions associades al camp   
        $validator->name('description')->value($description)->required();
            
        // Si tenim errors de validació recarreguem el formulari d'alta
        // guardant les dades antigues i els errors dins la sessió
        if(!$validator->isSuccess()) { 
            $_SESSION['errors'] = $validator->getErrors();
            $_SESSION['dades'] = $validator->getValues();                       
            header('Location: index.php?control=ControlSuperpowers&operacio=showformnew');
            exit;
        }
        // Al model li diem que afegeix un nou superpoder
        
        // $res = $this->superpowers->add($description);
        $res = true;
        
        if ($res) {
            $_SESSION['missatge'] = "alta correcta. Opció deshabilitada!";
        } else {
            $_SESSION['missatge'] = "Alta incorrecta";
        }        
       
        header("Location: index.php?control=ControlSuperpowers");
    }

    // Per actualitzar un superpoder fem 2 passos: 
    // - Mostrar el formulari d'actualització amb les dades actuals del superpoder
    // - Desar les dades del formulari en la BD


    // Mètode per mostrar el formulari d'actualització d'un superpoder
    public function showformupdate() {
        // Via GET ens passaran el codi del superpoder que volem modificar
        // Comprovem l'existència del paràmetre
        if (!isset($_GET['codi'])) {
            $_SESSION['missatge'] ="Has de triar un superpoder!";
            header("Location: index.php?control=ControlSuperpowers");
        }
        // Recuperem de la BD el superpoder que volem modificar 
        $codi = $_GET['codi'];
        $actual = $this->superpowers->get($codi);

        // Si el id del poder no és correcte i no s'ha pogut recuperar
        // no continuem!
        if (!$actual) {   
            $_SESSION['missatge'] = "Aquest superpoder no existeix!";
            header("Location: index.php?control=ControlSuperpowers");
            exit;
        }  

        // Quan es carregui el formulari per primer cop
        // volem que es mostrin les dades actuals del superpoder.
        //      En cas que ja existeixin, voldrà dir que s'ha recarregat aquest formulari
        //      d'actualització perque les dades dels controls del formulari no són correctes
        if(!isset($_SESSION['dades'] )) {
            $_SESSION['dades'] = $actual;
            $_SESSION['errors'] = array();
        }
         
        // mostrem el formulari..       
        include_once 'vistes/templates/header.php';
        include_once 'vistes/superpowers/formupdate.php';
        include_once 'vistes/templates/footer.php';                
        
    }

    // mètode per controlar l'actualització del superpoder a la BD
    public function update() {

        // Via GET ens passaran el codi del superpoder que volem modificar
        // Comprovem l'existència del paràmetre
        if (!isset($_GET['codi'])) {
            $_SESSION['missatge'] ="Has de triar un superpoder!";
            header("Location: index.php?control=ControlSuperpowers");
        }
        // Recuperem de la BD el superpoder que volem modificar 
        $codi = $_GET['codi'];
        $actual = $this->superpowers->get($codi);

        // Si el id del poder no és correcte i no s'ha pogut recuperar
        // no continuem!
        if (!$actual) {   
            $_SESSION['missatge'] = "Aquest superpoder no existeix!";
            header("Location: index.php?control=ControlSuperpowers");
            exit;
        }  

        // Recuperem el camp del formulari
        $description = obtenir_camp('description');
                
        $validator = new Validation();
        // Comprovem les restriccions associades al camp  
        $validator->name('description')->value($description)->required();
        // Si tenim errors de validació recarreguem el formulari d'actualització
        // guardant les dades antigues i els errors dins la sessió
        if(!$validator->isSuccess()) { 
            $_SESSION['errors'] = $validator->getErrors();
            $_SESSION['dades'] = $validator->getValues();  

            header('Location: index.php?control=ControlSuperpowers&operacio=showformupdate&codi='.$codi);
            exit;
        }
        // Modifiquem les dades del superpoder guardant possibles canvis en la BD
        // $res = $this->superpowers->update($codi,$description);
        $res = true;
        if ($res)
            $_SESSION['missatge'] = "Actualització correcta. Opció deshabilitada!";
        else
            $_SESSION['missatge'] = "Actualització incorrecta";
                
        header("Location: index.php?control=ControlSuperpowers");             
                
    }

    public function delete() {
        // Via GET ens passaran el codi del superpoder que volem modificar
        // Comprovem l'existència del paràmetre
        if (!isset($_GET['codi'])) {
            $_SESSION['missatge'] ="Has de triar un superpoder!";
            header("Location: index.php?control=ControlSuperpowers");
        }
        // Recuperem de la BD el superpoder que volem modificar 
        $codi = $_GET['codi'];
        $actual = $this->superpowers->get($codi);

        // Si el id del poder no és correcte i no s'ha pogut recuperar
        // no continuem!
        if (!$actual) {   
            $_SESSION['missatge'] = "Aquest superpoder no existeix!";
            header("Location: index.php?control=ControlSuperpowers");
            exit;
        }  

        try {
            // $res = $this->superpowers->delete($codi);
             $_SESSION['missatge'] = "Superpoder eliminat. Opció deshabilitada!";
        }
        catch(PDOException $e)  {
             $_SESSION['missatge'] = "Superpoder no esborrat!";
        }
        
           
       
        header("Location: index.php?control=ControlSuperpowers");
    }

    
    
}

?>
