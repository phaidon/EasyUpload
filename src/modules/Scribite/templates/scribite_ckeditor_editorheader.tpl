<!-- start scribite! with CKEditor for {$modname} -->
<script type="text/javascript" src="{$editors_path}/{$editor_dir}/ckeditor.js"></script>
{if file_exists("`$editors_path`/`$editor_dir`/ckfinder/")}
{assign var="useckfinder" value=true}
<script type="text/javascript" src="{$editors_path}/{$editor_dir}/ckfinder/ckfinder.js"></script>
{else}
{assign var="useckfinder" value=false}
{/if}
<script type="text/javascript">
/* <![CDATA[ */
{{if $modareas eq "all"}}

    ckload = function () {
        var allTextAreas = document.getElementsByTagName("textarea");
        for (var i=0; i < allTextAreas.length; i++) {
            var {{$modname}}Editor = CKEDITOR.replace(allTextAreas[i].id, {
                width: {{$ckeditor_width}},
                height: {{$ckeditor_height}},
                toolbar: "{{$ckeditor_barmode}}",
                language: "{{$ckeditor_language}}",
                entities_greek: false,
                entities_latin: false{{if $useckfinder eq true}},{{/if}}
                {{if $useckfinder eq true}}
                filebrowserBrowseUrl : 'index.php?module=EasyUpload&func=browseImages&editor=ckeditor',
                filebrowserImageBrowseUrl : 'index.php?module=EasyUpload&func=browseImages&editor=ckeditor',
                {{/if}}
            });
        }
    }
    
{{else}}

    ckload = function () {
        {{foreach from=$modareas item=area}}
            var {{$modname}}Editor = CKEDITOR.replace('{{$area}}', {
                width: {{$ckeditor_width}},
                height: {{$ckeditor_height}},
                toolbar: "{{$ckeditor_barmode}}",
                language: "{{$ckeditor_language}}",
                entities_greek: false,
                entities_latin: false{{if true eq true}},{{/if}}
                {{if true eq true}}
                filebrowserBrowseUrl : 'index.php?module=EasyUpload&func=browseImages&editor=ckeditor',
                filebrowserImageBrowseUrl : 'index.php?module=EasyUpload&func=browseImages&editor=ckeditor',
                {{/if}}
            });
        {{/foreach}}
    }
    
{{/if}}

Event.observe(window, 'load', ckload);

/* ]]> */
</script>
<!-- end scribite! with CKEditor -->

