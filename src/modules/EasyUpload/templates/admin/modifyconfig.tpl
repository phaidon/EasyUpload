{include file="admin/header.tpl"}
<div class="z-adminpageicon">{icon type="config" size="large"}</div>
<h2>{gt text="Modify configuration"}</h2>

{form cssClass="z-form"}
{formvalidationsummary}

<fieldset>
    <legend>{gt text='General settings'}</legend>

      <div class="z-formrow">
        {formlabel for="uploads_path" __text='URL to your uploads folder'}
        {formtextinput size="40" maxLength="100" id="uploads_path" text=$modvars.EasyUpload.uploads_path}
        <em class="z-formnote">E.g. uploads</em>
      </div>

        <div class="z-formbuttons">
            {formimagebutton id="create" commandName="create" __text="Save" imageUrl="images/icons/small/button_ok.gif"}
        </div>

</fieldset>

{/form}

{include file="admin/footer.tpl"}