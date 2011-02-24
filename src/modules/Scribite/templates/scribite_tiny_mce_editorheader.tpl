{* $Id$ *}
<!-- start scribite! with TinyMCE for {$modname} -->
<script type="text/javascript" src="{$editors_path}/{$editor_dir}/tiny_mce.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
    tinyMCE.init({
{{if $modareas eq "all"}}
        mode : "textareas",
        editor_deselector : "editoroff",
{{elseif $modareas eq "PagEd"}}
        mode : "textareas",
        editor_deselector : "newingress|newrelatedlinks",
{{else}}
        mode : "exact",
        elements : "{{$modareas}}",
{{/if}}

        theme : "{{$tinymce_theme}}",
        language : "{{$tinymce_language}}",
        plugins : "{{$tinymce_listplugins}}",
        content_css : "{{$zBaseUrl}}/{{$tinymce_style}}",
        cleanup : true,

{{if $tinymce_theme eq "advanced"}}
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",

        theme_advanced_buttons1_add_before : "template,xhtmlxtras,devkit,separator",
        theme_advanced_buttons1_add : "fontsizeselect,forecolor,backcolor,directionality",
        // uncomment next line if you want selection of fonts
        //theme_advanced_buttons1_add : "fontselect",
        theme_advanced_buttons2_add : "separator,visualchars,insertdate,inserttime,preview,zoom,bbcode",
        theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
        theme_advanced_buttons3_add_before : "tablecontrols,separator",
        theme_advanced_buttons3_add : "pgInsertPhotoshareImage,pgInsertPublicationLink,emotions,iespell,layer,flash,media,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",

        plugin_insertdate_dateFormat : "{{$tinymce_dateformat}}",
        plugin_insertdate_timeFormat : "{{$tinymce_timeformat}}",

        paste_auto_cleanup_on_paste : true,
        paste_convert_middot_lists : true,
        paste_strip_class_attributes : "all",
        paste_remove_spans : false,
        paste_remove_styles_if_webkit : true,
{{/if}}

        valid_elements : "*[*]",
        invalid_elements : "{{$disallowedhtml}}",

        height : "{{$tinymce_height}}",
        width : "{{$tinymce_width}}",
        file_browser_callback: "filebrowser",



    });


    function filebrowser(field_name, url, type, win) {

        window.SetUrl = function(fileUrl){
            win.document.forms[0].elements[field_name].value = fileUrl;
        }
        var type = type.toLowerCase();
        var filebrowser = "../../../../../../index.php?module=EasyUpload&func=browseImages&editor=tinymc&" + type;
        tinyMCE.activeEditor.windowManager.open({
            file : filebrowser,
            width : 600,
            height : 400,
            resizable : "yes",
            close_previous : "no"
        });    
        return false;

    }

/* ]]> */



</script>
<!-- end scribite! with TinyMCE -->


