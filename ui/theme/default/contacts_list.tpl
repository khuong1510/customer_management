{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">

                    <a href="{$_url}contacts/add/" class="btn btn-primary"><i class="fa fa-plus"></i> {$_L['Add Customer']}</a>
                    <a href="{$_url}contacts/import_csv/" class="btn btn-success"><i class="fa fa-upload"></i> {$_L['Import']}</a>




                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">



                    <div id="ib_act_hidden" style="display: none;">
                        <a href="#" id="send_group_email" class="btn btn-primary">{$_L['Send Email']}</a>
                        <a href="#" id="assign_to_group" class="btn btn-primary"><i class="fa fa-users"></i> {$_L['Assign to Group']}</a>
                        {*<a href="#" id="send_group_sms" class="btn btn-primary">{$_L['Send SMS']}</a>*}
                        <a href="#" id="delete_multiple_customers" class="btn btn-danger"><i class="fa fa-trash"></i> {$_L['Delete']}</a>

                        <hr>
                    </div>

                    <div class="table-responsive" id="ib_data_panel">


                        <table class="table table-bordered table-hover display" id="ib_dt" width="100%">
                            <thead>
                            <tr class="heading">
                                <th><input id="d_select_all" type="checkbox" value="" name=""  class="i-checks"/></th>
                                <th>#</th>
                                <th>{$_L['Image']}</th>
                                <th>{$_L['Name']}</th>

                                {if $show_company_column}

                                    <th>{$_L['Company Name']}</th>

                                {/if}

                                {if $show_group_column}

                                    <th>{$_L['Group']}</th>

                                {/if}


                                {*<th>{$_L['Email']}</th>*}
                                <th>{$_L['Street']}</th>
                                <th>{$_L['Ward']}</th>
                                <th>{$_L['District']}</th>
                                <th>{$_L['City']}</th>
                                <th>{$_L['Phone']}</th>
                                <th>{$_L['Transport Name']}</th>
                                <th>{$_L['Transport Phone']}</th>
                                <th>{$_L['Transport Address']}</th>
                                <th>{$_L['Store']}</th>
                                <th class="text-right" style="width: 80px;">{$_L['Manage']}</th>
                            </tr>

                            <tr class="heading">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="text" id="account" name="account" class="form-control"></td>

                                {if $show_company_column}

                                    <td><input type="text" id="filter_company" name="filter_company" class="form-control"></td>

                                {/if}

                                {if $show_group_column}

                                    <td><input type="text" id="filter_group" name="filter_group" class="form-control"></td>

                                {/if}


                                {*<td><input type="email" id="filter_email" name="filter_email" class="form-control"></td>*}
                                <td><input type="text" id="filter_street" name="filter_street" class="form-control"></td>
                                <td><input type="text" id="filter_ward" name="filter_ward" class="form-control"></td>
                                <td><input type="text" id="filter_district" name="filter_district" class="form-control"></td>
                                <td><input type="text" id="filter_city" name="filter_city" class="form-control"></td>
                                <td><input type="text" id="filter_phone" name="filter_phone" class="form-control"></td>
                                <td><input type="text" id="filter_transport_name" name="filter_transport_name" class="form-control"></td>
                                <td><input type="text" id="filter_transport_phone" name="filter_transport_phone" class="form-control"></td>
                                <td><input type="text" id="filter_transport_address" name="filter_transport_address" class="form-control"></td>
                                <td><input type="text" id="filter_store" name="filter_store" class="form-control"></td>
                                <td class="text-right" style="width: 80px;"><button type="submit" id="ib_filter" class="btn btn-primary">{$_L['Filter']}</button></td>
                            </tr>
                            </thead>




                        </table>
                    </div>



                </div>
            </div>
        </div>

    </div>
{/block}

{block name="script"}
    <script>
        $(function() {

            var _url = $("#_url").val();

            var $ib_data_panel = $("#ib_data_panel");

            $ib_data_panel.block({ message:block_msg });

            var selected = [];
            var ib_act_hidden = $("#ib_act_hidden");
            function ib_btn_trigger() {
                if(selected.length > 0){
                    ib_act_hidden.show(200);
                }
                else{
                    ib_act_hidden.hide(200);
                }
            }


            $('[data-toggle="tooltip"]').tooltip();

            var ib_dt = $('#ib_dt').DataTable( {

                "serverSide": true,
                "ajax": {
                    "url": base_url + "contacts/json_list/{$type}",
                    "type": "POST",
                    "data": function ( d ) {

                        d.account = $('#account').val();
                        // d.email = $('#filter_email').val();
                        d.street = $('#filter_street').val();
                        d.ward = $('#filter_ward').val();
                        d.district = $('#filter_district').val();
                        d.city = $('#filter_city').val();
                        d.transport_name = $('#filter_transport_name').val();
                        d.transport_address = $('#filter_transport_address').val();
                        d.transport_phone = $('#filter_transport_phone').val();
                        d.store = $('#filter_store').val();

                        {if $show_company_column}

                        d.company = $('#filter_company').val();

                        {/if}


                        {if $show_group_column}

                        d.group = $('#filter_group').val();

                        {/if}


                        d.phone = $('#filter_phone').val();



                    }
                },
                "pageLength": 20,
                "rowCallback": function( row, data ) {
                    if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
                        $(row).addClass('selected');

                    }
                },
                responsive: true,
                dom: "<'row'<'col-sm-6'i><'col-sm-6'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'><'col-sm-7'p>>",

                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    {
                        extend:    'pageLength',
                        text:      '<i class="fa fa-bars"></i>',
                        titleAttr: 'Entries'
                    },
                    {
                        extend:    'colvis',
                        text:      '<i class="fa fa-columns"></i>',
                        titleAttr: 'Columns'
                    },
                    {
                        extend:    'copyHtml5',
                        text:      '<i class="fa fa-files-o"></i>',
                        titleAttr: 'Copy'
                    },
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: 'Excel'
                    },
                    {
                        extend:    'csvHtml5',
                        text:      '<i class="fa fa-file-text-o"></i>',
                        titleAttr: 'CSV'
                    },
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="fa fa-file-pdf-o"></i>',
                        titleAttr: 'PDF'
                    },
                    {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i>',
                        titleAttr: 'Print'
                    }

                ],
                "orderCellsTop": true,
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="' + base_url +'contacts/view/'+ row[1] +'" id="account_val_'+ row[1] +'">'+ data +'</a>' +
                                '<input type="hidden" name="account" class="form-control edit-inline-input" id="account_'+ row[1] +'" value="' + data +'" style="width: 100%"/>';
                        },
                        "targets": 3
                    },

                    { "orderable": false, "targets": 0 },

                    {if $show_company_column && $show_group_column}

                    { "orderable": false, "targets": 8 },

                    {elseif $show_company_column && $show_group_column == false}

                    { "orderable": false, "targets": 7 },

                    {elseif $show_group_column && $show_company_column == false}

                    { "orderable": false, "targets": 7 },

                    {else}

                    {
                        "orderable": false,
                        "targets": 4,
                        "render": function ( data, type, row ) {
                            return '<span id="street_val_'+ row[1] +'">' + data + '</span>' +
                                '<input type="hidden" name="street" class="form-control edit-inline-input" id="street_'+ row[1] +'" value="' + data +'" style="width: 100%"/>';
                        }
                    },
                    {
                        "orderable": false,
                        "targets": 5,
                        "render": function ( data, type, row ) {
                            return '<span id="ward_val_'+ row[1] +'">' + data + '</span>' +
                                '<input type="hidden" name="ward" class="form-control edit-inline-input" id="ward_'+ row[1] +'" value="' + data +'" style="width: 100%"/>';
                        }
                    },
                    {
                        "orderable": false,
                        "targets": 6,
                        "render": function ( data, type, row ) {
                            return '<span id="district_val_'+ row[1] +'">' + data + '</span>' +
                                '<input type="hidden" name="district" class="form-control edit-inline-input" id="district_'+ row[1] +'" value="' + data +'" style="width: 100%"/>';
                        }
                    },
                    {
                        "orderable": false,
                        "targets": 7,
                        "render": function ( data, type, row ) {
                            return '<span id="city_val_'+ row[1] +'">' + data + '</span>' +
                                '<input type="hidden" name="city" class="form-control edit-inline-input" id="city_'+ row[1] +'" value="' + data +'" style="width: 100%" />';
                        }
                    },
                    {
                        "orderable": false,
                        "targets": 8,
                        "render": function ( data, type, row ) {
                            return '<span id="phone_val_'+ row[1] +'">' + data + '</span>' +
                                '<input type="hidden" name="phone" class="form-control edit-inline-input" id="phone_'+ row[1] +'" value="' + data +'" style="width: 100%" />';
                        }
                    },
                    {
                        "orderable": false,
                        "targets": 9,
                        "render": function ( data, type, row ) {
                            return '<span id="transport_name_val_'+ row[1] +'">' + data + '</span>' +
                                '<input type="hidden" name="transport_name" class="form-control edit-inline-input" id="transport_name_'+ row[1] +'" value="' + data +'" style="width: 100%" />';
                        }
                    },
                    {
                        "orderable": false,
                        "targets": 10,
                        "render": function ( data, type, row ) {
                            return '<span id="transport_phone_val_'+ row[1] +'">' + data + '</span>' +
                                '<input type="hidden" name="transport_phone" class="form-control edit-inline-input" id="transport_phone_'+ row[1] +'" value="' + data +'" style="width: 100%" />';
                        }
                    },
                    {
                        "orderable": false,
                        "targets": 11,
                        "render": function ( data, type, row ) {
                            return '<span id="transport_address_val_'+ row[1] +'">' + data + '</span>' +
                                '<input type="hidden" name="transport_address" class="form-control edit-inline-input" id="transport_address_'+ row[1] +'" value="' + data +'" style="width: 100%" />';
                        }
                    },
                    {
                        "orderable": false,
                        "targets": 12,
                        "render": function ( data, type, row ) {
                            return '<span id="store_val_'+ row[1] +'">' + data + '</span>' +
                                '<input type="hidden" name="store" class="form-control edit-inline-input" id="store_'+ row[1] +'" value="' + data +'" style="width: 100%" />';
                        }
                    },
                    {/if}


                    { "orderable": false, "targets": 2 },
                    { className: "text-center", "targets": [ 1 ] },
                    { "type": "html-num", "targets": 1 }
                ],
                "order": [[ 1, 'desc' ]],
                "scrollX": true,
                "initComplete": function () {
                    $ib_data_panel.unblock();

                    listen_change();
                },
                select: {
                    info: false
                }
            } );

            var $ib_filter = $("#ib_filter");


            $ib_filter.on('click', function(e) {
                e.preventDefault();

                $ib_data_panel.block({ message:block_msg });

                ib_dt.ajax.reload(
                    function () {
                        $ib_data_panel.unblock();
                    }
                );


            });


            // $('#ib_dt tbody').on('click', 'tr', function () {
            //     var id = this.id;
            //     var index = $.inArray(id, selected);
            //
            //     if ( index === -1 ) {
            //         selected.push( id );
            //     } else {
            //         selected.splice( index, 1 );
            //     }
            //
            //     $(this).toggleClass('selected');
            //
            //     ib_btn_trigger();
            //
            //
            //
            // } );


            function listen_change() {

                var i_checks = $('.i-checks');
                i_checks.iCheck({
                    checkboxClass: 'icheckbox_square-blue'
                });

                i_checks.on('ifChanged', function (event) {

                    var id = $(this)[0].id;



                    var index = $.inArray(id, selected);

                    if($(this).iCheck('update')[0].checked){

                        if(id == 'd_select_all'){

                            //   ib_dt.rows().select();

                            i_checks.iCheck('check');

                            return;
                        }



                        selected.push( id );



                        //  $(this).closest('tr').toggleClass('selected');

                        ib_btn_trigger();

                    }
                    else{

                        if(id == 'd_select_all'){


                            i_checks.iCheck('uncheck');

                            return;
                        }

                        selected.splice( index, 1 );

                        //  $(this).closest('tr').toggleClass('selected');

                        ib_btn_trigger();

                    }

                });
            }

            listen_change();



            $('#ib_dt tbody').on('click', '.phone_number', function () {

                var phone_number = $(this).html();





            } );


            $ib_data_panel.on('click', '.cdelete', function(e){
                e.preventDefault();
                var lid = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){

                        $.get( base_url + "delete/crm-user/"+lid, function( data ) {
                            $ib_data_panel.block({ message:block_msg });

                            ib_dt.ajax.reload(
                                function () {
                                    $ib_data_panel.unblock();
                                    listen_change();
                                    $('.i-checks').iCheck('uncheck');
                                }
                            );
                        });


                    }
                });

            });

            $("#send_group_email").click(function(e){
                e.preventDefault();
                $.redirect(base_url + "handler/bulk_email/",{ type: "customers", ids: selected});
            });

            // $("#assign_to_group").click(function(e){
            //     e.preventDefault();
            //
            // });

            $('#assign_to_group').webuiPopover({
                type:'async',
                placement:'top',

                cache: false,
                width:'240',
                url: base_url + 'handler/groups/'
            });

            $('body').on('change', '#input_assign_group', function(e){

                $('.webui-popover').block({ message: block_msg});

                $.post( base_url + "contacts/set_group/", { gid: $('#input_assign_group').val(), ids: selected })
                    .done(function( data ) {

                        $('.webui-popover').unblock();
                        $ib_data_panel.block({ message:block_msg });
                        ib_dt.ajax.reload(
                            function () {
                                $ib_data_panel.unblock();
                                listen_change();
                                $('.i-checks').iCheck('uncheck');
                            }
                        );


                        toastr.success(data);


                    });



            });

            $("#delete_multiple_customers").click(function(e){
                e.preventDefault();
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        $.redirect(base_url + "delete/multiple/",{ type: "customers", ids: selected});
                    }
                });

            });

            // Edit inline: Show input and edit button
            $ib_data_panel.on('click', '.ceditinline', function(e){
                e.preventDefault();
                var lid = this.id;
                var id = lid.replace("eiid", "");

                $('.edit-inline-input').each(function() {
                    $(this).attr('type', 'hidden');
                });

                $('#dtr_' + id + ' .edit-inline-input').each(function() {
                    $(this).attr('type', 'text');
                });

                // Show edit button
                $(this).hide();
                $('#eiokid' + id).show();
                $('#eirmid' + id).show();

                $('#account_val_' + id).hide();
                $('#street_val_' + id).hide();
                $('#ward_val_' + id).hide();
                $('#district_val_' + id).hide();
                $('#city_val_' + id).hide();
                $('#phone_val_' + id).hide();
                $('#transport_name_val_' + id).hide();
                $('#transport_phone_val_' + id).hide();
                $('#transport_address_val_' + id).hide();
                $('#store_val_' + id).hide();

            });

            // Edit inline: Hide input and edit button
            function hideEditInlineInput(id) {
                $('#eiid' + id).show();
                $('#eiokid' + id).hide();
                $('#eirmid' + id).hide();

                $('#account_val_' + id).show();
                $('#street_val_' + id).show();
                $('#ward_val_' + id).show();
                $('#district_val_' + id).show();
                $('#city_val_' + id).show();
                $('#phone_val_' + id).show();
                $('#transport_name_val_' + id).show();
                $('#transport_phone_val_' + id).show();
                $('#transport_address_val_' + id).show();
                $('#store_val_' + id).show();

                $('#dtr_' + id + ' .edit-inline-input').each(function() {
                    $(this).attr('type', 'hidden');
                });
            }

            $ib_data_panel.on('click', '.c-remove', function(e) {
                e.preventDefault();
                var id = this.id.replace("eirmid", "");

                hideEditInlineInput(id);
            });

            // Edit inline: Send edit request
            $ib_data_panel.on('click', '.c-ok', function(e) {
                e.preventDefault();
                var id = this.id.replace("eiokid", "");
                var lid = 'eiid' + id;

                var account = $('#account_' + id).val();
                var phone = $('#phone_' + id).val();
                var street = $('#street_' + id).val();
                var ward = $('#ward_' + id).val();
                var district = $('#district_' + id).val();
                var city = $('#city_' + id).val();
                var transportName = $('#transport_name_' + id).val();
                var transportAddress = $('#transport_address_' + id).val();
                var transportPhone = $('#transport_phone_' + id).val();
                var store = $('#store_' + id).val();

                $.post(
                    base_url + "contacts/edit_inline/" + lid,
                    {
                        account: account,
                        phone: phone,
                        street: street,
                        ward: ward,
                        district: district,
                        city: city,
                        transport_name: transportName,
                        transport_address: transportAddress,
                        transport_phone: transportPhone,
                        store: store
                    },
                    function( data ) {
                        console.log(data);

                        if (data.status) {
                            $('#account_val_' + id).html(account);
                            $('#street_val_' + id).html(street);
                            $('#ward_val_' + id).html(ward);
                            $('#district_val_' + id).html(district);
                            $('#city_val_' + id).html(city);
                            $('#phone_val_' + id).html(phone);
                            $('#transport_name_val_' + id).html(transportName);
                            $('#transport_phone_val_' + id).html(transportPhone);
                            $('#transport_address_val_' + id).html(transportAddress);
                            $('#store_val_' + id).html(store);

                            toastr.success(data.message);
                            hideEditInlineInput(id);

                            // $ib_data_panel.block({ message:block_msg });
                            // ib_dt.ajax.reload(
                            //     function () {
                            //         $ib_data_panel.unblock();
                            //         listen_change();
                            //     }
                            // );
                        } else {
                            toastr.error(data.message);
                        }

                    });
            });

        });
    </script>
{/block}
