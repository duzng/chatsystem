<?php
class ChatBoxController extends AppController {
	var $uses = array("Message", "Thread");
	
	public function show() {
		$username = $this->Auth->user("username");
		$this->set("username", $username);
	}
	
	public function add() {
		$this->Message->create();
		$userid = $this->Auth->user("id");
		$this->request->data["Message"]["senderid"] = $userid;
		if (empty($this->request->data["Message"]["threadid"])) {
			$this->request->data["Message"]["threadid"] = 1; // the default thread
		} 
		$this->Message->save($this->request->data);
	}	
	
	public function delete() {
		$this->Message->id = $this->request->data['Message']['id'];
		$this->request->data['Message']['created'] = date("Y-m-d H:i:s", time());
		$this->request->data['Message']['message'] = "deleted";
		$this->Message->save($this->request->data);
	}		
	
	public function edit() {
		$this->request->data['Message']['created'] = date("Y-m-d H:i:s", time());
		$this->Message->save($this->request->data);
	}
	
	public function threads() {
		$this->set("threads", $this->Thread->find("all"));
	}
	
	public function messages() {
		$threadid = $this->request->data["threadid"];
		if (!empty($threadid)) {
			$this->set("messages", $this->Message->find("all", array('conditions' => "Message.threadid = $threadid")));	
		} else {
			// The thread with id=1 is the default thread. 
			$this->set("messages", $this->Message->find("all", array('conditions' => "Message.threadid = 1")));
		}		
	}
}
?>
