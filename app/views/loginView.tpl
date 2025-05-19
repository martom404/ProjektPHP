{extends file="main.tpl"}
{block name=content}
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Logowanie</h2>
            <p>Masz już konto?</br>
               Zaloguj się używając swojego adresu e-mail.
            </p>
        </header>
        <section id="app_content">
                <form action="{url action='login'}" method="post">
                        <div class="row gtr-uniform gtr-50">
                            <div class="col-6 col-12-xsmall">
                            <fieldset>
                                <label for="email">Email: </label>
                                <input id="email" type="text" name="email" placeholder='Podaj email' required/></br>
                                <label for="password">Hasło:</label>
                                <input id="password" type="password" name="password" placeholder='Podaj hasło' required>                                                           
                            </fieldset>
                            </div>
                            <div class="col-6">   
                                <p>Nie masz konta? Zarejestruj się!</p>
                                <a class="button primary" href="{url action=registerView}">Zarejestruj się!</a>
                            </div>
                            <div class="col-6">
                            {include file='messages.tpl'}
                            </div>
                            <div class="col-12">
                                    <input type="submit" value="Zaloguj" class="primary" />
                            </div>
                        </div>
                </form>
        </section>
    </div>
</div>
{/block}
