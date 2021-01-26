<form method="post" action="index.php?control=controlprojectes&operacio=filtrar">
    <select name="filtre">
        <option value="0" <?php posaSeleccionat(0); ?>>Obert</option>
        <option value="1" <?php posaSeleccionat(1); ?>>Tancat</option>
    </select>
    <input type="submit" value="mostra">
</form>
<?php
function posaSeleccionat($valor) {
         if(isset($_SESSION['projectes']['estat'])) {
             if ($_SESSION['projectes']['estat'] == $valor) {
                echo " SELECTED ";
             }
        }
    }
?>


