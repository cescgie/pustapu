<div class="container">
	<?php echo Message::show(); ?>
	<?php 
  //CA Information
  if (!sizeof($data['sum_cf'])) {
      echo 
      '<div class="alert alert-info">No Cf Data.</div>';
  }else{
      echo
      '<p><span class="blink">Updated at : '.$data['datum'].'</span></p>
       <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">CF</div>';
          foreach ($data['sum_cf'] as $sum){
             echo 
            '<p class="cf">'.$sum['Summe_cf']. ' Records</p>';
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
              '<p class="ga">'.$sum_ga['Summe_ga']. ' Records</p>';
              /*echo 
               '<p>'.$data['ip_ga'].' Unique IpAddress</p>
                <p>'.$data['user_ga'].' Unique Users</p>';*/
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
              '<p class="gl">'.$sum_gl['Summe_gl']. ' Records</p>';
          }
      echo
      '</div> <!-- panel panel-default -->';               
  }
  //IR Information
  if (!sizeof($data['sum_ir'])) {
      echo 
      '<div class="alert alert-info">No IR Data.</div>';
  }else{
      echo
      '<div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">IR</div>';
          foreach ($data['sum_ir'] as $sum_ir){
              echo 
              '<p class="ir">'.$sum_ir['Summe_ir']. ' Records</p>';
          }
      echo
      '</div> <!-- panel panel-default -->';               
  }  
  //KV Information
  if (!sizeof($data['sum_kv'])) {
      echo 
      '<div class="alert alert-info">No KV Data.</div>';
  }else{
      echo
      '<div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">KV</div>';
          foreach ($data['sum_kv'] as $sum_kv){
              echo 
              '<p class="kv">'.$sum_kv['Summe_kv']. ' Records</p>';
          }
      echo
      '</div> <!-- panel panel-default -->';               
  }
  //KW Information
  if (!sizeof($data['sum_kw'])) {
      echo 
      '<div class="alert alert-info">No KW Data.</div>';
  }else{
      echo
      '<div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">KW</div>';
          foreach ($data['sum_kw'] as $sum_kw){
              echo 
              '<p class="kw">'.$sum_kw['Summe_kw']. ' Records</p>';
          }
      echo
      '</div> <!-- panel panel-default -->';               
  }
  //TC Information
  if (!sizeof($data['sum_tc'])) {
      echo 
      '<div class="alert alert-info">No TC Data.</div>';
  }else{
      echo
      '<div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">TC</div>';
          foreach ($data['sum_tc'] as $sum_tc){
              echo 
              '<p class="tc">'.$sum_tc['Summe_tc']. ' Records</p>';
          }
      echo
      '</div> <!-- panel panel-default -->';               
  }  
  ?>