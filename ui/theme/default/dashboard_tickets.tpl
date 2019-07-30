<table class="table table-hover table-vcenter">

    <thead>
    <tr>
        <th>#</th>
        <th>Ticket Status</th>
        <th>Ticket Description</th>
        <th>Task Status</th>
    </tr>
    </thead>
    <tbody>

    {foreach $tickets as $ticket}
        <tr>
            <td style="width: 140px;">
                <a href="{$_url}tickets/admin/view/{$ticket->id}">#{$ticket->tid}</a>
                <br>
                {if $ticket->aid && isset($admins[$ticket->aid])}
                    <a href="{$_url}settings/users-edit/1">{$admins[$ticket->aid]->fullname}</a>
                {/if}
            </td>
            <td>
                                    <span class="label label-success">{if isset($_L[$ticket->status])}
                                            {$_L[$ticket->status]}
                                        {else}
                                            {$ticket->status}

                                        {/if}
                                    </span>
            </td>
            <td>
                <a href="{$_url}tickets/admin/view/{$ticket->id}">{$ticket->subject}</a>
                <div class="text-muted">
                    <em>{$_L['Updated']} </em> <em class="mmnt">{strtotime($ticket->updated_at)}</em> by <a href="{$_url}tickets/admin/view/{$ticket->id}">{$ticket->last_reply}</a>
                </div>
            </td>

            <td>
                {if isset($tickets_tasks[$ticket->id])}
                    <span class="label label-primary">{$tickets_tasks[$ticket->id]->status}</span>
                {/if}
            </td>

        </tr>

        {foreachelse}
        <tr><td align="center" style="border-top: none">{$_L['You do not have any Tickets']}</td></tr>
    {/foreach}

    </tbody>
</table>