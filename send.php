<?

if (isset($_COOKIE['password']))
{
    $pass=$_COOKIE['password'];

}else
{
    $pass = "unknown";
}
/*ADD VOUCHER(CLIENT) FORM*/
    if (isset($_POST['clientName']) && isset($_POST['clientEmail'])) {

        $conn = mysqli_connect('localhost', 'admin', '123','voucher');

            $clientName =  $_POST['clientName'];
            $clientEmail =  $_POST['clientEmail'];
            $date = date('Y-m-d');


        /*ADD AS FUNCTIONS*/
       $str="INSERT INTO vc_client(clientName, clientEmail, voucherCode, dateOfUsage)".
                        "VALUES('$clientName','$clientEmail','$pass','$date')";

       $str3="INSERT INTO vc_voucher (voucherCode)".
            "VALUES('$pass')";


        $res= mysqli_query($conn,$str);

        $res= mysqli_query($conn,$str3);

        mysqli_close($conn);

      /*  $Params=array(
            "clientName"         =>$_POST['clientName'],
            "clientEmail"        =>$_POST['clientEmail'],
            "voucherCode"        =>$_POST['voucherCode']
        );*/

        //  $ob->AddClients($Params);


   }

    /*SETTINGS(OFFER) FORM*/
  elseif (isset($_POST['offerName']) && isset($_POST['discount']) && $_POST['expDate']) {

        $conn = mysqli_connect('localhost', 'admin', '123','voucher');


            $offerName = $_POST['offerName'];
            $expDate   = $_POST['expDate'];
            $discount  = $_POST['discount'];

        /*ADD AS FUNCTIONS*/
        $str="INSERT INTO vc_offer (offerName, discount)".
			   "VALUES('$offerName','$discount')";

        $str2="INSERT INTO vc_voucher (offerName, expDate, voucherCode)".
			   "VALUES('$offerName','$expDate','$pass')";


        $res=$conn->query($str);

        $res=$conn->query($str2);

        $lastId=$con->LastID();
            if($lastId==0)
        {
              $lastId=1;
        }
      return $lastId;

        mysqli_close($conn);
     /*   $Params = array(
            "offerName" => $_POST['offerName'],
            "expDate" => $_POST['expDate'],
            "discount" => $_POST['discount']
        );

        $ob->AddOffers($Params);
        $ob->AddVouchers($Params);*/


    }
?>
