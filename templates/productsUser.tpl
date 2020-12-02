{include file="header.tpl"}

<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">
    <div class="row">
        {include file="search.tpl"}
        <div class="col-md-8">
            <div class="container py-10">
                <div>
                    <ul class="list-group shadow">
                        {foreach from=$products item=product}
                            <li class="list-group-item">
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                    <div class="media-body order-2 order-lg-1">
    
                                        <h5 class="mt-0 font-weight-bold mb-2"><a href="product/{$product->id_producto}">{$product->nombre_producto}</h5>
                                        <p class="font-italic text-muted mb-0 small">{$product->desc_producto} | {$product->nombre_categoria}</p>
                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                            <h6 class="font-weight-bold my-2">${$product->precio}</h6>
                                        </div>
                                    </div><img src="{$product->imagen}" alt="Product" width="200" class="ml-lg-5 order-1 order-lg-2 img-product">
                                </div>
                            </li>
                        {/foreach}
                    </ul>

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center ">
                            <li class="page-item {if $pageno <= 1}disabled{/if}">
                                <a class="page-link" href="{if $pageno <= 1}#{else}products?product={$product}&pricefrom={$pricefrom}&priceto={$priceto}&page={$pageno-1}{/if}">Anterior</a></li>
                            {for $i=1 to $no_of_pages}
                                <li class="page-item"><a class="page-link" href="products?product={$product}&pricefrom={$pricefrom}&priceto={$priceto}&page={$i}">{$i}</a></li>
                            {/for}
                            <li class="page-item {if $pageno >= $no_of_pages}disabled{/if}">
                                <a class="page-link" href="{if $pageno >= $no_of_pages}#{else}products?product={$product}&pricefrom={$pricefrom}&priceto={$priceto}&page={$pageno+1}{/if}">Siguiente</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>

{include file="footer.tpl"}