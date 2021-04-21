<div class="card w-50 m-auto mt-3 text-center p-3 bg-dark ">
    <form action="/createAnimal" method="POST">
        <h3 class="mb-3 text-info">Add a new <span class="text-danger">Animal</span></h3>
        <input type="text" placeholder="Name" name="name" class="p-2 mb-3 form-control">
        <div class="mb-3">
            <label for="textarea" class="form-label text-white">Description</label>
            <textarea id="textarea" aria-label="With textarea" class="form-control" name="description"></textarea>
        </div>

        <div class="mb-3">
            <input type="file" class="form-control" name="img">
        </div>

        <button type="submit" name="create" class="btn btn-info">Create</button>
    </form>
</div>
