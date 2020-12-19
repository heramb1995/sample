<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<?php
		
		$category = $_REQUEST['category'];
		$con      = mysqli_connect("localhost","root","","herambdb");	
		$query    = "select * from blogs where category='".$category."'";
		$result   = mysqli_query($con,$query) or die(mysqli_error($con));
		$result1  = mysqli_fetch_assoc($result);	
?>
<div class="container">
<h2>Blogs</h2>
<div class="pull-right">
		<form method="post" action="getPost.php"> 
		Sort by
			<select name="category">
				<option value="travel">travel</option>
				<option value="music">music</option>
				<option value="sports">sports</option>
				<option value="language">language</option>
			</select>
		<input type="submit" value="Search">
		</form>
		</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Content</th>
	<th>Written on</th>
        <th>Action</th>
      </tr>
    </thead>
	
    <tbody>

    </tbody>
  </table>
<?php foreach($result as $value){ ?>
      <tr>
        	<td><?php echo $value['content']; ?></td>
        	<td><?php echo $value['created_on']; ?></td>
		<td>
			<a href="add.php" class="btn btn-info">Create</a>
			<a href="view.php?id=<?php echo $value['blog_id']; ?>" class="btn btn-success">View</a>
			<a href="edit.php?id=<?php echo $value['blog_id']; ?>" class="btn btn-info">Edit</a>
			<a href="delete.php?id=<?php echo $value['blog_id']; ?>" class="btn btn-danger">Delete</a>
		</td>

      </tr>
<?php } ?>
</div>
	
        
  