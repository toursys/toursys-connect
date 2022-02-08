<style>
    label {
        cursor: default;
    }
</style>
<br><br>
<div id="toursys" class="container" style="width:850px;">
	<div class="row">
		<div class="col-md-12" style="width:100%; margin:0px; padding:0px;">

			<div class="panel panel-success">
				<div class="panel-heading">
					<img class="panel-logo"
					     src="<?php print plugin_dir_url(dirname( __DIR__ )) . 'admin/images/toursys-logo.png'; ?>" />
					TourSys Connect FAQ
				</div>
				<div class="panel-body">
                    <?php wp_nonce_field(self::CREDENTIAL_ACTION, self::CREDENTIAL_NAME) ?>
                    <div class="row">
                        <div class="col-5">
                            <label>1. Use text mode in Wordpress to edit TourSys shortcode </label>
                        </div>
                        <div class="col-7">
                            When adding / updating the short-code on a page, always view and edit in TEXT mode.
                            <br>
                            <br>
                            The Visual mode may inadvertently add html tags inside the short-code. This will break the functionality of the code.
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                       <div class="col-5">
                            <label>2. Beware of "Smart quotes" around the shortcode parameters </label>
                        </div>
                        <div class="col-7">
                            Beware of "Smart quotes" around the parameter values in the short-code.
                            <br>
                            <br>
                            They will certainly break the functionality of the codes. Ensure "straight quotes" are always used.
                            <br>
                            <br>
                            Good: default-adults="3"
                            <br>
                            Bad: default-adults=“3”
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-5">
                            <label>3. Ensure all required parameters in the short-code </label>
                        </div>
                        <div class="col-7">
                            The plugin short-codes only have a few required parameters, the rest of the parameters are optional and can be left out.
                            <br>
                            <br>
                            Unused parameters will default to the global values or simply not be used.
                        </div>
                    </div>

                </div>
			</div>
		</div>
	</div>
</div>
<style>
    #toursys-form select{
        color: <?php print $textColor; ?> !important;
    }
    #toursys-form input{
        color: <?php print $textColor; ?> !important;
    }
    #toursys-form label{
        color: <?php print $textColor; ?> !important;
    }
    #toursys-form button:hover{
        background-color: <?php print $backgroundColor; ?> !important;
    }
</style>
