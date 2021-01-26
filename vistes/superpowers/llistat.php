<div class="container">
<?php

    echo "<a href='index.php?control=ControlSuperpowers&operacio=showformnew'>Nou</a>";		
?>
 <table class="table table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Codi</th>
      <th scope="col">Descripció</th>
      <th scope="col" colspan="2">Operacions</th>      
    </tr>
  </thead>
  <tbody>

<?php
       
    	foreach($res as $superpower) {
		echo "<tr>"; 
		echo "<td>".$superpower['id']."</td>";
				echo "<td>".$superpower['description']."</td>";
		
		
		echo "<td><a href='index.php?control=ControlSuperpowers&operacio=delete&codi=".$superpower['id']."'>
                     Esborrar</td>";
		echo "<td><a href='index.php?control=ControlSuperpowers&operacio=showformupdate&codi=".$superpower['id']."'>
                     Actualitzar</td>";
               
		echo "</tr>";
        }
        echo "</table>";

        if(isset($_SESSION['missatge'])) {
			echo $_SESSION['missatge'];
			unset($_SESSION['missatge']);
		}


      

?>

<nav >
  <ul class="pagination">
    <?php
          for ($i=1; $i<=$total_pags; $i++) {
          echo "<li class='page-item'><a class='page-link' href='index.php?control=ControlSuperpowers&page=".$i."' >".$i."</a></li>";
      }
    ?>
  </ul>
</nav>

</div>