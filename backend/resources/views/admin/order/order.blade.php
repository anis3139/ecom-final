@extends('admin.Layouts.app')

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
                                    <th class="th-xs">Postal Code</th>
                                    <th class="th-xs">paid Amount</th>
                                    <th class="th-xs">View</th>
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
                        console.log(dataJSON);
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
                                .postal_code + " </td>" +
                                "<td style='max-width:100px; overflow-wrap: break-word;'>" + dataJSON[i]
                                .paid_amount + " </td>" +
                                "<td><a class='OrdersView' data-id=" + dataJSON[i].id +
                                "><i class='fas fa-eye'></i></a></td>"
                            ).appendTo('#Orders_Table');
                        });


                        //Orders View icon click

                        $(".OrdersView").click(function() {
                            var id = $(this).data('id');
                            $('#OrdersViewId').html(id);
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

    </script>

@endsection
