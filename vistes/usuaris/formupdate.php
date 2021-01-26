<h3>Actualitzar usuari</h3>
<form method="POST" action="index.php?control=controlusuaris&operacio=update&codi=<?php echo $usuari['codi']; ?>">
 
  Nom <input type="text" name="nom" value="<?php echo $usuari['nom']; ?>"><br>
  Cognoms <input type="text" name="cognoms" value="<?php echo $usuari['cognoms']; ?>"><br>
  Email <input type="text" name="email" value="<?php echo $usuari['email']; ?>"><br>
  Username <input type="text" name="username" value="<?php echo $usuari['username']; ?>"><br> 
  <select name="rol">
    <option value="0" <?php  if($usuari['rol']==0) echo 'SELECTED'; ?> >Normal</option>
    <option value="1" <?php  if($usuari['rol']==1) echo 'SELECTED'; ?>>Administrador</option>
  </select><br>
  <input type="submit" value="Actualitzar">
<form>
