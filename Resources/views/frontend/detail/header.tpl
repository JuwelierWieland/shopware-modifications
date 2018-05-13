{extends file="parent:frontend/detail/header.tpl"}

{block name='frontend_index_header_canonical'}
    {$smarty.block.parent}

    {block name="frontend_index_header_wieland_fonts"}
        <style type="text/css">
            {foreach from=$wielandFonts item=font}
            @font-face {
                font-family: '{$font->getName()}{$font->getId()}';
                src: url({$font->getFontFileMedia()->getPath()});
            }
            {/foreach}
        </style>
        <script type="text/javascript">
            wielandFonts = {
                {foreach from=$wielandFonts item=font}
                    "{$font->getLabel()}": "{$font->getName()}{$font->getId()}",
                {/foreach}
            };
        </script>
    {/block}
{/block}
