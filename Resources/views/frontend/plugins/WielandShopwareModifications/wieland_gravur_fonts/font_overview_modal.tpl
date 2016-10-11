{extends file="parent:frontend/custom/ajax.tpl"}

{block name='frontend_custom_ajax_action_buttons'}
    <div class="panel--title is--underline">{s name="FontOverviewTitle"}Schriftarten{/s}</div>
{/block}

{block name='frontend_custom_ajax_article_content'}
    <div class="panel--body is--wide wieland-gravurvorschau">
        <style type="text/css">
            {foreach from=$fonts item=font}
                @font-face {
                    font-family: '{$font->getName()}{$font->getId()}';
                    src: url({$font->getFontFileMedia()->getPath()});
                }
            {/foreach}
        </style>

        <p><label for="wieland-gravurvorschau--input">{s name="FontOverviewDescription"}Geben Sie in dem Textfeld Ihren Wunschtext ein{/s}</label></p>
        <p>
            <textarea name="input" id="wieland-gravurvorschau--input" rows="2">Bitte aktivieren Sie Javascript, um die Gravurvorschau nutzen zu können.</textarea>
            {foreach from=$fonts item=font}
                <div class="preview {$font->getName()}{$font->getId()}">
                    {$font->getLabel()}
                    <div style="font-family: {$font->getName()}{$font->getId()}"></div>
                </div>
            {/foreach}
        </p>

        <script type="text/javascript">
            $('.wieland-gravurvorschau').fontOverview();
        </script>
    </div>
{/block}
