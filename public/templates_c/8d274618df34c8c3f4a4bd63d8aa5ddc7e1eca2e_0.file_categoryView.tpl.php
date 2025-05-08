<?php
/* Smarty version 5.4.5, created on 2025-05-08 22:27:45
  from 'file:categoryView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_681d13c12274c2_97101819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d274618df34c8c3f4a4bd63d8aa5ddc7e1eca2e' => 
    array (
      0 => 'categoryView.tpl',
      1 => 1746736061,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_681d13c12274c2_97101819 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_246439197681d13c120b6f0_10021087', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'main.tpl', $_smarty_current_dir);
}
/* {block 'content'} */
class Block_246439197681d13c120b6f0_10021087 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

  <div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Kategoria: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('regex_replace')($_smarty_tpl->getValue('category'),"/([a-z])([A-Z])/","$"."1 - "."$"."2");?>
</h2>
        </header>
      <div class="row gtr-uniform">
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'prod');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prod')->value) {
$foreach0DoElse = false;
?>
            <div class="col-4 col-12-medium">
                    <img class='product-image' src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/images/products/<?php echo $_smarty_tpl->getValue('prod')['image_url'];?>
">
                    <h3><?php echo $_smarty_tpl->getValue('prod')['name'];?>
</h3>
                    <p><?php echo $_smarty_tpl->getValue('prod')['price'];?>
 zł</p>
                    <a class="button" href="#">Dodaj do koszyka</a>
            </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
      </div>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
