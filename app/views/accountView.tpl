{extends file="main.tpl"}
{block name=content}
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Twoje konto</h2>
        </header>
        <section id="app_content">
            <div class="row gtr-uniform gtr-50">
                <div class="col-6">
                    <p>Twój email: {$user.email}</p>
                    <p>Data utworzenia konta: {$user.created_date} </p>
                </div>
                <div class="col-6">
                    
                    <p>Twoje zamówienia</p>
                    
                </div>

                <form method="post" action="{url action='changePassword'}" onsubmit="return confirm('Na pewno chcesz zmienić hasło?');">
                <div class="row gtr-uniform">
                    <div class="col-6">
                        <label for="oldPassword">Podaj aktualne hasło: </label>
                        <input type="password" name="oldPassword" id="oldPassword" placeholder="Aktualne hasło" required />
                    
                        <label for="newPassword">Podaj nowe hasło: </label>
                        <input type="password" name="newPassword" id="newPassword" placeholder="Nowe hasło" required />
                   
                    
                        <label for="newPasswordRepeat">Powtórz nowe hasło: </label>
                        <input type="password" name="newPasswordRepeat" id="newPasswordRepeat" placeholder="Powtórz nowe hasło" required />
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Zmień hasło" class="button primary" />
                    </div>
                </div>
                </form>

                <div class="col-12">
                {foreach $msgs->getMessages() as $msg}
                        {$msg->text}
                {/foreach}
                </div>
                <div class="col-12">
                    <p>Chcesz usunąc konto? Kliknij na poniższy przycisk!</p>
                    <form method="post" action="{url action='deleteAccount'}" onsubmit="return confirm('Na pewno chcesz usunąć konto?');">
                        <input type="submit" value="Usuń konto" />
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
{/block}
