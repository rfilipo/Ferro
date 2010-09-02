<br><br>
<div id="area_input_login">
<h2 align=center>Login</script></h2>
<br><br><br><br>
<form method="POST" action="<?php echo $_SELF; ?>" name="frmLogin" onSubmit="if(login.value =='' || password.value =='' || captcha.value =='') {alert('Preencha todos os campos!'); login.focus(); return false;};">
<table border=0 align=center>
<input type="hidden" name="token" value="<?php echo $token; ?>" />
<tr><td>Login</td>
<td><input id='login' type="text" name="login" size="12" maxlength="12"></td></tr>

<tr><td>Senha</td>
<td><input type="password" name="password" size="12" maxlength="32" ></td></tr>

<tr><td>C&oacute;digo: </td>
<td><img src="./includes/captcha-image.php" />
	<input type="text" name="captcha" size="4" maxlength="3" value="" title="captcha" /></td></tr>
<tr><td></td><td><input type="submit" name="access" value="Entrar"></td></tr>
</table>
</form>
</div>
</div>
<script>
var meuLogin = document.getElementById('login');
meuLogin.focus();
</script>

</body>
</html>

