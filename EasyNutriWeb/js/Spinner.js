/*
 <div class="spinner">
 <div class="rect1"></div>
 <div class="rect2"></div>
 <div class="rect3"></div>
 <div class="rect4"></div>
 <div class="rect5"></div>
 </div>
 */

/**
 * Html do spinner js encoded
 * @type {string}
 */
var spinner = "\x3Cdiv class=\"spinner\"\x3E\n \x3Cdiv class=\"rect1\"\x3E\x3C\x2Fdiv\x3E\n \x3Cdiv class=\"rect2\"\x3E\x3C\x2Fdiv\x3E\n \x3Cdiv class=\"rect3\"\x3E\x3C\x2Fdiv\x3E\n \x3Cdiv class=\"rect4\"\x3E\x3C\x2Fdiv\x3E\n \x3Cdiv class=\"rect5\"\x3E\x3C\x2Fdiv\x3E\n\x3C\x2Fdiv\x3E";

var mostrarSpinner = function(divId){
    $('#'.divId).html(spinner);
}