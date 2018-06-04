<?php
namespace App\Helpers;

class MailOneCustomForm {
	private $fields = array ();
	private $fieldsData = array ();

	private $newsletterId = -1;

	public function __construct($id,$vardatamaildata) {

		$this->newsletterId=trim($id);

        $vardata = array('fields' => $vardatamaildata );

		if(isset($vardata['fields']) && isset($vardata['fields']['item']))
		{
		foreach ( $vardata['fields']['item'] as $k_d => $v_custom ) {
			$fieldName = trim ( strtolower ( $v_custom ['name'] ) );
			$this->fields [$fieldName] = $v_custom ['fieldid'];
			if ($fieldName == 'adults') {
				$this->fields ['adulti'] = $v_custom ['fieldid'];
			} elseif (utf8_encode($fieldName) == 'citt�') {
				$this->fields ['city'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'citt�') {
				$this->fields ['city'] = $v_custom ['fieldid'];
			} 
			elseif ($fieldName == 'cap') {
				$this->fields ['zipcode'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'nazione') {
				$this->fields ['nation'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'telefono') {
				$this->fields ['phone'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'children') {
				$this->fields ['bambini'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'minage') {
				$this->fields ['etaminima'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'maxage') {
				$this->fields ['etamassima'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'treatment') {
				$this->fields ['trattamento'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'checkin') {
				$this->fields ['dataarrivo'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'lingua') {
				$this->fields ['language'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'nome') {
				$this->fields ['name'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'cognome') {
				$this->fields ['surname'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'checkout') {
				$this->fields ['datapartenza'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'reservetype') {
				$this->fields ['reservetype'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'Struttura') {
			    $this->fields ['Struttura'] = $v_custom ['fieldid'];
			} elseif ($fieldName == 'Localita' || $fieldName == 'Localit�' || utf8_encode($fieldName)  == 'Localit�' ) {
			    $this->fields ['Localita'] = $v_custom ['fieldid'];
			    $this->fields ['Localit�'] = $v_custom ['fieldid'];
			    
			}
		}
		
		}
	}
	
	
	public function setFieldValue($fieldName, $fieldValue) {
		$fieldName = trim ( strtolower ( $fieldName ) );
		
		if (isset ( $this->fields [$fieldName] )) {
			$this->fieldsData [$this->fields [$fieldName]] = $fieldValue;
		}
	}
	public function getCustomFields() {
		return $this->fieldsData;
	}

	
	public function getNewsletterMailOneId() {
	
		return $this->newsletterId;
	}
	

}
?>
