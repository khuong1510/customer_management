<?php
/* Smarty version 3.1.33, created on 2019-04-28 03:53:47
  from '/Users/razib/Documents/valet/suite/ui/theme/default/sms_templates.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc55c0b036b63_69880899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3db78533774bea5c7e1f92b8c195c5524ab2e375' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/sms_templates.tpl',
      1 => 1556267287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc55c0b036b63_69880899 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5450707415cc55c0b031f45_90771438', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_5450707415cc55c0b031f45_90771438 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5450707415cc55c0b031f45_90771438',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMS Templates'];?>
</h4>
                </div>
                <div class="panel-body">

                    <table class="table table-condensed table-hover table-bordered">
                        <thead>
                        <tr>


                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                            <th width="70%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Message'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['templates']->value, 'template');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['template']->value) {
?>
                            <tr>

                                <td><?php echo $_smarty_tpl->tpl_vars['template']->value->tpl;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['template']->value->sms;?>
</td>
                                <td> <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/init/edit/<?php echo $_smarty_tpl->tpl_vars['template']->value->id;?>
" class="btn btn-sm btn-inverse"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a> </td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
