<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Most endangered marine species</title>
    <link href="./public/style.css" rel="stylesheet">
</head>
<body>
    <nav class="nav navbar-brand bg-dark">
        <a href="/" class="navbar-brand link-warning ms-3">Home</a> <!-- navbar-brand -->
        <a href="/animals" class="navbar-brand link-info">Animals</a>
    </nav>

    <main>
      <?php echo $params['innerTemplate']; ?>
    </main>

    <footer class="bg-dark text-center fixed-bottom">
         <div class="text-center p-2 text-warning">
            Protect the animals!
        </div>
    </footer>
</body>
</html>
