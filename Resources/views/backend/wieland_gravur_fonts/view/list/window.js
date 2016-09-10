//{namespace name="backend/WielandGravurFonts"}
//{block name="backend/wieland_gravur_fonts/view/list/window"}
Ext.define("Shopware.apps.WielandGravurFonts.view.list.Window", {
    extend: "Shopware.window.Listing",
    alias: "widget.wieland-gravur-fonts-list-window",
    height: 450,
    width: 800,
    title: "{s name=view/list/window/title}Schriftarten{/s}",
    configure: function () {
        return {
            listingGrid: "Shopware.apps.WielandGravurFonts.view.list.Fonts",
            listingStore: "Shopware.apps.WielandGravurFonts.store.Font"
        };
    }
});
//{/block}