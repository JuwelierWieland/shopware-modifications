{extends file="parent:frontend/swag_custom_products/detail/default/index.tpl"}

{block name="frontend_detail_swag_custom_products_options_label"}
    <label for="custom-products-option-{$option@index}" class="custom-products--label"
           data-custom-products-collapse-panel="true" data-label="{$option['name']}">
        {$option['name']}{if $option['required']}&nbsp;**{/if}

        {block name="frontend_detail_swag_custom_products_options_font_overview_link"}
            {if $option['ordernumber'] == {config name="WielandShopwareModifications::fontFieldOrderNumber"}}
                <span class="font--overview" data-content data-modalbox="true" data-targetselector="a" data-mode="ajax">
                    <a title="{s name="FontOverview"}Übersicht{/s}"
                       href="{url controller="WielandGravurFonts" action="fontOverviewModal"}">(Übersicht)</a>
                </span>
            {/if}
        {/block}

        {$surcharge = $option['surcharge']}
        {if $surcharge != 0.00}
            {* Once price for the option *}
            {block name="frontend_detail_swag_custom_products_options_once_price"}
                {if $option['is_once_surcharge']}
                    (+ {$surcharge|currency}&nbsp;{s name="detail/index/once_price"}{/s}{s name="Star" namespace="frontend/listing/box_article"}{/s})
                {/if}
            {/block}

            {block name="frontend_detail_swag_custom_products_options_surcharges_price"}
                {if !$option['is_once_surcharge']}
                    {$packUnit = $sArticle.packunit}

                    {if !$packUnit}
                        {$packUnit= "Piece"}
                    {/if}

                    (+ {$surcharge|currency} / {$packUnit}{s name="Star" namespace="frontend/listing/box_article"}{/s})
                {/if}
            {/block}
        {/if}

        <a href="#" class="custom-products--toggle-btn">
            <i class="icon--arrow-down" data-expanded="icon--arrow-up" data-collapsed="icon--arrow-down"></i>
        </a>
    </label>
{/block}
