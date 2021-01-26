<?php
include_once 'helpers/functionforms.php';
?>
<div class="container">
		<h3>Actualitzar Superpoder</h3>
		<form method="POST" action="index.php?control=ControlSuperpowers&operacio=update&codi=<?php echo $codi; ?>">
				<div class="form-group">
		    	<label>Descripció</label>
		  		<input type="text" class="form-control" name="description" value="<?php dades('description'); ?>">
		    	<label>	<?php error('description'); ?></label>
		  		</div>
		  <button class="btn btn-primary" type="submit">Canviar</button>
  		  <a class="btn btn-primary" href="index.php?control=ControlSuperpowers" role="button">Cancel·lar</a>
		</form>
</div>

<?php 
      unset($_SESSION['dades']); 
      unset($_SESSION['errors']); 
?> 
