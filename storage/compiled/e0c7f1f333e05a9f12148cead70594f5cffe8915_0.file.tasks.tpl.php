<?php
/* Smarty version 3.1.33, created on 2019-04-28 03:54:41
  from '/Users/razib/Documents/valet/suite/ui/theme/default/tasks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc55c4179e1c9_36293421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0c7f1f333e05a9f12148cead70594f5cffe8915' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/tasks.tpl',
      1 => 1556267287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc55c4179e1c9_36293421 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18056104795cc55c41799647_06762784', "style");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2236120195cc55c4179a313_09997721', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21298282425cc55c4179b869_17477178', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_18056104795cc55c41799647_06762784 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_18056104795cc55c41799647_06762784',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/daterangepicker/daterangepicker.css" rel="stylesheet">
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_2236120195cc55c4179a313_09997721 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2236120195cc55c4179a313_09997721',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">

        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tasks">
                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date Range'];?>
 (<?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
)</label>
                            <input class="form-control" id="reportrange" name="reportrange">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="btnFilter"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Filter'];?>
</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12" id="kanbanCanvas">




        </div>

    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_task" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_21298282425cc55c4179b869_17477178 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_21298282425cc55c4179b869_17477178',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>



        var callback_tasks = function () {

            $( ".mmnt" ).each(function() {
                //   alert($( this ).html());
                var ut = $( this ).html();
                $( this ).html(moment.unix(ut).fromNow());
            });

            for (var a = dragula($(".kanban-droppable-area").toArray()), r = a.containers, o = r.length, l = 0; l < o; l++)$(r[l]).addClass("dragula dragula-vertical");
            a.on("drop", function (a, r, o, l) {


                var item = a.id;
                var target = r.id;

                $.post(base_url + 'tasks/set_status/',{ task_id : item, target: target },function (data) {
                    //   $(".kanban-col").unblock();

                })

            });
        };


        var start = moment().subtract(6, 'days');
        var end = moment();

        var reportrange_value = start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY');

        var $kanbanCanvas = $('#kanbanCanvas');

        function loadTasks()
        {
            var loading_placeholder = '<div class="md-preloader"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="32" width="32" viewbox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="6"/></svg></div>';



            $kanbanCanvas.html(loading_placeholder);


            $.post("<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tasks/ajax_tasks", { reportrange: reportrange_value }).done(function( data ) {

                    $kanbanCanvas.html( data );
                    callback_tasks();
                });

        }


        $(function () {


            loadTasks();

            $('#btnFilter').on('click',function (e) {
                e.preventDefault();
                loadTasks();
            });

            $modal = $("#ajax-modal");




            var rel_type_val;

            $(".add_task").on('click',function (e) {
                e.preventDefault();

                $('body').modalmanager('loading');

                $modal.load( base_url + 'tasks/create/', '', function(){

                    $modal.modal();
                    ib_editor("#description");
                    var ib_date_picker_options = {
                        format: ib_date_format_picker
                    };



                    var $start_date = $('#start_date');

                    $start_date.datetimepicker({
                        format: 'YYYY-MM-DD'
                    });

                    var $due_date = $('#due_date');

                    $due_date.datetimepicker({
                        format: 'YYYY-MM-DD'
                    });

                    $("#cid").select2({
                        theme: "bootstrap"
                    });

                });


            });




            // function updateRelParams() {
            //
            //     rel_type_val = $("#rel_type").val();
            //
            //     if(rel_type_val != 'None'){
            //
            //         $("#rel_id_input").show();
            //         $("#lbl_rel_id").html(rel_type_val);
            //
            //
            //
            //         var rel_id_select2 = $("#rel_id").select2({
            //             theme: "bootstrap",
            //             ajax: {
            //                 url: base_url + "json/"+rel_type_val,
            //                 processResults: function (data, params) {
            //                     return {
            //                         results: data
            //
            //                     };
            //                 },
            //                 delay: 250,
            //                 cache: false
            //
            //             }
            //         });
            //
            //
            //
            //
            //     }
            //
            //     else{
            //         $("#rel_id_input").hide();
            //     }
            // }


            $modal.on('click', '.modal_submit', function(e){

                e.preventDefault();

                $modal.modal('loading');

                $.post( base_url + "tasks/post/", $("#ib-modal-form").serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            window.location = base_url + 'tasks/list/' + data;

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });

            });


            $kanbanCanvas.on('click','.v_item',function (e) {
                e.preventDefault();
                $('body').modalmanager('loading');

                $modal.load( base_url + 'tasks/view/'+this.id, '', function(){

                    $modal.modal();




                });
            });




            $modal.on('click', '.c_delete', function(e){
                e.preventDefault();
                var tid = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){

                        $.get( base_url + "delete/tasks/"+tid, function( data ) {
                            location.reload();
                        });


                    }
                });

            });


            $modal.on('click', '.c_edit', function(e){
                e.preventDefault();
                var tid = this.id;

                $('body').modalmanager('loading');

                $modal.load( base_url + 'tasks/create/'+tid, '', function(){
                    $('body').modalmanager('loading');
                    $modal.modal();
                    ib_editor("#description");
                    var ib_date_picker_options = {
                        format: ib_date_format_picker
                    };


                    var jq_title = $('#title').val();

                    $('#title').keyup(function () {

                        var live_val = $(this).val();
                        if(live_val == ''){
                            $("#txt_modal_header").html(jq_title);
                        }
                        else{
                            $("#txt_modal_header").html(live_val);
                        }


                    });

                    var $start_date = $('#start_date');

                    $start_date.datetimepicker({
                        format: 'YYYY-MM-DD'
                    });

                    var $due_date = $('#due_date');

                    $due_date.datetimepicker({
                        format: 'YYYY-MM-DD'
                    });


                    $("#cid").select2({
                        theme: "bootstrap"
                    });

                    // $("#rel_type").select2({
                    //     theme: "bootstrap"
                    // })
                    //     .on("change", function(e) {
                    //         updateRelParams();
                    //     });

                });

            });





            function cb(start, end) {

                reportrange_value = start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY');

                $('#reportrange span').html(reportrange_value);
            }

            var $reportrange = $("#reportrange");

            $reportrange.daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                locale: {
                    format: 'YYYY/MM/DD'
                }
            }, cb);

            cb(start, end);


        });


    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
