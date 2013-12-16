<?php 

App::uses('AppController', 'Controller');

class MessagesController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');		
	
	public function index() {
		$threadid = $this->request->data["threadid"];
		if (!empty($threadid)) {
			$this->set("messages", $this->Message->find("all", array('conditions' => "Message.threadid = $threadid")));	
		} else {
			$this->set("messages", $this->Message->find("all", array('conditions' => "Message.threadid = 1")));
		}
		
	}
	
 	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid message'));
        }

        $message = $this->Message->findById($id);
        if (!$message) {
            throw new NotFoundException(__('Invalid Message'));
        }
        $this->set('message', $message);
    }	
	
	public function add() {
		
		$this->set("messages", $this->Message->find("all"));
			
        if ($this->request->is('post')) {
            $this->Message->create();
            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash(__('Your message has been saved.'));
                return $this->redirect(array('action' => 'add'));
            }
            $this->Session->setFlash(__('Unable to add your message.'));
        }
    }	
	
	public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $message = $this->Message->findById($id);
	    if (!$message) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
	        $this->Message->id = $id;
	        if ($this->Message->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $message;
	    }
	}	
	
	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Message->delete($id)) {
	        $this->Session->setFlash(
	            __('The post with id: %s has been deleted.', h($id))
	        );
	        return $this->redirect(array('controller' => 'ChatBox', 'action' => 'show'));
	    }
	}	
}

?>