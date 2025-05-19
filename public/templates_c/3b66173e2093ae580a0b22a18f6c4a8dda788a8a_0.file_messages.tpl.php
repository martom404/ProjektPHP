<?php
/* Smarty version 5.4.5, created on 2025-05-13 09:50:45
  from 'file:messages.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6822f9d50e1785_22874086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b66173e2093ae580a0b22a18f6c4a8dda788a8a' => 
    array (
      0 => 'messages.tpl',
      1 => 1747122561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6822f9d50e1785_22874086 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views\\templates';
if ($_smarty_tpl->getValue('msgs')->isMessage()) {?>
    <div class="messages">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
            <div class="message 
                <?php if ($_smarty_tpl->getValue('msg')->isError()) {?> error
                <?php } elseif ($_smarty_tpl->getValue('msg')->isWarning()) {?> warning
                <?php } elseif ($_smarty_tpl->getValue('msg')->isInfo()) {?> info
                <?php }?>">
                <?php echo $_smarty_tpl->getValue('msg')->text;?>

            </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
<?php }
}
}
