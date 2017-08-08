$(document).on({
    ajaxStart: function () { $('.modal-loading').show(); },
    ajaxStop: function () { $('.modal-loading').hide(); }
});
