{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_title}</h5>
                    {if $_url_import }
                    <!--<a href="{$_url}contacts/{$_url_import}" class="btn btn-xs btn-primary btn-rounded pull-right"><i class="fa fa-bars"></i> Import Datas</a>-->
                    {/if}
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {$koolajax}
                            {$grid}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
{/block}
