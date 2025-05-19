{if $msgs->isMessage()}
    <div class="messages">
        {foreach $msgs->getMessages() as $msg}
            <div class="message 
                {if $msg->isError()} error
                {elseif $msg->isWarning()} warning
                {elseif $msg->isInfo()} info
                {/if}">
                {$msg->text}
            </div>
        {/foreach}
    </div>
{/if}
