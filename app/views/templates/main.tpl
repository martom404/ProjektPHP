<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<title>{$page_title|default:"Heaven4Gamers"}</title>
                <meta name="description" content="{$page_description|default:"Mamy najlepszą ofertę gier na rynku!"}">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="{$conf->app_url}/assets/css/noscript.css" /></noscript>
	</head>
        
	<body class="is-preload landing">
		<div id="page-wrapper">
				<header id="header">
					<h1 id="logo"><a href="{url action='mainShow'}">Heaven4Gamers</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="{url action='mainShow'}">Strona główna</a></li>
							<li>
								<a href="#">Playstation</a>
								<ul>
									<li><a href="{url action='showCategory/PlaystationKonsole'}">Konsole</a</li>
									<li><a href="{url action='showCategory/PlaystationGry'}">Gry</a></li>
									<li><a href="{url action='showCategory/PlaystationAkcesoria'}">Akcesoria</a></li>
								</ul>
							</li>
                                                        <li>
								<a href="#">Xbox</a>
								<ul>
									<li><a href="{url action='showCategory/XboxKonsole'}">Konsole</a</li>
									<li><a href="{url action='showCategory/XboxGry'}">Gry</a></li>
									<li><a href="{url action='showCategory/XboxAkcesoria'}">Akcesoria</a></li>
								</ul>
							</li>
                                                        <li>
								<a href="#">Nintendo Switch</a>
								<ul>
									<li><a href="{url action='showCategory/NintendoKonsole'}">Konsole</a</li>
									<li><a href="{url action='showCategory/NintendoGry'}">Gry</a></li>
									<li><a href="{url action='showCategory/NintendoAkcesoria'}">Akcesoria</a></li>
								</ul>
							</li>
                                                        <li>
								<a href="#">PC</a>
								<ul>
									<li><a href="{url action='showCategory/PcGry'}">Gry</a></li>
								</ul>
							</li>
							<li><a href="{url action='showCart'}">Koszyk</a></li>
                                                        {if !$is_logged}
                                                        <li><a href="{url action='loginView'}" class="button primary">Logowanie</a></li>
                                                        <li><a href="{url action='registerView'}" class="button primary2">Rejestracja</a></li>
                                                        {else}
                                                        <li><a href="{url action='showAccount'}">Moje konto</a></li>
                                                        <li><a href="{url action='logout'}" class="button primary">Wyloguj</a></li>
                                                        {/if}
						</ul>
					</nav>
				</header>
                                
                                {block name=content}{/block}
				
                                <footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>© 2025 Heaven4Gamers. Wszelkie prawa zastrzeżone.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>
			<script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
			<script src="{$conf->app_url}/assets/js/jquery.scrolly.min.js"></script>
			<script src="{$conf->app_url}/assets/js/jquery.dropotron.min.js"></script>
			<script src="{$conf->app_url}/assets/js/jquery.scrollex.min.js"></script>
			<script src="{$conf->app_url}/assets/js/browser.min.js"></script>
			<script src="{$conf->app_url}/assets/js/breakpoints.min.js"></script>
			<script src="{$conf->app_url}/assets/js/util.js"></script>
			<script src="{$conf->app_url}/assets/js/main.js"></script>

	</body>
</html>