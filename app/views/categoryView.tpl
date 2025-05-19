{extends file='main.tpl'}
{block name=content}
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Kategoria: {$category|regex_replace:"/([a-z])([A-Z])/" : "$1 - $2"}</h2>
        </header>
        
        <div class="row gtr-uniform">
        {foreach from=$products item=prod}
            <div class="col-4 col-12-medium">
                <a href="{$conf->action_url}showProduct/{$prod.id}">
                    <img class="product-image" src="{$conf->app_url}/images/products/{$prod.image_url}" alt="{$prod.name}">
                </a>
                <h3>{$prod.name}</h3>
                <p>{$prod.price} zł</p>
                
                {if \core\RoleUtils::inRole("user")}
                    <form method="post" action="{$conf->action_url}addToCart/{$prod.id}">
                        <button type="submit" class="button primary">Dodaj do koszyka</button>
                    </form>
                {/if}
                <a class="button small" href="{$conf->action_url}showProduct/{$prod.id}">Zobacz szczegóły</a>
            </div>
        {/foreach}
        </div>
    </div>
</div>
{/block}
