var main = function () {
    "use strict";

    $(".revealPassword").on("mousedown", function () {
        $("#password").attr("type", "text");
    });

    $(".revealPassword").on("mouseup", function () {
        $("#password").attr("type", "password");
    });

    $("#password").on("hover", function () {
        $("#password").attr("type","text");
    });
};

$(document).ready(main);
