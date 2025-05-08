{extends file="main.tpl"}
{block name=content}
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Rejestracja</h2>
            <p>Nie masz konta?</br>
               Wprowadź swój adres e-mail oraz hasło, aby utworzyć konto.
            </p>
        </header>
        <section id="app_content">
                <form action="{$conf->action_url}registerSave" method="post">
                        <div class="row gtr-uniform gtr-50">
                            <div class="col-6 col-12-xsmall">
                            <fieldset>
                                <label for="email">Email: </label>
                                <input id="email" type="text" name="email" placeholder='Podaj email' required/>
                                <label for="password">Hasło:</label>
                                <input id="password" type="password" name="password" placeholder='Podaj hasło' required>                                                           
                            </fieldset>
                            </div>
                            <div class="col-6">    
                            {foreach $msgs->getMessages() as $msg}
                                {$msg->text}
                            {/foreach}
                            </div>
                                <div class="col-12">
                                        <input type="submit" value="Zarejestruj" class="primary" />
                                </div>
                        </div>
                </form>
        </section>
    </div>
</div>
{/block}
