
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="#">Chat System</a>
      <div class="nav-collapse collapse">
	    <ul class="nav">
	  	  <li><a href="<?php echo Router::Url(array('controller' => 'threads', 'action' => 'add'), TRUE); ?>">Create new thread</a></li>
		</ul>
        <div class="navbar-form pull-right">
		  <a class="btn btn-primary btn-lg"><?php echo $username; ?></a>
		  <a class="btn btn-primary btn-lg" href="<?php echo Router::Url(array('controller' => 'users', 'action' => 'logout'), TRUE); ?>">Logout</a>
        </div>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

<div class="container">	

	<h1>Threads</h1>
	<div id="threadboxContainer"></div>

	<p><div id="update-content">
		<textarea msg_id="" id="txtUpdate" style="width: 570px;" name="txtUpdate" rows="4"></textarea>
		<p><input class="update" type='submit' name='Submit' value='  Update  '/></p>
	</div></p>	
		
	<h1>Chat Box</h1>
	<div id="chatboxContainer"></div>
	
	<h1>Send Message</h1>
	<form id="mpost">
		<?php 
			echo $this->Form->input('message'); 
			echo $this->Form->input('threadid', array("type" => "hidden")); 
		?>	
	</form>
	<p><a id="sendMessage" class="btn btn-primary btn-lg" role="button">Send</a></p>
	
</div>

<footer>
	<hr style="margin-bottom: 10px;">
  	<div>&copy; AltPlus 2013</div>
</footer>

<script type="text/javascript">

	$("#update-content").hide();
	
	 $(".update").click(function() {
		var msg = $("#txtUpdate").val();
		var msgid = $("#txtUpdate").attr("msg_id");
		$.ajax({
            type:'POST',
            url: '<?php echo Router::Url(array('controller' => 'ChatBox', 'action' => 'edit'), TRUE); ?>',
            success: function(response) {
                $("#update-content").hide();
				$("#txtUpdate").val("");
				$("#txtUpdate").attr("msg_id", "");
            },
			data: "data[Message][id]=" + msgid + "&data[Message][message]=" + msg
        });		
		
    });		

	$("#sendMessage").click(function () {
		jQuery.ajax({
            type:'POST',
            url: '<?php echo Router::Url(array('controller' => 'ChatBox', 'action' => 'add'), TRUE); ?>',
            success: function(response) {
                // do something here
            },
			data:jQuery('#mpost').serialize()
        });
	});		
	
	$.ajax({
        type:'POST',
        url: '<?php echo Router::Url(array('controller' => 'threads', 'action' => 'index'), TRUE); ?>',
        success: function(response) {
            jQuery('#threadboxContainer').html(response);
			$(".btn-thread:first-child").attr("class", "btn btn-large btn-success btn-thread");
        }
    });			

	var myVar=setInterval(function(){myTimer()}, 1000);	
	
	function myTimer() {
		$.ajax({
            type:'POST',
            url: '<?php echo Router::Url(array('controller' => 'messages', 'action' => 'index'), TRUE); ?>',
            success: function(response) {
                jQuery('#chatboxContainer').html(response);
            },
			data:jQuery('#threadid').serialize()
        });
	}
	
</script>