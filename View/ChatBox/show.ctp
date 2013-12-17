
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

	<h1>Chat Box</h1>
	<div id="chatboxContainer"></div>
	
	<p><div id="update-content">
		<textarea msg_id="" id="txtUpdate" style="width: 570px;" name="txtUpdate" rows="4"></textarea>
		<p><input class="update" type='submit' name='Submit' value='  Update  '/></p>
	</div></p>		
	
	<h1>Send Message</h1>
	<?php 
			echo $this->Form->input('message'); 
			echo $this->Form->input('threadid', array("type" => "hidden")); 
	?>	
	<p><a id="sendMessageBtn" class="btn btn-primary btn-lg" role="button">Send</a></p>
	
</div>

<footer>
	<hr style="margin-bottom: 10px;">
  	<div>&copy; AltPlus 2013</div>
</footer>

<script type="text/javascript">

	$("#update-content").hide();

	function sendMessage() {
		var message = $("#message").val();
		var threadid = $("#threadid").val();
		jQuery.ajax({
            type:'POST',
            url: '<?php echo Router::Url(array('controller' => 'ChatBox', 'action' => 'add'), TRUE); ?>',
            success: function(response) {
				$("#message").val("");
			},
			data: "data[Message][threadid]=" + threadid + "&data[Message][message]=" + message
        });		
	}	

	$("#sendMessageBtn").click(function () {
		sendMessage();
	});		
	
	$('#message').keydown(function(event) {
        if (event.keyCode == 13) {
			sendMessage();
        }
    });		
	
	$.ajax({
        type:'POST',
        url: '<?php echo Router::Url(array('controller' => 'ChatBox', 'action' => 'threads'), TRUE); ?>',
        success: function(response) {
            jQuery('#threadboxContainer').html(response);
			$(".btn-thread:first-child").attr("class", "btn btn-large btn-success btn-thread");
        }
    });			

	var myVar=setInterval(function(){myTimer()}, 1000);	
	
	function myTimer() {
		$.ajax({
            type:'POST',
            url: '<?php echo Router::Url(array('controller' => 'ChatBox', 'action' => 'messages'), TRUE); ?>',
            success: function(response) {
                jQuery('#chatboxContainer').html(response);
            },
			data:jQuery('#threadid').serialize()
        });
	}
	
</script>