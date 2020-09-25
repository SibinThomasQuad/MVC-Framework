<?php
/*This is a configration pages for urls*/
class url
{
	function baseurl()
        {
		/***************************************************/
                /********please add the base url of your website here*********/
		/***************************************************/
        	$baseUrl='http://localhost/php7/mvc/';
        	return $baseUrl;
        }
        function index()
        {  
		/****************************************************/
                /****plese add the index controller and its method to the index***/
        	/***************************************************/
                $index="master/masterdata/1/2/3";
        	return $index;
        }
}
?>
