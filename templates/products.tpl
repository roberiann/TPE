{include file="header.tpl"}

<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">
    <div class="container py-10">
        <div class="col-lg-8 mx-auto">
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
                    {* <li class="page-item"><a class="page-link text-info" href="#">Anterior</a></li> *}
                    <li class="page-item"><a class="page-link text-info" href="products/page/1">1</a></li>
                    <li class="page-item"><a class="page-link text-info" href="products/page/2">2</a></li>
                    <li class="page-item"><a class="page-link text-info" href="products/page/3">3</a></li>
                    {* <li class="page-item"><a class="page-link text-info" href="#">Siguiente</a></li> *}
                </ul>
            </nav>
        </div>
    </div>
</main>

{include file="footer.tpl"}