<?php
/* Smarty version 3.1.33, created on 2019-07-26 10:37:08
  from 'D:\xampp\htdocs\cloudonex\ui\theme\default\employee_attendance.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3b101459e321_02557948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4a8a1c9654703b2f1b07cb1408da7e0477c1ddd' => 
    array (
      0 => 'D:\\xampp\\htdocs\\cloudonex\\ui\\theme\\default\\employee_attendance.tpl',
      1 => 1560068723,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d3b101459e321_02557948 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21309747285d3b101458dc36_80868845', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5634627085d3b1014591619_65111641', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10044770105d3b101459cff4_36145459', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_21309747285d3b101458dc36_80868845 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_21309747285d3b101458dc36_80868845',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dp/dist/datepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/footable/css/footable.core.min.css" />
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_5634627085d3b1014591619_65111641 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5634627085d3b1014591619_65111641',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</label>
                        <input class="form-control" id="inputDate" style="max-width: 250px;" name="date" datepicker
                               data-date-format="yyyy-mm-dd" data-auto-close="true"  value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Mark Attendance'];?>
</h3>
                    <p><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['date']->value));?>
</p>
                    <div class="hr-line-dashed"></div>


                    <div class="col-md-12">

                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" name="name" id="foo_filter" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..."/>

                                    </div>
                                </div>

                            </div>
                        </form>

                        <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                            <thead>
                            <tr>
                                <th width="200px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                                <th width="100px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Note'];?>
</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['employees']->value, 'employee');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['employee']->value) {
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['employee']->value->name;?>
 </td>
                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Present'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Absent'];?>
">
                                    </td>
                                    <td>
                                    <div class="form-group">
                                        <input class="form-control">
                                    </div>
                                    </td>
                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="3">
                                    <ul class="pagination">
                                    </ul>
                                </td>
                            </tr>
                            </tfoot>

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>



<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_10044770105d3b101459cff4_36145459 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_10044770105d3b101459cff4_36145459',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/footable/js/footable.all.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dp/dist/datepicker.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(function () {
            $('.footable').footable();
            var $inputDate = $('#inputDate');
            $inputDate.on('change',function () {
                window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
hrm/attendance/' + $inputDate.val()
            });
        })
    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
