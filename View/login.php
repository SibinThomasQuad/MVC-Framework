<?php
$passed=$this->data;
//print_r($passed);
?>
<h1>Login page</h1>
<form method='post' action='<?php echo url::baseurl(); ?>login/logins'>
<input type='text' name='uname'>
<input type='password' name='pass'>
<img src='<?php captcha::print_captcha(); ?>'></img>
<input type='submit'>
</form>
