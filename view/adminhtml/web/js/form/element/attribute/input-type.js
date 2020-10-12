define([
    'uiRegistry',
    'Magento_Ui/js/form/element/select'
], function (registry, Select) {
    'use strict';

    return Select.extend({
        defaults: {
            listens: {
                value: 'onUpdate'
            }
        },

        /**
         * Callback that fires when 'value' property is updated.
         */
        onUpdate: function () {
            registry.get(Object.values(this.fields), (...fields) => {
                fields.forEach(field => field.hide());

                let index = Object.keys(this.fields).indexOf(this.value());
                if (index > -1) {
                    fields[index].show();
                }
            });
        }
    });
});
