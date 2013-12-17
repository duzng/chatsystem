<?php 

App::uses('AppController', 'Controller');

class MessagesController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');		
}

?>