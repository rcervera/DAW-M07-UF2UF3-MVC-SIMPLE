<?php
include_once 'helpers/functionforms.php';
?>
<div class="container">
<h3>Nou Superheroi</h3>
<form method="POST" action="index.php?control=ControlSuperheroes&operacio=store">
	
  <div class="form-group">
      <label>Nom Superheroi</label>
      <input type="text" class="form-control" name="heroname" value="<?php dades('heroname'); ?>">
      <label> <?php error('heroname'); ?></label>
  </div>
  <div class="form-group">
      <label>Nom real</label>
      <input type="text" class="form-control" name="realname" value="<?php dades('realname'); ?>">
      <label> <?php error('realname'); ?></label>
  </div>

	
 	
  <div class="form-group">
      <label>Gènere</label>
  	  <select class="form-control" name="gender">
  	    <option value="male" <?php posaSeleccionat('gender','male'); ?>>Home</option>
  	    <option value="female" <?php posaSeleccionat('gender','female'); ?> >Dona</option>
  	    <option value="other" <?php posaSeleccionat('gender','other'); ?> >Altre</option>
    </select><br>	
    <?php error('gender'); ?><br>
  </div>

  <div class="form-group">
      <label>Procedència</label>
      <input type="text" class="form-control" name="race" value="<?php dades('race'); ?>">
      <label> <?php error('race'); ?></label>
  </div>
	<button class="btn btn-primary" type="submit">Nou</button>
  <a class="btn btn-primary" href="index.php?control=ControlSuperheroes" role="button">Cancel·lar</a>

   
</form>

<?php 
      unset($_SESSION['dades']); 
      unset($_SESSION['errors']); 
?> 
</div>