<?php include 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == true) {
	header("Location:order.php");
}
 ?>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $customerReg = $cmr->customerRegistration($_POST);
}

?>  
 <div class="main">
    <div class="content">         
    	<div class="register_account">
    		<?php 

    		if (isset($customerReg)) {
    			echo $customerReg;
    		}
    		 ?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name"/>
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City"/>
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code"/>
							</div>
							<div>
								<input type="text" name="email" placeholder="Email"/>
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address"/>
						</div>
		    		
						<div>
							<input type="text" name="country" placeholder="Country"/>
						</div>
				 	        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone"/>
		          </div>
				  
				  <div>
					<input type="text" name="pass" placeholder="Password"/>
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search">
		   	<div>
		   		<button class="grey" name="register">Create Account</button>
		   		<a href="login.php"> Login</a>
		   	</div>
		   </div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>