<?php

$billCode = $_GET['billcode'];
$invoiceid = $_GET['invoiceid'];
$some_data = array(
    'billCode' => $billCode,
    'billpaymentStatus' => '1'
);

$curl = curl_init();

curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/getBillTransactions');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

$result = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);


$jsonStr = $result;
// Convert the JSON string to a PHP array
$data = json_decode($jsonStr, true);

if (isset($data[0]) && isset($data[0]['billpaymentStatus'])) {
    // Get the value of "billpaymentStatus"
    $billpaymentStatus = $data[0]['billpaymentStatus'];

} else {
    // Handle the exception here
    $billpaymentStatus = 0;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top:30px;">

        <div class="card text-center">
            <div class="card-body">
                <?php

                if ($billpaymentStatus == 0) {
                    echo '<label class="text-danger">Payment Failed</label>';
                    //Payment failed
                    //DO SOMETHING HERE
                    //E.G. UPDATE PAYMENT STATUS TO FAILED TO DATABASE
                } else {
                    echo '<label class="text-success">Payment Success</label>';
                    //Payment success
                    //DO SOMETHING HERE
                    //E.G. UPDATE PAYMENT STATUS TO SUCCESS TO DATABASE
                }

                ?>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>