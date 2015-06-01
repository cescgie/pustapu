<div class="container">
	<?php echo Message::show(); ?>
	<?php if (!sizeof($data['sum'])) {
                 echo '<div class="alert alert-info">No Data.</div>';
              }
              else{
                echo
                '<div class="panel panel-default">
                      <!-- Default panel contents -->
                       <div class="panel-heading">CF</div>';
                        foreach ($data['sum'] as $sum){
                          echo '<p> Summe of all Data : '.$sum['Summe'].'</p>
                          		<p> Update at : '.$data['datum'].'</p>';
                        }
                echo
                      '</div> <!-- panel-heading -->
                </div> <!-- panel panel-default -->';
                
              }
              ?>