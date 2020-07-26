<?php include_once 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == true) {
	header("Location:order.php");
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $custLogin = $cmr->customerLogin($_POST);
}

?> 
<body>
 <div class="container">
 	<div class="card-info">
 		<div class="card-body">
 			<div class="main">
 			  <center>
			    <div class="content">
			    	 <div class="login_panel">
			    	 	<?php 
				    		if (isset($custLogin)) 
				    		{
				    			echo $custLogin;
				    		}
			    		 ?>
			        	<h3>Existing Customers</h3>
			        	<p>Sign in with the form below.</p>
			        	<center>
			        		<form action="" method="post" class="text-center" style="align-content: center;">
			            	<input name="email" placeholder="Email" type="text"/>
			                <input name="pass" placeholder="Password" type="password"/>
			                <div class="buttons">
			                	<div>
			                		<button class="grey" name="login">Sign In</button>
			                		<a href="register.php">Register Instead</a>
			                	</div>
			                </div>
			             </form>
			        	</center>
			           </div>                
			       <div class="clear"></div>
			    </div>
			   </center>
 			</div>
 		</div>
 	</div> 	
 </div>
 </body>
<?php include 'inc/footer.php';?>