{extends file='main.tpl'}
{block name=content}
<div id='main' class='wrapper style1'>
<div class='container'>
<header class='major'>
    <h2>{$product.name}</h2>
</header>

<div class='row'>
    <div class='col-6 col-12-medium'>
        <img src='{$conf->app_url}/images/products/{$product.image_url}' class='product-image'>
    </div>
    <div class='col-6 col-12-medium'>
        <p><strong>Cena:</strong> {$product.price} zł</p>
        <p><strong>Opis:</strong> {$product.descrtiption}</p>
       {if \core\RoleUtils::inRole("user")}
        <form method="post" action="{$conf->action_url}addToCart/{$product.id}">
            <button type="submit" class="button">Dodaj do koszyka</button>
        </form>
        {/if}
        <a href="javascript:history.back()" class="button small">Wróć</a>
    </div>
</div>
        
</div>
</div>
{/block}
