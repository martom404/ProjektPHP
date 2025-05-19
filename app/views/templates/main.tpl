
<!DOCTYPE HTML>
<html lang="pl">
<head>
        <title>{$page_title|default:"Heaven4Gamers"}</title>
        <meta name="description" content="{$page_description|default:"Mamy najlepszą ofertę gier na rynku!"}">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
        <noscript><link rel="stylesheet" href="{$conf->app_url}/assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload landing">
<div id="page-wrapper">
<header id="header">
        <h1 id="logo">Heaven4Gamers</h1>
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
                        {if \core\RoleUtils::inRole("user")}
                        <li><a href="{url action='showAccount'}">Moje konto</a></li>
                        <li><a href="{url action='logout'}" class="button primary">Wyloguj</a></li>
                        {else if \core\RoleUtils::inRole("admin")}
                        <li><a href="{url action='adminPanel'}">Panel administratora</a></li>
                        <li><a href="{url action='logout'}" class="button primary">Wyloguj</a></li>
                        {else}
                        <li><a href="{url action='loginView'}" class="button primary">Logowanie</a></li>
                        <li><a href="{url action='registerView'}" class="button primary2">Rejestracja</a></li>
                        {/if}
                </ul>
        </nav>
</header>

{block name=content}{/block}

<footer id="footer">
    <div class='row gtr-uniform gtr-50'>
    <div class='col-12'>
    <h4>Sprawdź nasze social media!</h4>
        <ul class="icons">
                <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
        </ul>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <div style="max-width: 400px; width: 100%;">
            <h4>Skontaktuj się z nami</h4>
            <form action="{url action='sendMessage'}" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Twój email</label>
                    <input type="email" class="form-control" id="email" name="email" required />
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Wiadomość</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Wyślij</button>
            </form>
        </div>
    </div>
    <div class='col-12'>
        <ul class="copyright">
                <li>© 2025 Heaven4Gamers. Wszelkie prawa zastrzeżone.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
    </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>