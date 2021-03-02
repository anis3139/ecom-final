@extends('admin.Layouts.app')
@section('title', 'Order')
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
                                    <th class="th-xs">Product name</th>
                                    <th class="th-xs">Size</th>
                                    <th class="th-xs">Color</th>
                                    <th class="th-xs">Quantity</th>
                                    <th class="th-xs">Price</th>
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








@endsection
@section('script')

    <script>
        $('#OrdersDataTable').DataTable()


        getOrdersdata();

        function getOrdersdata() {
            axios.get("{{ route('admin.getQuickOrdersData') }}")
                .then(function(response) {

                    if (response.status = 200) {
                        $('#mainDivOrders').removeClass('d-none');
                        $('#loadDivOrders').addClass('d-none');
                        $('#OrdersDataTable').DataTable().destroy();
                        $('#Orders_table').empty();
                        var dataJSON = response.data;



                        var table="";
                        for (let trableData = 0; trableData < dataJSON.length; trableData++) {
                            const element = dataJSON[trableData];
                            table+='<tr>';
                            table+='<td style="text-align:center; max-width:100px; overflow-wrap: break-word;">'+(trableData+1)+'</td>';
                            table+='<td style="text-align:center; max-width:100px; overflow-wrap: break-word;">'+element.customer_name+'</td>';
                            table+='<td style="text-align:center; max-width:100px; overflow-wrap: break-word;">'+element.customer_phone_number+'</td>';
                            table+='<td style="text-align:center; max-width:100px; overflow-wrap: break-word;">'+element.product_title+'</td>';
                            table+='<td style="text-align:center; max-width:100px; overflow-wrap: break-word;">'+element.maserment+'</td>';
                            table+='<td style="text-align:center; max-width:100px; overflow-wrap: break-word;"> <p style="text-align:center; border-radius:50%; width:30px; height:30px; background-color:'+element.color+'"></p></td>';
                            table+='<td style=" text-align:center; max-width:100px; overflow-wrap: break-word;">'+element.quantity+'</td>';
                            table+='<td style=" text-align:center; max-width:100px; overflow-wrap: break-word;">'+element.product_price+'</td>';
                            
                            table+='<td style=" text-align:center;" ><a href="quickOrdersPrint/'+ element.id +'"><i class="fas fa-print"></i></a></td>';
                            table+='</tr>'
                        }
                        $('#Orders_Table').html(table);



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
                    console.log(error);

                    $('#wrongDivOrders').removeClass('d-none');
                    $('#loadDivOrders').addClass('d-none');
                });

        }


    </script>

@endsection
