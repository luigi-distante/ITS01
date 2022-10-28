<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <title><?=$title?></title>
        <style>
            footer{
                padding-top: 10rem;
                padding-bottom: 3rem;
            }
            footer p{
                margin-bottom: .25rem;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Rubrica telefonica</h1>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="index.php?action=lista">Lista</a>                        
                    </li>
                    <li class="nav-item">
                        <a href="index.php?action=nuovo">Nuovo</a>                        
                    </li>
                </ul>
            </div>
        </nav>
        <main class="bg-light">
            <div class="jumbotron">
                <div class="container">
                    <h1>Rubrica Telefonica Multiutente</h1>
                    <p>Usa la mia Rubrica Telefonica!</p>
                </div>
            </div>
            <div class="container py-5">
                <?=$output?>
            </div>
        </main>
        <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                    <a href="#">Torna su</a>
                </p>
                <p>Pagina ad uso degli iscritti al club ❤</p>
                <p>Per Info chiamare 39149494949 o visitare ....</p>
            </div>
            Office
        </footer>
    </body>
</html>