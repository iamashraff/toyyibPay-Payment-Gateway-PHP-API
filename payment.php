<?php

$invoiceid = $_GET['invoiceid'];
$price = $_GET['price'];

$billTo = 'Ashraff';
$billEmail = 'admin@ashraff.me';
$billPhone = '0123456789';

$rmx100 = ($price * 100);
$some_data = array(
    'userSecretKey' => '{YOUR_USER_SECRET_KEY}',
    'categoryCode' => '{YOUR_CATEGORY_CODE}',
    'billName' => 'Fee Payment',
    'billDescription' => 'Payment for Invoice#' . $invoiceid . ' RM' . $price,
    'billPriceSetting' => 1,
    'billPayorInfo' => 1,
    'billAmount' => $rmx100,
    'billReturnUrl' => 'http://192.168.1.108/toyyibPay/validate.php?invoiceid=' . $invoiceid,
    'billCallbackUrl' => '',
    'billExternalReferenceNo' => '',
    'billTo' => $billTo,
    'billEmail' => $billEmail,
    'billPhone' => $billPhone,
    'billSplitPayment' => 0,
    'billSplitPaymentArgs' => '',
    'billPaymentChannel' => 0,
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

$result = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);
$obj = json_decode($result);

$jsonStr = $result;
$data = json_decode($jsonStr, true);
$billCode = $data[0]['BillCode'];

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Redirect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top:30px;">

        <div class="card text-center">
            <div class="card-body">
                <img src="src/logo.png" width="203" height="37">
                <p style="margin-top:20px;">Redirecting to payment gateway...</p>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>

<script type="text/javascript">
    //redirect to payment gateway
    setTimeout(function () {
        window.location.href = "https://toyyibpay.com/<?php echo $billCode; ?>";
    }, 2000); 
</script>