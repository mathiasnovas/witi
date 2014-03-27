<form class="add-person" role="form" action="bin/add.php" type="">
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Name">
    </div>
    
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" accept="image/*;capture=camera" name="image[]" id="image">
    </div>

    <button class="btn btn-default" type="submit">Go</button>
</form>