<?php
    function dades($camp) {
        if(isset($_SESSION['dades'][$camp])) {
            echo $_SESSION['dades'][$camp];
        }
    }
    
    function error($camp) {
        if(isset($_SESSION['errors'][$camp])) {
           echo "<div class='text-danger'>";
            echo $_SESSION['errors'][$camp]; 
           echo "</div>";
        }
    }
    
    function posaSeleccionat($camp,$valor) {
         if(isset($_SESSION['dades'][$camp])) {
             if ($_SESSION['dades'][$camp] == $valor) {
                echo " SELECTED ";
             }
        }
    }
?>
