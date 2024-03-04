/**
 * Μέθοδοι που είναι χρήσιμες σε κάθε σελίδα του CMS.
 */
class Cms {

    constructor(props) {
        this.serial_number_prefix = "__cms__";
        this.serial_number = 0;
    }


    __help() {
        return "Περιέχει μεθόδους χρήσιμες σε κάθε σελίδα του CMS."
    }

    /**
     * Επιστρέφει την τιμή μιας παραμέτρου URL.
     * @param key {string} : Παράμετρος URL.
     * @returns {string|*} : Η τιμή της. Κενό αλφαριθμητικό αν δεν υπάρχει.
     */
    getUrlParam(key) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === key) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    }

    /**
     * Adds/removes spinner from $el. If spinner missing: Disables button, hides any icons, shows spinner. Else reverses the state.
     * @param $el : jQuery element (tested with buttons).
     */
    toggleSpinner($el) {
        let spinnerExists = $el.find('.sk-spinner').length;
        if (spinnerExists) {
            $el.prop('disabled', false);
            $el.find('i').toggle();
            $el.find('.sk-spinner').remove();
        } else {
            $el.prop('disabled', true);
            $el.find('i').toggle();
            $el.append('    <div class="sk-spinner sk-spinner-fading-circle">\n' +
                '        <div class="sk-circle1 sk-circle"></div>\n' +
                '        <div class="sk-circle2 sk-circle"></div>\n' +
                '        <div class="sk-circle3 sk-circle"></div>\n' +
                '        <div class="sk-circle4 sk-circle"></div>\n' +
                '        <div class="sk-circle5 sk-circle"></div>\n' +
                '        <div class="sk-circle6 sk-circle"></div>\n' +
                '        <div class="sk-circle7 sk-circle"></div>\n' +
                '        <div class="sk-circle8 sk-circle"></div>\n' +
                '        <div class="sk-circle9 sk-circle"></div>\n' +
                '        <div class="sk-circle10 sk-circle"></div>\n' +
                '        <div class="sk-circle11 sk-circle"></div>\n' +
                '        <div class="sk-circle12 sk-circle"></div>\n' +
                '    </div>');
        }
    }

    /**
     * Unique alphanumeric generator.
     * @param str
     * @returns {string}
     */
    getUniqueId(str="") {
        return this.serial_number_prefix + str + "__" + String(this.serial_number++)
    }

    /**
     * Ajax post `data_obj` to `url` after asking for user confirmation. An informational popup is shown to user after
     * the post returns, showing the response message.
     * @param url: Can also be a relative. E.g 'template_content.php'.
     * @param data_obj: Key-value json.
     * @param popup_type: warning|fail
     * @param popup_title: String
     * @param popup_text: String
     * @param callback_done: Function to execute when post is done. First parameter contains the ajax response.
     * @param callback_fail
     * @param callback_always
     */
    postWithPopup(url, data_obj, popup_type='warning', popup_title='Title', popup_text='Text',
                  callback_done=function(r){console.log("postWithPopup: done", r);},
                  callback_fail=function(r){console.log("postWithPopup: fail", r);},
                  callback_always=function(r){console.log("postWithPopup: always", r);}
                  ) {
        if (typeof url === 'undefined') {
            console.log("postWithPopup: Error, missing parameter 'url'!");
            return;
        }

        swal({
            html: true,
            title: popup_title,
            text: popup_text,
            type: popup_type,
            showCancelButton: true,
            closeOnConfirm: false,
            closeOnCancel: true,
            animation: "slide-from-top",
        }, function(confirm){
            let $button_confirm = $('.sweet-alert.visible .confirm');
            $button_confirm.prop('disabled', false);

            if (!confirm) {
                return;
            }

            $button_confirm.prop('disabled', true);

            console.log("postWithPopup: url: ", url);
            $.post(url, data_obj)
                .done(function(response){
                    console.log(response, typeof(response));
                    if (typeof(response)==="object" && response.hasOwnProperty('status') && response.hasOwnProperty('msg')) {
                        swal({
                            title: (response.status)?"Επιτυχία!":"Αποτυχία!",
                            text: response.msg,
                            type: (response.status)?"success":"error",
                            customClass: (response.msg.length > 200)?'swal-custom-text-wrapper':'',
                            closeOnConfirm: true
                        });
                    }

                    callback_done(response);
                })
                .fail(function(msg) {
                    swal({
                        title: "Αποτυχία!",
                        text: "Προέκυψε σφάλμα επικοινωνίας με τον διακομιστή. (Σφάλμα: " + msg.status + ", " + msg.statusText + ")",
                        type: "error",
                        closeOnConfirm: true
                    });
                    callback_fail(msg);
                })
                .always(function(r) {
                    $button_confirm.prop('disabled', false);
                    callback_always(r);
            });
        });

    }
}

var cms = new Cms();