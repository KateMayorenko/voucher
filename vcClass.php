<?
 function my_log($string){
			$log_file_name = $_SERVER['DOCUMENT_ROOT']."/my_log.txt";
			$now = date("Y-m-d H:i:s");
			file_put_contents($log_file_name, $now." SQL: ".$string."\r\n", FILE_APPEND);
			
		}

include 'vcMySql.php';

class vcFunctions extends Sql
{
	
    public function CreatedTables()
		{
			$this->createTables();
			
		}


  /*  public function AddOffers($Params)
		{
		    $Params=array(
			 	"offerName"           =>'"'.$Params['offerName'].'"',
			 	"discount"            =>'"'.$Params['discount'].'"'
				);

				$res = $this->addOfferInfo($Params);
				
				return $res;
        }


    public function AddVouchers($Params)
		{
			    $Params=array(
			 	"expDate"            =>'"'.$Params['expDate'].'"',
				"offerName"          =>'"'.$Params['offerName'].'"'
				);

				$res = $this->addVoucherInfo($Params);
				
				return $res;
     	}


    public function AddClients($Params)
		{


            $Params=array(
			 	"clientName"         =>'"'.$Params['clientName'].'"',
			 	"clientEmail"        =>'"'.$Params['clientEmail'].'"'
            );
            $res = $this->addClientInfo($Params);

            return $res;

     	}*/
		
	
		
}
