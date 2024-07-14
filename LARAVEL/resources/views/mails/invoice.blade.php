<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .order-details {
            margin: 20px 0;
        }
        .order-details h2 {
            margin: 0 0 10px 0;
        }
        .order-details p {
            margin: 5px 0;
        }
        .products {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .products th, .products td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .products th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
            padding: 10px 0;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f4f4f4;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://logoart.vn/upload/images/customer/logo-ngoc-hai-transport_logo_1318474270.jpg" width="50px" alt="Company Logo">
        </div>
        <div class="order-details">
            <h2>Thông tin đơn hàng</h2>
            <p>Tên khách hàng: {{ $Customer->name }}</p>
            <p>Địa chỉ giao hàng: {{ $Customer->address }} ,  {{ $Customer->district }} ,  {{ $Customer->conscious }},  {{ $Customer->country }}</p>
            <p>Ngày đặt hàng: {{ $Invoice->invoice_date }}</p>
            <p>Mã đơn hàng: {{ $Invoice->invoice_number }}</p>
        </div>
        <table class="products">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($Cart as $item)
                 <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price,0,',','.') }} VNĐ</td>
                    <td>{{ number_format( $item->total,0,',','.') }} VNĐ</td>
                </tr>
                 @endforeach

            </tbody>
        </table>
        <div class="total">
            <p>Tổng cộng: {{ number_format($dataTotal,0,',','.') }} VND</p>
            @if($Invoice->grand_total - $dataTotal === 50000)
            <p>Phí vận chuyển: 50.000 VNĐ</p>
            @else
            <p>Phí vận chuyển: 0 VND</p>
            @endif
            <p><strong>Tổng thanh toán:{{ number_format($Invoice->grand_total,0,',','.') }} VNĐ</strong></p>
        </div>
        <div class="footer">
            <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</p>
        </div>
    </div>
</body>
</html>
