<!--
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product_invoice.js.php" ></script> -->
<!-- Stock report start -->
<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    document.body.style.marginTop = "0px";
    window.print();
    document.body.innerHTML = originalContents;
}
</script>


<!-- Profit Report Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('profit_report_product_wise') ?></h1>
            <small><?php echo display('total_profit_report') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active"><?php echo display('profit_report_product_wise') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <div class="row p-r-15 m-y-10">
            <div class="col-sm-12 d-flex justify-content-right">
                <div class="column">
                    <?php
if ($this->permission1->method('todays_report', 'read')->access()) {?>
                    <a href="<?php echo base_url('Admin_dashboard/all_report') ?>" class="btn btn-info m-b-5 m-r-2"><i
                            class="ti-align-justify"> </i> <?php echo display('todays_report') ?> </a>
                    <?php }?>

                    <?php
if ($this->permission1->method('purchase_report', 'read')->access()) {?>
                    <a href="<?php echo base_url('Admin_dashboard/todays_purchase_report') ?>"
                        class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>
                        <?php echo display('purchase_report') ?> </a>
                    <?php }?>


                    <?php
if ($this->permission1->method('sales_report', 'read')->access()) {?>
                    <a href="<?php echo base_url('Admin_dashboard/todays_sales_report') ?>"
                        class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i>
                        <?php echo display('sales_report') ?> </a>
                    <?php }?>
                </div>
            </div>
        </div>

        <?php
if ($this->permission1->method('profit_loss', 'read')->access()) {?>
        <!-- Profit report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open('Admin_dashboard/profit_productwise', array('class' => 'form-inline', 'method' => 'post')) ?>
                        <?php date_default_timezone_set("Asia/Dhaka");
    $today = date('Y-m-d');?>
                        <div class="form-group">
                            <input type="text" name="product_name" onkeyup="invoice_productList(1);"
                                onkeypress="invoice_productList(1);" class="form-control productSelection"
                                placeholder='<?php echo display('product_name') ?>' required="" id="product_name_1">
                            <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id"
                                id="SchoolHiddenId" />
                        </div>
                        <div class="form-group">
                            <label for="from_date"><?php echo display('start_date') ?>:</label>
                            <input type="text" name="from_date" class="form-control datepicker" id="from_date"
                                placeholder="<?php echo display('start_date') ?>" value="<?php echo $today ?>">
                        </div>
                        <div class="form-group">
                            <label for="to_date"><?php echo display('end_date') ?>:</label>
                            <input type="text" name="to_date" class="form-control datepicker" id="to_date"
                                placeholder="<?php echo display('end_date') ?>" value="<?php echo $today ?>">
                        </div>
                        <button type="submit" class="btn btn-success"><?php echo display('view_report') ?></button>
                        <?php echo form_close() ?>

                    </div>

                </div>
            </div>
        </div>
        <?php
} else {
    ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('You do not have permission to access. Please contact with administrator.'); ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
}
?>

    </section>
</div>
<!-- Profit Report End -->
<script type="text/javascript">
function invoice_productList(sl) {

    var priceClass = 'price_item' + sl;

    // Auto complete
    var options = {
        minLength: 0,
        source: function(request, response) {
            var product_name = $('#product_name_' + sl).val();
            $.ajax({
                url: "<?php echo base_url('Cinvoice/autocompleteproductsearch') ?>",
                method: 'post',
                dataType: "json",
                data: {
                    term: request.term,
                    product_name: product_name,
                },
                success: function(data) {
                    response(data);

                }
            });
        },
        focus: function(event, ui) {
            $(this).val(ui.item.label);
            return false;
        },
        select: function(event, ui) {
            $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value);
            $(this).val(ui.item.label);
            // var sl = $(this).parent().parent().find(".sl").val();
            var id = ui.item.value;
            var dataString = 'product_id=' + id;

            $(this).unbind("change");
            return false;
        }
    }

    $('body').on('keypress.autocomplete', '.productSelection', function() {
        $(this).autocomplete(options);
    });

}
</script>