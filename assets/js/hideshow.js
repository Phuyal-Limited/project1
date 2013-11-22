$(document).ready(function() {

var showText='Show';
var hideText='Hide';

var is_visible = false;

$('.toggle').prev().append(' <a href="#" class="toggleLink">'+showText+'</a>');

$('.toggle').hide();

$('a.toggleLink').click(function() {

is_visible = !is_visible;

if ($(this).text()==showText) {
$(this).text(hideText);
$(this).parent().next('.toggle').slideDown('slow');
}
else {
$(this).text(showText);
$(this).parent().next('.toggle').slideUp('slow');
}

return false;

});
});