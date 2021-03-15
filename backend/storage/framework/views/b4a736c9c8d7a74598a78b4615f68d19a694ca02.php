<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <h2>Order Details</h2>
            <table class="table table-bordered">
                <tr>
                    <td style="max-width:200px !important;">Order ID</td>
                    <td id="id"></td>
                </tr>
                <tr>
                    <td style="max-width:200px !important;">User Id </td>
                    <td id="user_id"> </td>
                </tr>
                <tr>
                    <td style="max-width:200px !important;">User Name </td>
                    <td id="user_Name"> </td>
                </tr>
                <tr>
                    <td style="max-width:200px !important;">Customer Name</td>
                    <td id="customer_name"></td>
                </tr>
                <tr>
                    <td style="max-width:200px !important;">Customer Phone no</td>
                    <td id="customer_phone_number"></td>
                </tr>
                <tr>
                    <td style="max-width:200px !important;">Shipping Address</td>
                    <td id="address"></td>
                </tr>
                <tr>
                    <td style="max-width:200px !important;">Shipping City</td>
                    <td id="city"></td>
                </tr>
                <tr>
                    <td style="max-width:200px !important;">Shipping District</td>
                    <td id="district"></td>
                </tr>

                <tr>
                    <td style="max-width:200px !important;">Shipping Country</td>
                    <td id="country"></td>
                </tr>

                <tr>
                    <td style="max-width:200px !important;">Total Amount</td>
                    <td id="total_amount"> </td>
                </tr>
                <tr>
                    <td style="max-width:200px !important;">Discount Amount</td>
                    <td id="discount_amount"> </td>
                </tr>
                <tr>
                    <td style="max-width:200px !important;">Paid Amount </td>
                    <td id="paid_amount"> </td>
                </tr>

                <tr>
                    <td style="max-width:200px !important;">Payment Details </td>
                    <td id="payment_details"> </td>
                </tr>
                <tr>
                    <td style="max-width:200px !important;">Product Owner </td>
                    <td id="product_owner_id"> </td>
                </tr>

            </table>

        </div>
        <div class="col-md-6 text-center">
            <h2>Ordered Product Details</h2>
            <table class="table table-bordered table-sm">
                <thead>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Unit Price</th>
                </thead>
                <tbody class="OrdersView">

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="total_price">Total Price</td>
                        <td id="total_price" class="font-weight-bold"></td>
                    </tr>
                </tfoot>
            </table>
            <div class="card">
                <div class="card-header">
                    <h2>Order Status</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.ordersStatusUpdate')); ?>" method="post"
                        id="product_status_form">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <select id="payment_status" style="margin-bottom: 10px;"
                                class="browser-default custom-select">
                                <option value="Pending">Pending</option>
                                <option value="Prograccing">Prograccing</option>
                                <option value="Complete">Complete</option>
                            </select>
                        </div>
                        <input type="hidden" id="payment_status_id" >
                        <input type="submit" value="Update" class="btn btn-success btn-block">
                    </form>
                    <hr>
                    <form action="<?php echo e(route('admin.ordersPrint')); ?>" method="post"
                        id="ordersPrint_form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="ordersPrint_id">
                        <input type="submit" value="Print Order" class="btn btn-success btn-block">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
     function OrdersViewDetails(id) {
            axios.post("<?php echo e(route('admin.ordersView')); ?>", {
                    id: id
                })
                .then(function(response) {

                    if (response.status == 200) {
                        $('#loadDivOrders').addClass('d-none');
                        $('#OrdersEditForm').removeClass('d-none');

                        var dataJSON = response.data;



                        var productOwner = " ";
                        if (dataJSON[0].product_owner_id == 0) {
                            productOwner = "Admin"
                        } else {
                            productOwner = dataJSON[0].product_owner_id
                        }

                        $('#id').html(dataJSON[0].id)
                        $('#customer_name').html(dataJSON[0].customer_name)
                        $('#customer_phone_number').html(dataJSON[0].customer_phone_number)
                        $('#address').html(dataJSON[0].address)
                        $('#city').html(dataJSON[0].city)
                        $('#district').html(dataJSON[0].district)
                        $('#country').html(dataJSON[0].country)
                        $('#postal_code').html(dataJSON[0].postal_code)
                        $('#total_amount').html(dataJSON[0].total_amount)
                        $('#discount_amount').html(dataJSON[0].discount_amount);
                        $('#paid_amount').html(dataJSON[0].paid_amount);
                        $('#payment_details').html(dataJSON[0].payment_details);
                        $('#product_owner_id').html(productOwner);
                        $('#user_id').html(dataJSON[0].user_id);
                        $('#user_Name').html(dataJSON[0].customer.name);
                        $('#total_price').html('$' + dataJSON[0].paid_amount);



                        $('#payment_status_id').val(dataJSON[0].id);
                        $('#ordersPrint_id').val(dataJSON[0].id);

                        $('#payment_status option[value=' + dataJSON[0].payment_status + ']').attr('selected', 'selected');



                        var imageViewHtml = "";
                        for (let index = 0; index < dataJSON[0].order_products.length; index++) {

                            const element = dataJSON[0].order_products[index];

                            imageViewHtml += '<tr>';
                            imageViewHtml += '<td clsss="mx-auto" >' + element.product_id + '</td>';
                            imageViewHtml += '<td clsss="mx-auto" >' + element.product.product_title + '</td>';
                            imageViewHtml += '<td clsss="mx-auto" >' + element.quantity + '</td>';
                            imageViewHtml += '<td clsss="mx-auto" >$' + element.price + '</td>';
                            imageViewHtml += '</tr>';
                            $('.OrdersView').html(imageViewHtml);
                        }




                    } else {
                        $('#loadDivOrders').addClass('d-none');
                        $('#wrongDivOrders').removeClass('d-none');
                    }
                }).catch(function(error) {
                    $('#loadDivOrders').addClass('d-none');
                    $('#wrongDivOrders').removeClass('d-none');
                });
        }


</script><?php /**PATH E:\laravel-project\ecom-final\backend\resources\views/admin/order/printOrder.blade.php ENDPATH**/ ?>