{extends file='main.tpl'}
{block name=content}
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Szczegóły zamówienia nr. #{$order.id}</h2>
        </header>
        <div class="row gtr-uniform gtr-50">
            <div class="col-6">
            <p><strong>Data zamówienia:</strong> {$order.order_date|date_format:"%d.%m.%Y %H:%M"}</p>
            <p><strong>Status:</strong> {$order.status}</p>
            <p><strong>Łączna kwota:</strong> {$order.full_price} zł</p>
            </div>
            <div class="col-6">
            <p><strong>Adres zamówienia:</strong></p>
            <p>Ulica: {$address.street}</p>
            <p>Numer domu/mieszkania: {$address.house_number}</p>
            <p>Miasto: {$address.city}</p>
            <p>Kod pocztowy: {$address.zip_code}</p>
            <p>Kraj: {$address.country}</p>
            </div>
        </div>
        <h3>Produkty:</h3>
        <table>
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Ilość</th>
                    <th>Cena za sztukę</th>
                    <th>Łącznie</th>
                </tr>
            </thead>
            <tbody>
                {foreach $products as $product}
                    <tr>
                        <td>{$product.name}</td>
                        <td>{$product.quantity}</td>
                        <td>{$product.price} zł</td>
                        <td>{$product.price*$product.quantity} zł</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>

        <a href="{url action='showAccount'}" class="button small">Powrót</a>
    </div>
</div>
{/block}