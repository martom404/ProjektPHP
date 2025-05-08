<?php
/* Smarty version 5.4.5, created on 2025-05-08 14:58:29
  from 'file:loginView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_681caa751cfb25_77058210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c69811a5e7298c00d5475e6de628c99beb9a0b3e' => 
    array (
      0 => 'loginView.tpl',
      1 => 1746708958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_681caa751cfb25_77058210 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1129786133681caa751bb505_55818522', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1129786133681caa751bb505_55818522 extends \Smarty\Runtime\Block
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
                <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" method="post">
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
">Zarejestruj się!</a></br></br>
                                    
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
