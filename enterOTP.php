<?php include_once 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == true) {
	header("Location:order.php");
}
 ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['verify_otp'])) {
    $custLogin = $cmr->verifyOTP($_POST);
}

?> 

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Two factor verification</h3>
        	<p>Enter OTP.</p>
        	<form action="" method="post">
                <input name="email" placeholder="Email" type="text"/>             	
                <input name="otp" placeholder="otp" type="text"/>
                <div class="buttons">
                	<div>
                		<button class="grey" name="verify_otp">Verfy OTP</button>
                	</div>
                </div>
             </form>
           </div>                
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>