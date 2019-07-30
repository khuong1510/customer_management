<?php
/* Smarty version 3.1.33, created on 2019-04-11 16:14:51
  from '/Users/razib/Documents/valet/suite/ui/theme/default/cart_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cafa03b1ed927_91908815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f10e0e0dea9066a922c6c39ca916f76a503615a' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/cart_item.tpl',
      1 => 1555013687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cafa03b1ed927_91908815 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2444293595cafa03b1e6360_92929810', "content");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/paper.tpl");
}
/* {block "content"} */
class Block_2444293595cafa03b1e6360_92929810 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2444293595cafa03b1e6360_92929810',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="paper">
        <section class="panel">
            <div class="panel-body">
                <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)) {?>
                    <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

                <?php }?>

                <img class="logo" style="max-height: 40px; width: auto;" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/<?php echo $_smarty_tpl->tpl_vars['config']->value['logo_default'];?>
" alt="Logo">

                <hr>

                <div class="row">

                    <div class="col-md-8">
                        <h3><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</h3>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value->image != '') {?>
                            <hr>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/items/<?php echo $_smarty_tpl->tpl_vars['item']->value->image;?>
" class="img-responsive">
                        <?php }?>


                        <hr>

                        <?php echo $_smarty_tpl->tpl_vars['item']->value->description;?>


                    </div>

                    <div class="col-md-4">
                        <div class="well">

                            <h3>Price: <?php echo ib_money_format($_smarty_tpl->tpl_vars['item']->value->sales_price,$_smarty_tpl->tpl_vars['config']->value);?>
</h3>
                            <hr>

                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cart/add/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
" class="md-btn md-btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Buy Now'];?>
</a>

                        </div>
                    </div>

                </div>



            </div>
        </section>

    </div>
<?php
}
}
/* {/block "content"} */
}
