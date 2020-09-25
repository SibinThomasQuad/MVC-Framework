<?php
class Connect
{
	function db($connectionArray)
       {
                                        $host=$connectionArray['host'];
                                        $user=$connectionArray['user'];
                                        $password=$connectionArray['password'];
                                        $databaseName=$connectionArray['db'];
                                        $port=$connectionArray['port'];
            	                        $conn = mysqli_connect($host,$user,$password,$databaseName,$port);
                                        if (mysqli_connect_errno()) {
  					$error=mysqli_connect_error();
                                        message::DBE($error);
  					exit();
                                        }
                                        else
                                        {
                            		return $conn;
					}	
      }

}
?>