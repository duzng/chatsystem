<?php
class ChatBoxController extends AppController {
	public $uses = array('Message');
	public function show() {
		$this->set("messages", $this->Message->find("all"));
	}

}
?>
