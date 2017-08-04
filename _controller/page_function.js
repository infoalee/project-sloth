$.ajaxPrefilter(function(options, original_Options, jqXHR) {
    options.async = true;
});

function trimStr(str) { //trim User-defined function
    return str.replace(/^\s+|\s+$/g, '');
}

function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
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