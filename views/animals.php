<div class="w-50 m-auto bg-dark text-light mt-3">
  <div class="row p-3">
    <div class="col align-self-start">
      <h2>Endangered marine species</h2>
    </div>
    <div class="col-6 align-self-center">
    <a href="/addAnimal"><button type="button" class="btn btn-info">Add Animal</button></a>

    </div>
  </div>

  <div class="row p-3">
    <table class="table bg-light table-striped">
        <thead>
            <tr>
                <th scope="col">Img</th>
                <th scope="col">Name</th>
                <th style="width:280px"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($params['products'] as $product): ?>
            <tr>
                <th scope="row"><img style="max-width:300px" src="<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>"></th>
                <td  class="align-middle"><?php echo $product['name']; ?></td>
                <td  class="align-middle">
                    <div class="row">
                        <a href="/showAnimal?id=<?php echo $product['id']; ?>" class="col"><button class="btn btn-info whale-shark">Show</button></a>
                        <a href="/animalById?id=<?php echo $product['id']; ?>" class="col"><button type="button" name="update" class="btn btn-warning">Update</button></a>
                        <form action="/deleteAnimal?id=<?php echo $product['id']; ?>" method="POST" class="col"><button type="submit" name="delete" class="btn btn-danger">Delete</button></form>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  
</div>

    