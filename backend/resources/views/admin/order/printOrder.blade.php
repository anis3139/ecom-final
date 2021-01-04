<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

    <div>
        <center>
            <h2>Asulsis</h2>
        </center>
    </div>
    <div>
        <h2>Order Details</h2>
        <table border="1" cellpadding="10px" style="width: 100%">
            <tr>
                <td>Order ID:</td>
                <td id="id">{{ $orders->id }}</td>
            </tr>

            <tr>
                <td>Customer Name:</td>
                <td id="customer_name">{{ $orders->customer_name }}</td>
            </tr>
            <tr>
                <td>Customer Phone no:</td>
                <td id="customer_phone_number">{{ $orders->customer_phone_number }}</td>
            </tr>
            <tr>
                <td>Shipping Address:</td>
                <td id="address">{{ $orders->address }}</td>
            </tr>
            <tr>
                <td>Shipping City:</td>
                <td id="city">{{ $orders->city }}</td>
            </tr>
            <tr>
                <td>Shipping District:</td>
                <td id="district">{{ $orders->district }}</td>
            </tr>

            <tr>
                <td>Shipping Country:</td>
                <td id="country">{{ $orders->country }}</td>
            </tr>
            <tr>
                <td>postal Code:</td>
                <td id="country">{{ $orders->postal_code }}</td>
            </tr>

            <tr>
                <td>Total Amount:</td>
                <td id="total_amount">{{ $orders->total_amount }} </td>
            </tr>
            <tr>
                <td>Discount Amount:</td>
                <td id="discount_amount"> {{ $orders->discount_amount }}</td>
            </tr>
            <tr>
                <td>Paid Amount:</td>
                <td id="paid_amount"> {{ $orders->paid_amount }}</td>
            </tr>

            <tr>
                <td>Payment Details:</td>
                <td id="payment_details"> {{ $orders->payment_details }}</td>
            </tr>


        </table>

    </div>

    <div class="col-md-6 text-center">
        <h2>Ordered Product Details</h2>
        <table class="table table-bordered" border="2" cellpadding="10px">
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Unit Price</th>
                </tr>

            </thead>
            <tbody class="OrdersView">
                @foreach ($orders->orderProducts as $Product)
                    <tr>

                        <td>{{ $Product->product->id }}</td>
                        <td>{{ $Product->product->product_title }}</td>
                        <td>{{ $Product->product->product_quantity }}</td>
                        <td>{{ $Product->product->product_selling_price }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><center>Total Price</center></td>
                    <td> {{ $orders->paid_amount }}</td>
                </tr>

            </tfoot>
        </table>

    </div>
    <center>
        <div>
            <h2>Thanks for choosing us</h2>
        </div>
    </center>

</body>

</html>
