<div class="container">
	<?php echo Message::show(); ?>
	<?php 
  //CA Information
  if (!sizeof($data['sum_cf'])) {
      echo 
      '<div class="alert alert-info">No Cf Data.</div>';
  }else{
      echo
      '<p> Updated at : '.$data['datum'].'</p>
       <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">CF</div>';
          foreach ($data['sum_cf'] as $sum){
             echo 
            '<p> Summe of CF list : '.$sum['Summe_cf'].'</p>';
          }
      echo
      '</div> <!-- panel panel-default -->'; 
  } 
  //GA Information
  if (!sizeof($data['sum_ga'])) {
      echo 
      '<div class="alert alert-info">No Ga Data.</div>';
  }else{
      echo
      '<div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">GA</div>';
          foreach ($data['sum_ga'] as $sum_ga){
              echo 
              '<p> Summe of GA list : '.$sum_ga['Summe_ga'].'</p>';
          }
      echo
      '</div> <!-- panel panel-default -->';               
  } 
  ?>