<?php foreach ($threads as $thread): ?>
	<a class="btn btn-success btn-thread" val="<?php echo $thread['Thread']['id']; ?>"><?php echo $thread["Thread"]['threadname']; ?></a>
<?php endforeach; ?>

<script type="text/javascript">
	function thread_click(e) {
		var threadid = $(this).attr("val");
		$("#threadid").val(threadid);
		$(".btn-thread").attr("class", "btn btn-success btn-thread");
		$(this).attr("class", "btn btn-large btn-success btn-thread");
	}
	
	$(".btn-thread").click(thread_click);
</script>