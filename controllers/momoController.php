<?php
require_once "models/momo.php";

class MomoController
{
    public $momoModel;

    function __construct()
    {
        $this->momoModel = new momoModel(); // Khởi tạo model
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        // Execute POST request
        $result = curl_exec($ch);
        // Close connection
        curl_close($ch);
        return $result;
    }

    function paypalMomo()
    {
        $subtotal = 0;
        $total = 0;
        foreach ($_SESSION['carts'] as $product_id => $value) {
            $subtotal = $value['price'] * $value['qty'];
            $total += $subtotal;
        }
        if (isset($_POST['payUrl'])) {
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            $orderInfo = "Thanh toán qua MoMo";
            $amount = $total;
            $orderId = time() . "";
            $redirectUrl = "http://localhost/duAn1/views/notimomo.php";
            $ipnUrl = "http://localhost/duAn1/views/notimomo.php";
            $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM";
            $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");

            // Create the rawHash and signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );

            // Gửi yêu cầu tới MoMo API
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);

            // Sau khi thanh toán thành công, lưu thông tin vào cơ sở dữ liệu
            $paymentRecordId = $this->momoModel->insertMomo(
                $partnerCode,
                $orderId,
                $requestId,
                $amount,
                $orderInfo,
                'momo_wallet', // Order type (loại đơn hàng)
                $jsonResult['transId'],  // Transaction ID trả về từ MoMo
                0,  // Mã kết quả (0 là thành công)
                'Successful', // Thông báo (thành công)
                'napas',  // Phương thức thanh toán (ví dụ: napas)
                time(),  // Thời gian phản hồi
                $extraData,  // Dữ liệu bổ sung
                $signature  // Chữ ký
            );

            // Chuyển hướng đến trang thanh toán MoMo
            header('Location: ' . $jsonResult['payUrl']);
        }
    }
}
