<?php
/* Smarty version 5.4.5, created on 2025-05-22 16:28:36
  from 'file:orderView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682f34946eb583_08009415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '111f859db6e3396e429b4c30a3be91671911fdcd' => 
    array (
      0 => 'orderView.tpl',
      1 => 1747924111,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682f34946eb583_08009415 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_796312950682f34946c7b91_86986957', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'main.tpl', $_smarty_current_dir);
}
/* {block 'content'} */
class Block_796312950682f34946c7b91_86986957 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Szczegóły zamówienia nr. #<?php echo $_smarty_tpl->getValue('order')['id'];?>
</h2>
        </header>
        <div class="row gtr-uniform gtr-50">
            <div class="col-6">
            <p><strong>Data zamówienia:</strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('order')['order_date'],"%d.%m.%Y %H:%M");?>
</p>
            <p><strong>Status:</strong> <?php echo $_smarty_tpl->getValue('order')['status'];?>
</p>
            <p><strong>Łączna kwota:</strong> <?php echo $_smarty_tpl->getValue('order')['full_price'];?>
 zł</p>
            </div>
            <div class="col-6">
            <p><strong>Adres zamówienia:</strong></p>
            <p>Ulica: <?php echo $_smarty_tpl->getValue('address')['street'];?>
</p>
            <p>Numer domu/mieszkania: <?php echo $_smarty_tpl->getValue('address')['house_number'];?>
</p>
            <p>Miasto: <?php echo $_smarty_tpl->getValue('address')['city'];?>
</p>
            <p>Kod pocztowy: <?php echo $_smarty_tpl->getValue('address')['zip_code'];?>
</p>
            <p>Kraj: <?php echo $_smarty_tpl->getValue('address')['country'];?>
</p>
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
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'product');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('product')['name'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('product')['quantity'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('product')['price'];?>
 zł</td>
                        <td><?php echo $_smarty_tpl->getValue('product')['price']*$_smarty_tpl->getValue('product')['quantity'];?>
 zł</td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

        <a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showAccount'), $_smarty_tpl);?>
" class="button small">Powrót</a>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
