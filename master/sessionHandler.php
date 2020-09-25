<?php
class session
{
	function load()
	{
            session_start();
        }
        function set($sessionData,$key)
        {
 	    $_SESSION[$key] = $sessionData;
            return 1;
        }
        function get($key)
        {
	    return $_SESSION[$key];
        }
        function remove()
        {
	    session_unset();
	    return 1;
        }
        function destory()
        {
	   session_destroy(); 
        }

}
?>
