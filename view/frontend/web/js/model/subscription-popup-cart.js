/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'Magento_Ui/js/modal/modal'
], function ($, modal) {
    'use strict';

    return {
        modalWindow: null,

        /**
         * Create popUp window for provided element
         *
         * @param {HTMLElement} element
         */
        createPopUp: function (element, subItemId) {
            var options = {
                'type': 'popup',
                'responsive': true,
                'innerScroll': true,
                'trigger': '.subscriptionPopup' + subItemId,
                'modalClass': 'subscription-popup-cart',
                'size': 'sm',
                buttons: []
            };

            this.modalWindow = element;
            modal(options, $(this.modalWindow));
            jQuery(this.modalWindow).on('modalclosed', function() {
                if(jQuery('.subscriptionPopupSubscribe' + subItemId).length) {
                    jQuery('.subscriptionPopupSubscribe' + subItemId).attr('checked', false);
                }
                if(jQuery('.subscriptionPopupUnsubscribe' + subItemId).length) {
                    jQuery('.subscriptionPopupUnsubscribe' + subItemId).attr('checked', true);
                }
            });
        },

        /** Show subscription popup window */
        showModal: function () {
            $(this.modalWindow).modal('openModal');
        },

        /** Close subscription popup window*/
        closeModal: function () {
            $(this.modalWindow).modal('closeModal');
        }

    };

});
