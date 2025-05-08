<?php
/* Smarty version 5.4.5, created on 2025-05-08 14:55:02
  from 'file:registerView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_681ca9a698a472_76823959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fe56a1d7a50894dcf6da76aa45ea7be7a8a5a5f' => 
    array (
      0 => 'registerView.tpl',
      1 => 1746707766,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_681ca9a698a472_76823959 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_717673556681ca9a697b461_55012290', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_717673556681ca9a697b461_55012290 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

<div id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Rejestracja</h2>
            <p>Nie masz konta?</br>
               Wprowadź swój adres e-mail oraz hasło, aby utworzyć konto.
            </p>
        </header>
        <section id="app_content">
                <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
registerSave" method="post">
                        <div class="row gtr-uniform gtr-50">
                            <div class="col-6 col-12-xsmall">
                            <fieldset>
                                <label for="email">Email: </label>
                                <input id="email" type="text" name="email" placeholder='Podaj email' required/>
                                <label for="password">Hasło:</label>
                                <input id="password" type="password" name="password" placeholder='Podaj hasło' required>                                                           
                            </fieldset>
                            </div>
                            <div class="col-6">    
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
                                        <input type="submit" value="Zarejestruj" class="primary" />
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
