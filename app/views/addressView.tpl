{extends file="main.tpl"}

{block name=content}
<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Twój adres</h2>
        </header>
        <section id="app_content">
            <div class="row gtr-uniform gtr-50">
                <div class="col-12">
                    {include file="messages.tpl"}
                </div>
                <div class="col-12">
                    <form method="post" action="{url action='saveAddress'}">
                        <div class="row gtr-uniform">
                            <div class="col-6">
                                <label>Ulica:</label>
                                <input type="text" name="street" value="{$address.street|default:''}" required>
                            </div>
                            <div class="col-3">
                                <label>Numer domu/mieszkania:</label>
                                <input type="text" name="hnumber" value="{$address.house_number|default:''}" required>
                            </div>
                            <div class="col-6">
                                <label>Miasto:</label>
                                <input type="text" name="city" value="{$address.city|default:''}" required>
                            </div>
                            <div class="col-6">
                                <label>Kod pocztowy:</label>
                                <input type="text" name="zip_code" value="{$address.zip_code|default:''}" required>
                            </div>
                            <div class="col-6">
                                <label>Kraj:</label>
                                <input type="text" name="country" value="{$address.country|default:''}" required>
                            </div>
                            <div class="col-12">
                                <input type="submit" class="button primary" value="Zapisz adres">
                                <a href="{$conf->action_root}showAccount" class="button">Anuluj</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
{/block}

