<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($message['Message']['message']); ?></h1>

<p><small>Created: <?php echo $message['Message']['created']; ?></small></p>

<p><?php echo h($message['Message']['threadid']); ?></p>