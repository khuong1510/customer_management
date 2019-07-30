<?php
/* Smarty version 3.1.33, created on 2019-05-29 15:19:05
  from '/Users/razib/Documents/valet/suite/ui/theme/default/dashboard_tickets.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ceedb29799aa2_30738599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c82a1f818fa2cc07ddb88cd0838b7d2c91ad7264' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/dashboard_tickets.tpl',
      1 => 1559157542,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ceedb29799aa2_30738599 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table table-hover table-vcenter">

    <thead>
    <tr>
        <th>#</th>
        <th>Ticket Status</th>
        <th>Ticket Description</th>
        <th>Task Status</th>
    </tr>
    </thead>
    <tbody>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tickets']->value, 'ticket');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->value) {
?>
        <tr>
            <td style="width: 140px;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/view/<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
">#<?php echo $_smarty_tpl->tpl_vars['ticket']->value->tid;?>
</a>
                <br>
                <?php if ($_smarty_tpl->tpl_vars['ticket']->value->aid && isset($_smarty_tpl->tpl_vars['admins']->value[$_smarty_tpl->tpl_vars['ticket']->value->aid])) {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/1"><?php echo $_smarty_tpl->tpl_vars['admins']->value[$_smarty_tpl->tpl_vars['ticket']->value->aid]->fullname;?>
</a>
                <?php }?>
            </td>
            <td>
                                    <span class="label label-success"><?php if (isset($_smarty_tpl->tpl_vars['_L']->value[$_smarty_tpl->tpl_vars['ticket']->value->status])) {?>
                                            <?php echo $_smarty_tpl->tpl_vars['_L']->value[$_smarty_tpl->tpl_vars['ticket']->value->status];?>

                                        <?php } else { ?>
                                            <?php echo $_smarty_tpl->tpl_vars['ticket']->value->status;?>


                                        <?php }?>
                                    </span>
            </td>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/view/<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['ticket']->value->subject;?>
</a>
                <div class="text-muted">
                    <em><?php echo $_smarty_tpl->tpl_vars['_L']->value['Updated'];?>
 </em> <em class="mmnt"><?php echo strtotime($_smarty_tpl->tpl_vars['ticket']->value->updated_at);?>
</em> by <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/view/<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['ticket']->value->last_reply;?>
</a>
                </div>
            </td>

            <td>
                <?php if (isset($_smarty_tpl->tpl_vars['tickets_tasks']->value[$_smarty_tpl->tpl_vars['ticket']->value->id])) {?>
                    <span class="label label-primary"><?php echo $_smarty_tpl->tpl_vars['tickets_tasks']->value[$_smarty_tpl->tpl_vars['ticket']->value->id]->status;?>
</span>
                <?php }?>
            </td>

        </tr>

        <?php
}
} else {
?>
        <tr><td align="center" style="border-top: none"><?php echo $_smarty_tpl->tpl_vars['_L']->value['You do not have any Tickets'];?>
</td></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </tbody>
</table><?php }
}
