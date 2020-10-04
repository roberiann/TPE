{include file="header.tpl"}
<div class="container">

       <form action="verifyUser" method="post">
                    <div class="form-group">
                        <label for="user">Ususario</label>
                        <input class="form-control" id="user" name="input_user" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="input_pass">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>

</div>

{include file="footer.tpl"}