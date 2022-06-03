Ext.onReady(function () {
	MODx.load({ xtype: 'statusoverrideips-page-home' });
});

StatusOverrideIps.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config,{
        buttons: [{
            text: _('help_ex'),
            handler: StatusOverrideIps.loadHelp
        }],
        components: [{
            xtype: 'statusoverrideips-panel-home',
            renderTo: 'statusoverrideips-panel-home-div'
		}]
    });

    StatusOverrideIps.page.Home.superclass.constructor.call(this, config);
};

Ext.extend(StatusOverrideIps.page.Home, MODx.Component);
Ext.reg('statusoverrideips-page-home', StatusOverrideIps.page.Home);
