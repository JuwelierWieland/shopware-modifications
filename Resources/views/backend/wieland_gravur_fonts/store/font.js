//{block name="backend/wieland_gravur_fonts/store/font"}
Ext.define("Shopware.apps.WielandGravurFonts.store.Font", {
    extend: "Shopware.store.Listing",

    configure: function () {
        "use strict";
        return {
            controller: "WielandGravurFonts"
        };
    },

    model: "Shopware.apps.WielandGravurFonts.model.Font"
});
//{/block}
