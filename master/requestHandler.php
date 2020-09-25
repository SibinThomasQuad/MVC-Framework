<?php
class request
{
     function post($key=NULL)
     {
     	if($key != NULL)
        {
            return $_POST[$key];
        }
        else
        {
            return $_POST;
        }
     }
}
?>
