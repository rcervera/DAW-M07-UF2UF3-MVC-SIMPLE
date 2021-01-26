<div>
<?php
        echo "<a href='index.php?control=controlusuaris&operacio=showformnew'>Nou</a>";
		echo "<table border=1>";
    	foreach($res as $usuari) {
		echo "<tr>"; 
		echo "<td>".$usuari['codi']."</td>";
		echo "<td>".$usuari['nom']."</td>";
		echo "<td>".$usuari['cognoms']."</td>";
		echo "<td>".$usuari['username']."</td>";
		echo "<td>".$usuari['email']."</td>";
		echo "<td>".$usuari['rol']."</td>";
		echo "<td>".$usuari['password']."</td>";
		echo "<td><a href='index.php?control=controlusuaris&operacio=delete&codi=".$usuari['codi']."'>
                     Esborrar</td>";
		echo "<td><a href='index.php?control=controlusuaris&operacio=showformupdate&codi=".$usuari['codi']."'>
                     Actualitzar</td>";
		echo "</tr>";
        }
        echo "</table>";

       
        if(isset($_SESSION['missatge'])) {
			echo $_SESSION['missatge'];
			unset($_SESSION['missatge']);
		}
?>
</div>
