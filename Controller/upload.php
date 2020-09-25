<?php
class Upload extends Controller
{
        function __construct()
        {
          $modelObject=$this->loadModel('loginModel');
          $this->object_model=$modelObject;
        }
	function upload()
        {
                $this->loadView('upload');
        } 
        function uploadfile()
        {
                 $fileroules=array(
                'fileuploader' => 'image',
                'maxsize'      => '236587',
                'directory'    => 'uploads',
		'extensions'   => 'jpeg,jpg,png,pdf',
                'permenentname'=> 'hacker'
                );
      		uploadFile::file($fileroules);
      		
        }
}
?>
