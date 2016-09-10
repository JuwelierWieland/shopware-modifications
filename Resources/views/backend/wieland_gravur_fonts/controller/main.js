//{block name="backend/wieland_gravur_fonts/controller/main"}
Ext.define("Shopware.apps.WielandGravurFonts.controller.Main", {
    extend: "Enlight.app.Controller",

    init: function () {
        var me = this;

        me.mainWindow = me.getView("list.Window").create({});
        me.mainWindow.show();
    }
});
//{/block}
