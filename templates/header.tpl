<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <base href="{BASE_URL}">

     
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
   
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
   <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css.map">
    


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/997b40c35d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


    <title>{$titulo}</title>
</head>
<header>
<nav class="navbar-expand-lg navbar-dark bg-dark navbar-fixed-top ">
  <div class="container-fluid">
    <a class="navbar-brand" href="home">Music is Life</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="" id="navbarSupportedContent">
          <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="genre">Genres</a>
            </li>
            
          </ul>
        </li>
          

              <ul class="nav justify-content-end">
          
          <li class="nav-item"><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <li class="nav-item"><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
           <li class="nav-item"><a href="signUp"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
           {if $rol == 1}
            <li class="nav-item"><a href="adminMenu"><span class="glyphicon glyphicon-cog"></span> Admin</a></li>
           {/if}
        </ul>
      </div>
      
  </div>
</nav>
</header>




<body>
