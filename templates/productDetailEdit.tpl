{include file="headerAdmLogged.tpl"}
<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">

    <div class="row">
        <div class="col-md-4">
            <form action="edit-product" method="post">
                <input type="hidden" id="id_producto" name="input_id-producto" value="{$product->id_producto}">
                <input type="hidden" id="id_usuario" name="input_id-usuario" value="{$smarty.session.USERID}">
                <div class="form-group">
                    <label for="title">Producto</label>
                    <input class="form-control" id="producto" name="input_producto" value="{$product->nombre_producto}" type="text">
                </div>
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input class="form-control" id="description" name="input_description" value="{$product->desc_producto}" type="text">
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input class="form-control" id="precio" name="input_precio" value="{$product->precio}" type="number">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input class="form-control" id="stock" name="input_stock" value="{$product->stock}" type="number">
                </div>
                <div class="form-group">
                    <label for="category">Categoria</label>
                    <select name="input_categoria" class="form-control" value="{$product->id_categoria}">
                        {foreach from=$categories item=category}
                            {if $category->id eq $product->id_categoria}
                                <option selected value="{$category->id}">{$category->nombre}</option>
                            {else}
                                <option value="{$category->id}">{$category->nombre}</option>
                            {/if}
                        {/foreach}
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
        <div class="col-md-8">
            {include file="vue/commentList.vue"}


            <form id="comment-form" action="insert-comment" method="POST">
                <div class="form-group">
                    <label>Comentario</label>
                    <textarea name="comentario" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <select name="calificacion" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </div>



    </div>
</main>
<!-- incluyo JS para CSR -->
<script src="js/comments.js"></script>
{include file="footer.tpl"}