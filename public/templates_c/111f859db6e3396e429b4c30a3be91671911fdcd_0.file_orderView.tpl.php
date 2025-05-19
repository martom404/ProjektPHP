<?php
/* Smarty version 5.4.5, created on 2025-05-19 16:14:05
  from 'file:orderView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682b3cad277742_39236007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '111f859db6e3396e429b4c30a3be91671911fdcd' => 
    array (
      0 => 'orderView.tpl',
      1 => 1747663647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682b3cad277742_39236007 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1582000531682b3cad1e9be5_78080362', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'main.tpl', $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1582000531682b3cad1e9be5_78080362 extends \Smarty\Runtime\Block
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

        <p><strong>Data zamówienia:</strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('order')['order_date'],"%d.%m.%Y %H:%M");?>
</p>
        <p><strong>Status:</strong> <?php echo $_smarty_tpl->getValue('order')['status'];?>
</p>
        <p><strong>Łączna kwota:</strong> <?php echo $_smarty_tpl->getValue('order')['full_price'];?>
 zł</p>

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
