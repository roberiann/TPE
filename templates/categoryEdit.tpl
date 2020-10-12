{include file="header.tpl"}
<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">

    <form action="editctg" method="post">
        <input type="hidden" id="id_categoria" name="input_id-categoria" value="{$category->id_categoria}">
        <div class="form-group">
            <label for="title">Categoria</label>
            <input class="form-control" id="categoria" name="input_categoria" value="{$category->nombre_categoria}" type="text">
        </div>
        <div class="form-group">
            <label for="description">Descripcion</label>
            <input class="form-control" id="description" name="input_description" value="{$category->desc_categoria}" type="text">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

</main>
{include file="footer.tpl"}


