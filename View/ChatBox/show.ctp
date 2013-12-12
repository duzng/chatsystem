<!-- File: /app/View/messages/index.ctp -->

<h1>Messages</h1>
<table>
    <tr>
        <th>id</th>
        <th>message</th>
        <th>senderid</th>
		<th>threadid</th>
		<th>created</th>
    </tr>

    <!-- Here is where we loop through our $messages array, printing out message info -->

    <?php foreach ($messages as $message): ?>
    <tr>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $message['Message']['id'])); ?></td>
		<td> <?php echo $this->Html->link($message['Message']['message'],
				array('controller' => 'messages', 'action' => 'view', $message['Message']['id'])); ?>
					
					
<?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $message['Message']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
								
				</td>
		<td><?php echo $message["Message"]['senderid']; ?></td>
		<td><?php echo $message["Message"]['threadid']; ?></td>
		<td><?php echo $message["Message"]['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($message); ?>
</table>
