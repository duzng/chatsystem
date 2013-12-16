<a href="#" id="performAjaxLink">Do Ajax </a>
<?php echo $this->Form->input('your_field', array('id' => 'resultField')); ?>	

<script>
    jQuery("#performAjaxLink").click(
	    function()  {                
	        jQuery.ajax({
	            type:'POST',
	            url: '<?php echo Router::Url(array('controller' => 'ajax', 'action' => 'helloajax'), TRUE); ?>',
	            success: function(response) {
	                jQuery('#resultField').val(response);
	            },
				data:jQuery('#resultField').serialize()
	        });
	    }
    );
</script>