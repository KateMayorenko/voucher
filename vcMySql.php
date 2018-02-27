<?php
header('Content-Type: text/html; charset=utf-8');
class Sql{
	static private $table_prefix;
	static private $client;
	static private $voucher;
	static private $offer;

// sql to create table
function __construct()
	{
		self::$table_prefix='vc_';//префикс таблиц
		self::$client=self::$table_prefix.'client';
		self::$voucher=self::$table_prefix.'voucher';
		self::$offer=self::$table_prefix.'offer';
		
		$this->createTables();
	}
	
	protected function mapsTables($table=false,$field=false)
	{
		$arFields=array(
			self::client=>array(
				"clientId",
				"clientName",
				"clientEmail",
				"voucherCode",
				"dateOfUsage"
			),
			self::voucher=>array(
				"voucherId" ,
				"voucherCode" ,
				"expDate",
				"offerName" ,
				"isUsed" ,
				"dateOfUsage",
				"clientId"
			),
			self::offer=>array(
				"offerId" ,
				"offerName",
				"voucherCode" ,
				"discount"
			)
		);
		
		if($table!==false&&$field===false)
		{
			return $arFields[$table];
		}
		else if($table!==false&&$field!==false)
		{
			if(in_array($field,$arFields[$table]))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		return $arFields;
	}

	public function createTables(){

    $conn = mysqli_connect('localhost', 'admin', '123','voucher');

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
		
		$client_table=" 
			CREATE TABLE IF NOT EXISTS `".self::$client."`  (
			  `clientId` int(12) NOT NULL AUTO_INCREMENT,
			  `clientName` varchar(100) DEFAULT NULL,
			  `clientEmail` varchar(100) DEFAULT NULL,
			  `voucherCode` varchar(10) DEFAULT NULL,
			  `dateOfUsage` varchar(20) DEFAULT NULL,
			  PRIMARY KEY (`clientId`),
			  KEY `clientId` (`clientId`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
			";
			
		$voucher_table=" 
			CREATE TABLE IF NOT EXISTS `".self::$voucher."`  (
			  `voucherId` int(12) NOT NULL AUTO_INCREMENT,
			  `voucherCode` varchar(10) DEFAULT NULL,
			  `expDate` varchar(50) DEFAULT NULL,
			  `offerName` varchar(50) DEFAULT NULL,
			  `isUsed` int(1) DEFAULT NULL,
			  `dateOfUsage` varchar(20) DEFAULT NULL,
			  `clientId` varchar(50) DEFAULT NULL,
			  PRIMARY KEY (`voucherId`),
			  KEY `voucherId` (`voucherId`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
			";
			
		$offer_table=" 
			CREATE TABLE IF NOT EXISTS `".self::$offer."`  (
			  `offerId` int(12) NOT NULL AUTO_INCREMENT,
			  `offerName` varchar(50) DEFAULT NULL,
			  `voucherCode` varchar(10) DEFAULT NULL,
			  `discount` varchar(7) DEFAULT NULL,
			  PRIMARY KEY (`offerId`),
			  KEY `offerId` (`offerId`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
			";
			
			$conn->query($client_table);
				
			$conn->query($voucher_table);
				
			$conn->query($offer_table);

	if (mysqli_query($conn, $client_table)) 
	{
		//echo "Table Client created successfully";
	}
		elseif (mysqli_query($conn, $voucher_table))
		{
		//	echo "Table Voucher created successfully";
		}
		elseif (mysqli_query($conn, $offer_table))
		{
		//	echo "Table Offer created successfully";
		}
	else {
	    //echo "Tables already exist: " . mysqli_error($conn);
	}

		mysqli_close($conn);
	}

/*	protected function addOfferInfo($Params)
	{
        $conn = mysqli_connect('localhost', 'admin', '123','voucher');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $Params=array(
            "offerName"         =>'"'.$Params['offerName'].'"',
            "discount"          =>'"'.$Params['discount'].'"'
        );
		
		$str="INSERT INTO vc_offer (offerName, discount)
			VALUES (".implode(",", $Params).") " ;
		
		$res=$conn->query($str);

		mysqli_close($conn);
		
	}
	
	protected function addVoucherInfo($Params)
	{
        $conn = mysqli_connect('localhost', 'admin', '123','voucher');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $Params=array(
            "expDate"            =>'"'.$Params['expDate'].'"',
            "offerName"          =>'"'.$Params['offerName'].'"'
        );
		$str="INSERT INTO vc_voucher (offerName, expDate)
			VALUES (".implode(",", $Params).") " ;
			
			$res=$conn->query($str);


	mysqli_close($conn);
	}

	public function addClientInfo($Params)
	{
        $conn = mysqli_connect('localhost', 'admin', '123','voucher');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $Params=array(
            "clientName"         =>'"'.$Params['clientName'].'"',
            "clientEmail"        =>'"'.$Params['clientEmail'].'"',
            "voucherCode"        =>'"'.$Params['voucherCode'].'"',
        );

		$str="INSERT INTO vc_client (clientName, clientEmail,voucherCode)
			VALUES (".implode(",", $Params).") " ;

		$res=$conn->query($str);

	mysqli_close($conn);
	
		
	}*/
	

	
}	


