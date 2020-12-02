<div class="col-md-4">
     <div class="col-lg-9 col-md-6 "> 
        <div class="well">
            <form action="products" method="GET" class="form-horizontal">
                <div class="form-group">
                    <label for="product" class="control-label">Producto</label>
                    <input id="" type="text" class="form-control" name="product" placeholder="Buscar por nombre">
                </div>
                {* <div class="form-group">
                    <label for="type1" class="control-label">Type</label>
                    <select class="form-control" name="" id="type1">
                        <option value="">Todas</option>
                        <option value="">1</option>
                        <option value="">2</option>
                    </select>
                </div> *}
                <div class="form-group">
                    <label for="pricefrom" class="control-label">Precio mín</label>
                    <div class="input-group">
                        <div class="input-group-addon" id="basic-addon1">$</div>
                        <input type="text" class="form-control" name="pricefrom" aria-describedby="basic-addon1" min="0" max="10000" value="0" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="priceto" class="control-label">Precio max</label>
                    <div class="input-group">
                        <div class="input-group-addon" id="basic-addon2">$ </div>
                        <input type="text" class="form-control" name="priceto" aria-describedby="basic-addon1" min="0" max="10000" value="10000" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-info" id="btn-buscar">Buscar</button>
            </form>
        </div>
    </div>
</div>