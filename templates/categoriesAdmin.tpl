{include file="headerAdmLogged.tpl"}
<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">
    <table class="table-almacen">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Descripción</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$categories item=category}
                <tr>
                    <td> <strong> {$category->nombre} </strong></td>
                    <td> {$category->descripcion}</td>
                    <td><button class="btn-mod"><a href="delete-category/{$category->id}">X</a></button></td>
                    <td><button class="btn-mod" id="btn-edit"><a href="category-edit/{$category->id}">Edit</a></button></td>
                </tr>
            {/foreach}
        </tbody>
        <tfoot>
            <tr>
                <form action="insert-category" method="post">
                    <td><input class="input-table" id="categoria" name="input_categoria" tpe="text" placeholder=""></td>
                    <td><input class="input-table" id="descripcion" name="input_descripcion" type="text"></td>
                    <td><button type="submit" class="btn btn-table" id="btn-agregar">Agregar</button></td>
                </form>
            </tr>
        </tfoot>
    </table>
</main>

{include file="footer.tpl"}