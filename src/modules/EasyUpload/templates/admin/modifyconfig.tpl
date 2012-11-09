{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text="Modify configuration"}</h3>
</div>


{form cssClass="z-form"}
    {formvalidationsummary}

    <fieldset>
        <legend>{gt text='General settings'}</legend>

        <div class="z-formrow">
            {formlabel for="uploads_path" __text='URL to your uploads folder'}
            {formtextinput size="40" maxLength="100" id="uploads_path" text=$modvars.EasyUpload.uploads_path}
            <em class="z-formnote z-sub">
                {gt text='e.g. uploads'}
            </em>
        </div>

        <div class="z-buttons z-formbuttons">
            {formimagebutton id="create" commandName="create" __text="Save" imageUrl="images/icons/small/button_ok.gif"}

        </div>

    </fieldset>

{/form}

{adminfooter}