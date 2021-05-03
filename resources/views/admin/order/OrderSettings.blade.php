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
                                <button id="submitDeliveryOutCity" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>












                    </tbody>
                </table>





            </div>
        </div>
    </div>
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






    </script>
@endsection
