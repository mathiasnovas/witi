<form class="add-form" action="">
    <input type="hidden" name="type" value="accessory">
    <input type="hidden" name="gadget_id" value="<?= $id; ?>">

    <div class="wrapper">
        <h1>Add new accessory</h1>

        <div class="form-group">
            <label for="name">Name</label>
            <input required class="form-control" type="text" id="name" name="name" placeholder="Name">
        </div>

        <button type="submit" class="btn btn-default">Add accessory</button>
    </div>
</form>