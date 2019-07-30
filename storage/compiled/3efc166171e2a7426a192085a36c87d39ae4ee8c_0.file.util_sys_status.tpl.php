<?php
/* Smarty version 3.1.33, created on 2019-06-04 08:31:32
  from '/Users/razib/Documents/valet/suite/ui/theme/default/util_sys_status.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf664a4af8703_03465234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3efc166171e2a7426a192085a36c87d39ae4ee8c' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/util_sys_status.tpl',
      1 => 1556267287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf664a4af8703_03465234 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20718279965cf664a4af6510_01392998', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_20718279965cf664a4af6510_01392998 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_20718279965cf664a4af6510_01392998',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">

        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Application Environment'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <table class="table table-bordered sys_table">
                        <tbody>

                        <tr>
                            <td width="300px;">Time</td>
                            <td><span id="clock"></span> </td>
                        </tr>

                        <tr>
                            <td>BASE URL</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
</td>
                        </tr>

                        <tr>
                            <td>Application Stage</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['app_stage']->value;?>
</td>
                        </tr>

                        <tr>
                            <td>Default Language</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['config']->value['language'];?>
</td>
                        </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Server Environment'];?>
</h5>
                    <div class="ibox-tools">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/sys_status_dl/" class="btn btn-primary btn-xs"><i class="fa fa-download"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Download'];?>
 </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <?php echo $_smarty_tpl->tpl_vars['pinfo']->value;?>


                </div>
            </div>
        </div>

    </div>
<?php
}
}
/* {/block "content"} */
}
