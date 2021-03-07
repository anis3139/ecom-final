<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

    <div>
        <center>
            <h2>{{config('app.name', 'Laravel') }}</h2>
        </center>
    </div>
    <div>
        <h2>Order Details</h2>
        <table border="1" cellpadding="10px" style="width: 100%">
            <tr>
                <td>Order ID:</td>
                <td id="id">{{ $QuickOrder->id }}</td>
            </tr>

            <tr>
                <td>Customer Name:</td>
                <td id="customer_name">{{ $QuickOrder->customer_name }}</td>
            </tr>
            <tr>
                <td>Customer Phone no:</td>
                <td id="customer_phone_number">{{ $QuickOrder->customer_phone_number }}</td>
            </tr>
         
           

            

            <tr>
                <td>Product Title:</td>
                <td id="payment_details"> {{ $QuickOrder->product_title }}</td>
            </tr>
            <tr>
                <td>Product Size:</td>
                <td id="payment_details"> {{ $QuickOrder->maserment }}</td>
            </tr>
            <tr>
                <td>Product Color:</td>
                <td id="payment_details"> <p style="text-align:center; border-radius:50%; width:30px; height:30px; background-color:{{ $QuickOrder->color }}"></p></td>
            </tr>
            <tr>
                <td>Product Quantity:</td>
                <td id="payment_details"> {{ $QuickOrder->quantity }}</td>
            </tr>
            <tr>
                <td>Price:</td>
                <td id="discount_amount"> {{ $QuickOrder->product_price }}</td>
            </tr>


        </table>

    </div>

    
    <center>
        <div>
            <h2>Thanks for choosing us</h2>
        </div>
    </center>

</body>

</html>
