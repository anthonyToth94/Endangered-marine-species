<div class="card w-50 m-auto mt-3 text-center p-3 bg-dark ">
    <form action="/updateAnimal?id=<?php echo $params['myAnimal']['id']; ?>" method="POST">
        <h3 class="mb-3 text-info">Add a new <span class="text-danger">Animal</span></h3>
        <input type="text" placeholder="Name" name="name" class="p-2 mb-3 form-control" value="<?php echo $params['myAnimal']['name'] ?>">
        <div class="mb-3">
            <label for="textarea" class="form-label text-white">Description</label>
            <textarea id="textarea" aria-label="With textarea" class="form-control" name="description"><?php echo $params['myAnimal']['description'] ?></textarea>
        </div>

        <div class="mb-3">
            <input type="file" class="form-control" name="img">
        </div>

       <button type="submit" name="update" class="btn btn-warning">Update</button>
    </form>
</div>
