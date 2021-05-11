<div class="row mt-5">
    <div class="col-md-10 offset-md-1 border border-dark">

        <div id="mainDivCupon" class="container-fluid d-none">
            <div class="row">
                <div class="col-md-12 p-2">
                    <h1 class="text-center">Cupon Section</h1>
                    <button id="addbtnCupon" class="btn btn-sm btn-danger my-3">Add New</button>
                    <table id="CuponDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Sl.</th>
                                <th class="th-sm">Cupon Code</th>
                                <th class="th-sm">Discount</th>
                                <th class="th-sm">Type</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">Expiry date</th>
                                <th class="th-sm">Edit</th>
                                <th class="th-sm">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="Cupon_table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="loadDivCupon" class="container">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

                </div>
            </div>
        </div>
        <div id="wrongDivCupon" class="container d-none">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <h3>Something Went Wrong!</h3>
                </div>
            </div>
        </div>



        <!-- Cupon add -->
        <div class="modal fade" id="addCuponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ml-5">Add New Cupon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-center">
                        <div class="container">
                            <div class="row">

                                <input id="cupon_code" type="text" class="form-control mb-3" placeholder="Cupon Code">
                                <input id="discount" type="number" class="form-control mb-3" placeholder="Discount">
                                <select name="type" id="type" class="form-control mb-3">
                                    <option selected value="1">Percentage</option>
                                    <option value="0">Fixed</option>
                                </select>

                                <select name="status" id="status" class="form-control mb-3">
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>

                                <input id="exp_date" type="date"
                                    min="<?php echo date('Y-m-d'); ?>"
                                    class="form-control mb-3" placeholder="Expiry Date">



                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button id="CuponAddConfirmBtn" type="button" class="btn  btn-sm  btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cupon add -->


        <!-- Modal Cupon Delete -->
        <div class="modal fade" id="deleteModalCupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body p-3 text-center">
                        <h5 class="mt-4">Do you want to Delete</h5>
                        <h5 id="CuponDeleteId" class="mt-4 d-none "></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                        <button data- id="confirmDeleteCupon" type="button" class="btn btn-sm btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Cupon Delete -->




        <!-- Cupon update -->
        <div class="modal fade" id="updateCuponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Featured Specials Extra Services</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-center">
                        <div id="CuponEditForm" class="container d-none ">
                            <h5 id="CuponEditId" class="mt-4 d-none"></h5>
                            <div class="row">
                                <div class="col-md-12">

                                    <input id="cupon_codeIdUpdate" type="text" class="form-control mb-3"
                                        placeholder="Title">

                                    <input id="CuponDesIdUpdate" type="number" class="form-control mb-3"
                                        placeholder="Title">
                                        
                                        <select name="type" id="typeCupon" class="form-control mb-3">
                                            <option  value="1">Percentage</option>
                                            <option value="0">Fixed</option>
                                        </select>
        
                                        <select name="status" id="statusCupon" class="form-control mb-3">
                                            <option  value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
        
                                        <input id="exp_dateCupon" type="date"
                                            min="<?php echo date('Y-m-d'); ?>"
                                            class="form-control mb-3" placeholder="Expiry Date">
        
        
                                </div>

                            </div>
                        </div>
                        <img id="projectLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                        <h3 id="projectwrongLoader" class="d-none">Something Went Wrong!</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button id="CuponupdateConfirmBtn" type="button" class="btn  btn-sm  btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>




