@extends('admin.layouts.app')
@section('css')
    <style>
        .modal-dialog-full-width {
            width: 90% !important;
            height: 90% !important;

            padding: 20px !important;
            max-width: none !important;
            margin: 0px auto;

        }

        .modal-content-full-width {
            height: auto !important;
            min-height: 100% !important;
            border-radius: 0 !important;
            background-color: #ececec !important
        }

        .modal-header-full-width {
            border-bottom: 1px solid #9ea2a2 !important;
        }

        .modal-footer-full-width {
            border-top: 1px solid #9ea2a2 !important;
        }

    </style>
@endsection
@section('content')

    <div class="row mt-5 px-5">
        <div class="col-md-12 border border-dark">
            <div id="mainDivOrders" class="container-fluid">
                <div class="row">
                    <div class="col-md-12 px-2 ">

                        <table id="OrdersDataTable" class="table table-striped table-bordered" width="100%">
                            <thead class="text-center">
                                <tr>
                                    <th class="th-xs">Sl.</th>
                                    <th class="th-xs">Customer Name</th>
                                    <th class="th-xs">Customer Phone</th>
                                    <th class="th-xs">Address</th>
                                    <th class="th-xs">City</th>
                                    <th class="th-xs">District</th>
                                    <th class="th-xs">Country</th>
                                    <th class="th-xs">Payment Status</th>
                                    <th class="th-xs">paid Amount</th>
                                    <th class="th-xs">View</th>
                                    <th class="th-xs">Print</th>
                                </tr>
                            </thead>
                            <tbody id="Orders_Table">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="loadDivOrders" class="container">
                <div class="row">
                    <div class="col-md-12 p-5 text-center">
                        <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

                    </div>
                </div>
            </div>
            <div id="wrongDivOrders" class="container d-none">
                <div class="row">
                    <div class="col-md-12 p-5 text-center">
                        <h3>Something Went Wrong!</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!--View  Modal -->

    <div class="modal fade right" id="viewOrdersModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
        <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
            <div class="modal-content-full-width modal-content ">
                <div class=" modal-header-full-width   modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Ordered Orders View</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 id="OrdersViewId" class="mt-4 d-none"></h5>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <h2>Order Details</h2>
                                <table class="table table-bordered">
                                    <tr>
                                        <td style="max-width:200px !important;">Order ID</td>
                                        <td id="id"></td>
                                    </tr>
                                    {{-- <tr>
                                        <td style="max-width:200px !important;">User Id </td>
                                        <td id="user_id"> </td>
                                    </tr>
                                    <tr>
                                        <td style="max-width:200px !important;">User Name </td>
                                        <td id="user_Name"> </td>
                                    </tr> --}}
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
                                        <form action="{{ route('admin.ordersStatusUpdate') }}" method="post"
                                            id="product_status_form">
                                            @csrf
                                            <div class="form-group">
                                                <select id="payment_status" style="margin-bottom: 10px;"
                                                    class="browser-default custom-select">
                                                    <option value="Pending">Pending</option>
                                                    <option value="Prograccing">Prograccing</option>
                                                    <option value="Complete">Complete</option>
                                                </select>
                                            </div>
                                            <input type="hidden" id="payment_status_id">
                                            <input type="submit" value="Update" class="btn btn-success btn-block">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
@section('script')

    <script>
        $('#OrdersDataTable').DataTable()


        getOrdersdata();

        function getOrdersdata() {
            axios.get("{{ route('admin.getOrdersData') }}")
                .then(function(response) {

                    if (response.status = 200) {
                        $('#mainDivOrders').removeClass('d-none');
                        $('#loadDivOrders').addClass('d-none');
                        $('#OrdersDataTable').DataTable().destroy();
                        $('#Orders_table').empty();
                        var dataJSON = response.data;

                        var count = 1;
                        $.each(dataJSON, function(i, item) {
                            $('<tr class="text-center">').html(
                                "<td style='max-width:100px; overflow-wrap: break-word;'>" + count++ +
                                " </td>" +
                                "<td style='max-width:100px; overflow-wrap: break-word;'>" + dataJSON[i]
                                .customer_name + " </td>" +
                                "<td style='max-width:100px; overflow-wrap: break-word;'>" + dataJSON[i]
                                .customer_phone_number + " </td>" +
                                "<td style='max-width:100px; overflow-wrap: break-word;'>" + dataJSON[i]
                                .address + " </td>" +
                                "<td style='max-width:100px; overflow-wrap: break-word;'>" + dataJSON[i]
                                .city + " </td>" +
                                "<td style='max-width:100px; overflow-wrap: break-word;'>" + dataJSON[i]
                                .district + " </td>" +
                                "<td style='max-width:100px; overflow-wrap: break-word;'>" + dataJSON[i]
                                .country + " </td>" +
                                "<td style='max-width:100px; overflow-wrap: break-word;'>" + dataJSON[i]
                                .payment_status + " </td>" +
                                "<td style='max-width:100px; overflow-wrap: break-word;'>" + dataJSON[i]
                                .paid_amount + " </td>" +
                                "<td><a class='OrdersView' data-id=" + dataJSON[i].id +
                                "><i class='fas fa-eye'></i></a></td>"+
                                "<td><a  href='ordersPrint/"+ dataJSON[i].id +"'><i class='fas fa-print'></i></a></td>"
                            ).appendTo('#Orders_Table');
                        });


                        //Orders View icon click

                        $(".OrdersView").click(function() {
                            var id = $(this).data('id');
                            $('#OrdersViewId').html(id);
                            OrdersViewDetails();
                            $('#viewOrdersModal').modal('show');
                            OrdersViewDetails(id);


                        })
                        $('#OrdersDataTable').DataTable({
                            "order": true
                        });

                        $('.dataTables_length').addClass('bs-select');

                    } else {
                        $('#wrongDivOrders').removeClass('d-none');
                        $('#loadDivOrders').addClass('d-none');

                    }
                }).catch(function(error) {

                    $('#wrongDivOrders').removeClass('d-none');
                    $('#loadDivOrders').addClass('d-none');
                });

        }






        function OrdersViewDetails(id) {
            axios.post("{{ route('admin.ordersView') }}", {
                    id: id
                })
                .then(function(response) {
                        console.log(response.data);
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

                        // $('#user_id').html(dataJSON[0].user_id);
                        // $('#user_Name').html(dataJSON[0].customer.name);

                        $('#total_price').html('$' + dataJSON[0].paid_amount);



                        $('#payment_status_id').val(dataJSON[0].id);

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
                        getOrdersdata();
                    } else {
                        $('#loadDivOrders').addClass('d-none');
                        $('#wrongDivOrders').removeClass('d-none');
                        getOrdersdata();
                    }
                }).catch(function(error) {
                    $('#loadDivOrders').addClass('d-none');
                    $('#wrongDivOrders').removeClass('d-none');

                });
        }


        $('#product_status_form').submit(function(event) {
            event.preventDefault();
            var payment_status = $('#payment_status').val()
            var payment_status_id = $('#payment_status_id').val()
            let url =" {{ route('admin.ordersStatusUpdate') }}";

            axios.post(url, {
                payment_status: payment_status,
                id: payment_status_id,
            }).then(function(response) {
                        // gj
                if (response.status == 200 && response.data == 1) {
                    toastr.success('Update Success.');
                    $('#viewOrdersModal').modal('hide');
                    getOrdersdata();

                } else {
                    toastr.error('Update Fail ! Try Again');
                    $('#viewOrdersModal').modal('hide');
                    getOrdersdata();
                }

            }).catch(function(error) {
                toastr.error('Update Fail ! Try Again');
            })
        })

    </script>

@endsection
