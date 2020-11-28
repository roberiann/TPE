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
            <form>
                <input type="hidden" id="id_producto" name="input_id-producto" value="{$product->id_producto}">
                <input type="hidden" id="id_user" name="input_id-usuario" value="N">
                <input type="hidden" id="admin" name="admin" value="N" >
            </form>
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
        </div>
    </div>

</main>
<!-- incluyo JS para CSR -->
<script src="js/comments.js"></script>
{include file="footer.tpl"}