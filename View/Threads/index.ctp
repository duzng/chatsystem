<!-- File: /app/View/threads/index.ctp -->

<h1>threads</h1>
<table>
    <tr>
        <th>id</th>
        <th>threadname</th>
        <th>created</th>
    </tr>

    <!-- Here is where we loop through our $threads array, printing out thread info -->

    <?php foreach ($threads as $thread): ?>
    <tr>
        <td><?php echo $thread["Thread"]['id']; ?></td>
		<td><?php echo $thread["Thread"]['threadname']; ?></td>
		<td><?php echo $thread["Thread"]['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($thread); ?>
</table>