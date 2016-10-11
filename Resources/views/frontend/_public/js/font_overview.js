/**
 * Created by Sebastian on 2016-10-11.
 */
(function ($) {
    'use strict';

    $.fn.fontOverview = function (options) {
        var settings = $.extend({
                text: 'Uhren-Schmuck-Online.de'
            }, options),
            $input = this.find('#wieland-gravurvorschau--input'),
            $previews = this.find('.preview').find('div'),
            updatePreviews = function () {
                $previews.html($input.val());
            };

        $input.val(settings.text);
        $input.on('keyup', updatePreviews);
        updatePreviews();
    };
})(jQuery);