<?php
	include("auth.php");
	include('../connect/db.php');
	$Log_Id=$_SESSION['SESS_USER_ID'];	
?>	
<!DOCTYPE html>
<html lang="en">
	<head>
        <title>MartConnect Pro</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />     
        <meta name="author" content="codedthemes">
        <?php include("include/css.php");?>     
	</head>
<body>
    
    <!-- Pre-loader start -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
               <div class="navbar-wrapper">
                   <div class="navbar-logo">
                       <a class="mobile-menu" id="mobile-collapse" href="#!">
                           <i class="ti-menu"></i>
                       </a>                      
                       <a href="index.php">
                         MartConnect Pro
                       </a>                      
                   </div>
               </div>
           </nav>
           
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include("include/leftmenu.php");?>
                    <div class="pcoded-content" id="home">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                      <div class="row">
                                            <div class="col-sm-12">
                                            <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="m-b-10">Cart List</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-chevron-left"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-times close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                     <div class="card-block table-border-style">
                                						<div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                   <tr>
                                                                        <th>Sl No</th>
                                                                        <th>Name</th>
                                                                        <th>Quantity</th>
                                                                        <th>Price</th>                                                   
                                                                        <th>Tax %</th>
                                                                        <th>Tax Amount</th>
                                                                        <th>Total</th>
                                                                        <th>Remove</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
																			$total=0;
																			$totala=0;
																			$result = $db->prepare("select * from productorder where BLog_Id='$Log_Id' and pstatus='pending' order by dat asc");
																			$result->execute();
																			for($i=1; $row = $result->fetch(); $i++)
																			{
																				$total=$total+$row["tot"]+$row["taxa"];	
                                                                                $totala=$row["tot"]+$row["taxa"];
                                                                                $ord_id=$row["ord_id"];
																				echo"<tr>";
																					echo"<td>".$i."</td>";
																					echo"<td>".$row["pname"]."</td>";
																					echo"<td>".$row["qty"]."</td>";																					
																					echo"<td>".$row["price"]."</td>";
																					echo"<td>".$row["tax"]."</td>";
																					echo"<td>".$row["taxa"]."</td>";
																					echo"<td>".$totala."</td>";
																			?>
                                                                             <td>
                                                                             <form action="action/cart_remove.php" method="get">
                                                                                <input type="hidden" name="ord_id" value="<?php echo $ord_id;?>">  
                                                                                <input type="hidden" name="qty" value="<?php echo $row["qty"];?>">  
                                                                                <input type="hidden" name="pname" value="<?php echo $row["pname"];?>">  
                                                                                <input type="submit" class=" btn btn-sm btn-primary" value="X">                                                                			  
                                                                            </form>
                                                                            </td> 
                                                                            <?php
																				echo"</tr>";
																			}
																		?>
																		</tr>              
																			 <tr>              
																				 <td colspan="6"></td>
																				 <td colspan="1"><b>Total</b></td>
																				 <td colspan="1" style="color:red;">
																				 <b><?php echo $total?></b><br><br>                  
																				 </td>
																				 
																			</tr>
                                                                </tbody>
                                                            </table>
                                                             <a href="product_update_payment.php"  class="btn btn-sm btn-primary pull-right">Payment</a>
                                                             <a href="index.php"  class="btn btn-sm btn-facebook pull-right">Continue To Shopping</a>
                                                           
                                                        </div>
                                                     </div>
                                                  </div>
                                                <!-- Basic Form Inputs carde end -->      
                                            </div>        
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>  
    <!-- Pre-loader end -->          
</body>
<?php include("include/js.php");?>

</html>
