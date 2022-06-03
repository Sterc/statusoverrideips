var StatusOverrideIps = function (config) {
    config = config || {};

    StatusOverrideIps.superclass.constructor.call(this, config);
};

Ext.extend(StatusOverrideIps, Ext.Component,{
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {},
    loadHelp: function () {
        window.open('https://github.com/Sterc/statusoverrideips');
    }
});

Ext.reg('statusoverrideips', StatusOverrideIps);
StatusOverrideIps = new StatusOverrideIps();
