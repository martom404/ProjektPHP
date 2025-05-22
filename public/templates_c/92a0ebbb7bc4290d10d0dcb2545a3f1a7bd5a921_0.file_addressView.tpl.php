<?php
/* Smarty version 5.4.5, created on 2025-05-22 17:38:44
  from 'file:addressView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682f4504c5c524_52721730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92a0ebbb7bc4290d10d0dcb2545a3f1a7bd5a921' => 
    array (
      0 => 'addressView.tpl',
      1 => 1747927429,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_682f4504c5c524_52721730 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1500815114682f4504bcad69_37608054', 'content');
?>


<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1500815114682f4504bcad69_37608054 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Twój adres</h2>
        </header>
        <section id="app_content">
            <div class="row gtr-uniform gtr-50">
                <div class="col-12">
                    <?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                </div>
                <div class="col-12">
                    <form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'saveAddress'), $_smarty_tpl);?>
">
                        <div class="row gtr-uniform">
                            <div class="col-6">
                                <label>Ulica:</label>
                                <input type="text" name="street" value="<?php echo (($tmp = $_smarty_tpl->getValue('address')['street'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                            </div>
                            <div class="col-3">
                                <label>Numer domu/mieszkania:</label>
                                <input type="text" name="hnumber" value="<?php echo (($tmp = $_smarty_tpl->getValue('address')['house_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                            </div>
                            <div class="col-6">
                                <label>Miasto:</label>
                                <input type="text" name="city" value="<?php echo (($tmp = $_smarty_tpl->getValue('address')['city'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                            </div>
                            <div class="col-6">
                                <label>Kod pocztowy:</label>
                                <input type="text" name="zip_code" value="<?php echo (($tmp = $_smarty_tpl->getValue('address')['zip_code'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                            </div>
                            <div class="col-6">
                                <label>Kraj:</label>
                                <input type="text" name="country" value="<?php echo (($tmp = $_smarty_tpl->getValue('address')['country'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                            </div>
                            <div class="col-12">
                                <input type="submit" class="button primary" value="Zapisz adres">
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
showAccount" class="button">Anuluj</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
