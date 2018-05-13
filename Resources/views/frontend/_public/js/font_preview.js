jQuery(function($) {
    var fontField = $('select[data-gravurfont=true]'),
        textField = $('textarea[data-gravurtext=true]');

    function changeFontPreview() {
        var value = fontField.val(),
            option = fontField.children('option[value=' + value + ']'),
            optionText = option.text().trim();

        textField.css('font-family', wielandFonts[optionText]);
        textField.css('font-size', '1.3em');
    }

    fontField.on('change', changeFontPreview);
});