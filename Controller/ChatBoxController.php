<?php
class ChatBoxController extends AppController {
	var $uses = "Message";
	
	public function show() {
		$username = $this->Auth->user("username");
		$this->set("username", $username);
	}
	
	public function add() {
		$this->Message->create();
		$userid = $this->Auth->user("id");
		$this->request->data["senderid"] = $userid;
		if (empty($this->request->data["threadid"])) {
			$this->request->data["threadid"] = 1;
		} 
		$this->Message->save($this->request->data);
	}	
	
	public function delete() {
		$id = $this->request->data['Message']['id'];
		$this->Message->delete($id);
	}		
	
	public function edit() {
		$this->request->data["created"] = time();
		$this->Message->save($this->request->data);
	}
}
?>
