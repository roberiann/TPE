{include file="headerLogin.tpl"}
<div class="wrapper">
	<div class="container">
		<h2>{$titulo}</h2>
		
		<form class="form" action="verifyUser" method="post">
			<input type="text"  id="email" name="email" aria-describedby="emailHelp" placeholder="Usuario">
			<input type="password" id="password" name="password" placeholder="Password">
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