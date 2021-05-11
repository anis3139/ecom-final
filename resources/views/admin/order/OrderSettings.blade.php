@extends('admin.Layouts.app')
@section('bkash_number', 'Order Settings')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-5">


                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Input URL</th>
                            <th class="th-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody>




                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Bkash Number:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">bkash_number</label>
                                    <input id="bkash_number" required type="number" class="form-control " value="<?php if ($results) {
                                            echo $results->bkash_number;
                                        } ?>">

                                </div>
                            </td>
                            <td>
                                <button id="submitBkashNumber" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Rocket Number:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">rocket_number</label>
                                    <input id="rocket_number" required type="number" class="form-control " value="<?php if ($results) {
                                            echo $results->rocket_number;
                                        } ?>">

                                </div>
                            </td>
                            <td>
                                <button id="submitRocketNumber" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Nagad Number:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">nagad_number</label>
                                    <input id="nagad_number" required type="number" class="form-control " value="<?php if ($results) {
                                            echo $results->nagad_number;
                                        } ?>">

                                </div>
                            </td>
                            <td>
                                <button id="submitNagadNumber" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Delivery In City:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">delivary_in_city</label>
                                    <input id="delivary_in_city" required type="number" class="form-control " value="<?php if ($results) {
                                            echo $results->delivary_in_city;
                                        } ?>">

                                </div>
                            </td>
                            <td>
                                <button id="submitDeliveryInCity" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Delivery Out City:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">delivary_out_city</label>
                                    <input id="delivary_out_city" required type="number" class="form-control " value="<?php if ($results) {
                                            echo $results->delivary_out_city;
                                        } ?>">

                                </div>
                            </td>
                            <td>
                                <button id="submitDeliveryOutCity" type="submit"
                                    class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>












                    </tbody>
                </table>





            </div>
        </div>
    </div>



    @include('admin.components.Cupon')







@endsection


@section('script')
    

    <script>
        // bkash_number Add


        $('#submitBkashNumber').click(function() {
            var bkash_number = $('#bkash_number').val();
            addBkashNumber(bkash_number);
        })

        function addBkashNumber(bkash_number) {
            if (bkash_number.length == 0) {
                toastr.error('Bkash Number url is empty!');

            } else {
                $('#submitBkashNumber').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("{{ route('admin.addBkashNumber') }}", {
                        bkash_number: bkash_number
                    })
                    .then(function(response) {
                        console.log(response.data);
                        $('#submitBkashNumber').html("Update");
                        if (response.status = 200) {
                            if (response.data == 1) {
                                toastr.success('Updated Success .');


                            } else {
                                toastr.error('Updated Failed');
                            }
                        } else {
                            toastr.error('Something Went Wrong');
                        }
                    }).catch(function(error) {
                        toastr.error('Something Went Wrong');
                    });
            }
        }







        // rocket_number Add


        $('#submitRocketNumber').click(function() {
            var rocket_number = $('#rocket_number').val();
            addRocketNumber(rocket_number);
        })

        function addRocketNumber(rocket_number) {
            if (rocket_number.length == 0) {
                toastr.error('Rocket Number url is empty!');

            } else {
                $('#submitRocketNumber').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("{{ route('admin.addRocketNumber') }}", {
                        rocket_number: rocket_number
                    })
                    .then(function(response) {
                        console.log(response.data);
                        $('#submitRocketNumber').html("Update");
                        if (response.status = 200) {
                            if (response.data == 1) {
                                toastr.success('Updated Success .');


                            } else {
                                toastr.error('Updated Failed');
                            }
                        } else {
                            toastr.error('Something Went Wrong');
                        }
                    }).catch(function(error) {
                        toastr.error('Something Went Wrong');
                    });
            }
        }





        // nagad_number Add


        $('#submitNagadNumber').click(function() {
            var nagad_number = $('#nagad_number').val();
            addNagadNumber(nagad_number);
        })

        function addNagadNumber(nagad_number) {
            if (nagad_number.length == 0) {
                toastr.error('Nagad Number url is empty!');

            } else {
                $('#submitNagadNumber').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("{{ route('admin.addNagadNumber') }}", {
                        nagad_number: nagad_number
                    })
                    .then(function(response) {
                        console.log(response.data);
                        $('#submitNagadNumber').html("Update");
                        if (response.status = 200) {
                            if (response.data == 1) {
                                toastr.success('Updated Success .');


                            } else {
                                toastr.error('Updated Failed');
                            }
                        } else {
                            toastr.error('Something Went Wrong');
                        }
                    }).catch(function(error) {
                        toastr.error('Something Went Wrong');
                    });
            }
        }




        // delivary_in_city Add


        $('#submitDeliveryInCity').click(function() {
            var delivary_in_city = $('#delivary_in_city').val();
            addDeliveryInCity(delivary_in_city);
        })

        function addDeliveryInCity(delivary_in_city) {
            if (delivary_in_city.length == 0) {
                toastr.error('Delivery In City Number url is empty!');

            } else {
                $('#submitDeliveryInCity').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("{{ route('admin.addDelivaryInCity') }}", {
                        delivary_in_city: delivary_in_city
                    })
                    .then(function(response) {
                        console.log(response.data);
                        $('#submitDeliveryInCity').html("Update");
                        if (response.status = 200) {
                            if (response.data == 1) {
                                toastr.success('Updated Success .');


                            } else {
                                toastr.error('Updated Failed');
                            }
                        } else {
                            toastr.error('Something Went Wrong');
                        }
                    }).catch(function(error) {
                        toastr.error('Something Went Wrong');
                    });
            }
        }




        // delivary_out_city Add


        $('#submitDeliveryOutCity').click(function() {
            var delivary_out_city = $('#delivary_out_city').val();
            addDeliveryOutCity(delivary_out_city);
        })

        function addDeliveryOutCity(delivary_out_city) {
            if (delivary_out_city.length == 0) {
                toastr.error('Delivery Out City Number url is empty!');

            } else {
                $('#submitDeliveryOutCity').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("{{ route('admin.addDelivaryOutCity') }}", {
                        delivary_out_city: delivary_out_city
                    })
                    .then(function(response) {
                        console.log(response.data);

                        $('#submitDeliveryOutCity').html("Update");
                        if (response.status = 200) {
                            if (response.data == 1) {
                                toastr.success('Updated Success .');


                            } else {
                                toastr.error('Updated Failed');
                            }
                        } else {
                            toastr.error('Something Went Wrong');
                        }
                    }).catch(function(error) {
                        toastr.error('Something Went Wrong');
                    });
            }
        }













        getCuponData();
        // for Testimonial table

        function getCuponData() {


            axios.get("{{ route('admin.getCuponData') }}")
                .then(function(response) {
                    console.log(response.data);

                    if (response.status = 200) {
                        $('#mainDivCupon').removeClass('d-none');
                        $('#loadDivCupon').addClass('d-none');

                        $('#CuponDataTable').DataTable().destroy();
                        $('#Cupon_table').empty();
                        var count = 1;
                        var dataJSON = response.data;

                        $.each(dataJSON, function(i, item) {

                            let status = '';
                            if (dataJSON[i].status == 1) {
                                status = "Active"
                            } else {
                                status = "Inactive"
                            }

                            let type = '';
                            if (dataJSON[i].type == 1) {
                                type = "Percentage"
                            } else {
                                type = "Fixed"
                            }
                            let expiry_date=moment(dataJSON[i].exp_date).format('Do-MMM-YYYY')

                            $('<tr>').html(
                                "<td>" + count++ + " </td>" +

                                "<td class='text-break'>" + dataJSON[i].cupon_code + " </td>" +

                                "<td class='text-break'>" + dataJSON[i].discount + " </td>" +
                                "<td class='text-break'>" + type + " </td>" +
                                "<td class='text-break'>" + status + " </td>" +
                                "<td class='text-break'>" + expiry_date + " </td>" +

                                "<td><a class='CuponEditIcon' data-id=" + dataJSON[i].id +
                                "><i class='fas fa-edit'></i></a> </td>" +

                                "<td><a class='CuponDeleteIcon' data-id=" + dataJSON[i].id +
                                " ><i class='fas fa-trash-alt'></i></a> </td>"
                            ).appendTo('#Cupon_table');
                        });


                        //Cupon click on delete icon

                        $(".CuponDeleteIcon").click(function() {

                            var id = $(this).data('id');
                            $('#CuponDeleteId').html(id);
                            $('#deleteModalCupon').modal('show');

                        })



                        //Project edit icon click

                        $(".CuponEditIcon").click(function() {

                            var id = $(this).data('id');
                            $('#CuponEditId').html(id);

                            $('#updateCuponModal').modal('show');
                            CuponUpdateDetails(id);

                        })



                    } else {
                        $('#wrongDivCupon').removeClass('d-none');
                        $('#loadDivCupon').addClass('d-none');

                    }
                }).catch(function(error) {

                    $('#wrongDivCupon').removeClass('d-none');
                    $('#loadDivCupon').addClass('d-none');
                });
        }







        //add button modal show for add new entity

        $('#addbtnCupon').click(function() {
            $('#addCuponModal').modal('show');
        });

        $(document).ready(function() {
            $('#status').material_select();
        });

        $(document).ready(function() {
            $('#type').material_select();
        });







        //Cupon Add modal save button

        $('#CuponAddConfirmBtn').click(function() {
            var cupon_code = $('#cupon_code').val();
            var discount = $('#discount').val();
            var type = $('#type').val();
            var status = $('#status').val();
            var exp_date = $('#exp_date').val();
            CuponAdd(cupon_code, discount, type, status, exp_date);

        })

        function CuponAdd(cupon_code, discount, type, status, exp_date) {

            if (cupon_code.length == 0) {

                toastr.error('Cupon Code is empty!');

            } else if (discount.length == 0) {

                toastr.error('Discount is empty!');
            } else if (exp_date.length == 0) {

                toastr.error('Expiry Date is empty!');
            } else {

                $('#CuponAddConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

                axios.post("{{ route('admin.CuponAdd') }}", {
                        cupon_code: cupon_code,
                        discount: discount,
                        type: type,
                        status: status,
                        exp_date: exp_date,
                    })

                    .then(function(response) {

                        $('#CuponAddConfirmBtn').html("Save");

                        if (response.status = 200) {
                            if (response.data == 1) {
                                $('#addCuponModal').modal('hide');
                                toastr.success('Add New Success .');
                                getCuponData();
                            } else {
                                $('#addCuponModal').modal('hide');
                                toastr.error('Add New Failed');
                                getCuponData();
                            }
                        } else {
                            $('#addCuponModal').modal('hide');
                            toastr.error('Something Went Wrong');
                        }


                    }).catch(function(error) {

                        $('#addCuponModal').modal('hide');
                        toastr.error('Something Went Wrong');

                    });

            }

        }





        //  Special Feature delete modal yes button

        $('#confirmDeleteCupon').click(function() {
            var id = $('#CuponDeleteId').html();
            // var id = $(this).data('id');
            DeleteDataCupon(id);

        })


        //delete FeaturedS pecials Extra Servicess function

        function DeleteDataCupon(id) {
            $('#confirmDeleteCupon').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            axios.post("{{ route('admin.CuponDelete') }}", {
                    id: id
                })
                .then(function(response) {
                    $('#confirmDeleteCupon').html("Yes");

                    if (response.status == 200) {


                        if (response.data == 1) {
                            $('#deleteModalCupon').modal('hide');
                            toastr.error('Delete Success.');
                            getCuponData();
                        } else {
                            $('#deleteModalCupon').modal('hide');
                            toastr.error('Delete Failed');
                            getCuponData();
                        }

                    } else {
                        $('#deleteModalCupon').modal('hide');
                        toastr.error('Something Went Wrong');
                    }

                }).catch(function(error) {

                    $('#deleteModalCupon').modal('hide');
                    toastr.error('Something Went Wrong');

                });

        }






        $(document).ready(function() {
            $('#typeCupon').material_select();
        });

        $(document).ready(function() {
            $('#statusCupon').material_select();
        });







        //each Cupon  Details data show for edit

        function CuponUpdateDetails(id) {

            axios.post("{{ route('admin.CuponEdit') }}", {
                    id: id
                })
                .then(function(response) {
                    if (response.status == 200) {


                        $('#projectLoader').addClass('d-none');
                        $('#CuponEditForm').removeClass('d-none');
                        let jsonData = response.data;
                        let exp_date_data = moment(jsonData[0].exp_date).format('YYYY-MM-DD')
                        console.log(exp_date_data);
                        $('#cupon_codeIdUpdate').val(jsonData[0].cupon_code);
                        $('#CuponDesIdUpdate').val(jsonData[0].discount);
                        $('#typeCupon option[value=' + jsonData[0].type + ']').attr('selected', 'selected');
                        $('#statusCupon option[value=' + jsonData[0].status + ']').attr('selected', 'selected');
                        $('#exp_dateCupon').val(exp_date_data);

                    } else {

                        $('#projectLoader').addClass('d-none');
                        $('#projectwrongLoader').removeClass('d-none');
                    }

                }).catch(function(error) {

                    $('#projectLoader').addClass('d-none');
                    $('#projectwrongLoader').removeClass('d-none');

                });

        }






        //Featured Specials update modal save button

        $('#CuponupdateConfirmBtn').click(function() {


            var idUpdate = $('#CuponEditId').html();
            var cupon_codeIdUpdate = $('#cupon_codeIdUpdate').val();
            var CuponDesIdUpdate = $('#CuponDesIdUpdate').val();
            var typeCupon = $('#typeCupon').val();
            var statusCupon = $('#statusCupon').val();
            var exp_dateCupon = $('#exp_dateCupon').val();

            CuponUpdate(idUpdate, cupon_codeIdUpdate, CuponDesIdUpdate, typeCupon, statusCupon, exp_dateCupon);

        })





        //update Special Feature data using modal

        function CuponUpdate(idUpdate, cupon_codeIdUpdate, CuponDesIdUpdate, typeCupon, statusCupon, exp_dateCupon) {

            if (cupon_codeIdUpdate.length == 0) {

                toastr.error('Cupon Code  is empty!');

            } else if (CuponDesIdUpdate == 0) {

                toastr.error(' Discount is empty!');

            } else if (exp_dateCupon == 0) {

                toastr.error('Expiry Date is empty!');

            } else {
                $('#CuponupdateConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

                updateData = {
                    id: idUpdate,
                    cupon_code: cupon_codeIdUpdate,
                    discount: CuponDesIdUpdate,
                    type: typeCupon,
                    status: statusCupon,
                    exp_date: exp_dateCupon,
                }



                axios.post("{{ route('admin.CuponUpdate') }}", updateData).then(function(response) {

                    $('#CuponupdateConfirmBtn').html("Update");

                    if (response.status = 200) {
                        if (response.data == 1) {
                            $('#updateCuponModal').modal('hide');
                            toastr.success('Update Success.');
                            getCuponData();

                        } else {
                            $('#updateCuponModal').modal('hide');
                            toastr.error('Update Failed');
                            getCuponData();

                        }
                    } else {
                        $('#updateCuponModal').modal('hide');
                        toastr.error('Something Went Wrong');
                    }


                }).catch(function(error) {

                    $('#updateCuponModal').modal('hide');
                    toastr.error('Something Went Wrong');

                });
            }
        }

    </script>
@endsection
