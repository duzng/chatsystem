<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Message</h1>
<?php
echo $this->Form->create('Thread');
echo $this->Form->input('threadname');
echo $this->Form->end('Save Thread');

?>