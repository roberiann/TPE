<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$titulo}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/artesano.ico" mce_href="artesano.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/styles-artesano.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="home"><img src="images/logo.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                     {if isset($smarty.session.USERID)}
                        {if $smarty.session.ADMIN eq 1}
                            {include file="navAdmin.tpl"}
                        {else}
                            {include file="navUser.tpl"}
                        {/if}
                        <li class="nav-item">
                            <a class="nav-link" href="logout">LOGOUT</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout"><img src="images/logout.png" alt="Logout"> </a>
                        </li>
                    {else}
                        {include file="navUser.tpl"}
                        <li class="nav-item">
                            <a class="nav-link" href="login">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a href="login"><img src="images/login.png" alt="Login"></a>
                        </li>
                    {/if}
                </ul>
            </div>
        </nav>
    </header>