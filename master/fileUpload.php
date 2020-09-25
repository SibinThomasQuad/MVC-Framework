<?php
class uploadFile
{
     function file($fileRules)
     {
        error_reporting(E_ALL ^ E_NOTICE); 
        $extensions=explode(',',$fileRules['extensions']);
        $textfiels=$fileRules['fileuploader'];
        $maxSize=$fileRules['maxsize'];
        $directory=$fileRules['directory'];
        if(isset($_FILES[$textfiels]))
        	{
        		$errors= array();
        		$file_name = $_FILES[$textfiels]['name'];
        		$file_size =$_FILES[$textfiels]['size'];
        		$file_tmp =$_FILES[$textfiels]['tmp_name'];
        		$file_type=$_FILES[$textfiels]['type'];
        		$file_ext=strtolower(end(explode('.',$_FILES[$textfiels]['name'])));
       				 if(in_array($file_ext,$extensions)=== false)
					{
         					$errors[]="extension not allowed";
        				}
      				if($file_size > $maxSize)
					{
        					 $errors[]="File size must be excately $maxSize";
      					}
      				if(empty($errors)==true)
					{
         					move_uploaded_file($file_tmp,"$directory/".$fileRules['permenentname']);
         					return true;
      					}
					else
					{
                                                $errorsString=implode(",",$errors);
         					message::EFILE($errorsString);
      					}
     		}
	}
}
?>
