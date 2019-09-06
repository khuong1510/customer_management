{extends file="$layouts_client"}

{block name="content"}

    <section class="panel" id="ib_box">
        <div class="panel-body" style="font-size: 14px;">
            <div>
                {if isset($notify)}
                    {$notify}
                {/if}

                <div>
                    <p class="success_message"></p>
                </div>

                <form method="post" action="{$_url}client/farmer-tree/create_post/" id="iform" name="iform">
                    {if $user->type != "Customer"}
                    <div class="form-group">
                        <label for="account">{$_L['Full Name']}</label>
                        <input type="text" class="form-control" id="account" name="account" value="" >
                    </div>

                    <div class="form-group">
                        <label for="phone">{$_L['Phone']}</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="">
                    </div>

                    <div class="form-group">
                        <label for="street">{$_L['Street']}</label>
                        <input type="text" class="form-control" id="street" name="street" value="">
                    </div>
                    <div class="form-group">
                        <label for="ward">{$_L['Ward']}</label>
                        <input type="text" class="form-control" id="ward" name="ward" value="">
                    </div>
                    <div class="form-group">
                        <label for="district">{$_L['District']}</label>
                        <input type="text" class="form-control" id="district" name="district" value="">
                    </div>
                    <div class="form-group">
                        <label for="city">{$_L['City']}</label>
                        <input type="text" class="form-control" id="city" name="city" value="">
                    </div>
                    <div class="form-group">
                        <label for="area">{$_L['Area']}</label>
                        <input type="text" class="form-control" id="area" name="area" value="">
                    </div>
                    {/if}
                    <div class="form-group">
                        <label for="tree_id">{$_L['Tree Name']}</label>
                        <select class="form-control" id="tree_id" name="tree_id" size="1">

                            {foreach $deps as $dep}
                                <option value="{$dep['name']}">{$dep['name']}</option>
                                {foreachelse}
                                <option value="">Select option</option>
                            {/foreach}

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="age">{$_L['Age']}</label>
                        <input type="text" class="form-control" id="age" name="age" value="">
                    </div>
                    <div class="form-group">
                        <label for="amount">{$_L['Amount']}</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="">
                    </div>
                    <input type="hidden" name="account_id" value="{$user->id}" >
                    <input type="hidden" name="type" value="{$user->type}" >
                    <button type="submit" id="ib_form_submit" class="btn btn-primary">{$_L['Submit']}</button>
                </form>


            </div>




        </div>
    </section>

{/block}

{block name="script"}
    <script>
        Dropzone.autoDiscover = false;
        $(function() {

            var _url = $("#_url").val();

            var $ib_form_submit = $("#ib_form_submit");

            var $create_ticket = $("#create_ticket");
            var $ib_box = $("#ib_box");

            $ib_form_submit.on('click', function(e) {
                e.preventDefault();
                $ib_box.block({ message: block_msg });
                $.post( _url + "client/farmer-tree/add_post/", $( "#iform" ).serialize() )
                    .done(function( data ) {
                        $ib_box.unblock();
                        if(data.success == "Yes"){
                            window.location.href = _url + "client/farmer-tree/all";
                            // toastr.success(data.msg);
                        }

                        else {
                            // $ib_box.unblock();
                            toastr.error(data.msg);
                             // console.log(data);
                        }

                    });


            });


        });
    </script>
{/block}
