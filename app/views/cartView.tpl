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
        {/if}
        {if $items|@count == 0}
         
        {else if $items|count > 0}
        <form method="post" action="{url action='placeOrder'}">
            <fieldset>
                <legend>Adres dostawy</legend>
                {if !$default_address}
                    <input type="radio" id="radio2" name="address_choice" value="new">
                    <label for="radio2">Podaj adres:</label>
                {else}
                    <input type="radio" id="radio1" name="address_choice" value="default" checked>
                    <label for="radio1">Użyj domyślnego adresu: {$default_address.street}, {$default_address.city}, {$default_address.zip_code}, {$default_address.country}</label>

                    <input type="radio" id="radio2" name="address_choice" value="new">
                    <label for="radio2">Podaj nowy adres:</label>
                {/if}
                <div id="new_address_fields">
                    <label>Ulica: <input type="text" name="street" /></label><br>
                    <label>Numer domu/mieszkania: <input type="text" name="house_number" /></label><br>
                    <label>Miasto: <input type="text" name="city" /></label><br>
                    <label>Kod pocztowy: <input type="text" name="zip_code" /></label><br>
                    <label>Kraj: <input type="text" name="country" /></label>
                </div>
            </fieldset>
            <input type="submit" value="Złóż zamówienie" class="primary" />
        </form>
        {/if}
    </div>
</div>
<script>
    const radios = document.querySelectorAll('input[name="address_choice"]');
    const newFields = document.getElementById('new_address_fields');

    function toggleAddressFields() {
        newFields.style.display = document.querySelector('input[name="address_choice"]:checked').value === 'new' ? 'block' : 'none';
    }

    radios.forEach(r => r.addEventListener('change', toggleAddressFields));
    toggleAddressFields(); 
</script>
{/block}
