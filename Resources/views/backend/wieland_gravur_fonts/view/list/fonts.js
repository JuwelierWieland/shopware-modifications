//{namespace name="backend/WielandGravurFonts"}
//{block name="backend/wieland_gravur_fonts/view/list/fonts"}
Ext.define("Shopware.apps.WielandGravurFonts.view.list.Fonts", {
    extend: "Shopware.grid.Panel",
    alias: "widget.wieland-gravur-fonts-list-fonts",
    region: "center",

    initComponent: function () {
        var me = this;

        me.viewConfig = me.createDragAndDrop();

        me.callParent(arguments);
    },

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
    },

    createDragAndDrop: function () {
        var me = this;

        return {
            plugins: {
                ptype: "gridviewdragdrop",
                dragText: "Verschieben",
                dragGroup: "optionDD",
                dropGroup: "optionDD"
            },
            listeners: {
                drop: {
                    fn: me.onDrop,
                    scope: me
                }
            }
        };
    },

    onDrop: function () {
        var me = this;

        me.getStore().each(function (option, index) {
            option.set("position", index);
        });

        me.getStore().sync();
    },

    createColumns: function () {
        var me = this,
            columns = me.callParent(arguments),
            ddIndicatorColumnn = {
                header: "&#009868;",
                width: 24,
                renderer: me.renderSortHandleColumn,
                hideable: false,
                sortable: false,
                menuDisabled: true
            };

        columns = Ext.Array.insert(columns, 0, [ddIndicatorColumnn]);

        return columns;
    },

    renderSortHandleColumn: function (value, metadata) {
        metadata.tdAttr = Ext.String.format("data-qtip=\"[0]\"", "Ändern Sie die Reihenfolge der Schriftarten");

        return "<div style=\"cursor: n-resize;\">&#009868;</div>";
    }
});
//{/block}
