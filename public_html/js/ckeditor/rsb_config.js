CKEDITOR.editorConfig = function( config ) {

    config.extraPlugins = 'youtube';
    //config.youtube_width = '640';
    //config.youtube_height = '480';
    config.youtube_responsive = true;
    config.youtube_autoplay = false;
    config.youtube_controls = true;

    config.width = '100%';
    config.height = 400;

    config.toolbarGroups = [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        { name: 'forms', groups: [ 'forms' ] },
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'tools', groups: [ 'tools' ] },
        '/',
        { name: 'styles', groups: [ 'styles' ] },
        { name: 'colors', groups: [ 'colors' ] },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'insert', groups: [ 'insert' ] },
        { name: 'links', groups: [ 'links' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        '/',
        { name: 'others', groups: [ 'others' ] },
        { name: 'about', groups: [ 'about' ] }
    ];

    // The plugins to remove
    config.removePlugins = 'elementspath,resize,autogrow';

    config.removeButtons = 'NewPage,Templates,Form,Checkbox,Radio,TextField,Textarea,Select,Button,HiddenField,CreateDiv,BidiLtr,BidiRtl,Language,ImageButton,Flash,Smiley,Iframe,Styles,Font,ShowBlocks,About,Anchor,Table,FontSize';

};