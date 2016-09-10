{extends file="parent:frontend/listing/product-box/box-basic.tpl"}

{block name='frontend_listing_box_article_price_info'}
    {$smarty.block.parent}

    {if $displayListingAvailability}
        {block name='frontend_listing_box_article_availability'}
            {*{include file="frotnend/plugins/WielandShopwareModifications/listing/product-box/box-basic/article-availability.tpl"}*}
            {include file="frontend/plugins/index/delivery_informations.tpl"}
        {/block}
    {/if}
{/block}
