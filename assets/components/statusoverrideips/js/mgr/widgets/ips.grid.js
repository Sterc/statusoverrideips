StatusOverrideIps.grid.IPs = function (config) {
    config = config || {};

	Ext.applyIf(config, {
		id: 'statusoverrideips-grid-ips',
		url: StatusOverrideIps.config.connector_url,
        baseParams: {
            action: 'Sterc\\StatusOverrideIps\\Processors\\Ip\\GetList'
        },
		fields: ['id','name', 'ip'],
		paging: true,
		remoteSort: true,
        autoExpandColumn: 'name',
        columns: [{
            header: _('id'), dataIndex: 'id', sortable: true, width: 10
        }, {
            header: _('statusoverrideips.ip.name'), dataIndex: 'name', sortable: true
        }, {
            header: _('statusoverrideips.ip'), dataIndex: 'ip', sortable: true
        }],
        tbar: [{
            text: _('statusoverrideips.ip.new'),
            handler: this.createIP
        }],
        listeners: {
			rowDblClick: function(grid, rowIndex, e) {
				var row = grid.store.getAt(rowIndex);
				this.updateIP(grid, e, row);
			}
		}
    });

    StatusOverrideIps.grid.IPs.superclass.constructor.call(this, config);
};

Ext.extend(StatusOverrideIps.grid.IPs, MODx.grid.Grid, {
	getMenu: function() {
		var m = [{
            text: _('statusoverrideips.ip.update'),
            handler: this.updateIP
			}, '-', {
            text: _('statusoverrideips.ip.remove'),
            handler: this.removeIP
        }];

        this.addContextMenuItem(m);

		return true;
    },

    createIP: function (btn, e) {
		var w = MODx.load({
            xtype: 'statusoverrideips-window-ip',
            update: 0,
            baseParams: {
                action: 'Sterc\\StatusOverrideIps\\Processors\\Ip\\Create'
            },
            listeners: {
                'success': { fn: this.refresh, scope: this },
                'hide': { fn: this.destroy }
			}
        });

        w.setTitle(_('statusoverrideips.ip.new')).show(
            e.target, function () {
                w.setPosition(null, 50)
            },
            this
        );

		w.reset();
    },

	updateIP: function(btn, e, row) {
        if (typeof (row) != 'undefined') {
            this.menu.record = row.data;
        }

		var w = MODx.load({
            xtype: 'statusoverrideips-window-ip',
            update: 1,
            listeners: {
                'success': { fn: this.refresh, scope: this },
                'hide': { fn: this.destroy }
			}
        });

        w.setTitle(_('statusoverrideips.ip.update')).show(
            e.target,
            function () {
                w.setPosition(null, 50)
            },
            this
        );

		w.reset();
		w.setValues(this.menu.record);
    },

    removeIP: function () {
		MODx.msg.confirm({
            title: _('statusoverrideips.ip.remove'),
            text: _('statusoverrideips.ip.remove.confirm'),
            url: this.config.url,
            params: {
                action: 'Sterc\\StatusOverrideIps\\Processors\\Ip\\Remove',
                id: this.menu.record.id
            },
            listeners: {
                'success': {
                    fn: this.refresh,
                    scope: this
                }
			}
		});
	}
});

Ext.reg('statusoverrideips-grid-ips', StatusOverrideIps.grid.IPs);

StatusOverrideIps.window.IP = function (config) {
    config = config || {};

	Ext.applyIf(config, {
        title: _('statusoverrideips.ip.new'),
        url: StatusOverrideIps.config.connector_url,
        modal: true,
        width: 600,
        baseParams: {
			action: 'Sterc\\StatusOverrideIps\\Processors\\Ip\\Update'
        },
        fields: [{
            xtype: 'hidden',
            name: 'id'
        }, {
            xtype: 'textfield',
            fieldLabel: _('statusoverrideips.ip.name'),
            name: 'name',
            anchor: '100%',
            allowBlank: true
        }, {
            xtype: 'textfield',
            fieldLabel: _('statusoverrideips.ip'),
            name: 'ip',
            anchor: '100%',
            allowBlank: false
        }]
    });

    StatusOverrideIps.window.IP.superclass.constructor.call(this, config);
};

Ext.extend(StatusOverrideIps.window.IP, MODx.Window);
Ext.reg('statusoverrideips-window-ip', StatusOverrideIps.window.IP);
