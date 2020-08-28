<?php
include_once("config.php");
include_once("inc/header.php");

?>
<?php

$conn = mysqli_connect("localhost","root","","mobilereg");


if(isset($_POST['datasubmit']))
{
  $empid = $_POST['empid'];
  $empname = $_POST['empname'];
  $empmobile = $_POST['empmobile'];
  $emphandset = $_POST['emphandset'];
  $myselectbox = $_POST['myselectbox'];
  

  $sqldatas = "INSERT INTO dashboard_data(employee_id,employee_name,employee_mobile,employee_handset,data_time ) VALUES('$empid','$empname','$empmobile','$emphandset','$myselectbox')";
  
  $empresult = mysqli_query($conn,$sqldatas);
 
  $sqlempdata = "SELECT * FROM dashboard_data";
  $dataresult = mysqli_query($conn,$sqlempdata);
 //  $datarows = mysqli_fetch_assoc($dataresult);
 
 // if($datarows == true)
 // {
 //    $_SESSION["emplid"] = $datarows["employee_id"];
    
 //    $_SESSION["emplname"] = $datarows["employee_name"];
 //    $_SESSION["emplmobile"] = $datarows["employee_mobile"];
 //    $_SESSION["emplhandset"] = $datarows["employee_handset"];
    
 // }
}
mysqli_close($conn);
?>


  	<section class="sil-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="sil-head">
							<h2>Mobile Entry Application</h2>
							<p>Entry your mobile handsets...</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="tlname">
                <?php 
                if($_SESSION["email"] == true)
                {

                  echo $_SESSION["email"];
                  echo '<a href="index.php" class="btn btn-danger float-right">Logout</a>';
                }
                ?>      
            </div>
					</div>
				</div>
				<div class="row float-right">
					<div class="col-lg-12">
						<form method="post" class="form-inline">
              <div class="form-group mx-1">
							<input type="" name="empid" placeholder="Employee Id" class="form-control">
              </div><div class="form-group mx-1">
							<input type="" name="empname" placeholder="Employee Name" class="form-control">
              </div><div class="form-group mx-1">
							<input type="" name="empmobile" placeholder="Mobile Number" class="form-control">
              </div><div class="form-group mx-1">
							<input type="" name="emphandset" placeholder="Handset Model" class="form-control">
              </div><div class="form-group mx-1">
                <select class="form-control" name="myselectbox">
                  <option name="intime" value="intime">In</option>
                  <option name="outime" value="outime">Out</option>
                </select>
                </div><div class="form-group mx-1">
							<input type="submit" name="datasubmit" value="Submit" class="btn btn-info">
            </div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<section class="sil-table">
			<table class="table table-dark table-hover container">
    <thead>
      <tr>
        <th>Check</th>
        <th>Employee Id</th>
        <th>Employee Name</th>
        <th>Mobile No.</th>
        <th>Handset Model</th>
        <th>In Time</th>
        <th>Out Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        
        
          <?php 
                while($myrows = mysqli_fetch_assoc($dataresult))
                {
                  echo 
                  "<tr>
                  <td><input type='radio' name='timestatus'></td>
                  <td>{$myrows['employee_id']}</td>
                  <td>{$myrows['employee_name']}</td>
                  <td>{$myrows['employee_mobile']}</td>
                  <td>{$myrows['employee_handset']}</td>
                  <td>{$myrows['data_time']}</td>
                  </tr>"
                  ;
                }
                ?>
        </tr>
        
      
    </tbody>
  </table>
		</section>
		
<?php

include_once("inc/footer.php");

?>

