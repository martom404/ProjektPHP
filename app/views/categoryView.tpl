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
                    <img class='product-image' src="{$conf->app_url}/images/products/{$prod.image_url}">
                    <h3>{$prod.name}</h3>
                    <p>{$prod.price} zł</p>
                    <a class="button" href="#">Dodaj do koszyka</a>
            </div>
        {/foreach}
      </div>
    </div>
</div>
{/block}
