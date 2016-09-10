//{block name="backend/wieland_gravur_fonts/store/font"}
Ext.define("Shopware.apps.WielandGravurFonts.store.Font", {
    extend: "Shopware.store.Listing",

    configure: function () {
        "use strict";
        return {
            controller: "WielandGravurFonts",
            proxy: {
                type: "ajax",
                api: {
                    create: '{url controller="base" action="create"}',
                    read: '{url controller="base" action="list"}',
                    update: '{url controller="base" action="update"}',
                    delete: '{url controller="base" action="delete"}'
                },
                reader: {
                    type: "application",
                    root: "data",
                    totalProperty: "total"
                }
            }
        };
    },

    sortOnLoad: true,

    sorters: [{
        property: "position",
        direction: "ASC"
    }],

    model: "Shopware.apps.WielandGravurFonts.model.Font"
});
//{/block}
