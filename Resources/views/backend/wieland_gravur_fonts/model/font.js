//{block name="backend/wieland_gravur_fonts/model/font"}
Ext.define("Shopware.apps.WielandGravurFonts.model.Font", {
    extend: "Shopware.data.Model",

    configure: function () {
        return {
            controller: "WielandGravurFonts",
            detail: "Shopware.apps.WielandGravurFonts.view.detail.Font"
        };
    },

    fields: [
        { name: "id", type: "int", useNull: true },
        { name: "name", type: "string" },
        { name: "label", type: "string" },
        { name: "active", type: "boolean" },
        { name: "position", type: "int" },
        { name: "fontFileMediaId", type: "int" }
    ]
});
//{/block}