{include file="header.tpl"}
<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">
    <div class="container py-10">
        {* <div class="row"> *}
            <div class="col-lg-8 mx-auto">
                <!-- List group-->
                <ul class="list-group shadow">

                    {foreach from=$products item=product}
                        <!-- list group item-->
                        <li class="list-group-item">
                            <!-- Custom content-->
                            <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold mb-2"><a href="product/{$product->id_producto}">{$product->nombre_producto}</h5>
                                    <p class="font-italic text-muted mb-0 small">{$product->desc_producto} | {$product->nombre_categoria}</p>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold my-2">${$product->precio}</h6>
                                        {* <ul class="list-inline small">
                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                            <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                                        </ul> *}
                                    </div>
                                </div><img src="{$product->imagen}" alt="Product" width="200" class="ml-lg-5 order-1 order-lg-2 img-product">
                            </div> <!-- End -->
                        </li> <!-- End -->
                    {/foreach}
                </ul> <!-- End -->
            </div>
        {* </div> *}
    </div>
</main>

{include file="footer.tpl"}