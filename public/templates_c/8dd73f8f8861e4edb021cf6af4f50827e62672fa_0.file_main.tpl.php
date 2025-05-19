<?php
/* Smarty version 5.4.5, created on 2025-05-19 13:49:51
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682b1adf3f47c6_02963237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dd73f8f8861e4edb021cf6af4f50827e62672fa' => 
    array (
      0 => 'main.tpl',
      1 => 1747655356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682b1adf3f47c6_02963237 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
        <title><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Heaven4Gamers" ?? null : $tmp);?>
</title>
        <meta name="description" content="<?php echo (($tmp = $_smarty_tpl->getValue('page_description') ?? null)===null||$tmp==='' ? "Mamy najlepszą ofertę gier na rynku!" ?? null : $tmp);?>
">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/main.css" />
        <noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload landing">
<div id="page-wrapper">
<header id="header">
        <h1 id="logo">Heaven4Gamers</h1>
        <nav id="nav">
                <ul>
                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'mainShow'), $_smarty_tpl);?>
">Strona główna</a></li>
                        <li>
                                <a href="#">Playstation</a>
                                <ul>
                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCategory/PlaystationKonsole'), $_smarty_tpl);?>
">Konsole</a</li>
                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCategory/PlaystationGry'), $_smarty_tpl);?>
">Gry</a></li>
                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCategory/PlaystationAkcesoria'), $_smarty_tpl);?>
">Akcesoria</a></li>
                                </ul>
                        </li>
                        <li>
                                <a href="#">Xbox</a>
                                <ul>
                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCategory/XboxKonsole'), $_smarty_tpl);?>
">Konsole</a</li>
                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCategory/XboxGry'), $_smarty_tpl);?>
">Gry</a></li>
                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCategory/XboxAkcesoria'), $_smarty_tpl);?>
">Akcesoria</a></li>
                                </ul>
                        </li>
                        <li>
                                <a href="#">Nintendo Switch</a>
                                <ul>
                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCategory/NintendoKonsole'), $_smarty_tpl);?>
">Konsole</a</li>
                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCategory/NintendoGry'), $_smarty_tpl);?>
">Gry</a></li>
                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCategory/NintendoAkcesoria'), $_smarty_tpl);?>
">Akcesoria</a></li>
                                </ul>
                        </li>
                        <li>
                                <a href="#">PC</a>
                                <ul>
                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCategory/PcGry'), $_smarty_tpl);?>
">Gry</a></li>
                                </ul>
                        </li>
                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showCart'), $_smarty_tpl);?>
">Koszyk</a></li>
                        <?php if (\core\RoleUtils::inRole("user")) {?>
                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showAccount'), $_smarty_tpl);?>
">Moje konto</a></li>
                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'logout'), $_smarty_tpl);?>
" class="button primary">Wyloguj</a></li>
                        <?php } elseif (\core\RoleUtils::inRole("admin")) {?>
                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'adminPanel'), $_smarty_tpl);?>
">Panel administratora</a></li>
                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'logout'), $_smarty_tpl);?>
" class="button primary">Wyloguj</a></li>
                        <?php } else { ?>
                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'loginView'), $_smarty_tpl);?>
" class="button primary">Logowanie</a></li>
                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'registerView'), $_smarty_tpl);?>
" class="button primary2">Rejestracja</a></li>
                        <?php }?>
                </ul>
        </nav>
</header>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_620178887682b1adf3c43d5_56350186', 'content');
?>


<footer id="footer">
    <div class='row gtr-uniform gtr-50'>
    <div class='col-12'>
    <h4>Sprawdź nasze social media!</h4>
        <ul class="icons">
                <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
        </ul>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <div style="max-width: 400px; width: 100%;">
            <h4>Skontaktuj się z nami</h4>
            <form action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'sendMessage'), $_smarty_tpl);?>
" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Twój email</label>
                    <input type="email" class="form-control" id="email" name="email" required />
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Wiadomość</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Wyślij</button>
            </form>
        </div>
    </div>
    <div class='col-12'>
        <ul class="copyright">
                <li>© 2025 Heaven4Gamers. Wszelkie prawa zastrzeżone.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
    </div>
</footer>

</div>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/main.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block 'content'} */
class Block_620178887682b1adf3c43d5_56350186 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views\\templates';
}
}
/* {/block 'content'} */
}
