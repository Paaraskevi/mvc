/**
 *
 */
class FormLossProtection {

    constructor(form_element) {
        // FORM_LOSS_PROTECTION
        if (global_settings.FORM_LOSS_PROTECTION==="1") {
            this.$form = $(form_element);
            this.init();
        }
    }

    init() {
        var that = this;
        // Runs before loading another page.
        // window.onbeforeunload = this.onbeforeunload();
        window.onbeforeunload = function(e) {

            // Remove TinyMCE bogus tags from all instances.
            if (typeof tinyMCE !== "undefined") {
                tinyMCE.triggerSave();
            }

            // Check if data have changed since page ready.
            if (that.loaded_form_data === that.$form.serialize()) {
                return null;
            }

            // Message will be substituted with browser default in more recent browser versions.
            return "Are you sure you want to navigate away?";
        };

        // Save form data after page load.
        this.loaded_form_data = this.$form.serialize();
    }
}


