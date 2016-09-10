//{block name="backend/wieland_gravur_fonts/application"}
Ext.define("Shopware.apps.WielandGravurFonts", {
    name: "Shopware.apps.WielandGravurFonts",
    extend: "Enlight.app.SubApplication",
    loadPath: "{url action=load}",
    bulkLoad: true,

    controllers: [
        "Main"
    ],

    models: [
        "Font"
    ],

    stores: [
        "Font"
    ],

    views: [
        "list.Window",
        "list.Fonts",
        "detail.Window",
        "detail.Font"
    ],

    launch: function () {
        return this.getController("Main").mainWindow;
    }
});
//{/block}