{include file="headerAdmLogged.tpl"}
<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">
    <table class="table-almacen">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$users item=user}
                <tr>
                    <td> <strong> {$user->nombre_usuario} </strong></td>
                    <td> {$user->email}</td>
                    <td> {$user->admin}</td>
                    <td><button class="btn-mod" id="btn-edit"><a href="edit-user/{$user->id_usuario}">
                    {if $user->admin eq "Y"}
                        QuitarAdmin
                    {else}
                       DarAdmin
                    {/if}                    
                    </a></button></td> 
                    <td><button class="btn-mod"><a href="delete-user/{$user->id_usuario}">X</a></button></td>               
                </tr>
            {/foreach}
        </tbody>
    </table>
</main>

{include file="footer.tpl"}