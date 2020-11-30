{include file="header.tpl"}

<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">
    <div class="row">
        <div class="card card-almacen mb-3 col-md-4" style="max-width: 28rem;">
            <div class="card-header bg-transparent card-almacen">
                <h2> {$product->nombre_producto} </h2>
            </div>

            {* <article id="data" data-id_producto="{$product->id_producto}" data-id_usuario="{$smarty.session.USERID}" data-admin="N">
            </article> *}

            <img class="card-img-top" src={$product->imagen} alt="Card image">
            <div class="card-body card-almacen">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="badge badge-info">Categoria:</span> {$product->nombre_categoria} </li>
                    <li class="list-group-item"><span class="badge badge-info">Descripción:</span> {$product->desc_producto} </li>
                    <li class="list-group-item"><span class="badge badge-info">Precio: $</span> {$product->precio} </li>
                    <li class="list-group-item"><span class="badge badge-info">Stock:</span> {$product->stock}Kg. </li>
                </ul>
            </div>
        </div>

        <div class="col-md-8">
            {include file="vue/commentList.vue"}
            {if isset($smarty.session.EMAIL)}
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
            {/if}
        </div>
    </div>

</main>
<!-- incluyo JS para CSR -->
<script src="js/comments.js"></script>
{include file="footer.tpl"}