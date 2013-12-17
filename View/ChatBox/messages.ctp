
<?php foreach ($messages as $message): ?>
	<a class="btn btn-delete" msgid="<?php echo $message['Message']['id']; ?>">delete</a>
	<a class="btn btn-update" text="<?php echo $message['Message']['message']; ?>" msgid="<?php echo $message['Message']['id']; ?>">update</a>
	<?php echo $message['UserFrom']['username']; ?>
	<?php echo $message['Message']['created']; ?>:
	<?php echo $message['Message']['message']; ?><br/>
<?php endforeach; ?>

<script type="text/javascript">

	function btn_delete_click(e) {
		var msgid = $(this).attr("msgid");
		jQuery.ajax({
            type:'POST',
            url: '<?php echo Router::Url(array('controller' => 'ChatBox', 'action' => 'delete'), TRUE); ?>',
            success: function(response) {
                // do something here
            },
			data: "data[Message][id]=" + msgid
        });		
		
	}	
	$(".btn-delete").click(btn_delete_click);
	
	function btn_update_click(e) {
		var text = $(this).attr("text");
		var msgid = $(this).attr("msgid");
		$("#txtUpdate").val(text);
		$("#txtUpdate").attr("msg_id", msgid);
		$("#update-content").show();
	}	
	
	 $(".update").click(function() {
		var msg = $("#txtUpdate").val();
		var msgid = $("#txtUpdate").attr("msg_id");
		$.ajax({
            type:'POST',
            url: '<?php echo Router::Url(array('controller' => 'ChatBox', 'action' => 'edit'), TRUE); ?>',
            success: function(response) {
				$(".btn-update").click(btn_update_click);				
                $("#update-content").hide();
            },
			data: "data[Message][id]=" + msgid + "&data[Message][message]=" + msg
        });		
		
    });	
	
 $(".btn-update").click(btn_update_click);				
	
</script>
