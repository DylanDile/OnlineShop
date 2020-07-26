<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block"> 
<?php $username =Session::get('adminName');            
           echo "Welcome  : ".$username; 
?>

<div class="col-sm-9">
	 <table class="table table-responsive" width="100%">
	 	<thead>
	 		<th> Products</th>
	 		<th> Accessories</th>
	 		<th> Customers</th>
	 		<th> Orders</th>
	 	</thead>
	 	<tbody>
	 		
	 	</tbody>
	 </table>
</div>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>