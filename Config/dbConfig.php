<?php
class db
 {
			function connect()
			{
                                        /******************CONNECTION DETAILS**************************/
                                        /* This field is to enter the details of mysql configration to connect to data bases*/
                                        /**************************************************************/
					$connectionArray=array(
                                        'host' => 'localhost',
                                        'user' => 'sibin',
                                        'password' => 'SibinTh0mas@2020',
                                        'db' => 'tender',
                                        'port' => '3306'
                                         );
                                         return Connect::db($connectionArray);
                        }
	}

?>
