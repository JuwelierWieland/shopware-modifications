{extends file="parent:frontend/swag_custom_products/options/select.tpl"}

{namespace name="frontend/detail/option"}

{* Field *}
{block name="frontend_detail_swag_custom_products_options_select_field"}
    {$selectedValue = false}
    {foreach $option['values'] as $value}
        {if $value['is_default_value']}
            {$selectedValue = true}
            {break}
        {/if}
    {/foreach}

    <select id="custom-products-option-{$key}"
            data-class="wizard--input"
            {if $option['required']} data-validate="true" data-validate-message="{s name='detail/validate/multiselect'}{/s}"{/if}
            data-field="true"
            {if $option['ordernumber']|strpos:{config name="WielandShopwareModifications::fontFieldOrderNumber"} === 0} data-gravurfont="true"{/if}
            name="custom-option-id--{$option['id']}[]">

        {* Placeholder is a disabled option *}
        {block name="frontend_detail_swag_custom_products_options_select_placeholder"}
            <option disabled="disabled" value=""{if !$selectedValue} selected="selected"{/if}>
                {if $option['placeholder']}
                    {$option['placeholder']}
                {else}
                    {s name="detail/option/select/placeholder"}Please choose...{/s}
                {/if}
            </option>
        {/block}

        {* Values *}
        {block name="frontend_detail_swag_custom_products_options_select_values"}
            {foreach $option['values'] as $value}
                <option value="{$value['id']}"{if $value['is_default_value']} selected="selected"{/if}>
                    {$value['name']}
                    {block name="frontend_detail_swag_custom_products_options_select_value_surcharge"}
                        {include file='frontend/swag_custom_products/options/surcharge/surcharge.tpl'}
                    {/block}
                </option>
            {/foreach}
        {/block}
    </select>
{/block}
