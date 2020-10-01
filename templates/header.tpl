<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
	<title>{$titulo}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="shortcut icon" href="images/artesano.ico" mce_href="artesano.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	
    <!-- Bootstrap CSS -->
  	
      <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->


   <!--   <script src="js/btn-displayer.js"></script>-->
</head>

<body>
     
    <header>
        <div class="logo">
            <button class="btn-nav" id="btn_menu"></button>
            <div>
                <img class="img-logo" src="images/logo.png" alt="Logo">
            </div>
        </div>
        <nav>
            <ul class="navigation">
                <li class="nav-li"><a href="home">Home</a></li>
                <li class="nav-li"><a href="category">Categorias</a></li>
				<li class="nav-li"><a href="product">Productos</a></li>
            </ul>
        </nav>
    </header>
	
	<h1>{$titulo}</h1>