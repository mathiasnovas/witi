<form class="add-form" role="form" action="bin/add.php" type="">
	<div class="wrapper">
		<h1>Add new person</h1>
	    <div class="form-group">
	        <label for="name">Name</label>
	        <input required class="form-control" type="text" id="name" name="name" placeholder="Name">
	    </div>
	    
	    <div class="form-group">
	        <label for="image">Image</label>
	        <input required type="file" class="form-control" accept="image/*;capture=camera" name="image[]" id="image">
	    </div>

	    <input type="hidden" name="type" value="person">
	    <input type="hidden" name="rotation">
	    <button class="btn btn-default" type="submit">Add new person</button>
	</div>
</form>
