/**
 * Loads a TinyMCE editor instance on a specified element.
 *
 * @param id : The id selector of the element (example: '#my-editor').
 * @param height : The height of the editor.
 */
function load_tinymce(id, height, readonly) {
    if (typeof readonly === "undefined" || readonly === null) {
        readonly = 0;
    }

    tinymce.init({
        selector: id,
        height: height,
        readonly : readonly,
        theme: 'modern',
        entity_encoding: 'raw',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help',
            'highcharts highchartssvg noneditable responsivefilemanager'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: '| responsivefilemanager | print preview media | forecolor backcolor emoticons | codesample help',

        images_upload_base_path: global_settings.site_url + '/uploads/media',
        // urlconverter_callback : 'myCustomURLConverter',
        // document_base_url: "http://skaiftp.ibserver.gr/images/0/0/",
        // document_base_url: global_settings.site_admin,
        //relative_urls:true,
        // remove_script_host: false,

        external_filemanager_path: "responsive_filemanager/filemanager/",
        filemanager_title: "File Manager",
        external_plugins: { "responsivefilemanager" : "../../../responsive_filemanager/tinymce/plugins/responsivefilemanager/plugin.min.js"},
        // file_browser_callback: function(fieldName, url, objectType, w) {
        //     filemanager(fieldName, url, objectType, w);
        // },
        file_picker_callback: function(cb, value, meta) {
            var width = window.innerWidth - 30;
            var height = window.innerHeight - 60;
            if (width > 1800) width = 1800;
            if (height > 1200) height = 1200;
            if (width > 600) {
                var width_reduce = (width - 20) % 138;
                width = width - width_reduce + 10;
            }
            var urltype = 2;
            if (meta.filetype == 'image') {
                urltype = 1;
            }
            if (meta.filetype == 'media') {
                urltype = 3;
            }
            var title = "RESPONSIVE FileManager";
            if (typeof this.settings.filemanager_title !== "undefined" && this.settings.filemanager_title) {
                title = this.settings.filemanager_title;
            }
            var akey = "key";
            if (typeof this.settings.filemanager_access_key !== "undefined" && this.settings.filemanager_access_key) {
                akey = this.settings.filemanager_access_key;
            }
            var sort_by = "";
            if (typeof this.settings.filemanager_sort_by !== "undefined" && this.settings.filemanager_sort_by) {
                sort_by = "&sort_by=" + this.settings.filemanager_sort_by;
            }
            var descending = "false";
            if (typeof this.settings.filemanager_descending !== "undefined" && this.settings.filemanager_descending) {
                descending = this.settings.filemanager_descending;
            }
            var fldr = "";
            if (typeof this.settings.filemanager_subfolder !== "undefined" && this.settings.filemanager_subfolder) {
                fldr = "&fldr=" + this.settings.filemanager_subfolder;
            }
            var crossdomain = "";
            if (typeof this.settings.filemanager_crossdomain !== "undefined" && this.settings.filemanager_crossdomain) {
                crossdomain = "&crossdomain=1";
                if (window.addEventListener) {
                    window.addEventListener('message', filemanager_onMessage, false);
                } else {
                    window.attachEvent('onmessage', filemanager_onMessage);
                }
            }
            tinymce.activeEditor.windowManager.open({
                title: title,
                file: this.settings.external_filemanager_path + 'dialog.php?type=' + urltype + '&descending=' + descending + sort_by + fldr + crossdomain + '&lang=' + this.settings.language + '&akey=' + akey,
                width: width,
                height: height,
                resizable: true,
                maximizable: true,
                inline: 1
            }, {
                setUrl: function(url) {
                    cb(url);
                }
            });
        },
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
}

function myCustomURLConverter(url, node, on_save, name) {

    // Responsive Filemanager url returned to the text input of the image dialog.
    if (name === undefined) {
        var hostname = global_settings.site_url.replace('http://','');
        hostname = hostname.replace('https://','');

        // Do some custom URL conversion
        //url = url.replace('/skaitv-development.ibserver.gr/uploads/media', '/skaiftp.ibserver.gr/images/0/0/');
        var url_converted = url;
        var url_converted = url_converted.replace(hostname + '/uploads/media/', 'skaiftp.ibserver.gr/images/0/0/');

        console.log('Converting '+ name, url, url_converted);

        // Return new URL
        return url_converted;
    } else {
        return url;
    }

}


function getURLVar(key) {
    var value = [];

    var query = String(document.location).split('?');

    if (query[1]) {
        var part = query[1].split('&');

        for (i = 0; i < part.length; i++) {
            var data = part[i].split('=');

            if (data[0] && data[1]) {
                value[data[0]] = data[1];
            }
        }

        if (value[key]) {
            return value[key];
        } else {
            return '';
        }
    }
}

$(document).ready(function() {
    //Form Submit for IE Browser
    $('button[type=\'submit\']').on('click', function() {
        $("form[id*='form-']").submit();
    });

    // // tooltips on hover
    // $('[data-toggle=\'tooltip\']').tooltip({container: 'body', html: true});
    //
    // // Makes tooltips work on ajax generated content
    // $(document).ajaxStop(function() {
    //     $('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
    // });
    //
    // // https://github.com/opencart/opencart/issues/2595
    // $.event.special.remove = {
    //     remove: function(o) {
    //         if (o.handler) {
    //             o.handler.apply(this, arguments);
    //         }
    //     }
    // };
    //
    // // tooltip remove
    // $('[data-toggle=\'tooltip\']').on('remove', function() {
    //     $(this).tooltip('destroy');
    // });
    //
    // // Tooltip remove fixed
    // $(document).on('click', '[data-toggle=\'tooltip\']', function(e) {
    //     $('body > .tooltip').remove();
    // });


    /*
    $('#button-menu').on('click', function(e) {
        e.preventDefault();

        $('#column-left').toggleClass('active');
    });

    // Set last page opened on the menu
    $('#menu a[href]').on('click', function() {
        sessionStorage.setItem('menu', $(this).attr('href'));
    });

    if (!sessionStorage.getItem('menu')) {
        $('#menu #dashboard').addClass('active');
    } else {
        // Sets active and open to selected page in the left column menu.
        $('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parent().addClass('active');
    }

    $('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parents('li > a').removeClass('collapsed');

    $('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parents('ul').addClass('in');

    $('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parents('li').addClass('active');
    */

    /*
    // Image Manager
    $(document).on('click', 'a[data-toggle=\'image\']', function(e) {
        var $element = $(this);
        var $popover = $element.data('bs.popover'); // element has bs popover?

        e.preventDefault();

        // destroy all image popovers
        $('a[data-toggle="image"]').popover('destroy');

        // remove flickering (do not re-add popover when clicking for removal)
        if ($popover) {
            return;
        }

        $element.popover({
            html: true,
            placement: 'right',
            trigger: 'manual',
            content: function() {
                return '<button type="button" id="button-image" class="btn btn-primary"><i class="fa fa-pencil"></i></button> <button type="button" id="button-clear" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>';
            }
        });

        $element.popover('show');

        $('#button-image').on('click', function() {
            var $button = $(this);
            var $icon   = $button.find('> i');

            $('#modal-image').remove();

            $.ajax({
                url: 'index.php?route=common/filemanager&user_token=' + getURLVar('user_token') + '&target=' + $element.parent().find('input').attr('id') + '&thumb=' + $element.attr('id'),
                dataType: 'html',
                beforeSend: function() {
                    $button.prop('disabled', true);
                    if ($icon.length) {
                        $icon.attr('class', 'fa fa-circle-o-notch fa-spin');
                    }
                },
                complete: function() {
                    $button.prop('disabled', false);

                    if ($icon.length) {
                        $icon.attr('class', 'fa fa-pencil');
                    }
                },
                success: function(html) {
                    $('body').append('<div id="modal-image" class="modal">' + html + '</div>');

                    $('#modal-image').modal('show');
                }
            });

            $element.popover('destroy');
        });

        $('#button-clear').on('click', function() {
            $element.find('img').attr('src', $element.find('img').attr('data-placeholder'));

            $element.parent().find('input').val('');

            $element.popover('destroy');
        });
    });
    */
});