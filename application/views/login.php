<?php 

if(isset($this->session->userdata['user_id']) && isset($this->session->userdata['access_right']) && isset($this->session->userdata['profile_id'])){
	redirect('welcome');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
</head>

<body>
<h1>Genese</h1>
<div id="main-container">
	<div id="login">
    <?php
    	if(isset($msg)){
			echo $msg.'<br/>';
		}
	?>
		<form action="<?php echo base_url();?>login" method="post">
			<fieldset>
				<legend>Login</legend>
					Username: <input name="user" type="text" id="user"/><br/>
					Password: <input name="pass" type="password" id="pass"/><br/>
                    <input name="login" id="login" type="submit" value="Login">
                    <p id="msg"></p>
			</fieldset>
		</form>
	</div>
</div>
<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
 <script src="<?php echo base_url('assets/js/jq.js');?>"></script>