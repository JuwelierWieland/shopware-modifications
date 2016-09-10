//{namespace name="backend/WielandGravurFonts"}
//{block name="backend/wieland_gravur_fonts/view/list/fonts"}
Ext.define("Shopware.apps.WielandGravurFonts.view.list.Fonts", {
    extend: "Shopware.grid.Panel",
    alias: "widget.wieland-gravur-fonts-list-fonts",
    region: "center",

    configure: function () {
        return {
            detailWindow: "Shopware.apps.WielandGravurFonts.view.detail.Window",

            columns: {
                name: {
                    header: "{s name=view/list/fonts/name}Interne Bezeichnung{/s}",
                    flex: 1
                },
                label: {
                    header: "{s name=view/list/fonts/label}Anzeigename{/s}",
                    flex: 1
                },
                active: {
                    header: "{s name=view/list/fonts/active}Aktiv{/s}",
                    flex: 0.5
                },
                fontFileMediaId: {
                    header: "{s name=view/list/fonts/font_file_media_id}Dateiname{/s}",
                    flex: 1.5,
                    renderer: function (value, config, record) {
                        if (record.raw.fontFileMedia !== null && typeof record.raw.fontFileMedia === 'object') {
                            return record.raw.fontFileMedia.name + '.' + record.raw.fontFileMedia.extension;
                        } else {
                            return '<em>Keine Datei ausgewählt</em>';
                        }
                    }
                }
            }
        };
    }
});
//{/block}
