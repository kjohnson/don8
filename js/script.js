(function() {
    tinymce.create('tinymce.plugins.don8', {

        init : function(ed, url) {
            ed.addButton('don8', {
                title : 'Don8',
                cmd : 'don8',
                class: 'mce-don8'
            });

            ed.addCommand('don8', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[don8]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : 'Don8',
                author : 'Kyle Maurer',
                authorurl : 'http://realbigplugins.com',
                infourl : 'http://realbigplugins.com',
                version : "0.1"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add( 'don8', tinymce.plugins.don8 );
})();

function don8_media_uploader(e){
    var send_attachment_bkp = wp.media.editor.send.attachment,
        button = jQuery(e);

    wp.media.editor.send.attachment = function(props, attachment){
        jQuery(e).siblings('.bmu-media').val(attachment.id);
        jQuery(e).siblings('.bmu-preview').attr('src', attachment.url);
        wp.media.editor.send.attachment = send_attachment_bkp;
    }

    wp.media.editor.open(button);
    return false;
}