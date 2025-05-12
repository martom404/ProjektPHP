<?php
/* Smarty version 5.4.5, created on 2025-05-12 14:09:42
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6821e50663ade8_64536927',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dd73f8f8861e4edb021cf6af4f50827e62672fa' => 
    array (
      0 => 'main.tpl',
      1 => 1746737241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6821e50663ade8_64536927 (\Smarty\Template $_smarty_tpl) {
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
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/noscript.css" /></noscript>
	</head>
        
	<body class="is-preload landing">
		<div id="page-wrapper">
				<header id="header">
					<h1 id="logo"><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'mainShow'), $_smarty_tpl);?>
">Heaven4Gamers</a></h1>
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
                                                        <?php if (!$_smarty_tpl->getValue('is_logged')) {?>
                                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'loginView'), $_smarty_tpl);?>
" class="button primary">Logowanie</a></li>
                                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'registerView'), $_smarty_tpl);?>
" class="button primary2">Rejestracja</a></li>
                                                        <?php } else { ?>
                                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showAccount'), $_smarty_tpl);?>
">Moje konto</a></li>
                                                        <li><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'logout'), $_smarty_tpl);?>
" class="button primary">Wyloguj</a></li>
                                                        <?php }?>
						</ul>
					</nav>
				</header>
                                
                                <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1874826546821e506629f61_65926725', 'content');
?>

				
                                <footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>© 2025 Heaven4Gamers. Wszelkie prawa zastrzeżone.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
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

	</body>
</html><?php }
/* {block 'content'} */
class Block_1874826546821e506629f61_65926725 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views\\templates';
}
}
/* {/block 'content'} */
}
