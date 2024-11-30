<?php
class momoModel
{
    public $conn;
    function __construct()
    {
        $this->conn = connectDB();
    }
    function insertMomo($partnerCode, $orderId, $requestId, $amount, $orderInfo, $orderType, $transId, $resultCode, $message, $payType, $responseTime, $extraData, $signature)
{
    // SQL để chèn dữ liệu vào bảng payment_records
    $sql = "INSERT INTO momo (
                partnerCode, orderId, requestId, amount, orderInfo, orderType, transId, resultCode, message, payType, responseTime, extraData, signature, created_at
            ) VALUES (
                :partnerCode, :orderId, :requestId, :amount, :orderInfo, :orderType, :transId, :resultCode, :message, :payType, :responseTime, :extraData, :signature, NOW()
            )";

    // Chuẩn bị câu lệnh SQL
    $stmt = $this->conn->prepare($sql);

    // Thực thi câu lệnh với các tham số
    $stmt->execute([
        'partnerCode' => $partnerCode,
        'orderId' => $orderId,
        'requestId' => $requestId,
        'amount' => $amount,
        'orderInfo' => $orderInfo,
        'orderType' => $orderType,
        'transId' => $transId,
        'resultCode' => $resultCode,
        'message' => $message,
        'payType' => $payType,
        'responseTime' => $responseTime,
        'extraData' => $extraData,
        'signature' => $signature
    ]);

    // Lấy ID của đơn hàng vừa tạo và trả về
    $paymentRecordId = $this->conn->lastInsertId();  // Lấy ID của bản ghi mới vừa thêm vào bảng payment_records

    return $paymentRecordId; // Trả về ID của bản ghi payment_record vừa tạo
}

    }


?>