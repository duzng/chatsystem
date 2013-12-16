<?php

class AjaxController extends AppController {
	
   public function helloAjax() {
   		$this->layout='ajax';	
		
       $result = "hello " . $this->request->data["your_field"];
       $this->set("result", $result);   		   	
   }

   public function doAjax() {

   }   
   
}

?>