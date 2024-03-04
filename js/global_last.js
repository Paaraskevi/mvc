/**
/**
 * Loaded in every page after all other js files.
 */

// Disable form submission on enter press.
$('form').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});

// Define the .allow-exit class for buttons and anchors that disables the onbeforeunload event (thus allowing loading other pages).
$(document).on("click", ".allow-exit", function(){
    window.onbeforeunload=null;
});
