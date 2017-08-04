$.ajaxPrefilter(function(options, original_Options, jqXHR) {
    options.async = true;
});

function trimStr(str) { //trim User-defined function
    return str.replace(/^\s+|\s+$/g, '');
}


$(document).on({
    ajaxStart: function() { $('.modal-loading').show(); },
    ajaxStop: function() { $('.modal-loading').hide(); }
});


var updateLinkActive = function(url) {

    $('ul.nav a').removeClass('active').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();
}

$(function() {
    $('a').click(function() {
        updateLinkActive(this.href);
        if (this.hash == '#/booking') {
            show_booking();
        } else if (this.hash == '#/dashboard') {
            show_dashboard();
        } else if (this.hash == '#/manage-booking') {
            show_mgr_booking();
        } else if (this.hash == '#') {
            show_dashboard();
        }
    });

});