$(document).ready(function () {
    $("input").blur(function () {
        if ($(this).val() == "") {
            $(this).css({"border": "3px solid rgba(255,99,71,0.6)", "padding": "4px"});
        } else {
            $(this).css({"border-color": "lightgray"});
        }
    });
});
