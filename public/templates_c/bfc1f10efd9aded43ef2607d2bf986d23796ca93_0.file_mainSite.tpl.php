<?php
/* Smarty version 5.4.5, created on 2025-05-08 14:11:12
  from 'file:mainSite.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_681c9f60df34d7_52378627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfc1f10efd9aded43ef2607d2bf986d23796ca93' => 
    array (
      0 => 'mainSite.tpl',
      1 => 1746706246,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_681c9f60df34d7_52378627 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1754242502681c9f60dec930_22190889', 'content');
?>
    

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1754242502681c9f60dec930_22190889 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\sklep\\app\\views';
?>

 <section id="banner">
        <div class="content">
                <header>
                        <h2>Heaven4Gamers</h2>
                        <p>Witamy w raju dla graczy! Najlepsze gry na PC i konsole w jednym miejscu.<br />
                        Nowości, klasyki, promocje – wszystko, czego potrzebujesz, by grać bez ograniczeń.</p>
                </header>
                <span class="image"><img src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/images/view/logoH4G2.png" alt="" /></span>
        </div>
</section>
<?php
}
}
/* {/block 'content'} */
}
