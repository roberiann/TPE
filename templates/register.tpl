{include file="headerLogin.tpl"}

<div class="wrapper">
    <div class="container">
        <h2>{$titulo}</h2>

        {if $error}
            <div class="alert alert-danger" role="alert">
                {$error}
            </div>
        {/if}

        <form class="form" action="registerUser" method="post">
            <input type="text"  id="name" placeholder="Nombre y apellido" name="name" aria-describedby="emailHelp">
            <input type="email" id="email" placeholder="Ingrese su correo" name="email">
            <input type="password"  id="password" placeholder="Ingrese su contraseña" name="password">
            <button type="submit" id="register-button"> Continuar </button>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
</body>

</html>