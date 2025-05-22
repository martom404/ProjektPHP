<?php
/* Smarty version 5.4.5, created on 2025-05-22 17:37:59
  from 'file:accountView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682f44d75342b5_40703556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a164b4468f3204a9d0da4ec092c01bc14c6738a' => 
    array (
      0 => 'accountView.tpl',
      1 => 1747928134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_682f44d75342b5_40703556 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1725510952682f44d74fe715_62027941', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1725510952682f44d74fe715_62027941 extends \Smarty\Runtime\Block
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
                <div class="col-12">
                    <?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                </div>
                <div class="col-3">
                    <h3>Dane konta</h3>
                    <p><strong>Email:</strong> <?php echo $_smarty_tpl->getValue('user')['email'];?>
</p>
                    <p><strong>Data rejestracji:</strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('user')['created_date'],"%d.%m.%Y %H:%M");?>
</p>
                    <p><strong>Twoje unikalne ID: </strong><?php echo $_smarty_tpl->getValue('user')['id'];?>
</p>
                    <p><strong>Miasto: </strong><?php echo $_smarty_tpl->getValue('address')['city'];?>
</p>
                    <p><strong>Ulica: </strong><?php echo $_smarty_tpl->getValue('address')['street'];?>
</p>
                    <p><strong>Numer: </strong><?php echo $_smarty_tpl->getValue('address')['house_number'];?>
</p>
                    <p><strong>Kod pocztowy: </strong><?php echo $_smarty_tpl->getValue('address')['zip_code'];?>
</p>
                    <p><strong>Kraj: </strong><?php echo $_smarty_tpl->getValue('address')['country'];?>
</p>
                    <a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'changeAddress'), $_smarty_tpl);?>
" class="button">Edytuj dane do wysyłki</a>
                </div>

                <div class="col-9">
                    <h3>Twoje zamówienia</h3>
                    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('orders')) > 0) {?>
                        <ul>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('orders'), 'order');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('order')->value) {
$foreach0DoElse = false;
?>
                            <li>
                                Zamówienie o numerze #<?php echo $_smarty_tpl->getValue('order')['id'];?>
 z dnia <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('order')['order_date'],"%d.%m.%Y %H:%M");?>
,
                                kwota: <strong><?php echo $_smarty_tpl->getValue('order')['full_price'];?>
 zł</strong>
                                <a href='<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
showOrder/<?php echo $_smarty_tpl->getValue('order')['id'];?>
' class='button order'>Szczegóły</a>
                            </li>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </ul>
                    <?php } else { ?>
                        <p>Nie masz jeszcze żadnych złożonych zamówień.</p>
                    <?php }?>
                </div>

                <div class="col-12">
                    <h3>Zmiana hasła</h3>
                    <form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'changePassword'), $_smarty_tpl);?>
" onsubmit="return confirm('Na pewno chcesz zmienić hasło?');">
                        <div class="row gtr-uniform">
                            <div class="col-4 col-12-small">
                                <label for="oldPassword">Aktualne hasło</label>
                                <input type="password" name="oldPassword" id="oldPassword" placeholder="Aktualne hasło" required />
                            </div>
                            <div class="col-4 col-12-small">
                                <label for="newPassword">Nowe hasło</label>
                                <input type="password" name="newPassword" id="newPassword" placeholder="Nowe hasło" required />
                            </div>
                            <div class="col-4 col-12-small">
                                <label for="newPasswordRepeat">Powtórz nowe hasło</label>
                                <input type="password" name="newPasswordRepeat" id="newPasswordRepeat" placeholder="Powtórz nowe hasło" required />
                            </div>
                            <div class="col-12">
                                <input type="submit" value="Zmień hasło" class="button primary" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <h3>Usuń konto</h3>
                    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('orders')) > 0) {?>
                        <p>Jeśli masz złożone zamówienie to nie możesz zamknąć konta!</p>
                    <?php }?>
                    <p>Uwaga: tej operacji nie da się cofnąć!</p>
                    <form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'deleteAccount'), $_smarty_tpl);?>
" onsubmit="return confirm('Na pewno chcesz usunąć konto?');">
                        <input type="submit" value="Usuń konto" class="button alt" />
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
