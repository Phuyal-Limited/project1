<?php
	require_once ("PaymentFormHelper.php");
	include ("Config.php");

	$Width = 800;
	$FormAction = "https://mms.".$PaymentProcessorDomain."/Pages/PublicPages/PaymentForm.aspx";
	include ("Templates/FormHeader.tpl");

	// the amount in *minor* currency (i.e. £10.00 passed as "1000")
	$szAmount = strval(1000);
	// the currency	- ISO 4217 3-digit numeric (e.g. GBP = 826)
	$szCurrencyCode = strval(826);
	// order ID
	$szOrderID = "PaymentSense Test order";
	// the transaction type - can be SALE or PREAUTH
	$szTransactionType = "SALE";
	// the GMT/UTC relative date/time for the transaction (MUST either be in GMT/UTC 
	// or MUST include the correct timezone offset)
	$szTransactionDateTime = date('Y-m-d H:i:s P');
	// order description
	$szOrderDescription = "A Test Order";
	// these variables allow the payment form to be "seeded" with initial values
	$szCustomerName = "A Customer";
	$szAddress1 = "32 Some Address";
	$szAddress2 = "";
	$szAddress3 = "";
	$szAddress4 = "";
	$szCity = "Some City";
	$szState = "Some State";
	$szPostCode = "PO14 8DE";
	// the country code - ISO 3166-1  3-digit numeric (e.g. UK = 826)
	$szCountryCode = strval(826);
	// use these to control which fields on the hosted payment form are
	// mandatory
	$szCV2Mandatory = PaymentFormHelper::boolToString(true);
	$szAddress1Mandatory = PaymentFormHelper::boolToString(true);
	$szCityMandatory = PaymentFormHelper::boolToString(true);
	$szPostCodeMandatory = PaymentFormHelper::boolToString(true);
	$szStateMandatory = PaymentFormHelper::boolToString(true);
	$szCountryMandatory = PaymentFormHelper::boolToString(true);
	// the URL on this system that the payment form will push the results to (only applicable for 
	// ResultDeliveryMethod = "SERVER")
	if ($ResultDeliveryMethod != "SERVER")
	{
		$szServerResultURL = "";
	}
	else
	{
		$szServerResultURL = PaymentFormHelper::getSiteSecureBaseURL()."ReceiveTransactionResult.php";
	}
	// set this to true if you want the hosted payment form to display the transaction result
	// to the customer (only applicable for ResultDeliveryMethod = "SERVER")
	if ($ResultDeliveryMethod != "SERVER")
	{
		$szPaymentFormDisplaysResult = "";
	}
	else
	{
		$szPaymentFormDisplaysResult = PaymentFormHelper::boolToString(false);
	}
	// the callback URL on this site that will display the transaction result to the customer
	// (always required unless ResultDeliveryMethod = "SERVER" and PaymentFormDisplaysResult = "true")
	if ($ResultDeliveryMethod == "SERVER" && PaymentFormHelper::stringToBool($szPaymentFormDisplaysResult) == false)
	{
		$szCallbackURL = "http://paymentgatewayuk.com/PHP/HostedSample/DisplayTransactionResult.php";
	}
	else
	{
		$szCallbackURL = "http://paymentgatewayuk.com/PHP/HostedSample/DisplayTransactionResult.php"; 
	}

	// get the string to be hashed
	$szStringToHash = PaymentFormHelper::generateStringToHash($MerchantID,
			        										  $Password,
			        										  $szAmount,
															  $szCurrencyCode,
															  $szOrderID,
															  $szTransactionType,
															  $szTransactionDateTime,
															  $szCallbackURL,
															  $szOrderDescription,
															  $szCustomerName,
															  $szAddress1,
															  $szAddress2,
															  $szAddress3,
															  $szAddress4,
															  $szCity,
															  $szState,
															  $szPostCode,
															  $szCountryCode,
															  $szCV2Mandatory,
															  $szAddress1Mandatory,
															  $szCityMandatory,
															  $szPostCodeMandatory,
															  $szStateMandatory,
															  $szCountryMandatory,
															  $ResultDeliveryMethod,
															  $szServerResultURL,
															  $szPaymentFormDisplaysResult,
			         		                                  $PreSharedKey,
			         		                                  $HashMethod);

	// pass this string into the hash function to create the hash digest
	$szHashDigest = PaymentFormHelper::calculateHashDigest($szStringToHash,
                        								   $PreSharedKey, 
                        								   $HashMethod);

	include ("Templates/StartHereForm.tpl");
	include ("Templates/FormFooter.tpl");
?>