
# toyyibPay Payment Gateway PHP API
<img src="https://raw.githubusercontent.com/iamashraff/toyyibPay-Payment-Gateway-PHP-API/main/src/logo.png?token=GHSAT0AAAAAACCT7OIGBS4YKXVAJ3HEVAXIZDA24KA" width=150>
<br>

**Step 1**: Register & verify toyyibPay account here;
https://toyyibpay.com/access/registration
<br><br>
**Step 2**: Login to account here;
https://toyyibpay.com/access/login
<br><br>
**Step 3**: Go to Category > Add New Category.
Input Category Name & Description and click Submit button.<br>
Go back to Category & copy Category Code<br>
<br><br>
**Step 4**: Go to Dashboard<br>
Scroll to bottom and copy your Secret Key
<br><br>
**Step 5**: Open file `payment.php`.<br>
Scroll to line 12: `'userSecretKey' => '{YOUR_USER_SECRET_KEY}'` and replace `{YOUR_USER_SECRET_KEY}` with your User Secret Key (Refer step 4).<br>
Then, go to line 13: `'categoryCode' => '{YOUR_CATEGORY_CODE}'` and replace `{YOUR_CATEGORY_CODE}` with your Category Code (Refer step 3).
<br><br>
**Step 6**: Scroll to line 19: `'billReturnUrl' => 'http://192.168.1.108/toyyibPay/validate.php?invoiceid='  .  $invoiceid`.<br>
Replace `192.168.1.108` with your local IP address if you are running on XAMPP or with your server IP address / domain name.

> Attention: Replacing the IP address with `localhost` will not work !

<br>

**Step7 (Optional) **:  Line 22-24 can be referred to variables declared in line 6,7, and 8.<br>

>     $billTo = 'Ashraff';
>     $billEmail = 'admin@ashraff.me';
>     $billPhone = '0123456789';

You may hardcode the following variables or replace with `GET` or `POST` methods.
<br><br>
**Step 8**: Upload `payment.php` and `validate.php` files to your local or cloud web server.
<br><br>
**Step 9**: Open the `payment.php` via web browser and pass the parameter of `invoiceid` & `price` to the URL.
Your URL should look similar like this `http://{URL}/payment.php?invoiceid=1&price=10.00`
Alternatively, you can fetch the value of `invoiceid` and `price` from your database and directly pass to the URL.
<br><br>
**Step 10**: Either if the payment is success or failed, it will redirect to page `'validate.php'`. This page will validate the payment status. You may refer to line 54 to handle any additional functionalities such as update the payment status to the database.
<br><br>
**Step 11**: Integrate the payment gateway with your existing software application.<br><br>
That's all. Thank you :)
