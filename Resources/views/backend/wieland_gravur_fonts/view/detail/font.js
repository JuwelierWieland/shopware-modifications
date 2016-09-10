//{namespace name="backend/WielandGravurFonts"}
//{block name="backend/wieland_gravur_fonts/view/detail/font"}
Ext.define("Shopware.apps.WielandGravurFonts.view.detail.Font", {
    extend: "Shopware.model.Container",
    alias: "widget.wieland-gravur-fonts-detail-font",

    padding: 20,

    configure: function () {
        return {
            controller: "WielandGravurFonts",

            fieldSets: [{
                layout: {
                    type: "vbox",
                    align: "stretch"
                },

                title: "{s name=view/detail/font/title}Schriftart{/s}",

                fields: {
                    name: {
                        fieldLabel: "{s name=view/detail/font/name}Interne Bezeichnung{/s}"
                    },
                    label: {
                        fieldLabel: "{s name=view/detail/shortcut/label}Anzeigename{/s}"
                    },
                    active: {
                        fieldLabel: "{s name=view/detail/shortcut/active}Aktiv{/s}"
                    },
                    fontFileMediaId: {
                        fieldLabel: "{s name=view/detail/shortcut/font_file_media_id}Schriftdatei{/s}",
                        xtype: 'shopware-media-field'
                    }
                }
            }]
        };
    }
});
//{/block}