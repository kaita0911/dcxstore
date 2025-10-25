<?php 

	header("content-type: text/javascript; charset: UTF-8");

	header("cache-control: must-revalidate");





function compress($buffer) {

     /* remove comments */

        $buffer = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $buffer);

        /* remove tabs, spaces, newlines, etc. */

        $buffer = str_replace(array("\r\n","\r","\t","\n",'  ','    ','     '), '', $buffer);

        /* remove other spaces before/after ) */

        $buffer = preg_replace(array('(( )+\))','(\)( )+)'), ')', $buffer);

        return $buffer;

}

//include_once("../#include/config.php");



include('jquery-1.11.0.min.js');

//include('all.js');
include('cartajax.js');

include('less.js');

include('bootstrap.min.js');

include('jquery.elevatezoom.js');

include('jquery.fancybox.js');

include('jquery.counterup.min.js');

include('comon.js');

ob_end_flush();

?>

