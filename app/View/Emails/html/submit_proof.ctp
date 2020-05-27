	
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <!-- Web Font / @font-face : BEGIN -->
    <!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
        <style>
            * {
                font-family: sans-serif !important;
            }
        </style>
    <![endif]-->

    <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
    <!--[if !mso]><!-->
    <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
    <!--<![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->
    <style>
		table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:14px;margin:0px }
		
        /* Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }

        /* Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
            text-decoration: none;
        }

        /* Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }

        /* A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],  /* iOS */
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
           display: none !important;
           opacity: 0.01 !important;
       }
       /* If the above doesn't work, add a .g-img class to any image in question. */
       img.g-img + div {
           display: none !important;
       }

        /* Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */

        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            .email-container {
                min-width: 320px !important;
            }
        }
        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            .email-container {
                min-width: 375px !important;
            }
        }
        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            .email-container {
                min-width: 414px !important;
            }
        }

    </style>
    <!-- CSS Reset : END -->
	<!-- Reset list spacing because Outlook ignores much of our inline CSS. -->
	<!--[if mso]>
	<style type="text/css">
		ul,
		ol {
			margin: 0 !important;
		}
		li {
			margin-left: 30px !important;
		}
		li.list-item-first {
			margin-top: 0 !important;
		}
		li.list-item-last {
			margin-bottom: 10px !important;
		}
	</style>
	<![endif]-->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

        /* Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
	    .button-td-primary:hover,
	    .button-a-primary:hover {
	        background: #555555 !important;
	        border-color: #555555 !important;
	    }

        /* Media Queries */
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }

            /* Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            /* Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }

            /* Generic utility class for centering. Useful for images, buttons, and nested tables. */
            .center-on-narrow {
                text-align: left !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
			.row_margin{
				padding-top:10px;
			}
			.total_amount_container{
				padding:1% !important;
				margin-top:10px;
			}
        }

    </style>
    <!-- Progressive Enhancements : END -->

    <!-- Makes background images in 72ppi Outlook render at correct size. -->
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->

</head>	
<body width="100%" style="margin: 0; mso-line-height-rule: exactly;">

<p> Dear Finance Team,</p>
<p> The new order details are shown below. Kindly check the payment proof attached and click the below link to Verify the payment.</p>
<p> <a href="<?php echo Configure::read('Settings.PAYMENT_VERIFY_URL'); ?>" target="_blank">Verify Payment</a> </p>
<div style="float:left;border: 1px solid grey;padding:10px;">
			<table cellspacing="0" border="0" cellpadding="0" role="presentation" style="margin: 0 auto;" class="email-container">
				<tr>
					<td class="row_margin" colspan="10" dir="ltr" width="100%" >
						<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<!-- Column : BEGIN -->
								<td width="60%" class="stack-column-center">
									<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td dir="ltr" valign="top" class="center-on-narrow">
											<p>TT dotCom Sdn Bhd</p>
											<p>No. 14, Jalan Majistret U1/26, </p>
											<p>HICOM Glenmarie Industrial Park, </p>
											<p>40150 Shah Alam, Selangor, Malaysia</p>
											</td>
										</tr>									
										<tr>
											<td dir="ltr" valign="top" class="center-on-narrow"></td>
										</tr>
									</table>								
								</td>
								<!-- Column : END -->
								<!-- Column : BEGIN -->
								<td width="40%" class="stack-column-center">
									<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td dir="ltr" valign="top" class="center-on-narrow"><img src="https://apps.time.com.my/dealer/images/dealer_logo.jpg" width="217"></td>
										</tr>									
										<tr>
											<td dir="ltr" valign="top" class="center-on-narrow"><font face="Arial" size="3" color="#000000">ORDER DETAILS</font></td>
										</tr>
									</table>
								</td>
								<!-- Column : END -->
							</tr>
						</table>
					</td>
				</tr>				
				<tr>
					<td class="row_margin" colspan="10" dir="ltr" width="100%" >
						<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<!-- Column : BEGIN -->
								<td width="60%" class="stack-column-center">
								</td>
								<!-- Column : END -->
								<!-- Column : BEGIN -->
								<td width="40%" class="stack-column-center" >
									<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td dir="ltr" valign="top" class="center-on-narrow">Order No.</td>
											<td align="left" dir="ltr" valign="top" ><?php echo $order['Order']['id']; ?></td>
										</tr>
										<tr>
											<td dir="ltr" valign="top" class="center-on-narrow">Invoice No.</td>
											<td align="left" dir="ltr" valign="top" ><?php echo Configure::read('Settings.INVOICE_PREFIX').$order['Order']['id']; ?></td>
										</tr>
										<tr>
											<td dir="ltr" valign="top" class="center-on-narrow">Order Date</td>
											<td align="left" dir="ltr" valign="top" ><?php echo $order['Order']['created']; ?></td>
										</tr>										
									</table>
								</td>
								<!-- Column : END -->
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td class="row_margin" colspan="10" dir="ltr" width="100%" >
						<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<!-- Column : BEGIN -->
								<td width="60%" class="stack-column-center">
									<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td dir="ltr" valign="top" align="left" >
											<font face="Arial" size="2" color="#000000">
												<?php echo $this->Session->read('Auth.User.User.title').' '.$this->Session->read('Auth.User.User.name'); ?><br />										
												<?php echo $this->Session->read('Auth.User.User.address'); ?><br />
												<?php echo $this->Session->read('Auth.User.User.city'); ?><br />
												<?php echo $this->Session->read('Auth.User.User.state'); ?><br />
												<?php echo $this->Session->read('Auth.User.User.postcode'); ?><br />
												Bank Name: <?php echo $order['Order']['bank_name']; ?><br />
												Account Name: <?php echo $order['Order']['account_name']; ?><br />
												Account Number: <?php echo $order['Order']['account_number']; ?><br />
											</font>
											</td>
										</tr>
									</table>
								</td>
								<!-- Column : END -->
								<!-- Column : BEGIN -->
								<td width="40%" class="stack-column-center">
									<table class="total_amount_container" role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td dir="ltr" valign="top" bgcolor="#F2F2F2" style="padding:10%;text-align:center;" class="center-on-narrow total_amount_container">
												<font face="Arial" size="2" color="#000000">Total amount:<br />RM <?php echo number_format($order['Order']['total'], 2); ?></font>										
											</td>
										</tr>
									</table>
								</td>
								<!-- Column : END -->
							</tr>
						</table>
					</td>
				</tr>
			
			
				<tr>
					<td style="border-top: 2px solid #000000; border-left: 2px solid #000000" colspan="4" rowspan="2" align="left" valign="middle" bgcolor="#EC008C">
						<font face="Arial" size="2" color="#FFFFFF">Description</font>
					</td>
					<td style="border-top: 2px solid #000000;" rowspan="2" align="center" valign="middle" bgcolor="#EC008C">
						<font face="Arial" size="2" color="#FFFFFF">Quantity</font>
					</td>
					<td style="border-top: 2px solid #000000" align="left" valign="bottom" bgcolor="#EC008C"></td>
					<td style="border-top: 2px solid #000000" align="center" valign="middle" bgcolor="#EC008C"><font face="Arial" size="2" color="#FFFFFF">Unit Price</font></td>
					<td style="border-top: 2px solid #000000" align="left" valign="middle" bgcolor="#EC008C"><font face="Arial" size="2" color="#FFFFFF"><br /></font></td>
					<td style="border-top: 2px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign="middle" bgcolor="#EC008C"><font face="Arial" size="2" color="#FFFFFF">Total Charge</font></td>
				</tr>
				<tr>
					<td style=""  align="left" valign="bottom" bgcolor="#EC008C"></td>
					<td style="" align="center" valign="middle" bgcolor="#EC008C"><font face="Arial" size="2" color="#FFFFFF">(RM)</font></td>
					<td style="" align="left" valign="middle" bgcolor="#EC008C"><font face="Arial" size="2" color="#FFFFFF"><br /></font></td>
					<td style="border-right: 2px solid #000000" colspan=2 align="center" valign="middle" bgcolor="#EC008C"><font face="Arial" size="2" color="#FFFFFF">(RM)</font></td>
				</tr>
				<tr>
					<td style="border-bottom: 2px solid #000000" colspan="10" ></td>
				</tr>
				<?php foreach ($order['OrderItem'] as $orderitem) { ?>
				<tr>
					<td style="border-left: 2px solid #000000" colspan=4 height="20" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Arial" size="2" color="#000000"><?php echo $orderitem['name']; ?></font></td>
					<td align="center" valign="bottom" bgcolor="#FFFFFF" sdval="50" sdnum="1033;"><font face="Arial" size="2" color="#000000"><?php echo $orderitem['quantity']; ?></font></td>
					<td align="center" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="center" valign="bottom" bgcolor="#FFFFFF" ><font face="Arial" size="2" color="#000000"> <?php echo number_format($orderitem['price'],2); ?> </font></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-right: 2px solid #000000" colspan=2 align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Arial" size="2" color="#000000"> <?php echo number_format($orderitem['subtotal'],2); ?> </font></td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid #000000; border-left: 2px solid #000000" colspan=4 height="20" align="center" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-bottom: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign="bottom" bgcolor="#FFFFFF"></td>
				</tr>	
				<?php }	?>
				<tr>
					<td style="border-left: 2px solid #000000" colspan=4 height="20" align="center" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-right: 2px solid #000000" colspan=2 align="center" valign="bottom" bgcolor="#FFFFFF"></td>
				</tr>	
				<tr>
					<td style="border-left: 2px solid #000000" colspan=4 height="24" align="center" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td colspan=2 align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Arial" size="2" color="#000000">Sub Total</font></td>
					<td style="border-right: 2px solid #000000" colspan=2 align="right" valign="bottom" bgcolor="#FFFFFF" ><font face="Arial" size="2" color="#000000"> <?php echo number_format($order['Order']['subtotal'], 2); ?> </font></td>
				</tr>
				<tr>
					<td style="border-left: 2px solid #000000" colspan=4 height="24" align="center" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td colspan=2 align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Arial" size="2" color="#000000">Discount</font></td>
					<td style="border-bottom: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Arial" size="2" color="#000000"><?php echo number_format($order['Order']['discount'], 2); ?> </font></td>
				</tr>				
				<tr>
					<td style="border-left: 2px solid #000000" colspan=4 height="25" align="center" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td colspan=2 align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Arial" size="2" color="#000000">Total</font></td>
					<td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-right: 2px solid #000000" colspan=2 align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Arial" size="2" color="#000000"> <?php echo number_format($order['Order']['total'], 2); ?> </font></td>
				</tr>
				<tr>
					<td style="border-left: 2px solid #000000" colspan=4 height="20" align="center" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-right: 2px solid #000000" colspan=2 align="center" valign="bottom" bgcolor="#FFFFFF"></td>
				</tr>
				<tr>
					<td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000" colspan=4 height="20" align="center" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-bottom: 2px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-bottom: 2px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-bottom: 2px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-bottom: 2px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF"></td>
					<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign="bottom" bgcolor="#FFFFFF"></td>
				</tr>
				<tr>
					<td colspan="10" height="60" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Arial" size="2" color="#000000">TT dotCom Sdn Bhd (52371-A) | No. 14, Jalan Majistret U1/26, Hicom Glenmarie Industrial Park, 40150 Shah Alam, Selangor</font></td>
				</tr>
				<tr>
					<td height="20" colspan="10" align="left" valign="middle" bgcolor="#FFFFFF"></td>
				</tr>
			</table>
		</div>
<!-- ************************************************************************** -->

</body>

</html>



