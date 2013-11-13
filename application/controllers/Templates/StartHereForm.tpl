<div class="ContentRight">
	<div class="ContentHeader">
		Posting The Data Securely To The Payment Form
	</div>
	<div class="ContentBodyText">
		<p>
			This page demonstrates how to post the transactional data across to the payment page in a <b>secure</b> 
			manner. The transaction data <b>MUST</b> be protected as it is being delivered to the payment form
			via the customer's browser. The data is protected by the use of Hashing. Hashing is used to produce 
			a unique "signature" for the data being passed (it is generated using not only the data being 
			transmitted, but also secret data that is not transmitted, so the fraudster cannot recreate the 
			hash digest with the data that is passed via their browser). The hash signature is then 
			re-calculated on receipt of the transmitted data, and <b>if it does not match</b> the hash 
			signature that was transmitted with the data, then <b>the data has been tampered with</b>, and 
			the transaction will stop with an error message. The same process (in reverse) should be carried
			out by this site on receipt of the transaction results.
		</p>
		<p>
			The worst kinds of customer tampering could be lowering the transaction price (say from £100.00 down
			to £1.00), or making a failed transaction look like an authorised one. This is called a "man-in-the-
			middle" attack.
		</p>
		<p>
			This page is analogous to the place in shopping cart where you need to jump across to the payment
			form.
		</p>
	</div>

	<input type="hidden" name="HashDigest" value="<?= $szHashDigest ?>" />
	<input type="hidden" name="MerchantID" value="<?= $MerchantID ?>" />
	<input type="hidden" name="Amount" value="<?= $szAmount ?>" />
	<input type="hidden" name="CurrencyCode" value="<?= $szCurrencyCode ?>" />
	<input type="hidden" name="OrderID" value="<?= $szOrderID ?>" />
	<input type="hidden" name="TransactionType" value="<?= $szTransactionType ?>" />
	<input type="hidden" name="TransactionDateTime" value="<?= $szTransactionDateTime ?>" />
	<input type="hidden" name="CallbackURL" value="<?= $szCallbackURL ?>" />
	<input type="hidden" name="OrderDescription" value="<?= $szOrderDescription ?>" />
	<input type="hidden" name="CustomerName" value="<?= $szCustomerName ?>" />
	<input type="hidden" name="Address1" value="<?= $szAddress1 ?>" />
	<input type="hidden" name="Address2" value="<?= $szAddress2 ?>" />
	<input type="hidden" name="Address3" value="<?= $szAddress3 ?>" />
	<input type="hidden" name="Address4" value="<?= $szAddress4 ?>" />
	<input type="hidden" name="City" value="<?= $szCity ?>" />
	<input type="hidden" name="State" value="<?= $szState ?>" />
	<input type="hidden" name="PostCode" value="<?= $szPostCode ?>" />
	<input type="hidden" name="CountryCode" value="<?= $szCountryCode ?>" />
	<input type="hidden" name="CV2Mandatory" value="<?= $szCV2Mandatory ?>" />
	<input type="hidden" name="Address1Mandatory" value="<?= $szAddress1Mandatory ?>" />
	<input type="hidden" name="CityMandatory" value="<?= $szCityMandatory ?>" />
	<input type="hidden" name="PostCodeMandatory" value="<?= $szPostCodeMandatory ?>" />
	<input type="hidden" name="StateMandatory" value="<?= $szStateMandatory ?>" />
	<input type="hidden" name="CountryMandatory" value="<?= $szCountryMandatory ?>" />
	<input type="hidden" name="ResultDeliveryMethod" value="<?= $ResultDeliveryMethod ?>" />
	<input type="hidden" name="ServerResultURL" value="<?= $szServerResultURL ?>" />
	<input type="hidden" name="PaymentFormDisplaysResult" value="<?= $szPaymentFormDisplaysResult ?>" />
	<input type="hidden" name="ServerResultURLCookieVariables" value="" />
	<input type="hidden" name="ServerResultURLFormVariables" value="" />
	<input type="hidden" name="ServerResultURLQueryStringVariables" value="" />
	
	<div class="FormItem">
		<div class="FormLabel">
			Amount:
		</div>
		<div class="FormInputTextOnly">
			<?= $szAmount ?>
		</div>
	</div>				
	<div class="FormItem">
		<div class="FormLabel">
			Currency:
		</div>
		<div class="FormInputTextOnly">
			<?= $szCurrencyCode ?>
		</div>
	</div>				
	<div class="FormItem">
		<div class="FormLabel">
			Order ID:
		</div>
		<div class="FormInputTextOnly">
			<?= $szOrderID ?>
		</div>
	</div>				
	<div class="FormItem">
		<div class="FormLabel">
			Order Description:
		</div>
		<div class="FormInputTextOnly">
			<?= $szOrderDescription ?>
		</div>
	</div>				
	<div class="FormItem">
		<div class="FormSubmit">
			<input type="submit" value="Post Data To Payment Form" />
		</div>
	</div>
</div>