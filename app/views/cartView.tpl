{extends file='main.tpl'}
{block name=content}
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Twój koszyk</h2>
            {include file='messages.tpl'}
        </header>

        {if $items|@count == 0}
            <p>Koszyk jest pusty.</p>
        {else}
            <table>
                <thead>
                    <tr>
                        <th>Produkt</th>
                        <th>Ilość</th>
                        <th>Cena</th>
                        <th>Akcja</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $items as $item}
                        <tr>
                            <td>{$item.name}</td>
                            <td>
                                <form action="{$conf->action_url}updateProductQuantity/{$item.id}" method="post">
                                    <input type="number" class="input-qty" name="quantity" value="{$item.quantity}" min="1" max="999">
                                    <button type="submit" class="button small">Zmień</button>
                                </form>
                            </td>
                            <td>{$item.price} zł</td>
                            <td>
                                <a href="{$conf->action_url}removeProductFromCart/{$item.id}" class="button small">Usuń</a>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>

            <p><strong>Łączna cena:</strong> {$total_price} zł</p>

            <form method="post" action="{url action='placeOrder'}">
                <input type="submit" value="Złóż zamówienie" class="primary" />
            </form>
        {/if}
    </div>
</div>
{/block}
