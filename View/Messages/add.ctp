<!-- File: /app/View/Posts/add.ctp -->



<h1>Add Message</h1>
<?php

echo $this->Form->create('Message');
echo $this->Form->textarea('message');
echo $this->Form->end('Save Message');

?>