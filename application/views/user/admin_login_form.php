<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Admin login area start-->
<div class="container-center">
    <!-- Alert Message -->
    <?php
$CI = &get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
$company_info = $CI->Web_settings->retrieve_company();

$message = $this->session->userdata('message');
if (isset($message)) {
    ?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $message ?>
    </div>
    <?php
$this->session->unset_userdata('message');
}
$error_message = $this->session->userdata('error_message');
if (isset($error_message)) {
    ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $error_message ?>
    </div>
    <?php
$this->session->unset_userdata('error_message');
}
$CI = &get_instance();
$CI->load->model('Web_settings');
$setting_detail = $CI->Web_settings->retrieve_setting_editdata();
?>
    <div class="">
        <h1 class="text-dark m-t-0"><?php echo strtoupper($company_info[0]['company_name']) ?></h1>
    </div>
    <div class="panel panel-bd" style="width:108%;">
        <div class="panel-heading">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe-7s-unlock"></i>
                </div>
                <div class="header-title">
                    <h3><?php echo display('login') ?></h3>
                    <small><strong><?php echo display('please_enter_your_login_information') ?></strong></small>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <?php echo form_open('Admin_dashboard/do_login', array('id' => 'login')) ?>
            <div class="form-group">
                <label class="control-label" for="username"><?php echo display('email') ?></label>
                <input type="email" placeholder="<?php echo display('email') ?>" title="<?php echo display('email') ?>"
                    required="" name="username" id="username" class="form-control">
                <span class="help-block small"><?php echo display('your_unique_email') ?></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="password"><?php echo display('password') ?></label>
                <input type="password" title="Please enter your password"
                    placeholder="<?php echo display('password') ?>" required="" name="password" id="password"
                    class="form-control">
                <span class="help-block small"><?php echo display('your_strong_password') ?></span>
            </div>

            <?php if ($setting_detail[0]['captcha'] == 0 && $setting_detail[0]['site_key'] != null && $setting_detail[0]['secret_key'] != null) {?>
            <div style="margin-bottom: 10px" class="g-recaptcha"
                data-sitekey="<?php if (isset($setting_detail[0]['site_key'])) {echo $setting_detail[0]['site_key'];}?>">
            </div>
            <?php }?>

            <div class="pull-right">
                <button class="btn btn-success"><?php echo display('login') ?></button>
            </div>
            <?php echo form_close() ?>
        </div>



    </div>
</div>
<!-- Admin login area end -->

<!-- //User select js -->
<script type="text/javascript">
$(document).ready(function() {
    var info = $('table tbody tr');
    info.click(function() {
        var email = $(this).children().first().text();
        var password = $(this).children().first().next().text();
        var user_role = $(this).attr('data-role');

        $("input[type=email]").val(email);
        $("input[type=password]").val(password);
        $('select option[value=' + user_role + ']').attr("selected", "selected");
    });
});
</script>