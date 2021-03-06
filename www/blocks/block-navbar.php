<script src="https://yastatic.net/jquery/1.7.0/jquery.min.js"></script>

<!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<link rel="stylesheet" href="/css/loginform.css" />
<script type="text/javascript" src="/js/loginform.js"></script>

<script type="text/javascript">

function menu(show) {
	if (show) {
		document.getElementById('block_menu').style.display = 'block';
		document.getElementById('slider').style.display = 'none';
		document.getElementById('quickmenu').style.display = 'none';
	} else {
		document.getElementById('block_menu').style.display = 'none';
		document.getElementById('slider').style.display = 'block';
		document.getElementById('quickmenu').style.display = 'block';
	}
}

// slider https://habr.com/post/319394/

$(document).ready(function() {
	var show = false;
	$('.toggle2').children('a').click(function() {
		show = !show;
		menu(show);
	});
});
</script>

<script type="text/javascript">
function popup(state) {
	// Функция показа всплывающего окна
	document.getElementById('popup_window').style.display = state;
	// document.getElementById('popup_wrap').style.display = state;
	LoginModalController.initialize();
};
</script>

<!-- <div onclick="popup('none')" id="popup_wrap"></div> -->
<!-- <div id="popup_wrap"></div> -->


<div class="logmod" id="popup_window">
	<div class="logmod__wrapper">
		<span class="logmod__close" onclick="popup('none')">Close</span>

		<div class="logmod__container">
			<ul class="logmod__tabs">
				<li data-tabtar="lgm-2"><a href="#">Login</a></li>
				<li data-tabtar="lgm-1"><a href="#">Sign Up</a></li>
			</ul>
			<div class="logmod__tab-wrapper">
				<div class="logmod__tab lgm-1">
					<div class="logmod__heading">
						<span class="logmod__heading-subtitle">Enter your personal details <strong>to create an acount</strong></span>
					</div>
					<div class="logmod__form">
						<form accept-charset="utf-8" action="#" class="simform">
							<div class="sminputs">
								<div class="input full">
									<label class="string optional" for="user-name">Email*</label>
									<input class="string optional" maxlength="255" id="user-email" placeholder="Email" type="email" size="50" />
								</div>
							</div>
							<div class="sminputs">
								<div class="input string optional">
									<label class="string optional" for="user-pw">Password *</label>
									<input class="string optional" maxlength="255" id="user-pw" placeholder="Password" type="text" size="50" />
								</div>
								<div class="input string optional">
									<label class="string optional" for="user-pw-repeat">Repeat password *</label>
									<input class="string optional" maxlength="255" id="user-pw-repeat" placeholder="Repeat password" type="text" size="50" />
								</div>
							</div>
							<div class="simform__actions">
								<input class="sumbit" name="commit" type="sumbit" value="Create Account" />
								<span class="simform__actions-sidetext">By creating an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
							</div>
						</form>
					</div>
					<div class="logmod__alter">
						<div class="logmod__alter-container">
							<a href="#" class="connect facebook">
								<div class="connect__icon">
									<i class="fa fa-facebook"></i>
								</div>
								<div class="connect__context">
									<span>Create an account with <strong>Facebook</strong></span>
								</div>
							</a>
							<a href="#" class="connect googleplus">
								<div class="connect__icon">
									<i class="fa fa-google-plus"></i>
								</div>
								<div class="connect__context">
									<span>Create an account with <strong>Google+</strong></span>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="logmod__tab lgm-2">
					<div class="logmod__heading">
						<span class="logmod__heading-subtitle">Enter your email and password <strong>to sign in</strong></span>
					</div>
					<div class="logmod__form">
						<form accept-charset="utf-8" action="#" class="simform">
							<div class="sminputs">
								<div class="input full">
									<label class="string optional" for="user-name">Email*</label>
									<input class="string optional" maxlength="255" id="user-email" placeholder="Email" type="email" size="50" />
								</div>
							</div>
							<div class="sminputs">
								<div class="input full">
									<label class="string optional" for="user-pw">Password *</label>
									<input class="string optional" maxlength="255" id="user-pw" placeholder="Password" type="password" size="50" />
									<span class="hide-password">Show</span>
								</div>
							</div>
							<div class="simform__actions">
								<input class="sumbit" name="commit" type="sumbit" value="Log In" />
								<span class="simform__actions-sidetext">Forgot your password?<br><a class="special" role="link" href="#">Click here</a></span>
							</div>
						</form>
					</div>
					<div class="logmod__alter">
						<div class="logmod__alter-container">
							<a href="#" class="connect facebook">
								<div class="connect__icon">
									<i class="fa fa-facebook"></i>
								</div>
								<div class="connect__context">
									<span>Sign in with <strong>Facebook</strong></span>
								</div>
							</a>
							<a href="#" class="connect googleplus">
								<div class="connect__icon">
									<i class="fa fa-google-plus"></i>
								</div>
								<div class="connect__context">
									<span>Sign in with <strong>Google+</strong></span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- <div align="justify" id="popup_window">
	<div id="popup_close" onclick="popup('none')">X</div>
	<div>Введите учетные данные</div>
	<form method="post" action="user?act=login<?echo(isset($_GET['refer'])?"&refer=".$_GET['refer']:"");?>">
		<input type="text" name="login" value="" onclick="if(this.value=='')this.value='';" onblur="if(this.value=='')this.value='';" />
		<input type="password" name="password" value="" onclick="if(this.value=='')this.value='';" onblur="if(this.value=='')this.value='';" />
		<input type="submit" value="Войти" />
	</form>

	<div>Регистрация</div>
	<form method="post" action="user?act=register">
		<input type="text" name="login" value="" onclick="if(this.value=='')this.value='';" onblur="if(this.value=='')this.value='';" />
		<input type="password" name="password" value="" onclick="if(this.value=='')this.value='';" onblur="if(this.value=='')this.value='';" />
		<input type="submit" value="Зарегестрироваться" />
	</form>
</div> -->

<nav>

	<div id="logo">
		<a href="/"><img src="img/block-navbar/logo-ssau.svg" style="padding-top:15px;" height="40px;" alt="Главная"></a>
		<a href="/"><div style="padding-left:35px;margin-top:-17px;"><b>ВОЕННАЯ</b> КАФЕДРА</div></a>
	</div>

	<!-- <ul id="usermenu">
		<li>Вход / Регистрация</li>
		<li><a href="#" onclick="popup('block')">Подробнее</a></li>
	</ul> -->

	<ul id="navbar">
		<li><a href="#" onclick="popup('block')">Login / Sign up</a></li>
		<? /*
			$list_menu = $pdo->query("SELECT `pages`.`name`,`pages`.`link` FROM `pages`,`top_menu` WHERE `pages`.`id` = `top_menu`.`page_id` ORDER BY `top_menu`.`queue` ASC;");
			foreach ($list_menu as $option) echo "<li><a href=\"".$option['link']."\">".$option['name']."</a></li>";
			/* ?><li class="toggle2"><a href="#">MAP</a></li><? */
		?>
	</ul>

</nav>
