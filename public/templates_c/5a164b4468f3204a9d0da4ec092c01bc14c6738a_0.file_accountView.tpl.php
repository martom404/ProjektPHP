<?php
/* Smarty version 5.4.5, created on 2025-05-08 22:01:02
  from 'file:accountView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_681d0d7e226ee9_46146324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a164b4468f3204a9d0da4ec092c01bc14c6738a' => 
    array (
      0 => 'accountView.tpl',
      1 => 1746734450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_681d0d7e226ee9_46146324 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_864328727681d0d7e1e39d9_71740706', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_864328727681d0d7e1e39d9_71740706 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Twoje konto</h2>
        </header>
        <section id="app_content">
            <div class="row gtr-uniform gtr-50">
                <div class="col-6">
                    <p>Twój email: <?php echo $_smarty_tpl->getValue('user')['email'];?>
</p>
                    <p>Data utworzenia konta: <?php echo $_smarty_tpl->getValue('user')['created_date'];?>
 </p>
                </div>
                <div class="col-6">
                    
                    <p>Twoje zamówienia</p>
                    
                </div>

                <form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'changePassword'), $_smarty_tpl);?>
" onsubmit="return confirm('Na pewno chcesz zmienić hasło?');">
                <div class="row gtr-uniform">
                    <div class="col-6">
                        <label for="oldPassword">Podaj aktualne hasło: </label>
                        <input type="password" name="oldPassword" id="oldPassword" placeholder="Aktualne hasło" required />
                    
                        <label for="newPassword">Podaj nowe hasło: </label>
                        <input type="password" name="newPassword" id="newPassword" placeholder="Nowe hasło" required />
                   
                    
                        <label for="newPasswordRepeat">Powtórz nowe hasło: </label>
                        <input type="password" name="newPasswordRepeat" id="newPasswordRepeat" placeholder="Powtórz nowe hasło" required />
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Zmień hasło" class="button primary" />
                    </div>
                </div>
                </form>

                <div class="col-12">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
                        <?php echo $_smarty_tpl->getValue('msg')->text;?>

                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
                <div class="col-12">
                    <p>Chcesz usunąc konto? Kliknij na poniższy przycisk!</p>
                    <form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'deleteAccount'), $_smarty_tpl);?>
" onsubmit="return confirm('Na pewno chcesz usunąć konto?');">
                        <input type="submit" value="Usuń konto" />
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
