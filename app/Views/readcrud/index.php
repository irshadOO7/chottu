<h3>READ CRUD</h3>
<a href="<?= site_url('readcrud/add') ?>">Add</a>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>PASSWORD</th>
			<th>IMAGES</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		
		<?php if ($User1) : ?> 
		<?php foreach ($User1 as $usr) : ?>
		 <tr>
			<td><?php echo $usr['id'] ?></td>
			<td><?php echo $usr['name'] ?></td>
			<td><?php echo $usr['email'] ?></td>
			<td><?php echo $usr['password'] ?></td>
			<td><?php echo ($usr['photo'])
			?></td>
			<td><a href="<?= site_url('readcrud/delete/' . $usr['id']) ?>"> DELETE </a>| <a href="<?= site_url('readcrud/edit/' . $usr['id']) ?>">EDIT</a></td>
		</tr>
	<?php endforeach ?>
<?php endif ?>
	</tbody>
</table>