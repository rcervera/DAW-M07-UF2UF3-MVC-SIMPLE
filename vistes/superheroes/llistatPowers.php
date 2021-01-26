
<div class="container">
<h3>Superpoders de l'heroi <?php echo $actual['heroname']; ?></h3>
<div class="row">

    <div class="col-sm">
     	<form method='POST' action='index.php?control=ControlSuperheroes&operacio=deletePowers&codi=<?php echo $actual['id']; ?>'>
	     	<div class="form-group">
	    		<label for="exampleFormControlSelect2">Poders assignats</label>
	    		<select multiple class="form-control" size="10" name="powers[]">
	    			<?php
	    				foreach($powers as $power) {		
	                	  echo "<option value='".$power['id']."''>".$power['description']."</option>";
	                	}
	    			?>
	    		</select>
	    	</div>
	    	<button class="btn btn-primary" type="submit">Treure poders</button>
    	</form>

    </div>
    <div class="col-sm">
    	<form method='POST' action='index.php?control=ControlSuperheroes&operacio=storePowers&codi=<?php echo $codi; ?>'>
      		<div class="form-group">
    		<label>Llista Poders</label>
    		<select multiple class="form-control" size="20" name="powers[]">
    			<?php
    				foreach($noPowers as $power) {		
                	  echo "<option value='".$power['id']."''>".$power['description']."</option>";
                	}
    			?>
    		</select>
    		
    		</div>
    		<button class="btn btn-primary" type="submit">Assignar poders</button>
    	</form>
    </div>
    
  </div>
<?php
   if(isset($_SESSION['missatge'])) {
            echo $_SESSION['missatge'];
            unset($_SESSION['missatge']);
        }
?>
</div>






