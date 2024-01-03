

<?php

include("../connection/connect.php");
if(ISSET($_POST['update'])){
                        $ca_id = $_POST['ca_id'];
                        $dispose = $_POST['disposes'];
                      
                      
                    
                        $sql="UPDATE cage set dispose = dispose + '$dispose' WHERE ca_id = '$ca_id'";
                         mysqli_query($db,$sql);
                         $successdead = 	'<div class="alert alert-success alert-dismissible fade show">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          New death Added Successfully.
                     </div>';
                  
                       }
                       
                           header("location: device.php");
                  
                    
                    
	?>
