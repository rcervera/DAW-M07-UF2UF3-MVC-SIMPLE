<h3>Nou usuari</h3>
<form method="POST" action="index.php?control=controlusuaris&operacio=store">
  Nom <input type="text" name="nom" value="<?php dades('nom'); ?>">
  <?php error('nom'); ?><br>
  Cognoms <input type="text" name="cognoms" value="<?php dades('cognoms'); ?>">
  <?php error('cognoms'); ?><br>
  Email <input type="text" name="email" value="<?php dades('email'); ?>" >
  <?php error('email'); ?><br>
  Username <input type="text" name="username"  value="<?php dades('username'); ?>">
  <?php error('username'); ?>  <br> 
  Password <input type="text" name="password" value="<?php dades('password'); ?>">
  <?php error('password'); ?><br>
  <select name="rol">
    <option value=0 <?php posaSeleccionat('rol',0); ?> >Normal</option>
            <option value=1 <?php posaSeleccionat('rol',1); ?>>Administrador</option>
  </select>
  <?php error('error'); ?><br>
  <input type="submit" value="Nou">
<form>



