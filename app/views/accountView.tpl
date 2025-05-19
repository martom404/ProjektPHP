{extends file="main.tpl"}

{block name=content}
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Twoje konto</h2>
        </header>

        <section id="app_content">
            <div class="row gtr-uniform gtr-50">
                <div class="col-3">
                    <h3>Dane konta</h3>
                    <p><strong>Email:</strong> {$user.email}</p>
                    <p><strong>Data rejestracji:</strong> {$user.created_date|date_format:"%d.%m.%Y %H:%M"}</p>
                    <p><strong>Twoje unikalne ID: </strong>{$user.id}</p>
                </div>

                <div class="col-9">
                    <h3>Twoje zamówienia</h3>
                    {if $orders|count > 0}
                        <ul>
                        {foreach $orders as $order}
                            <li>
                                Zamówienie o numerze #{$order.id} z dnia {$order.order_date|date_format:"%d.%m.%Y %H:%M"},
                                kwota: <strong>{$order.full_price} zł</strong>,
                                status: {$order.status}
                                <a href='{$conf->action_url}showOrder/{$order.id}' class='button order'>Szczegóły</a>
                            </li>
                        {/foreach}
                        </ul>
                    {else}
                        <p>Nie masz jeszcze żadnych złożonych zamówień.</p>
                    {/if}
                </div>

                <div class="col-12">
                    <h3>Zmiana hasła</h3>
                    <form method="post" action="{url action='changePassword'}" onsubmit="return confirm('Na pewno chcesz zmienić hasło?');">
                        <div class="row gtr-uniform">
                            <div class="col-4 col-12-small">
                                <label for="oldPassword">Aktualne hasło</label>
                                <input type="password" name="oldPassword" id="oldPassword" placeholder="Aktualne hasło" required />
                            </div>
                            <div class="col-4 col-12-small">
                                <label for="newPassword">Nowe hasło</label>
                                <input type="password" name="newPassword" id="newPassword" placeholder="Nowe hasło" required />
                            </div>
                            <div class="col-4 col-12-small">
                                <label for="newPasswordRepeat">Powtórz nowe hasło</label>
                                <input type="password" name="newPasswordRepeat" id="newPasswordRepeat" placeholder="Powtórz nowe hasło" required />
                            </div>
                            <div class="col-12">
                                <input type="submit" value="Zmień hasło" class="button primary" />
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-12">
                    {include file="messages.tpl"}
                </div>

                <div class="col-12">
                    <h3>Usuń konto</h3>
                    {if $orders|count > 0}
                        <p>Jeśli masz złożone zamówienie to nie możesz zamknąć konta!</p>
                    {/if}
                    <p>Uwaga: tej operacji nie da się cofnąć!</p>
                    <form method="post" action="{url action='deleteAccount'}" onsubmit="return confirm('Na pewno chcesz usunąć konto?');">
                        <input type="submit" value="Usuń konto" class="button alt" />
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
{/block}
