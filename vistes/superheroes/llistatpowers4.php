<div class="container">
<div class="row">

<?php 
    foreach($res as $index=>$projecte) :
        
        if($index!=0 && $index%3==0) {
            echo "</div>";
            echo "<div class='row'>";
        }
?>
    <div class="col-sm-4">
    <div class="card mt-2">
      <div class="card-header">
       <h5 class="card-title"><?php echo $projecte['nom'];  ?></h5>
      </div>
      <div class="card-body">
        
        <p class="card-text"><?php echo $projecte['descripcio'];  ?></p>
        <a href='<?php echo "index.php?control=controltasques&codiprojecte=".$projecte['codi'];  ?>' class="btn btn-primary">Tasques</a>
      </div>
      <div class="card-footer text-muted">
        <?php echo $projecte['dataFi'];  ?>
      </div>
    </div>
    </div>

<?php
endforeach;
?>       
</div>	
    
    
    
    
    
    
    
    
    
    
    
</div>
<?php
        if(isset($_SESSION['missatge'])) {
			echo $_SESSION['missatge'];
			unset($_SESSION['missatge']);
		}
?>


