<?php

namespace App\Service;
use GuzzleHttp;
/**
 *
 * @author giuseppe.donato
 *
 */
class MailOneService {

    private static $instance = null;

	private $urlEntryPoint = '';
	private $xmlUser = '';
	private $xmlToken = '';
	private $postXmlData = '';
	private $error = array ();
	private $serviceStatus = false;


	CONST C_TYPE_TEXT = 'Text';

	CONST C_TYPE_TEXTAREA = 'Textarea';

	CONST C_TYPE_NUMBER = 'Number';

	CONST C_TYPE_DROPDOWN = 'Dropdown';

	CONST C_TYPE_CHECKBOX = 'Checkbox';

	CONST C_TYPE_RADIOBUTTON = 'Radiobutton';

	CONST C_TYPE_DATE = 'Date';

    /**
     * @return string
     */
    public function getUrlEntryPoint(): string
    {
        return $this->urlEntryPoint;
    }

    /**
     * @param string $urlEntryPoint
     */
    public function setUrlEntryPoint(string $urlEntryPoint): void
    {
        $this->urlEntryPoint = $urlEntryPoint;
    }

    /**
     * @return string
     */
    public function getXmlUser(): string
    {
        return $this->xmlUser;
    }

    /**
     * @param string $xmlUser
     */
    public function setXmlUser(string $xmlUser): void
    {
        $this->xmlUser = $xmlUser;
    }

    /**
     * @return string
     */
    public function getXmlToken(): string
    {
        return $this->xmlToken;
    }

    /**
     * @param string $xmlToken
     */
    public function setXmlToken(string $xmlToken): void
    {
        $this->xmlToken = $xmlToken;
    }


    public static function getInstance($settigs=null,$nochek = true) {
        if (! self::$instance) {

            self::$instance = new MailOneService ($settigs,$nochek = true);
        }

        return self::$instance;
    }


	public function __construct($settigs,$nochek = true) {


		$this->urlEntryPoint = $settigs['entrypoint'];

		$this->xmlUser = $settigs['mmuser'];
		$this->xmlToken = $settigs['mmpassword'];

		if(!$nochek)
		{
			$ret = $this->checkToken ();
			$this->serviceStatus = $ret;
		}
		else
		{
			$this->serviceStatus = true;
		}
	}
	public function getStatus() {
		return $this->serviceStatus;
	}

	/**
	 *
	 * @return Ambigous <mixed, unknown>
	 */
	public function getAllContactLists($owner) {

		$this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
				<requesttype>lists</requesttype>
				<requestmethod>GetListByUserID</requestmethod>
				<details>
					<Userid>" . $owner ."</Userid>
				</details>
				</xmlrequest>
				";


		$ret = $this->callService ();


		$ret = $this->xml2array ( $ret );

		$this->postXmlData = '';

		return $ret;
	}

	/**
	 *
	 * @param unknown $listId
	 * @param unknown $subscriberDomain
	 * @return Ambigous <mixed, unknown>
	 */
	public function getContactListSubscribersEx($listId, $subscriberDomain) {
		$listId = intval ( $listId );

		$this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
				<requesttype>subscribers</requesttype>
				<requestmethod>GetSubscribers</requestmethod>
				<details>
					<item>			
					<List>$listId</List>
					<item>
					</item>
					<Email>a</Email>
					</item>
				</details>
				</xmlrequest>
				";

		$ret = $this->callService ();

		$ret = $this->xml2array ( $ret );

		$this->postXmlData = '';

		return $ret;
	}

    public function getSubscriber($id,$listId){
        $this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
				<requesttype>subscribers</requesttype>
				<requestmethod>LoadSubscriberList</requestmethod>
				<details>
					<subscriberid>$id</subscriberid>
					<listid>$id</listid>
				</details>
				</xmlrequest>
				";


        $ret = $this->callService ();


        $ret = $this->xml2array ( $ret );

        $this->postXmlData = '';

        return $ret;
	}
    /**
     *
     * @param unknown $listId
     * @param unknown $subscriberDomain
     * @return Ambigous <mixed, unknown>
     */
    public function getContactListSubscribers($listId, $subscriberDomain='') {


        if($listId &&  intval($listId)>0){
        	$listId = intval($listId);
            $strListId = "<List>$listId</List>";
        }
        else{
            $strListId = "<List>any</List>";
		}
        if($subscriberDomain!=''){
            $subscriberDomain =  '<Email>@'.$subscriberDomain. '</Email>';
		}
        $this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
				<requesttype>subscribers</requesttype>
				<requestmethod>GetSubscribers</requestmethod>
				<details>
					<searchinfo>
						<Status>a</Status>
						$strListId
						$subscriberDomain
					</searchinfo>
				</details>
				</xmlrequest>
				";


        $ret = $this->callService ();


        $ret = $this->xml2array ( $ret );

        $this->postXmlData = '';

        return $ret;
    }
	/**
	 *
	 * @param unknown $listId
	 * @param unknown $subscriberDomain
	 * @return Ambigous <mixed, unknown>
	 */
	public function getCustomFields($listId) {
		$varray = array ();

		if (! is_array ( $listId )) {
			$listId = intval ( $listId );
			$varray [] = $listId;
		} else {
			foreach ( $listId as $key_list => $v_list ) {
				$varray [] = intval ( $v_list );
			}
		}

		$strLists = implode ( ',', $varray );

		$this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
			<requesttype>lists</requesttype>
			<requestmethod>GetCustomFields</requestmethod>
			<details>
				<listids>$strLists</listids>
			</details>
			</xmlrequest>
			";

		$ret = $this->callService ();

		$ret = $this->xml2array ( $ret );

		$this->postXmlData = '';

		return $ret;
	}

	/**
	 *
	 * @param unknown $listId
	 * @param unknown $email
	 * @param number $confirmed
	 * @param string $format
	 * @param unknown $customfields
	 * @return boolean
	 */
	public function addSubscriber($listId, $email, $confirmed = 1, $format = 'html', $customfields = array()) {
		$listId = intval ( $listId );
		$confirmed = intval ( $confirmed );

		$customfieldsData = '';
		if (! empty ( $customfields )) {
			foreach ( $customfields as $k_custom => $v_custom ) {
				if(is_array($v_custom))
				{
					$customfieldsData .= '<item><fieldid>' . $k_custom . '</fieldid>';
					foreach ( $v_custom as $k2_custom => $v2_custom ) {
						$customfieldsData .= '<value>' . $v2_custom . '</value>';
					}
					$customfieldsData .= '</item>';
				}
				else
				{
					$customfieldsData .= '<item><fieldid>' . $k_custom . '</fieldid><value>' . $v_custom . '</value></item>';
				}
			}
		}

		if ($customfieldsData != '') {
			$customfieldsData = '<customfields>' . $customfieldsData . '</customfields>';
		}

		$this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
			<requesttype>subscribers</requesttype>
			<requestmethod>AddSubscriberToList</requestmethod>
			<details>
			<emailaddress>$email</emailaddress>
			<mailinglist>$listId</mailinglist>
			<format>$format</format>
			<confirmed>$confirmed</confirmed>
			$customfieldsData
			</details>
			</xmlrequest>
			";

		$ret = $this->callService ();

		$ret = $this->xml2array ( $ret );

		$this->postXmlData = '';

		if ($ret && isset ( $ret [0] ) && intval ( $ret [0] ) > 0) {
			return true;
		}

		return false;
	}

	public function deleteSubscriber($listId, $email) {
	    $listId = intval ( $listId );

	    $this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
			<requesttype>subscribers</requesttype>
			<requestmethod>DeleteSubscriber</requestmethod>
			<details>
			<emailaddress>$email</emailaddress>
			<mailinglist>$listId</mailinglist>
			</details>
			</xmlrequest>
			";

			$ret = $this->callService ();

			$ret = $this->xml2array ( $ret );

			$this->postXmlData = '';

			if ($ret && isset ( $ret [0] ) && intval ( $ret [0] ) > 0) {
			return true;
			}

			return false;
	}

	/**
	 *
	 * @param unknown $listId
	 * @param unknown $subscriberEmail
	 * @return boolean
	 */
	public function isSubscriberInList($listId, $subscriberEmail) {
		$varray = array ();
		$xmlLists = '';

		if (! is_array ( $listId )) {
			$listId = intval ( $listId );
			$varray [] = $listId;
		} else {
			foreach ( $listId as $key_list => $v_list ) {
				$varray [] = intval ( $v_list );
			}
		}

		foreach ( $varray as $key_list => $v_list ) {
			$xmlLists = '<List>' . $v_list . '</List>';
		}

		$this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
			<requesttype>subscribers</requesttype>
			<requestmethod>IsSubscriberOnList</requestmethod>
			<details>
			<Email>$subscriberEmail</Email>
			$xmlLists
			</details>
			</xmlrequest>
			";

		$ret = $this->callService ();

		$ret = $this->xml2array ( $ret );

		$this->postXmlData = '';

		if ($ret && isset ( $ret [0] ) && intval ( $ret [0] ) > 0) {
			return true;
		}

		return false;
	}

	/**
	 *
	 * @param unknown $userName
	 * @return Ambigous <boolean, mixed, unknown>|boolean
	 */
	public function checkUser($userName) {
		$this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
		<requesttype>user</requesttype>
		<requestmethod>Find</requestmethod>
		<details>
			<username>$userName</username>
		</details>
		</xmlrequest>
		";

		$ret = $this->callService ();

		$this->postXmlData = '';

		if ($ret !== false) {

			if (! is_array ( $ret ) && ! (current ( $ret ) instanceof SimpleXMLElement)) {

				$intUser = ( integer ) $ret;

				if ($intUser > 0) {
					/**
					 * Leggo I dati utente
					 */

					$this->postXmlData = "<xmlrequest>
							<username>" . $this->xmlUser . "</username>
							<usertoken>" . $this->xmlToken . "</usertoken>
							<requesttype>user</requesttype>
							<requestmethod>mmoneload</requestmethod>
							<details>
							<userId>$intUser</userId>
							</details>
							</xmlrequest>
							";

					$ret = $this->callService ();

					if ($ret && is_object ( $ret ) && property_exists ( $ret, 'userid' ) && $ret->userid > 0) {
						$ret = $this->xml2array ( $ret );
						return $ret;
					}
				}
			}

			return false;
		} else {
			return false;
		}
	}

	/**
	 *
	 * @param unknown $structureUser
	 * @param unknown $structurePassword
	 * @param unknown $fullName
	 * @param unknown $email
	 * @return boolean
	 */
	public function createUser($structureUser, $structurePassword, $fullName, $email) {
		$this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
				<requesttype>user</requesttype>
				<requestmethod>CreateNewUser</requestmethod>
				<details>
				<trialuser>1</trialuser>
				<username>$structureUser</username>
				<password>$structurePassword</password>
				<fullname>$fullName</fullname>
				<emailaddress>$email</emailaddress>
				<usertimezone>GMT+1:00</usertimezone>
				<gettingstarted>0</gettingstarted>
				<status>1</status>
				<textfooter>Powered by MM One Group</textfooter>
				<eventactivitytype><![CDATA[Phone Call Meeting Email]]></eventactivitytype>
				<htmlfooter></htmlfooter>
				<admintype>c</admintype>
				<listadmintype>c</listadmintype>
				<segmentadmintype>c</segmentadmintype>
				<templateadmintype>c</templateadmintype>
				<usedefaultsmtp>1</usedefaultsmtp>
				<smtpserver></smtpserver>
				<smtpusername></smtpusername>
				<smtppassword></smtppassword>
				<enableactivitylog>0</enableactivitylog>
				<smtpport></smtpport>
				<usexhtml>1</usexhtml>
				<infotips>1</infotips>
				<usewysiwyg>1</usewysiwyg>
				<editownsettings>0</editownsettings>
				<unlimitedmaxemails>1</unlimitedmaxemails>
				<permonth>0</permonth>
				<perhour>0</perhour>
				<maxlists>0</maxlists>
				<xmlapi>0</xmlapi>
				<xmltoken></xmltoken>
				<googlecalendarusername></googlecalendarusername>
				<googlecalendarpassword></googlecalendarpassword>
				<user_language>it</user_language>
				<permissions>
				<forms>
				<create>1</create>
				<edit>1</edit>
				<delete>1</delete>
				</forms>
				<lists>
				<create>1</create>
				<edit>1</edit>
				<delete>1</delete>
				<bounce>1</bounce>
				<bouncesettings>1</bouncesettings>
				</lists>
				<customfields>
				<create>1</create>
				<edit>1</edit>
				<delete>1</delete>
				</customfields>
				<newsletters>
				<create>1</create>
				<edit>1</edit>
				<delete>1</delete>
				<approve>1</approve>
				<send>1</send>
				</newsletters>
				<subscribers>
				<create>1</create>
				<manage>1</manage>
				<add>1</add>
				<edit>1</edit>
				<delete>1</delete>
				<import>1</import>
				<export>1</export>
				<banned>1</banned>
				</subscribers>
				<templates>
				<create>1</create>
				<edit>1</edit>
				<delete>1</delete>
				<approve>1</approve>
				<builtin>1</builtin>
				</templates>
				<statistics>
				<newsletter>1</newsletter>
				<user>1</user>
				<autoresponder>1</autoresponder>
				<list>1</list>
				</statistics>
			</permissions>
		</details>
	</xmlrequest>
				";

		$ret = $this->callService ();

		$ret = $this->xml2array ( $ret );


		$this->postXmlData = '';

		if ($ret && isset ( $ret [0] ) && intval ( $ret [0] ) > 0) {
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 *
	 * @param unknown $structureUser
	 * @param unknown $structurePassword
	 * @param unknown $fullName
	 * @param unknown $listName
	 * @param unknown $email
	 * @return boolean
	 */
	public function createContactList($structureUser, $structurePassword, $fullName, $listName, $email) {
		$this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
		<requesttype>lists</requesttype>
		<requestmethod>MMONECreateList</requestmethod>
		<details>
		<absuser>$structureUser</absuser>
		<absuserpassword>$structurePassword</absuserpassword>
		<name>$listName</name>
		<owneremail>$email</owneremail>
		<ownername>$fullName</ownername>
		<replytoemail>$email</replytoemail>
		<companyname></companyname>
		<companyaddress></companyaddress>
		<companyphone></companyphone>
		</details>
		</xmlrequest>
				";

		$ret = $this->callService ();

		$ret = $this->xml2array ( $ret );

		$this->postXmlData = '';

		if ($ret && isset ( $ret [0] ) && intval ( $ret [0] ) > 0) {
			return  $ret [0];
		}

		return false;
	}


	public function createCustomField($structureUser, $structurePassword, $fieldName,$fieldType = self::C_TYPE_TEXT,$fieldLists=array(), $customData= array()) {

		$strLists = implode(',', $fieldLists);

		$customXML = '';

		foreach ($customData as $k_v => $v_data)
		{
			foreach ($v_data as $kx_v => $vx_data)
			{
				$customXML.= '<' . $kx_v . '>' . $vx_data . '</' . $kx_v . '>';
			}
		}

		$this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
		<requesttype>customfields</requesttype>
		<requestmethod>mmonecreatecustomfield</requestmethod>
		<details>
		<absuser>$structureUser</absuser>
		<absuserpassword>$structurePassword</absuserpassword>
		<fieldtype>$fieldType</fieldtype>
		<fieldlists>$strLists</fieldlists>
		<FieldName>$fieldName</FieldName>
		$customXML
		</details>
		</xmlrequest>
				";

		$ret = $this->callService ();

		$ret = $this->xml2array ( $ret );

		$this->postXmlData = '';

		if ($ret && isset ( $ret [0] ) && intval ( $ret [0] ) > 0) {
		return true;
		}

		return false;
	}

	/**
	 *
	 * @return boolean
	 */
	private function checkToken() {
		$this->postXmlData = "<xmlrequest>
		<username>" . $this->xmlUser . "</username>
		<usertoken>" . $this->xmlToken . "</usertoken>
		<requesttype>authentication</requesttype>
		<requestmethod>xmlapitest</requestmethod>
		<details>
		</details>
		</xmlrequest>
		";

		$ret = $this->callService ();

		$this->postXmlData = '';

		if ($ret !== false) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 *
	 * @return boolean
	 */
	private function callService() {
		unset ( $this->error );

		$this->error = array ();

        $client = new GuzzleHttp\Client(['base_uri' => $this->urlEntryPoint]);
        $file = false;


        try{

            //print_r($this->urlEntryPoint);
			 //print_r($this->postXmlData);

        $res = $client->request('POST', '',
            [
                'allow_redirects' => false,
                'headers' => [
                    'Accept-Encoding'=>'gzip',
                    'Accept'=>'application/xml',
                    'Content-Type'=>'application/xml',
                    'Expect'=>'',
                ],
                'body' => $this->postXmlData
            ]);




            if($res->getBody()){
                $file = $res->getBody()->getContents();


            }



        }
        catch (\Exception $e){


        }


		if ($file !== false) {
		    $file = utf8_encode($file);

			$xml_doc = simplexml_load_string ( $file );

			if ($xml_doc->status == 'SUCCESS') {
				return $xml_doc->data;
			} else {

				if (is_array ( $xml_doc->errormessage )) {
					foreach ( $xml_doc->errormessage as $child ) {
						$this->error [] = trim ( ( string ) $child );
					}
				} else {
					$this->error [] = trim ( ( string ) $xml_doc->errormessage );
				}
			}
		}


		return false;
	}

	/**
	 *
	 * @return multitype:
	 */
	public function getLastError() {
		return $this->error;
	}

	/**
	 *
	 * @param unknown $xmlObject
	 * @param unknown $out
	 * @return Ambigous <mixed, unknown>
	 */
	private function xml2array($xmlObject, $out = array ()) {
		foreach ( ( array ) $xmlObject as $index => $node ) {
			$out [$index] = (is_object ( $node ) || is_array ( $node )) ? $this->xml2array ( $node ) : $node;
			if (isset( $out [$index]) && !is_array( $out [$index]) && strlen ( $out [$index] ) > 12 && substr ( $out [$index], 0, 13 ) == '(serialized)#') {
				$out [$index] = unserialize ( substr ( $out [$index], 13 ) );
			}
		}
		return $out;
	}
}
?>
