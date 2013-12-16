<?php 

App::uses('AppController', 'Controller');

class ThreadsController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');	
	
	public function index() {
		$this->set("threads", $this->Thread->find("all"));
	}
	
	public function add() {
        if ($this->request->is('post')) {
            $this->Thread->create();
            if ($this->Thread->save($this->request->data)) {
                return $this->redirect(array('controller'=>'ChatBox', 'action'=>'show'));
            }
            $this->Session->setFlash(__('Unable to add your message.'));
        }
    }	
		
}

?>