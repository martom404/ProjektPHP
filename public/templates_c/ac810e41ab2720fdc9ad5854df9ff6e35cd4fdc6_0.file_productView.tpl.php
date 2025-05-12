<?php
/* Smarty version 5.4.5, created on 2025-05-12 15:53:56
  from 'file:productView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6821fd747b8f66_79951945',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac810e41ab2720fdc9ad5854df9ff6e35cd4fdc6' => 
    array (
      0 => 'productView.tpl',
      1 => 1747058032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6821fd747b8f66_79951945 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16866472926821fd74771523_48437541', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'main.tpl', $_smarty_current_dir);
}
/* {block 'content'} */
class Block_16866472926821fd74771523_48437541 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

<div id='main' class='wrapper style1'>
    <div class='container'>
        <header class='major'>
            <h2><?php echo $_smarty_tpl->getValue('product')['name'];?>
</h2>
        </header>
        <div class='row'>
            <div class='col-6 col-12-medium'>
                <img src='<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/images/products/<?php echo $_smarty_tpl->getValue('product')['image_url'];?>
' class='product-image'>
            </div>
            <div class='col-6 col-12-medium'>
                <p><strong>Cena:</strong> <?php echo $_smarty_tpl->getValue('product')['price'];?>
 zł</p>
                <p><strong>Opis:</strong> <?php echo $_smarty_tpl->getValue('product')['descrtiption'];?>
</p>
               <?php if ($_smarty_tpl->getValue('is_logged')) {?>
                <form method="post" action="#">
                    <button type="submit" class="button">Dodaj do koszyka</button>
                </form>
                <?php }?>
                <a href="javascript:history.back()" class="button small">Wróć</a>
            </div>
        </div>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
