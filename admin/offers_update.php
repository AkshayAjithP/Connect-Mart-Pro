<?php
	include("auth.php");
	include('../connect/db.php');
	$bk_id=$_GET['bk_id'];
	$result = $db->prepare("SELECT * FROM offers where bk_id='$bk_id'");
	$result->execute();
	$row_count =  $result->rowcount();
	for($i=0; $rows = $result->fetch(); $i++)
	{		
		$name=$rows["name"];
		$bname=$rows["bname"];
		$amt=$rows["amt"];
		$location=$rows["location"];
		$fdate=$rows["fdate"];
		$tdate=$rows["tdate"];
		$photo=$rows["photo"];
		$descrp=$rows["descrp"];
	}
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
                                            <div class="col-sm-8">
                                            <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="m-b-10">Offers Update</h5>
                                                        
                                                     </div>
                                                     <div class="card-block">
                                                       <form method="post" action="action/offers_update.php" enctype="multipart/form-data" autocomplete="off">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Offers Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="name" class="form-control form-control-primary" required value="<?php echo $name;?>">
                                                                    <input type="hidden" name="bk_id" value="<?php echo $bk_id;?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Branch</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="bname" required class="form-control form-control-primary" value="<?php echo $bname;?>">
                                                                </div>
                                                            </div>
                                                             <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Amount</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" name="amt" required class="form-control form-control-primary" value="<?php echo $amt;?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Location</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="location" required class="form-control form-control-primary" value="<?php echo $location;?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">From Date</label>
                                                                <div class="col-sm-10">
                                                                    <input type="date" name="fdate" required class="form-control form-control-primary" value="<?php echo $fdate;?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">To Date</label>
                                                                <div class="col-sm-10">
                                                                    <input type="date" name="tdate" required class="form-control form-control-primary" value="<?php echo $tdate;?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Photo</label>
                                                                <div class="col-sm-10">
                                                                    <input type="file" name="photo"  class="form-control form-control-primary">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Description</label>
                                                                <div class="col-sm-10">
                                     <textarea name="descrp" rows="5" cols="5" class="form-control form-control-primary" required><?php echo $descrp;?></textarea>
                                                                </div>
                                                            </div>                                                                                                                        
                                                            <div class="form-group row pull-right">
                                                               <div class="col-sm-10">
                                                                 <input type="submit" class="btn btn-danger btn-round btn-bg " value="Update">
                                                                </div>
                                                            </div>
                                                        </form>
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
