<?php

$method = $_SERVER['REQUEST_METHOD'];
$url = parse_url($_SERVER['REQUEST_URI']);
$path = $url['path'];

$routes = [
    'GET' => [
        '/' => 'homeHandler',
        '/animals' => 'animalsHandler', 
        '/addAnimal' => 'addAnimalHandler',
        '/animalById' => 'animalByIdHandler',
        '/showAnimal' => 'showAnimalHandler'
    ],
    'POST' => [
        '/createAnimal' => 'createAnimalHandler',
        '/deleteAnimal' => 'deleteAnimalHandler',
        '/updateAnimal' => 'updateAnimalHandler'
    ]
];

//Call the function/s
$handlerFunction = $routes[$method][$path] ?? 'notFoundHandler';
$safeHandlerFunction = function_exists($handlerFunction) ? $handlerFunction : 'notFoundHandler';
$safeHandlerFunction();

//Template builder
function compileTemplate($filePath, $params = []): string
{
    ob_start();
    require $filePath;
    return ob_get_clean();
}

/*functions
  GET */
function homeHandler()
{
    $homeTemplate = compileTemplate('./views/home.php');
    echo compileTemplate('./views/wrapper.php', [
        'innerTemplate' => $homeTemplate
    ]);
}

function animalsHandler()
{
    $animals = json_decode(file_get_contents('./animals.json'), true);
    $animalsTemplate = compileTemplate('./views/animals.php',[
        'products' => $animals
    ]);
    echo compileTemplate('./views/wrapper.php', [
        'innerTemplate' => $animalsTemplate
    ]);
}

function addAnimalHandler()
{
    $addTemplate = compileTemplate('./views/addAnimal.php');
    echo compileTemplate('./views/wrapper.php', [
        'innerTemplate' => $addTemplate
    ]);
}

function animalByIdHandler()
{
    $animalId = $_GET['id'] ?? "";
    $animals = json_decode(file_get_contents('./animals.json'), true);
  
    $foundAnimalIndex = -1;

    foreach($animals as $index => $animal)
    {
        if($animal['id'] === $animalId)
        {
            $foundAnimalIndex = $index;
            break;
        }
    }
   
    if($foundAnimalIndex === -1)
    {
        header('Location: /animals');
    }

    $myAnimal = $animals[$foundAnimalIndex];
    $animalByIdTemplate = compileTemplate('./views/animalById.php',[
        'myAnimal' => $myAnimal  
    ]);

    echo compileTemplate('./views/wrapper.php', [
        'innerTemplate' => $animalByIdTemplate
    ]);
}

function showAnimalHandler()
{
    $animalId = $_GET['id'] ?? "";
    $animals = json_decode(file_get_contents('./animals.json'), true);
  
    $foundAnimalIndex = -1;

    foreach($animals as $index => $animal)
    {
        if($animal['id'] === $animalId)
        {
            $foundAnimalIndex = $index;
            break;
        }
    }
   
    if($foundAnimalIndex === -1)
    {
        header('Location: /animals');
    }

    $myAnimal = $animals[$foundAnimalIndex];
    $animalByIdTemplate = compileTemplate('./views/showAnimal.php',[
        'myAnimal' => $myAnimal  
    ]);

    echo compileTemplate('./views/wrapper.php', [
        'innerTemplate' => $animalByIdTemplate
    ]);

}

//POST
function createAnimalHandler()
{
    //New Object
    $newAnimal = [
        'id' => uniqid(),
        'name' => filter_var($_POST['name'], FILTER_SANITIZE_STRING),
        'description' => filter_var($_POST['description'], FILTER_SANITIZE_STRING),
        'img' =>  filter_var('./public/img/'.$_POST['img'], FILTER_SANITIZE_STRING)
    ];

    //JSON -> Object
    $animals = json_decode(file_get_contents('./animals.json'), true);
    array_push($animals, $newAnimal);

    //Object -> JSON
    $json = json_encode($animals);
    file_put_contents('./animals.json', $json );
    header('Location: /animals');
    
}

function deleteAnimalHandler()
{
    $animalId = $_GET['id'] ?? "";
    $animals = json_decode(file_get_contents('./animals.json'), true);

    $foundAnimalIndex = -1;
    foreach($animals as $index => $animal)
    {
        if($animal['id'] === $animalId)
        {
            $foundAnimalIndex = $index;
            break;
        }
    }

    if($foundAnimalIndex === -1)
    {
        header('Location: /animals');
    }

    array_splice($animals, $foundAnimalIndex, 1);
    file_put_contents('./animals.json', json_encode($animals));
    header('Location: /animals');

}

function updateAnimalHandler()
{
    $animalId = $_GET['id'] ?? "";
    $animals = json_decode(file_get_contents('./animals.json'), true);

    $foundAnimalIndex = -1;
    foreach($animals as $index => $animal)
    {
        if($animal['id'] === $animalId)
        {
            $foundAnimalIndex = $index;
            break;
        }
    }

    if($foundAnimalIndex === -1)
    {
        header('Location: /animals');
    }

         //New Object
        $updatedAnimal = [
            'id' => $animalId,
            'name' => filter_var($_POST['name'], FILTER_SANITIZE_STRING),
            'description' => filter_var($_POST['description'], FILTER_SANITIZE_STRING),
            'img' =>  filter_var('./public/img/'.$_POST['img'], FILTER_SANITIZE_STRING)
        ];

        $animals[$foundAnimalIndex] = $updatedAnimal;

        //Object -> JSON
        $json = json_encode($animals);
        file_put_contents('./animals.json', $json );
        header('Location: /animals');
    
}

function notFoundHandler()
{
    $pageNotFound = compileTemplate('./views/pageNotFound.php');
    echo compileTemplate('./views/wrapper.php', [
        'innerTemplate' => $pageNotFound
    ]);
}

?>