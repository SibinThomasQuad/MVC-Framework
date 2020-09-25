<link rel="stylesheet" type="text/css" href="<?php echo url::baseurl(); ?>framework/css/errors.css">
<?php
class Message
{
 	function E404()
        {
	 	echo "<div class='frameworkerror'><p>404 PAGE NOT FOUND</p></div>";
        }
        function EINDEX()
	{
         	echo "<div class='frameworkerror'><p>INDEX URL IS NOT CONFIGURED</p></div>";
        }
        function DBE($error)
        {
		echo "<div class='frameworkerror'><p>DATABASE CONNECTION FAILED</p><br>".$error."</div>";
        }
       function EQUERY($sql,$error)
       {
       		echo "<div class='frameworkerror'><p>ERROR IN QUERY</p><br><b>".$sql."</b><br></br>".$error."<br></br></div>";
       }
       function EFILE($errors)
       {
          echo "<div class='frameworkerror'><p>$errors</p><br></div>";
       }
}
?>
