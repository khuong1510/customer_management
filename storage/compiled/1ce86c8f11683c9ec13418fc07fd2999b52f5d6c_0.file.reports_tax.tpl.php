<?php
/* Smarty version 3.1.33, created on 2019-04-28 03:56:46
  from '/Users/razib/Documents/valet/suite/ui/theme/default/reports_tax.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc55cbebc5393_70473775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ce86c8f11683c9ec13418fc07fd2999b52f5d6c' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/reports_tax.tpl',
      1 => 1556267287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc55cbebc5393_70473775 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11223418835cc55cbebc45b8_78177467', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2570487135cc55cbebc4e79_65434766', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_11223418835cc55cbebc45b8_78177467 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11223418835cc55cbebc45b8_78177467',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_2570487135cc55cbebc4e79_65434766 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_2570487135cc55cbebc4e79_65434766',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
