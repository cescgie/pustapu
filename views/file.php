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
            '<p>'.$sum['Summe_cf']. ' Records</p>';
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
              '<p>'.$sum_ga['Summe_ga']. ' Records</p>';
          }
      echo
      '</div> <!-- panel panel-default -->';               
  } 
  //GL Information
  if (!sizeof($data['sum_gl'])) {
      echo 
      '<div class="alert alert-info">No GL Data.</div>';
  }else{
      echo
      '<div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">GL</div>';
          foreach ($data['sum_gl'] as $sum_gl){
              echo 
              '<p>'.$sum_gl['Summe_gl']. ' Records</p>';
          }
      echo
      '</div> <!-- panel panel-default -->';               
  } 
  ?>