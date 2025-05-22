<?php
/* Smarty version 5.4.5, created on 2025-05-22 18:19:37
  from 'file:cartView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682f4e99842314_15284608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecf543b8a33035be7ea1ec8396bb1fa768498959' => 
    array (
      0 => 'cartView.tpl',
      1 => 1747930774,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_682f4e99842314_15284608 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_290740037682f4e997d0688_58746178', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'main.tpl', $_smarty_current_dir);
}
/* {block 'content'} */
class Block_290740037682f4e997d0688_58746178 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Twój koszyk</h2>
            <?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </header>

        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('items')) == 0) {?>
            <p>Koszyk jest pusty.</p>
        <?php } else { ?>
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
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('items'), 'item');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('item')->value) {
$foreach0DoElse = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->getValue('item')['name'];?>
</td>
                            <td>
                                <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
updateProductQuantity/<?php echo $_smarty_tpl->getValue('item')['id'];?>
" method="post">
                                    <input type="number" class="input-qty" name="quantity" value="<?php echo $_smarty_tpl->getValue('item')['quantity'];?>
" min="1" max="999">
                                    <button type="submit" class="button small">Zmień</button>
                                </form>
                            </td>
                            <td><?php echo $_smarty_tpl->getValue('item')['price'];?>
 zł</td>
                            <td>
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
removeProductFromCart/<?php echo $_smarty_tpl->getValue('item')['id'];?>
" class="button small">Usuń</a>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>

            <p><strong>Łączna cena:</strong> <?php echo $_smarty_tpl->getValue('total_price');?>
 zł</p>
        <?php }?>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('items')) == 0) {?>
         
        <?php } elseif ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('items')) > 0) {?>
        <form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'placeOrder'), $_smarty_tpl);?>
">
            <fieldset>
                <legend>Adres dostawy</legend>
                <?php if (!$_smarty_tpl->getValue('default_address')) {?>
                    <input type="radio" id="radio2" name="address_choice" value="new">
                    <label for="radio2">Podaj adres:</label>
                <?php } else { ?>
                    <input type="radio" id="radio1" name="address_choice" value="default" checked>
                    <label for="radio1">Użyj domyślnego adresu: <?php echo $_smarty_tpl->getValue('default_address')['street'];?>
, <?php echo $_smarty_tpl->getValue('default_address')['city'];?>
, <?php echo $_smarty_tpl->getValue('default_address')['zip_code'];?>
, <?php echo $_smarty_tpl->getValue('default_address')['country'];?>
</label>

                    <input type="radio" id="radio2" name="address_choice" value="new">
                    <label for="radio2">Podaj nowy adres:</label>
                <?php }?>
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
        <?php }?>
    </div>
</div>
<?php echo '<script'; ?>
>
    const radios = document.querySelectorAll('input[name="address_choice"]');
    const newFields = document.getElementById('new_address_fields');

    function toggleAddressFields() {
        newFields.style.display = document.querySelector('input[name="address_choice"]:checked').value === 'new' ? 'block' : 'none';
    }

    radios.forEach(r => r.addEventListener('change', toggleAddressFields));
    toggleAddressFields(); 
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'content'} */
}
