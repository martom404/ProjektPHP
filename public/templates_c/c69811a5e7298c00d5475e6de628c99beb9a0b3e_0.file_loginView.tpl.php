<?php
/* Smarty version 5.4.5, created on 2025-05-19 14:01:33
  from 'file:loginView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682b1d9dce5769_90513270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c69811a5e7298c00d5475e6de628c99beb9a0b3e' => 
    array (
      0 => 'loginView.tpl',
      1 => 1747656089,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_682b1d9dce5769_90513270 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_522602481682b1d9dcc92f2_67099770', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_522602481682b1d9dcc92f2_67099770 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Logowanie</h2>
            <p>Masz już konto?</br>
               Zaloguj się używając swojego adresu e-mail.
            </p>
        </header>
        <section id="app_content">
                <form action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'login'), $_smarty_tpl);?>
" method="post">
                        <div class="row gtr-uniform gtr-50">
                            <div class="col-6 col-12-xsmall">
                            <fieldset>
                                <label for="email">Email: </label>
                                <input id="email" type="text" name="email" placeholder='Podaj email' required/></br>
                                <label for="password">Hasło:</label>
                                <input id="password" type="password" name="password" placeholder='Podaj hasło' required>                                                           
                            </fieldset>
                            </div>
                            <div class="col-6">   
                                <p>Nie masz konta? Zarejestruj się!</p>
                                <a class="button primary" href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'registerView'), $_smarty_tpl);?>
">Zarejestruj się!</a>
                            </div>
                            <div class="col-6">
                            <?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                            </div>
                            <div class="col-12">
                                    <input type="submit" value="Zaloguj" class="primary" />
                            </div>
                        </div>
                </form>
        </section>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
