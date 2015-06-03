<div class="container">
	<?php echo Message::show(); ?>
	<?php if (!sizeof($data['sum_cf'])) {
                 echo '<div class="alert alert-info">No Cf Data.</div>';
              }
              else{
                echo
                '<div class="panel panel-default">
                      <!-- Default panel contents -->
                       <div class="panel-heading">CF</div>';
                        foreach ($data['sum_cf'] as $sum){
                          echo '<p> Summe of all CF : '.$sum['Summe_cf'].'</p>
                          		<p> Updated at : '.$data['datum'].'</p>';
                        }
                echo
                      '</div> <!-- panel panel-default -->';
                
              } 
              if (!sizeof($data['sum_ga'])) {
                 echo '<div class="alert alert-info">No Ga Data.</div>';
              }
              else{
                echo
                '<div class="panel panel-default">
                      <!-- Default panel contents -->
                       <div class="panel-heading">CF</div>';
                        foreach ($data['sum_ga'] as $sum_ga){
                          echo '<p> Summe of all GA : '.$sum_ga['Summe_ga'].'</p>
                              <p> Updated at : '.$data['datum'].'</p>';
                        }
                echo
                      '</div> <!-- panel panel-default -->';
                
              } 
              ?>