<!-- File: /app/View/Posts/add.ctp -->

<div id="abc"></div>

<h1>Add Message</h1>
<?php

echo $this->Form->create('Message');
echo $this->Form->textarea('message');
echo $this->Form->end('Save Message');

?>

<script type="text/javascript">
	var myVar=setInterval(function(){myTimer()}, 1000);	
	function myTimer() {
		jQuery.ajax({
            type:'POST',
            url: '<?php echo Router::Url(array('controller' => 'messages', 'action' => 'index'), TRUE); ?>',
            success: function(response) {
                jQuery('#abc').html(response);
            }
        });
	}
</script>

