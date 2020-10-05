{include file="headerLogin.tpl"}

<div class="wrapper">
	<div class="container">
		<h1>Bienvenido</h1>
		
		<form class="form" action="verifyUser" method="post">
			<input type="text"  id="user" name="input_user" aria-describedby="emailHelp" placeholder="Usuario">
			<input type="password" id="pass" name="input_pass" placeholder="Password">
			<button type="submit" id="login-button">Continuar</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>


{include file="footerLogin.tpl"}