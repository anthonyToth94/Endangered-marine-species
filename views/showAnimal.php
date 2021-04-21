<div class="card w-25 m-auto p-4">
    <h1 class="mb-3"><?php echo $params['myAnimal']['name']; ?></h1>
    <img src="<?php echo $params['myAnimal']['img']; ?>" alt="<?php echo $params['myAnimal']['name']; ?>" class="mb-3" style="max-width:800px">
    <p class="mb-3"><?php echo $params['myAnimal']['description']; ?></p>
    <a href="/animals"><button class="btn btn-warning">Back</button></a>
</div>