
<?php


// print_r($_POST);
if (isset($_POST['toursys-api-key'])) {
    update_option("toursys-api-key", sanitize_text_field($_POST['toursys-api-key']));
}
if (isset($_POST['toursys-account-name'])) {
    update_option("toursys-account-name", sanitize_text_field($_POST['toursys-account-name']));
}
if (isset($_POST['toursys-account-type'])) {
    update_option("toursys-account-type", sanitize_text_field($_POST['toursys-account-type']));
}
if (isset($_POST['toursys-api-token'])) {
    update_option("toursys-api-token", sanitize_text_field($_POST['toursys-api-token']));
}
if (isset($_POST['toursys-primary-color'])) {
    update_option("toursys-primary-color", sanitize_text_field($_POST['toursys-primary-color']));
}
if (isset($_POST['toursys-secondary-color'])) {
    update_option("toursys-secondary-color", sanitize_text_field($_POST['toursys-secondary-color']));
}
if (isset($_POST['toursys-text-font'])) {
	if(trim($_POST['toursys-text-font']) == ""){
		$_POST['toursys-text-font'] = "Arial, Helvetica, sans-serif";
	}
    update_option("toursys-text-font", sanitize_text_field($_POST['toursys-text-font']));
}
if (isset($_POST['toursys-text-color'])) {
    update_option("toursys-text-color", sanitize_text_field($_POST['toursys-text-color']));
}
if (isset($_POST['toursys-button-text-color'])) {
    update_option("toursys-button-text-color", sanitize_text_field($_POST['toursys-button-text-color']));
}
if (isset($_POST['toursys-max-adults']) && is_numeric($_POST['toursys-max-adults'])) {
    update_option("toursys-max-adults", sanitize_text_field($_POST['toursys-max-adults']));
}
if (isset($_POST['toursys-max-children']) && is_numeric($_POST['toursys-max-children'])) {
    update_option("toursys-max-children", sanitize_text_field($_POST['toursys-max-children']));
}


$toursysApiKey = get_option('toursys-api-key');
$toursysApiToken = get_option('toursys-api-token');
$toursysAccountName = get_option('toursys-account-name');
$toursysAccountType = get_option('toursys-account-type');

?>
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
					TourSys Connect Setting

				</div>

				<div class="panel-body">
					<form action="" method="post" id="toursys-form">
						<button type="submit" id="toursys-btn-submit" style="display: none;">Submit</button>
	      <?php wp_nonce_field(self::CREDENTIAL_ACTION, self::CREDENTIAL_NAME) ?>

                                <div class="row">
							<div class="col-3">
								<label>API Key</label>
							</div>
							<div class="col-5">
								<input id="api_key" name="toursys-api-key" <?php echo (!empty($toursysApiToken) ? "disabled" : "");?> type="text" value="<?php echo esc_attr($toursysApiKey);?>" placeholder="Add API Key and connect to TourSys">
								<div class="invalid-feedback" id="invalid-key" style="padding-top:5px; color:#fc612d; display: none;">
						          Invalid Key
						        </div>
							</div>
							<div class="col-4">
								<input id="button-api-verify" class="button button-primary toursys-bg-color" value="<?php echo (!empty($toursysApiToken) ? "Connected" : "Connect");?> to TourSys" style="text-align: center;" />
							
								<input type="hidden" name="toursys-account-name" id="toursys-account-name" readonly="readonly" value="<?php echo esc_attr($toursysAccountName);?>">
								<input type="hidden" name="toursys-account-type" id="toursys-account-type" readonly="readonly" value="<?php echo esc_attr($toursysAccountType);?>">
								<input type="hidden" name="toursys-api-token" id="toursys-api-token" style="overflow: hidden" readonly="readonly" value="<?php echo esc_attr($toursysApiToken);?>" />
							
							</div>
						</div>

					<?php if(!empty($toursysApiToken)){ ?>
						<div class="row">
							<div class="col-3">
								<label for="">Account Name</label>
							</div>
							<div class="col-9">
								<span class="get-value" id="account-name"><?php echo esc_attr($toursysAccountName); ?></span>
							</div>
						</div>

						<div class="row">
							<div class="col-3">
								<label for="">Account Type</label>
							</div>
							<div class="col-9">
								<span class="get-value" id="account-type"><?php echo esc_attr($toursysAccountType); ?></span>
							</div>
						</div>

						<div class="row">
							<div class="col-3">
								<label for="">API Token</label>
							</div>
							<div class="col-9" style="word-wrap:break-word;">
								<span class="get-value" id="api-token"><?php echo esc_attr($toursysApiToken); ?></span>
							</div>
						</div>
					<?php } ?>

						<div class="row">
							<div class="col-3">
								<label for="">Primary Color</label>
							</div>
							<div class="col-9">
								<input class="color-input" type="text"
									id="toursys-primary-color" name="toursys-primary-color"
									data-huebee
									value="<?php print esc_attr(get_option('toursys-primary-color')); ?>"
									autocomplete="chrome-off" autocomplete="off" />
							</div>
						</div>

						<div class="row">
							<div class="col-3">
								<label for="">Secondary Color</label>
							</div>
							<div class="col-9">
								<input class="color-input" type="text"
									id="toursys-secondary-color" name="toursys-secondary-color"
									data-huebee
									value="<?php print esc_attr(get_option('toursys-secondary-color')); ?>"
									autocomplete="chrome-off" autocomplete="off" />
							</div>
						</div>

						<div class="row">
							<div class="col-3">
								<label for="">Button Text Color</label>
							</div>
							<div class="col-9">
								<input class="color-input" type="text" id="toursys-button-text-color"
									name="toursys-button-text-color" data-huebee
									value="<?php print esc_attr(get_option('toursys-button-text-color')); ?>"
									autocomplete="chrome-off" autocomplete="off" />
							</div>
						</div>

						<div class="row">
							<div class="col-3">
								<label for="">Text Font</label>
							</div>
							<div class="col-9">
								<input type="text" id="toursys-text-font"
									name="toursys-text-font"
									value="<?php print esc_attr(get_option('toursys-text-font')); ?>"
									autocomplete="chrome-off" placeholder="e.g. Arial, Helvetica, sans-serif" autocomplete="off" />
							</div>
						</div>

						<div class="row">
							<div class="col-3">
								<label for="">Label Text Color</label>
							</div>
							<div class="col-9">
								<input class="color-input" type="text" id="toursys-text-color"
									name="toursys-text-color" data-huebee
									value="<?php print esc_attr(get_option('toursys-text-color')); ?>"
									autocomplete="chrome-off" autocomplete="off" />
							</div>
						</div>


						<div class="row">
							<div class="col-3">
								<label for="">Maximum Adult</label>
							</div>
							<div class="col-9">
								<select id="toursys-max-adulst" name="toursys-max-adults">
							<?php

    $maxAdults = intval(get_option('toursys-max-adults'));

    for ($i = 1; $i < 100; $i ++) {

        if ($maxAdults == $i) {
            print "<option value='" . $i . "' selected>" . $i . "</option>\n";
        } else {
            print "<option value='" . $i . "'>" . $i . "</option>\n";
        }
    }

    ?>

						</select>
							</div>
						</div>

						<div class="row">
							<div class="col-3">
								<label for="">Maximum Children</label>
							</div>
							<div class="col-9">
								<select id="toursys-max-children" name="toursys-max-children">
							<?php

    $maxChildren = intval(get_option('toursys-max-children'));

    for ($i = 0; $i <= 50; $i ++) {

        if ($maxChildren == $i) {
            print "<option value='" . $i . "' selected>" . $i . "</option>\n";
        } else {
            print "<option value='" . $i . "'>" . $i . "</option>\n";
        }
    }
    ?>

						</select>
							</div>
						</div>

						<div class="row">
							<div class="col-12">



								<p class="submit">
									<input type="submit" name="submit" id="submit"
										class="button button-primary toursys-bg-color" value="Save Changes">
								</p>
							</div>
						</div>


					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
#toursys-form select{
    color: <?php print esc_attr($textColor); ?> !important;
}
#toursys-form input{
    color: <?php print esc_attr($textColor); ?> !important;
}
#toursys-form label{
    color: <?php print esc_attr($textColor); ?> !important;
}
#toursys-form button:hover{
    background-color: <?php print esc_attr($backgroundColor); ?> !important;
}
</style>
<script>
(function($) {
	$(document).ready(function(){

    	$(document).on('click', '#button-api-verify', function(){

    		let apiKey = $("#api_key").val();

    		if(apiKey != ""){

    			let apiUrl = "<?php echo (strpos(get_option("home"), "gotophuket.net") !== false ? "https://api-v3.dev.toursys.asia/" : TOURSYS_API_URL);?>";

	    		$.ajax({
					url: apiUrl + "auth/getToken",
					type: 'get',
					dataType: 'json',
					data: {
						key: apiKey,
						system: "TOURSYS"
					},
					success: function(data){


						if(data.status == "AUTHORIZED"){
							$('#invalid-key').hide();
							$('#toursys-account-type').val(data.appName);
							$('#toursys-account-name').val(data.account);
							$('#toursys-api-token').val(data.token);

							$('#toursys-btn-submit').trigger('click');
						}
						else{
							$('#invalid-key').show();
						}
					},
					error: function(error){
						console.log(error);
						$('#invalid-key').show();
						// alert(JSON.stringify(error));
					}
	    		});	
    		}
    		
    	});
    });
})(jQuery);

</script>