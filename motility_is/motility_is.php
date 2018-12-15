<?php
/**
 * @package Infusionsoft Integrator
 * @version 1.0
 */
 
/*
Plugin Name: Infusionsoft Integrator
Plugin URI: http://cutearts.org
Description: Infusionsoft Integrator
Version: 1.0
Author: Moises
Author URI: http://cutearts.org
*/

global $motilityIS;
include_once('isdk/isdk.php');

class motilityIS extends iSDK {
	
	var $appID 			= 'aa131';
	var $tagCategory 	= 58;
	var $purchaseflag  = 684;

    /**
     * Main IS Class Constructor
     *
     * Loads all necessary classes, functions, hooks, configuration files and actions for the theme.
     * Everything starts here.
     *
     * @since   1.0
     * @access  public
     *
     * @global  object $motilityIS 
     */
    public function __construct() {
		
        // Defines hooks and runs actions on init
        add_action( 'init', array( $this, 'loader' ), 0 );
		
		// Load constants
		add_action( 'after_setup_theme', array( $this, 'constants' ), 1 );
		
		// Get the order details in woocommerce
		add_action( 'woocommerce_order_items_table', array( $this, 'woocommerce'));
		
		// Add event fields in woocommerce
		add_filter('woocommerce_checkout_fields',array( $this, 'addEventFields'));
		
		// Save the event fields value
		add_action( 'woocommerce_checkout_update_order_meta', array($this,'saveEventFields') );
		
    }

    /**
     * Defines constants.
     *
     * @since   1.0
     * @access  public
     */
    public function constants() {

        // Plugin URL / Path
        define( 'MTIS_DIR', plugin_dir_path( __FILE__ ) );
        define( 'MTIS_URL', plugins_url( 'uncannyowl_is', __FILE__ ) );

        // JS and CSS URL
        define( 'MTIS_JS', MTIS_URL .'/js/' );
        define( 'MTIS_CSS', MTIS_URL .'/css/' );

    }

    /**
     * Defines all hooks.
     *
     * @since   1.0
     * @access  public
     */
    public function loader() {
        
    }
	
	/**
     * Add event fields on woocommerce.
     *
     * @since   1.0
     * @access  public
     */
	public function addEventFields($fields) {
		global $woocommerce;
		$fields['order']['newsletter'] = array(
			'type' => 'checkbox',
			'label' => __('Subscribe to our monthly eMag', 'woocommerce'),
			'required' => false,
			'class'=>array('form-row-wide'),
			'clear' =>false,
			'value' =>true
			);
		$fields['order']['affiliate'] = array(
			'type' => 'checkbox',
			'label' => __('Join our Affiliate Program (Refer Earn Inspire)', 'woocommerce'),
			'required' => false,
			'class'=>array('form-row-first'),
			'clear' =>false,
			'value' =>true
			);
		$ordernotes = array_shift($fields['order']);
		$fields['order']['order_comments']=$ordernotes;
		
		return $fields;
	}
	
	/**
     * Save event fields on woocommerce.
     *
     * @since   1.0
     * @access  public
     */	 
	public function saveEventFields( $order_id ) {
		if ( ! empty( $_POST['newsletter'] ) ) {
			update_post_meta( $order_id, 'newsletter', sanitize_text_field( $_POST['newsletter'] ) );
		}
		   if ( ! empty( $_POST['affiliate'] ) ) {
			update_post_meta( $order_id, 'affiliate', sanitize_text_field( $_POST['affiliate'] ) );
		}
	}
	
	/**
     * Replace country code with name.
     *
     * @since   1.0
     * @access  public
     */
	public function getCountry( $key = NULL ) {
		
		// TO DO: pile this in a single sql table
		$countries = array(
							"AF" => "Afghanistan",
							"AL" => "Albania",
							"DZ" => "Algeria",
							"AS" => "American Samoa",
							"AD" => "Andorra",
							"AO" => "Angola",
							"AI" => "Anguilla",
							"AQ" => "Antarctica",
							"AG" => "Antigua and Barbuda",
							"AR" => "Argentina",
							"AM" => "Armenia",
							"AW" => "Aruba",
							"AU" => "Australia",
							"AT" => "Austria",
							"AZ" => "Azerbaijan",
							"BS" => "Bahamas",
							"BH" => "Bahrain",
							"BD" => "Bangladesh",
							"BB" => "Barbados",
							"BY" => "Belarus",
							"BE" => "Belgium",
							"BZ" => "Belize",
							"BJ" => "Benin",
							"BM" => "Bermuda",
							"BT" => "Bhutan",
							"BO" => "Bolivia",
							"BA" => "Bosnia and Herzegovina",
							"BW" => "Botswana",
							"BV" => "Bouvet Island",
							"BR" => "Brazil",
							"BQ" => "British Antarctic Territory",
							"IO" => "British Indian Ocean Territory",
							"VG" => "British Virgin Islands",
							"BN" => "Brunei",
							"BG" => "Bulgaria",
							"BF" => "Burkina Faso",
							"BI" => "Burundi",
							"KH" => "Cambodia",
							"CM" => "Cameroon",
							"CA" => "Canada",
							"CT" => "Canton and Enderbury Islands",
							"CV" => "Cape Verde",
							"KY" => "Cayman Islands",
							"CF" => "Central African Republic",
							"TD" => "Chad",
							"CL" => "Chile",
							"CN" => "China",
							"CX" => "Christmas Island",
							"CC" => "Cocos [Keeling] Islands",
							"CO" => "Colombia",
							"KM" => "Comoros",
							"CG" => "Congo - Brazzaville",
							"CD" => "Congo - Kinshasa",
							"CK" => "Cook Islands",
							"CR" => "Costa Rica",
							"HR" => "Croatia",
							"CU" => "Cuba",
							"CY" => "Cyprus",
							"CZ" => "Czech Republic",
							"CI" => "Côte d'Ivoire",
							"DK" => "Denmark",
							"DJ" => "Djibouti",
							"DM" => "Dominica",
							"DO" => "Dominican Republic",
							"NQ" => "Dronning Maud Land",
							"DD" => "East Germany",
							"EC" => "Ecuador",
							"EG" => "Egypt",
							"SV" => "El Salvador",
							"GQ" => "Equatorial Guinea",
							"ER" => "Eritrea",
							"EE" => "Estonia",
							"ET" => "Ethiopia",
							"FK" => "Falkland Islands",
							"FO" => "Faroe Islands",
							"FJ" => "Fiji",
							"FI" => "Finland",
							"FR" => "France",
							"GF" => "French Guiana",
							"PF" => "French Polynesia",
							"TF" => "French Southern Territories",
							"FQ" => "French Southern and Antarctic Territories",
							"GA" => "Gabon",
							"GM" => "Gambia",
							"GE" => "Georgia",
							"DE" => "Germany",
							"GH" => "Ghana",
							"GI" => "Gibraltar",
							"GR" => "Greece",
							"GL" => "Greenland",
							"GD" => "Grenada",
							"GP" => "Guadeloupe",
							"GU" => "Guam",
							"GT" => "Guatemala",
							"GG" => "Guernsey",
							"GN" => "Guinea",
							"GW" => "Guinea-Bissau",
							"GY" => "Guyana",
							"HT" => "Haiti",
							"HM" => "Heard Island and McDonald Islands",
							"HN" => "Honduras",
							"HK" => "Hong Kong SAR China",
							"HU" => "Hungary",
							"IS" => "Iceland",
							"IN" => "India",
							"ID" => "Indonesia",
							"IR" => "Iran",
							"IQ" => "Iraq",
							"IE" => "Ireland",
							"IM" => "Isle of Man",
							"IL" => "Israel",
							"IT" => "Italy",
							"JM" => "Jamaica",
							"JP" => "Japan",
							"JE" => "Jersey",
							"JT" => "Johnston Island",
							"JO" => "Jordan",
							"KZ" => "Kazakhstan",
							"KE" => "Kenya",
							"KI" => "Kiribati",
							"KW" => "Kuwait",
							"KG" => "Kyrgyzstan",
							"LA" => "Laos",
							"LV" => "Latvia",
							"LB" => "Lebanon",
							"LS" => "Lesotho",
							"LR" => "Liberia",
							"LY" => "Libya",
							"LI" => "Liechtenstein",
							"LT" => "Lithuania",
							"LU" => "Luxembourg",
							"MO" => "Macau SAR China",
							"MK" => "Macedonia",
							"MG" => "Madagascar",
							"MW" => "Malawi",
							"MY" => "Malaysia",
							"MV" => "Maldives",
							"ML" => "Mali",
							"MT" => "Malta",
							"MH" => "Marshall Islands",
							"MQ" => "Martinique",
							"MR" => "Mauritania",
							"MU" => "Mauritius",
							"YT" => "Mayotte",
							"FX" => "Metropolitan France",
							"MX" => "Mexico",
							"FM" => "Micronesia",
							"MI" => "Midway Islands",
							"MD" => "Moldova",
							"MC" => "Monaco",
							"MN" => "Mongolia",
							"ME" => "Montenegro",
							"MS" => "Montserrat",
							"MA" => "Morocco",
							"MZ" => "Mozambique",
							"MM" => "Myanmar [Burma]",
							"NA" => "Namibia",
							"NR" => "Nauru",
							"NP" => "Nepal",
							"NL" => "Netherlands",
							"AN" => "Netherlands Antilles",
							"NT" => "Neutral Zone",
							"NC" => "New Caledonia",
							"NZ" => "New Zealand",
							"NI" => "Nicaragua",
							"NE" => "Niger",
							"NG" => "Nigeria",
							"NU" => "Niue",
							"NF" => "Norfolk Island",
							"KP" => "North Korea",
							"VD" => "North Vietnam",
							"MP" => "Northern Mariana Islands",
							"NO" => "Norway",
							"OM" => "Oman",
							"PC" => "Pacific Islands Trust Territory",
							"PK" => "Pakistan",
							"PW" => "Palau",
							"PS" => "Palestinian Territories",
							"PA" => "Panama",
							"PZ" => "Panama Canal Zone",
							"PG" => "Papua New Guinea",
							"PY" => "Paraguay",
							"YD" => "People's Democratic Republic of Yemen",
							"PE" => "Peru",
							"PH" => "Philippines",
							"PN" => "Pitcairn Islands",
							"PL" => "Poland",
							"PT" => "Portugal",
							"PR" => "Puerto Rico",
							"QA" => "Qatar",
							"RO" => "Romania",
							"RU" => "Russia",
							"RW" => "Rwanda",
							"RE" => "Réunion",
							"BL" => "Saint Barthélemy",
							"SH" => "Saint Helena",
							"KN" => "Saint Kitts and Nevis",
							"LC" => "Saint Lucia",
							"MF" => "Saint Martin",
							"PM" => "Saint Pierre and Miquelon",
							"VC" => "Saint Vincent and the Grenadines",
							"WS" => "Samoa",
							"SM" => "San Marino",
							"SA" => "Saudi Arabia",
							"SN" => "Senegal",
							"RS" => "Serbia",
							"CS" => "Serbia and Montenegro",
							"SC" => "Seychelles",
							"SL" => "Sierra Leone",
							"SG" => "Singapore",
							"SK" => "Slovakia",
							"SI" => "Slovenia",
							"SB" => "Solomon Islands",
							"SO" => "Somalia",
							"ZA" => "South Africa",
							"GS" => "South Georgia and the South Sandwich Islands",
							"KR" => "South Korea",
							"ES" => "Spain",
							"LK" => "Sri Lanka",
							"SD" => "Sudan",
							"SR" => "Suriname",
							"SJ" => "Svalbard and Jan Mayen",
							"SZ" => "Swaziland",
							"SE" => "Sweden",
							"CH" => "Switzerland",
							"SY" => "Syria",
							"ST" => "São Tomé and Príncipe",
							"TW" => "Taiwan",
							"TJ" => "Tajikistan",
							"TZ" => "Tanzania",
							"TH" => "Thailand",
							"TL" => "Timor-Leste",
							"TG" => "Togo",
							"TK" => "Tokelau",
							"TO" => "Tonga",
							"TT" => "Trinidad and Tobago",
							"TN" => "Tunisia",
							"TR" => "Turkey",
							"TM" => "Turkmenistan",
							"TC" => "Turks and Caicos Islands",
							"TV" => "Tuvalu",
							"UM" => "U.S. Minor Outlying Islands",
							"PU" => "U.S. Miscellaneous Pacific Islands",
							"VI" => "U.S. Virgin Islands",
							"UG" => "Uganda",
							"UA" => "Ukraine",
							"SU" => "Union of Soviet Socialist Republics",
							"AE" => "United Arab Emirates",
							"GB" => "United Kingdom",
							"US" => "United States",
							"ZZ" => "Unknown or Invalid Region",
							"UY" => "Uruguay",
							"UZ" => "Uzbekistan",
							"VU" => "Vanuatu",
							"VA" => "Vatican City",
							"VE" => "Venezuela",
							"VN" => "Vietnam",
							"WK" => "Wake Island",
							"WF" => "Wallis and Futuna",
							"EH" => "Western Sahara",
							"YE" => "Yemen",
							"ZM" => "Zambia",
							"ZW" => "Zimbabwe",
							"AX" => "Åland Islands",
						);
		
		if($key) {
			return $countries[$key];
		} else {
			return $countries;	
		}
	}
	
	/**
     * Sanitize date for infusionsoft fields.
     *
     * @since   1.0
     * @access  public
     */
	public function sanitizeDate($date = "") {
		return $this->infuDate(date("d-m-Y", strtotime($date)));	
	}
	
	/**
     * Find infusionsoft tag.
     *
     * @since   1.0
     * @access  public
     */
	public function tagExists($tagName = "")
	{
		if($this->cfgCon($this->appID)){
			$returnFields = array('Id','GroupCategoryId'); 
			$query = array('GroupName' => '%'.$tagName.'%'); 
			$cg = $this->dsQuery("ContactGroup",10,0,$query,$returnFields); 
			
			if($cg){
				return $cg;	
			} else {
			 	return false;	
			}
		} else {
			return false;
		}
	}
	
	/**
     * Add infusionsoft tag.
     *
     * @since   1.0
     * @access  public
     */
	public function addTag($tagName = "", $tagCat = 58)
	{
		if($this->cfgCon($this->appID)){
			$tagData = array('GroupName' => $tagName, 
							'GroupCategoryId' => (int)$tagCat
						);		

			if ($tagName != "") 		
			{
				$returnFields = array('Id');
				return $this->dsAdd("ContactGroup", $tagData);
			} else {
				return false;
			}	
		} else {
			return false;
		}
	}
	
	 /**
     * Add contact to the product tag they bought.
     *
     * @since   1.0
     * @access  public
     */
    public function addContactToProductTag($order_id, $contactId) {		
        $order = new WC_Order($order_id);

		foreach( $order->get_items() as $item ) {			
			if($cg = $this->tagExists($item['name'])){
				$this->grpAssign($contactId, $cg[0]['Id']);
			} else {
				$cgId = $this->addTag($item['name'], $this->tagCategory);
				$this->grpAssign($contactId, $cgId);
			}
		}
    }
	
	/**
     * Add order to the contact.
     *
     * @since   1.0
     * @access  public
     */
    public function addContactToOrder($order_id, $contactId, $contact) {		
        $order = new WC_Order($order_id);
		$description   = 'Order from ' . $contact['FirstName'] . ' ' . $contact['LastName'];
		$orderDate     = date('Ymd\T00:00:00');
        $leadAffiliate = "None";
        $saleAffiliate = "None";
        $notes         = "Notes";
        $description2  = "Sale at BigShakti Website";
        $total         = 0;
		$invoiceId = $this->blankOrder($contactId, $description, $orderDate, $leadAffiliate, $saleAffiliate);
		
		foreach( $order->get_items() as $item ) {			
			$_product  = apply_filters('woocommerce_order_item_product', $order->get_product_from_item($item), $item);
			$productID = $item['product_id'];
			$isProductID = get_post_meta($productID, 'isproduct', true);
			$price       = (float) $order->get_item_total($item);
			$total = $total + $price;
			$qty   = (int) $item['qty'];
			$this->addOrderItem($invoiceId, $isProductID, 4, $price, $qty, $description2, $notes);
		}
		
		 $this->manualPmt($invoiceId, $total, $orderDate, "WooCommerce", "Eway", false);
    }
	
	/**
     * Get woocommerce data and process it in infusion.
     *
     * @since   1.0
     * @access  public
     */
	public function woocommerce($order) {
		
		$corder = new WC_Order($order->id);
		$now = date('d F Y H:i:s');

		if($this->cfgCon($this->appID)) {	
			$contact  = array(
				'FirstName' 			=> $corder->billing_first_name,
				'LastName' 				=> $corder->billing_last_name,	
				'Email' 				=> $corder->billing_email, 
				'Phone1Type' 			=> 'Home',
				'Phone1' 				=> $corder->billing_phone,
				'StreetAddress1' 		=> $corder->billing_address_1, 
				'StreetAddress2' 		=> $corder->billing_address_2, 
				'City' 					=> $corder->billing_city, 
				'State' 				=> $corder->billing_state, 
				'PostalCode' 			=> $corder->billing_postcode, 
				'Country' 				=> $this->getCountry($corder->billing_country),
				'_OrderNotes'			=> $corder->customer_message,
				'_AffliateNewsDate'		=> $this->sanitizeDate($now),
				'_NewsletterDate'		=> $this->sanitizeDate($now),
                                '_LastOrderDate'                => $this->sanitizeDate($now),
			);
			
			if($corder->affiliate) {
				$contact['_AffliateNewsDate'] = $this->sanitizeDate($now);
			}
			
			if($corder->newsletter) {
				$contact['_NewsletterDate'] = $this->sanitizeDate($now);
			}
			
			$returnFields = array('Id');
			
			if(!empty($contact['Email'])){
				
				$contactIds = $this->findByEmail($contact['Email'], $returnFields);	
				$contactId  = !empty($contactIds) && isset($contactIds[0]['Id']) ? $contactIds[0]['Id'] : false;
				
				if($contactId) 
				{
					// Existing so we need to update
					$conId = $this->updateCon($contactId,$contact);
					
					// Add to tag
					$this->addContactToProductTag($order->id,$contactId);
					$this->grpAssign($contactId,$this->purchaseflag);
					$this->addContactToOrder($order->id, $contactId, $contact);
				} else {
					// Add new contact
					$conId = $this->addCon($contact);
					
					// Add to tag
					$this->addContactToProductTag($order->id,$conId);
					$this->grpAssign($conId, $this->purchaseflag);
					$this->addContactToOrder($order->id, $conId, $contact);
				} 		
			}
			
			echo $conId;
		}
	}
}

$motilityIS = new motilityIS();