<h1>Add a new thread</h1>
<?php
echo $this->Form->create('Thread');
echo $this->Form->input('threadname');
echo $this->Form->end('Save Thread');
?>