{include file="headerLoggedIn.tpl"}
<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">
 <div class="col-5">
    <form action="edit-category" method="post">
        <input type="hidden" id="id_categoria" name="input_id-categoria" value="{$category->id_categoria}">
        <div class="form-group">
            <label for="title">Categoría</label>
            <input class="form-control" id="categoria" name="input_categoria" value="{$category->nombre_categoria}" type="text">
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <input class="form-control" id="description" name="input_description" value="{$category->desc_categoria}" type="text">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
</main>
{include file="footer.tpl"}