<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        .gray {
            background-color: lightgray
        }

        .header_bottom {
            width: 100%;
            border-top: 10px solid #0b6aa0;
            background-color: #e5e5e5;
            padding: 15px 5px;
        }

        .address1 {
            width: 100%;
            border-bottom: 5px solid #0b6aa0;
        }

        .address {
            width: 100%;
        }

        .address tbody tr td {
            vertical-align: top;
            text-align: left;
        }

        .address span {
            color: #000;
        }

        .table_data {
            width: 100%;
            border-collapse: collapse;
        }

        .table_data thead {
            border-top: 3px solid #0b6aa0;
            border-bottom: 3px solid #0b6aa0;
        }

        .table_data thead tr th {
            /* padding: 15px 0 10px; */
            height: 30px;
            font-size: 12px;
        }

        .table_data tbody tr td {
            height: 30px;
            border-bottom: 1px solid #666;
        }

        .table_data tfoot {
            border-top: 3px solid #0b6aa0;
            border-bottom: 3px solid #0b6aa0;
            height: 30px;
        }

        .table_data tfoot tr td {
            height: 30px;
        }

        .total_hr1 {
            padding: 10px 0;
        }

        .total_hr {
            border-bottom: 1px solid #666;
            padding: 8px 0;
            font-size: 14px;
        }

        .table_3 {
            width: 100%;
            border-collapse: collapse;
        }

        .table_3 tbody tr td:nth-child(2) {
            text-align: right;
        }

        .address tr td {
            border-right: 2px solid #0b6aa0;
        }

        .address tr td:nth-child(3) {
            border-right: none;
        }

        .rowGroup1 span {
            font-size: 12px;
        }
    </style>

</head>

<body>
    <table width="100%">
        <tr>
            <td valign="top">
                <!--<img style="width: 100px; height: 95px; margin-top: 10px; margin-left: 20px;" src="<?= base_url('Assets/logo-111.jpeg') ?>">-->
            </td>
            <td align="left" style="padding-left: -20px;">
                <h1 style="color: #1f6893; font-size: 34px; margin:0;">MAA LAXMI ENTERPRISES</h1>
                <div style="padding-left: 40px;">
                    <span style="font-size: 16px; margin:10px 0">PLOT 171/8 GURGAON HARYANA, 122001</span>
                <br>
                <span><b>Mobile: </b>073030-61755 <b style="margin-left: 10px;">GSTIN:</b> 06BTMPK4926M2Z4</span><br>
                <span><b>Email Id:</b> maalaxmienterprises1989@gmail.com</span>
                </div>
            </td>
        </tr>
    </table>

    <table class="header_bottom">
        <tr>
            <td><strong><?= $all_data['type'] ?> Number :</strong> <?= $all_data['invoice_no'] ?></td>
            <?php
            if ($all_data['type'] == 'Invoice') {
            ?>
                <td><strong>Tax Invoice</strong></td>
            <?php
            }
            ?>
            <?php if ($all_data['to_date'] == "") { ?>
                <td align="right"><strong>Date :</strong> <?= date('d/m/Y', strtotime($all_data['date'])) ?></td>
            <?php } else { ?>
                <td align="right"><strong>Summary For :</strong> <?= date('d/m/Y', strtotime($all_data['date'])) . ' to ' . date('d/m/Y', strtotime($all_data['to_date'])) ?></td>
            <?php } ?>
        </tr>
    </table>
    <br />
    <table class="address1">
        <tr>
            <td align="left" style="width: 40%;">
                <strong>BILL TO</strong>
            </td>
            <td align="left" style="width: 40%;">
                <strong>SHIP TO</strong>
            </td>
            <td align="left" style="width: 20%;">
                <strong>PO No: </strong>
            </td>
        </tr>
    </table>

    <table class="address">
        <tr>
            <td align="left" style="width: 40%;">
                <b><?= $all_data['bill_to'] ?></b>
                <br>
                <span>
                    <?= $all_data['bill_to_address'] ?>
                </span>
                <?php
                if ($all_data['pan_no'] != "") {
                ?>
                    <br>
                    <span>
                        PAN No. :<?= $all_data['pan_no'] ?>
                    </span>
                <?php
                }
                ?>
                <br>
                <span>
                    GSTIN:<?= $all_data['bill_to_gst'] ?>
                </span>
                <br>
                <span>
                    Place of Supply/State Code :<?= $all_data['state_gst_no'] ?>
                </span>                
                <br>
                <span>
                    Mobile Number: <?= $all_data['bill_to_contact_no'] ?>
                </span>
                <br>
                <span>
                    Email Id: <?= $all_data['bill_to_email'] ?>
                </span>
            </td>
            <td align="left" style="width: 25%;">
                <b><?= $all_data['ship_to'] ?></b>
                <br>
                <span>
                    <?= $all_data['ship_to_address'] ?>
                </span>
                <br>
            </td>
            <td align="left" style="width: 20%;">
                <?= $all_data['po_no'] ?>
                <br>
                <br>
                <hr style="border: 1px solid #0b6aa0;">
                <strong>e-Way Bill No. </strong>
                <?= $all_data['e_way_no'] ?>
                <br><br><br>
            </td>
        </tr>
    </table>
    <table class="table_data">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Description</th>
                <th>HSN-SAC</th>
                <th>QTY.</th>
                <th>RATE</th>
                <th>Total</th>
                <th>TAX</th>
                <th>FINAL AMOUNT</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qty = 0;
            if ($item_data) {
                $i = 0;
                foreach ($item_data as $item_data) {
                     $qty = $qty + $item_data['quantity'];
            ?>
                    <tr>
                        <td><?= ++$i; ?></td>
                        <td><?= $item_data['service_name'] ?></td>
                        <td><?= $item_data['hsn'] ?></td>
                        <td><?= $item_data['quantity'] ?> <?= $item_data['quantity_type'] ?></td>
                        <td><?= $item_data['rate'] ?></td>
                        <td><?= $item_data['total_amount'] ?></td>
                        <td><?= $item_data['tax_amount'] ?><br><span style="color: #333; font-size: 12px;">(<?= $item_data['tax_percentage'] ?>%)</span></td>
                        <td style="text-align: center;"><?= $item_data['final_amount'] ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td><b>SUB TOTAL</b></td>
                <td></td>
                <td><?= $qty ?></td>
                <td></td>
                <td><span style="font-family: DejaVu Sans;">₹</span><b><?= $all_data['taxable_amount'] ?></b></td>
                <td><span style="font-family: DejaVu Sans;">₹</span><b><?= $all_data['tax_total'] ?></b></td>
                <td style="text-align: center;"><span style="font-family: DejaVu Sans;">₹</span><b><?= $all_data['amount_total'] ?></b></td>
            </tr>
        </tfoot>
    </table>

    <div  style="display: inline-block;">
        <div class="rowGroup1 " style="width: 50%; margin-top: 20px;">
            <div>
                <b>Bank Details</b><br>
            </div>
            <div>
                <span style="font-size:16px;">Name : </span>
                <span style="font-size:16px;">MAA LAXMI ENTERPRISES</span>
            </div>
            <div>
                <span style="font-size:16px;">IFSC CODE : </span>
                <span style="font-size:16px;">INDB0001672</span>
            </div>
            <div>
                <span style="font-size:16px;">Account Number : </span>
                <span style="font-size:16px;">259899005487</span>
            </div>
            <div class="total_hr">
                <span style="font-size:16px;">Bank Name :</span>
                <span style="font-size:16px;">Induslnd Bank</span><br>
                <span style="font-size:16px;">Sector - 5, Gurugram</span>
            </div>
            <div class="total_hr">
                <b>TERMS AND CONDITIONS:</b><br>
                <span>
                    1. Service charge valid for 30 days only.<br>
                    2. All dispute subject to gurugram jurisdiction only.<br>
                    3. Goods once sold will not be taken back.<br>
                    4. Warranty valid only for which is mentioned on bill.
                </span>
            </div>
            <div style="margin-top:10px;">
                <b>Warranty Valid Bill On Date</b><br>
                <span><?= $all_data['terms_conditions'] ?></span>
            </div>
        </div>

        <div class="rowGroup" style="width: 50%; margin-left: 50%; margin-top: -260px;">
            <table class="table_3">
                <tr>
                    <td class="total_hr">TAXABLE AMOUNT</td>
                    <td class="total_hr"><span style="font-family: DejaVu Sans;">₹</span><?= $all_data['taxable_amount'] ?></td>
                </tr>
                <?php

                if (substr($all_data['state_gst_no'], 0, 2) == "06" || $all_data['state_gst_no'] == "") {
                ?>
                    <tr>
                        <td class="total_hr">SGST @<?= $all_data['sgst_percentage'] ?></td>
                        <td class="total_hr"><span style="font-family: DejaVu Sans;">₹</span><?= $all_data['sgst_amount'] ?></td>
                    </tr>
                    <tr>
                        <td class="total_hr">CGST @<?= $all_data['cgst_percentage'] ?></td>
                        <td class="total_hr"><span style="font-family: DejaVu Sans;">₹</span><?= $all_data['cgst_amount'] ?></td>
                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <td class="total_hr">IGST @<?= $all_data['igst_percentage'] ?></td>
                        <td class="total_hr"><span style="font-family: DejaVu Sans;">₹</span><?= $all_data['igst_amount'] ?></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td class="total_hr"><b>GRAND TOTAL</b></td>
                    <td class="total_hr"><span style="font-family: DejaVu Sans;">₹</span><b><?= $all_data['grand_total'] ?></b></td>
                <tr>
                    <td class="total_hr">Received Amount</td>
                    <td class="total_hr"><span style="font-family: DejaVu Sans;">₹</span><?= $all_data['received_amount'] ?></td>
                </tr>
                <tr>
                    <td class="total_hr"><b>Balance</b></td>
                    <td class="total_hr"><span style="font-family: DejaVu Sans;">₹</span><b><?= $all_data['balance'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2"><b>Invoice Amount (in words)</b></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <span style="font-size: 13px;"><?= AmountInWords($all_data['grand_total']) ?></span>
                    </td>
                </tr>
            </table>

        </div>
    </div>
         <div style="margin-top:50px; ">
            <span style="font-size: 12px; margin-left:170px;">This is computer generated bill not required stump and signature.</span>
        </div>     
</body>

</html>