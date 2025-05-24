{extends file="templates/main.tpl"}

{block name=content}
<div id="main" class="wrapper style1">
    <div class="container">
        
        <header class="major">
            <h2>Panel administratora</h2>
        </header>

        <section id="app_content">
            <div class="row gtr-uniform gtr-50">
                <div class="col-12">
                    {include file="messages.tpl"}
                </div>
                <div class="col-12">
                    <h3>Zamówienia</h3>
                        <table border="1" cellpadding="5">
                            <tr>
                                <th>ID</th>
                                <th>Użytkownik</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th>Akcje</th>
                            </tr>
                            {foreach from=$order item=order}
                                <tr>
                                    <td>{$order.id}</td>
                                    <td>{$order.user_id}</td>
                                    <td>{$order.status}</td>
                                    <td>{$order.order_date}</td>
                                    <td>
                                    <div class="row gtr-10">
                                        <div class="col-6 col-12-small">
                                            <form method="post" action="{url action='updateOrderStatus'}">
                                                <input type="hidden" name="order_id" value="{$order.id}">
                                                <select name="status">
                                                    <option value="nowe" {if $order.status == 'nowe'}selected{/if}>Nowe</option>
                                                    <option value="złożone" {if $order.status == 'złożone'}selected{/if}>Złożone</option>
                                                    <option value="anulowane" {if $order.status == 'anulowane'}selected{/if}>Anulowane</option>
                                                    <option value="zrealizowane" {if $order.status == 'zrealizowane'}selected{/if}>Zrealizowane</option>
                                                </select>
                                                <input type="submit" value="Zmień">
                                            </form>
                                        </div>
                                        <div class="col-6 col-12-small">
                                            <form method="post" action="{url action='deleteOrder'}">
                                                <input type="hidden" name="order_id" value="{$order.id}">
                                                <input type="submit" value="Usuń">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            {/foreach}
                        </table>
                </div>
        </section>
    </div>
</div>
{/block}

