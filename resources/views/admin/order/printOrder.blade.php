<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
    <title>{!! nl2br(e($setting->site_name)) ?? ' ' !!}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        /* Base CSS styles DO NOT CHANGE OR REMOVE */
        body {
            margin: 0;
            padding: 0;
            font: 62.5%/1.5 Helvetica, Arial, Verdana, sans-serif;
        }

        ul,
        ul li,
        p,
        div,
        ol {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        #invoice {
            margin: 0 12pt;
            width: 660px;
            padding: 10px 20px;
            margin: 1em auto;
            clear: both;
            position: relative;
            overflow: hidden;
            background: #fff
        }


        #invoice.cancelled {
            background: #fff url(/images/cancelled.gif) top left
        }

        /*Invoice Simple TemplateCreated by Ed Molyneux*/
        /*=========================== TYPOGRAPHY =========================*/
        #invoice {
            font-family: Helvetica, Arial, Verdana, sans-serif !important
        }

        #invoice h2 {
            margin: 10px 0;
            font-size: 14pt;
        }

        #invoice-amount td,
        th {
            font-size: 9pt;
        }

        #invoice-header #company-address {
            text-align: right;
            font-size: 11pt;
            line-height: 14pt;
        }

        #invoice #client-details,
        #invoice-info p,
        #invoice #invoice-other,
        #invoice #payment-details {
            font-size: 9pt;
            line-height: 12pt;
        }

        #invoice-info h2,
        #invoice-info h3 {
            margin: 0;
            font-weight: normal;
        }

        #invoice-info h2 {
            text-transform: uppercase
        }

        #invoice-info h3 {
            font-size: 12pt;
        }

        #comments {
            font-weight: bold;
            margin-top: 15px;
            font-size: 10pt
        }

        /*=========================== LAYOUT =========================*/
        #invoice {
            padding: 0 1cm 1cm 1cm;
        }

        #invoice-header .logo {
            float: left;
        }

        #invoice-header {
            margin-top: 0.3cm;
            border-bottom: 4px solid #000;
            padding-bottom: 10px;
            overflow: hidden
        }

        #invoice-info {
            margin: 0.7cm 0 20px 0;
            width: 250px;
            float: right;
            text-align: right
        }

        #client-details {
            margin: 0.7cm 0 20px 2.5cm;
            float: left;
            width: 250px
        }

        /* Positioned to appear in a standard envelope window when printed */
        #invoice-other {
            text-align: right;
            float: right;
            width: 250px;
        }

        #invoice #payment-details {
            float: left;
            width: 250px;
        }

        #invoice-amount {
            margin: 1em 0;
            clear: both;
        }

        #comments {
            clear: both;
            padding-top: 0.5cm
        }

        /*=========================== TABLES =========================*/
        #invoice table#invoice-amount {
            border-collapse: collapse;
            width: 100%;
            clear: both;
        }

        #invoice-amount th {
            text-align: left;
            white-space: nowrap;
            padding: 1px 2px 0 5px;
            font-weight: bold;
            background: #FFF;
            border-bottom: solid 1px #444;
        }

        #invoice-amount td.item_r {
            text-align: right;
        }

        #invoice-amount td.total {
            text-align: right;
            font-weight: bold
        }

        #invoice-amount .index_th {
            width: 5%
        }

        #invoice-amount .details_th {
            width: 54%
        }

        #invoice-amount .details_notax_th {
            width: 62%
        }

        #invoice-amount .quantity_th {
            width: 13%
        }

        #invoice-amount .subtotal_th {
            width: 15%;
            text-align: right
        }

        #invoice-amount .unitprice_th {
            width: 10%;
            text-align: right
        }

        #image {
            width: 150px;
            height: auto;
            border-radius: 20px;
        }

    </style>
</head>

<body>
    <div id="invoice">

        <div id="invoice-header">
            @php
                $logoPath = explode('/', $setting->logo);
                $logo = end($logoPath);
                $logoUrl = public_path('storage') . '/' . $logo;
                
            @endphp
            <img id="image" src="{{ $logoUrl ?? ' ' }}" alt="{!! nl2br(e($setting->site_name)) ?? ' ' !!}" class="logo screen" />

            <div class="vcard" id="company-address">
                <div class="fn org">
                    <h2>{!! nl2br(e($setting->site_name)) ?? ' ' !!}</h2>
                </div>
                <div class="adr">
                    <!-- street-address -->
                    <div class="locality">{!! nl2br(e($setting->address)) ?? ' ' !!}</div>
                </div>
                <div class="email">{!! nl2br(e($setting->email)) ?? ' ' !!}</div>
                <div class="email">{!! nl2br(e($setting->phone)) ?? ' ' !!}</div>
                <div class="email">Invoice Date: {!! date('j F, Y') !!}</div>

            </div>
        </div>


        <div>
            <center>
                <h2>Order Details</h2>
            </center>
            <table border="1" cellpadding="10px" style="width: 100%">
                <tr>
                    <td>Order ID:</td>
                    <td id="id">{{ $orders->order_id }}</td>
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
                    <td>Price Without Discount:</td>
                    <td id="discount_amount"> {{ $orders->price_without_discount }}</td>
                </tr>

                <tr>
                    <td>Discount Amount:</td>
                    <td id="discount_amount"> {{ $orders->discount_amount }}</td>
                </tr>

                <tr>
                    <td>Total Amount:</td>
                    <td id="total_amount">{{ $orders->total_amount }} </td>
                </tr>
                <tr>
                    <td>Total Tax:</td>
                    <td id="total_tax"> {{ $orders->total_tax }}</td>
                </tr>
                <tr>
                    <td>Delivery Charge:</td>
                    <td id="total_delivery_charge"> {{ $orders->total_delivery_charge }}</td>
                </tr>
                <tr>
                    <td>Paid Amount:</td>
                    <td id="paid_amount"> {{ $orders->paid_amount }}</td>
                </tr>

                <tr>
                    <td>Payment Details:</td>
                    <td id="payment_details"> {{ $orders->payment_details }}</td>
                </tr>

                <tr>
                    <td>Order Issued Date:</td>
                    <td id="payment_details"> {{ date('j F, Y', strtotime($orders->created_at)) }}</td>
                </tr>
            </table>

        </div>

        <div class="col-md-6 text-center">
            <h2>Ordered Product Details (After Discount)</h2>
            <table class="table table-bordered" border="2" cellpadding="10px">
                <thead>
                    <tr>
                        <th style="text-align: center;">Product Id</th>
                        <th style="text-align: center;">Product Name</th>
                        <th style="text-align: center;">Product Color</th>
                        <th style="text-align: center;">Product Maserment</th>
                        <th style="text-align: center;">Product Quantity</th>
                        <th style="text-align: center;">Product Unit Price</th>
                    </tr>

                </thead>
                <tbody class="OrdersView">
                    @foreach ($orders->OrderProduct as $Product)
                        @if ($Product->product)
                            <tr>

                                <td style="text-align: center;">{{ $Product->product->product_id }}</td>
                                <td style="text-align: center;">{{ $Product->product->name }}</td>
                                <td style="text-align: center;">
                                    @if ($Product->color)
                                        <div>
                                            <p>{{ $Product->color }}</p>
                                        </div>

                                    @else
                                        {{ 'N/A' }}
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($Product->maserment)
                                        {{ $Product->maserment }}
                                    @else
                                        {{ 'N/A' }}
                                    @endif
                                </td>
                                <td style="text-align: center;">{{ $Product->quantity }}</td>
                                <td style="text-align: center;">{{ $Product->product->product_selling_price }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td style="text-align: center;" colspan="5">Total Tax</td>
                        <td style="text-align: center;"> {{ $orders->total_tax }}</td>
                    </tr>

                    <tr>
                        <td style="text-align: center;" colspan="5">Delivery Charge</td>
                        <td style="text-align: center;">{{ $orders->total_delivery_charge }} </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="5">
                            <center>Total Price</center>
                        </td>
                        <td style="text-align: center;"> {{ $orders->paid_amount }}</td>
                    </tr>

                </tfoot>
            </table>

        </div>


        <!-- 
        <div id="invoice-other" style="margin-top: 50px;">
            <h2>Other Information</h2>
            <img
                src="data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAFAAhwMBIgACEQEDEQH/xAAbAAEAAwEBAQEAAAAAAAAAAAAAAwQFAQIGB//EADYQAAICAgADBQQIBgMAAAAAAAECAAMEEQUSIRMxQVFhInGBkRQVIzJSobGyBkJTYpLBcoKi/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AP3GIiAiIgJxiFGyQB5mdmHfa/FeL1YlevoON9ref6rg6VfcGBPvTXvDciIgIiICIiAiIgIiICIiAiIgJ4uuqoray6xK61GyztoD4ylZm25DtTw5UcqeV7361ofLp94+g+JHdIMnGqxFS60Nm5rty09se9z+EdygAEkgdwPfAizOM15G8fA7ewAbvuprOq09GOhs66EHp3+W7P8AD4qs4euVSAq5HtqoGuRR0VdeGlABHnuVuIBcDhvYuTbZkMWvOutvTbdPXQQDw5gJp8OobGwqabCDYF3YR3Fz1Y/MmBZlLi+enDcCzIdS7DpXWO92Pcol2fKZeU3EeKG6nlcUWnHwlbqr3ge3YR+FOvy+Ya/8P41mNhuMm/tsuyw2ZB5t8rkD2fQAco1NSVeH4tWFQMetuZh7bsx9p2J6sfUnctQEREBERAREQEREBM1mfiblKmKYSkq9i9DcfEKfBfM+Ph5yXiC23tVipzrXbs22L4KNeyD4E717ty3Wi1oqVqFRRpVUaAEDlVaVVrXUqoijSqo0APICV1xnPEHyrmBCoEpQfyjvYn1J18FHmZbkWVcMfGtuYbFaFteeh3QMXOGRlcVS2nHN1dLFF2QF5xo7Y+WyD08axJMO7iOCl6ZWJl5jdq79srV6Kk7AVS2wNa6fr3nTwKTj4ldbkF9bc+bHqx+ZMsQMPi3GN4LDhTG65wu7Kl5+xViBzEDvPXYXx15AzOxeCIBmZgwU+k1VLRQmutegD37HMdEbO+pBG9T6pK0rBFahQTs8o1sz3AweFrj8NqavhvCsyx3622NWK2sbzYuRv4dB4S9z8Vt6LRi44/E9jWEf9QB+6aEQM/6Dl2aN/E7/AFWlEQH5gn84+p8c/fuzn9+baPyDamhEDP8AqbD3tfpK/wDDLtX9Gj6nxh1S7NQ+mbb/ALaaEQM76vyUO6eKZQ8ltWt1/bzfnOizidA+1poyl8TQezb/ABYkf+poRAhxsivJrL1k9DplYEFT5EHunZJqdgIiICUs/wC1uxcX+pZzsP7U6/u5B8ZdlHHPbcTyrf5aQtK+h1zt8+ZP8YF6IiAiIgIiICIiAiIgIiICIiAiIgcJAGz0Ep8HBOBXafvXlrjv+8lgPgCB8JJxGq2/h+TTjsEusqZEY9wYggGT1oERUUaCgACB6iIgIiICIiAiIgIiICIiAiIgf//Z" />
        </div>

       
        <div id="payment-details">
            <h2>Payment Details</h2>
            <div id="bank_name">Bank Name</div>
            <div id="sort-code"><strong>Bank/Sort Code:</strong> 32-75-97</div>
            <div id="account-number"><strong>Account Number:</strong> 28270761</div>
            <div id="iban"><strong>IBAN:</strong> 973547</div>
            <div id="bic"><strong>BIC:</strong> 220197</div>
            <div id="payment-reference"><strong>Payment Reference:</strong> INV {{ 'InvoiceNum' }}</div>
        </div>

     
        <div id="comments">Payment should be made by bank transfer or cheque made payable to John Smith.</div>
       -->
        
        <center>
            <div style="margin-top: 50px;">
                <h2>Thanks for choosing us</h2>
            </div>
        </center>
        <!-- comments -->

    </div>
</body>

</html>
