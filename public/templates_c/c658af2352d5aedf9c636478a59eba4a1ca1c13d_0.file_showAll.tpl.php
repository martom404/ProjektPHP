<?php
/* Smarty version 5.4.5, created on 2025-05-22 18:37:06
  from 'file:showAll.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682f52b25f1bb7_46884832',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c658af2352d5aedf9c636478a59eba4a1ca1c13d' => 
    array (
      0 => 'showAll.tpl',
      1 => 1747931755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_682f52b25f1bb7_46884832 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1858474622682f52b25498f9_55585226', 'content');
?>


<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1858474622682f52b25498f9_55585226 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

<div class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2><?php echo $_smarty_tpl->getValue('category');?>
</h2>
            <?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </header>

        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('products')) > 0) {?>
            <div class="product-list">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'product');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product')->value) {
$foreach0DoElse = false;
?>
                    <div class="product-box">
                        <h3><?php echo $_smarty_tpl->getValue('product')['name'];?>
</h3>
                        <p>Cena: <strong><?php echo $_smarty_tpl->getValue('product')['price'];?>
 zł</strong></p>
                        <p><?php echo (($tmp = $_smarty_tpl->getValue('product')['description'] ?? null)===null||$tmp==='' ? "Brak opisu" ?? null : $tmp);?>
</p>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
showProduct/<?php echo $_smarty_tpl->getValue('product')['id'];?>
" class="button small">Zobacz produkt</a>
                    </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
        <?php } else { ?>
            <p>Brak produktów do wyświetlenia.</p>
        <?php }?>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
