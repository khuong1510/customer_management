<?php
/* Smarty version 3.1.33, created on 2019-06-08 11:29:58
  from '/Users/razib/Documents/valet/suite/apps/bpr/views/modal_add_partner.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfbd4763d05d7_67415882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09eceed095e4ec6c5bafaa1b2af3b915f6d032aa' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/bpr/views/modal_add_partner.tpl',
      1 => 1559989617,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfbd4763d05d7_67415882 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add New Partner</h3>
</div>
<div class="modal-body">

    <form class="form-horizontal" id="contactForm">

        <div class="row">
            <div class="col-md-6 col-sm-12">


                <div class="form-group"><label class="col-md-4 control-label" for="account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Name'];?>
<small class="red">*</small> </label>

                    <div class="col-lg-8"><input type="text" id="account" name="full_name" class="form-control" autofocus>

                    </div>
                </div>



                <div class="form-group"><label class="col-md-4 control-label" for="display_name"><?php echo $_smarty_tpl->tpl_vars['config']->value['contact_extra_field'];?>
 </label>

                    <div class="col-lg-8">

                        <input type="text" id="display_name" name="display_name" class="form-control">

                    </div>
                </div>

                
                
                                
                <div class="form-group"><label class="col-md-4 control-label" for="cid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company'];?>
</label>

                    <div class="col-lg-8">

                        <select id="cid" name="cid" class="form-control">
                            <option value="0"><?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
</option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['companies']->value, 'company');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['company']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['company']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['company']->value['company_name'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>


                    </div>
                </div>


                <?php if ($_smarty_tpl->tpl_vars['config']->value['show_business_number'] == '1') {?>

                    <div class="form-group"><label class="col-md-4 control-label" for="business_number"><?php echo $_smarty_tpl->tpl_vars['config']->value['label_business_number'];?>
</label>

                        <div class="col-lg-8"><input type="text" id="business_number" name="business_number" class="form-control">

                        </div>
                    </div>

                <?php }?>



                <div class="form-group"><label class="col-md-4 control-label" for="email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</label>

                    <div class="col-lg-8"><input type="text" id="email" name="email" class="form-control">

                    </div>
                </div>


                <div class="form-group"><label class="col-md-4 control-label text-danger" for="secondary_email">Accounting Email</label>

                    <div class="col-lg-8"><input type="text" id="secondary_email" name="accounting_email" class="form-control">

                    </div>
                </div>


                <div class="form-group"><label class="col-md-4 control-label" for="phone"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</label>

                    <div class="col-lg-8"><input type="text" id="phone" name="phone" class="form-control">

                    </div>
                </div>




                <div class="form-group"><label class="col-md-4 control-label" for="address"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>

                    <div class="col-lg-8"><input type="text" id="address" name="address" class="form-control">

                    </div>
                </div>


                <div class="form-group"><label class="col-md-4 control-label" for="city"><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</label>

                    <div class="col-lg-8"><input type="text" id="city" name="city" class="form-control">

                    </div>
                </div>
                <div class="form-group"><label class="col-md-4 control-label" for="state"><?php echo $_smarty_tpl->tpl_vars['_L']->value['State Region'];?>
</label>

                    <div class="col-lg-8"><input type="text" id="state" name="state" class="form-control">

                    </div>
                </div>
                <div class="form-group"><label class="col-md-4 control-label" for="zip"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
 </label>

                    <div class="col-lg-8"><input type="text" id="zip" name="zip" class="form-control">

                    </div>
                </div>
                <div class="form-group"><label class="col-md-4 control-label" for="country"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
</label>

                    <div class="col-lg-8">

                        <select name="country" id="country" class="form-control">
                            <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Country'];?>
</option>
                            <?php echo $_smarty_tpl->tpl_vars['countries']->value;?>

                        </select>

                    </div>
                </div>


            </div>
            <div class="col-md-6 col-sm-12">


                <div class="form-group"><label class="col-md-4 control-label" for="group"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Group'];?>
</label>

                    <div class="col-lg-8">
                        <select class="form-control" name="group" id="group">
                            <option value="0"><?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
</option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gs']->value, 'g');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['g']->value['gname'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>

                    </div>
                </div>






                <div class="form-group"><label class="col-md-4 control-label" for="password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>

                    <div class="col-lg-8"><input type="password" id="password" name="password" class="form-control">

                    </div>
                </div>

                <div class="form-group"><label class="col-md-4 control-label" for="confirm_password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm Password'];?>
</label>

                    <div class="col-lg-8"><input type="password" id="confirm_password" name="confirm_password" class="form-control">

                    </div>
                </div>


                <?php if (isset($_smarty_tpl->tpl_vars['config']->value['add_contact_remove_welcome_email'])) {?>

                    <input type="hidden" name="send_client_signup_email" id="send_client_signup_email" value="No">
                <?php } else { ?>

                    <div class="form-group"><label class="col-md-4 control-label" for="send_client_signup_email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Welcome Email'];?>
</label>

                        <div class="col-lg-8">


                            <input type="checkbox" checked data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="send_client_signup_email" name="send_client_signup_email" value="Yes">


                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Send Client Signup Email'];?>
</span>

                        </div>
                    </div>

                <?php }?>



            </div>
        </div>




    </form>

</div>
<div class="modal-footer">

    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</button>
    <button class="btn btn-primary contact_submit" type="submit" id="contact_submit"><i class="fa fa-check"></i> Add Partner</button>
</div><?php }
}
