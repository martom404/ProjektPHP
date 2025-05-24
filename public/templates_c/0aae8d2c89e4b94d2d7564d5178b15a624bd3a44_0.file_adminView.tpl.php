<?php
/* Smarty version 5.4.5, created on 2025-05-24 18:36:35
  from 'file:adminView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6831f59337ca85_21357716',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0aae8d2c89e4b94d2d7564d5178b15a624bd3a44' => 
    array (
      0 => 'adminView.tpl',
      1 => 1748104586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_6831f59337ca85_21357716 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3813021906831f593313df5_47262018', 'content');
?>


<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "templates/main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_3813021906831f593313df5_47262018 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

<div id="main" class="wrapper style1">
    <div class="container">
        
        <header class="major">
            <h2>Panel administratora</h2>
        </header>

        <section id="app_content">
            <div class="row gtr-uniform gtr-50">
                <div class="col-12">
                    <?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                </div>
                <div class="col-12">
                    <h3>Zamówienia</h3>
                        <table border="1" cellpadding="5">
                            <tr>
                                <th>ID</th>
                                <th>Użytkownik</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th>Akcje</th>
                            </tr>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('order'), 'order');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('order')->value) {
$foreach0DoElse = false;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->getValue('order')['id'];?>
</td>
                                    <td><?php echo $_smarty_tpl->getValue('order')['user_id'];?>
</td>
                                    <td><?php echo $_smarty_tpl->getValue('order')['status'];?>
</td>
                                    <td><?php echo $_smarty_tpl->getValue('order')['order_date'];?>
</td>
                                    <td>
                                    <div class="row gtr-10">
                                        <div class="col-6 col-12-small">
                                            <form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'updateOrderStatus'), $_smarty_tpl);?>
">
                                                <input type="hidden" name="order_id" value="<?php echo $_smarty_tpl->getValue('order')['id'];?>
">
                                                <select name="status">
                                                    <option value="nowe" <?php if ($_smarty_tpl->getValue('order')['status'] == 'nowe') {?>selected<?php }?>>Nowe</option>
                                                    <option value="złożone" <?php if ($_smarty_tpl->getValue('order')['status'] == 'złożone') {?>selected<?php }?>>Złożone</option>
                                                    <option value="anulowane" <?php if ($_smarty_tpl->getValue('order')['status'] == 'anulowane') {?>selected<?php }?>>Anulowane</option>
                                                    <option value="zrealizowane" <?php if ($_smarty_tpl->getValue('order')['status'] == 'zrealizowane') {?>selected<?php }?>>Zrealizowane</option>
                                                </select>
                                                <input type="submit" value="Zmień">
                                            </form>
                                        </div>
                                        <div class="col-6 col-12-small">
                                            <form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'deleteOrder'), $_smarty_tpl);?>
">
                                                <input type="hidden" name="order_id" value="<?php echo $_smarty_tpl->getValue('order')['id'];?>
">
                                                <input type="submit" value="Usuń">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </table>
                </div>
        </section>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
