StatusOverrideIps.panel.Home = function (config) {
    config = config || {};

	Ext.apply(config,{
        baseCls: 'modx-formpanel',
        cls: 'container',
        items: [{
            html: '<h2>' + _('statusoverrideips') + '</h2>',
            border: false,
            cls: 'modx-page-header'
		},{
            layout: 'form',
            items: [{
                html: '<p>' + _('statusoverrideips.desc') + '</p>',
                bodyCssClass: 'panel-desc',
                border: false
            },{
                xtype: 'statusoverrideips-grid-ips',
                cls: 'main-wrapper',
                preventRender: true
            }]
        }]
    });

    StatusOverrideIps.panel.Home.superclass.constructor.call(this, config);
};

Ext.extend(StatusOverrideIps.panel.Home, MODx.Panel);
Ext.reg('statusoverrideips-panel-home', StatusOverrideIps.panel.Home);
