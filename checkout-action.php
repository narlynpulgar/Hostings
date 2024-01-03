<?php
											function function_alert() { 
      

                                                echo "<script>alert('Thank you. Your Order has been placed!');</script>"; 
                                                echo "<script>window.location.replace('your_orders.php');</script>"; 
                                            } 
                                            
                                            
                                            foreach ($_SESSION["cart_item"] as $item)
												{
											
																							$item_total += ($item["price"]*$item["quantity"]);
												
													if($_POST['submits'])
													{
                                                        $ress= mysqli_query($db,"select * from pro_duct where rs_id='$_GET[res_id]'");
                                                        $rows=mysqli_fetch_array($ress);
													$SQL="insert into users_orders(u_id,d_id,title,quantity,price,total) values('".$_SESSION["user_id"]."','".$item["d_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."','$item_total')";
                                                   
									
                                                    mysqli_query($db,$SQL);
														
                                                

                                                        unset($_SESSION["cart_item"]);
                                                        unset($item["title"]);
                                                        unset($item["quantity"]);   
                                                        unset($item["price"]);
														$success = "Thank you. Your order has been placed!";
                                                        
                                                        function_alert();

														
                                                        
													}
												} ?> 