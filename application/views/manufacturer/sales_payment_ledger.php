<!-- manufacturer Payment Ledger Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('manufacturer_actual_ledger') ?></h1>
            <small><?php echo display('manufacturer_actual_ledger') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('manufacturer') ?></a></li>
                <li class="active"><?php echo display('manufacturer_actual_ledger') ?></li>
            </ol>
        </div>
    </section>

    <!-- manufacturer information -->
    <section class="content">

        <div class="row">
            <div class="col-sm-12">
                <div class="column">

                    <a href="<?php echo base_url('Cmanufacturer') ?>" class="btn btn-info m-b-5 m-r-2"><i
                            class="ti-plus"> </i> <?php echo display('add_manufacturer') ?> </a>

                    <a href="<?php echo base_url('Cmanufacturer/manage_manufacturer') ?>"
                        class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i>
                        <?php echo display('manage_manufacturer') ?> </a>

                    <a href="<?php echo base_url('Cmanufacturer/manufacturer_ledger_report') ?>"
                        class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>
                        <?php echo display('manufacturer_ledger') ?> </a>

                    <a href="<?php echo base_url('Cmanufacturer/manufacturer_sales_details_all') ?>"
                        class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>
                        <?php echo display('manufacturer_sales_details') ?> </a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('manufacturer_information') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div style="float:left">
                            <?php foreach ($company_info as $company) {?>
                            <h3><?php echo $company['company_name'] ?></h3>
                            <?php }?>
                            <h4><?php echo display('manufacturer_ledger') ?></h4>
                            <h4><?php echo display('manufacturer') ?> : {info}{manufacturer_name}</h4>
                            <span>{address}{/info}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- manufacturer Actual Ledger -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('manufacturer_actual_ledger') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('date') ?></th>
                                        <th><?php echo display('description') ?></th>
                                        <th style="text-align:right !Important;margin-right:20px">
                                            <?php echo display('credit') ?></th>
                                        <th style="text-align:right !Important;margin-right:20px">
                                            <?php echo display('total_ammount') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
if ($ledger) {
    ?>
                                    {ledger}
                                    <tr>
                                        <td>{date}</td>
                                        <td>{description}</td>
                                        <td style="text-align:right !Important;margin-right:20px">
                                            <?php echo (($position == 0) ? "$currency {amount}" : "{amount} $currency") ?>
                                        </td>
                                        <td style="text-align:right !Important;margin-right:20px">
                                            <?php echo (($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency") ?>
                                        </td>
                                    </tr>
                                    {/ledger}
                                    <?php
}
?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right"><?php echo $links ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- manufacturer Payment Ledger End  -->