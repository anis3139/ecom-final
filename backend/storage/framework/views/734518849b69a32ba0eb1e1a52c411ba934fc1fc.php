<div class="row mt-5">
    <div class="col-md-10 offset-md-1 border border-dark">

        <div id="mainDivProjects" class="container-fluid d-none">
            <div class="row">
                <div class="col-md-12 p-2">
                    <h1 class="text-center">Special Feature Section</h1>
                    <button id="addbtnFeaturedSpecials" class="btn btn-sm btn-danger my-3">Add New</button>
                    <table id="SliderDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Sl.</th>
                                <th class="th-sm">Title</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm">Edit</th>
                                <th class="th-sm">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="Slider_table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="loadDivProjects" class="container">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <img class="loding-icon m-5" src="<?php echo e(asset('loader.svg')); ?>" alt="">

                </div>
            </div>
        </div>
        <div id="wrongDivProjects" class="container d-none">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <h3>Something Went Wrong!</h3>
                </div>
            </div>
        </div>



        <!-- FeaturedSpecials add -->
        <div class="modal fade" id="addFeaturedSpecialsModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ml-5">Add New Slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-center">
                        <div class="container">
                            <div class="row">

                                <input id="FeaturedSpecialsTitle" type="text" id="" class="form-control mb-3"
                                    placeholder="Title">

                                <textarea id="FeaturedSpecialsDescription" type="text" id="" class="form-control mb-3"
                                    placeholder=" Description" cols="30" rows="5"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                        <button id="FeaturedSpecialsAddConfirmBtn" type="button"
                            class="btn  btn-sm  btn-danger">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- FeaturedSpecials add -->


        <!-- Modal FeaturedSpecials Delete -->
        <div class="modal fade" id="deleteModalFeaturedSpecials" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body p-3 text-center">
                        <h5 class="mt-4">Do you want to Delete</h5>
                        <h5 id="FeaturedSpecialsDeleteId" class="mt-4 d-none "></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                        <button data-id="" id="confirmDeleteFeaturedSpecials" type="button"
                            class="btn btn-sm btn-danger">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal FeaturedSpecials Delete -->




        <!-- FeaturedSpecials update -->
        <div class="modal fade" id="updateFeaturedSpecialsModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Featured Specials Extra Services</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-center">
                        <div id="SliderEditForm" class="container d-none ">
                            <h5 id="FeaturedSpecialsESEditId" class="mt-4 d-none"></h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="FeaturedSpecialsESTitleIdUpdate" type="text" id=""
                                        class="form-control mb-3" placeholder="Title">
                                    <textarea id="FeaturedSpecialsESDesIdUpdate" type="text" id=""
                                        class="form-control mb-3" placeholder="Description" cols="30"
                                        rows="5"></textarea>

                                </div>

                            </div>
                        </div>
                        <img id="projectLoader" class="loding-icon m-5 d-none" src="<?php echo e(asset('loader.svg')); ?>" alt="">
                        <h3 id="projectwrongLoader" class="d-none">Something Went Wrong!</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                        <button id="FeaturedSpecialsESupdateConfirmBtn" type="button"
                            class="btn  btn-sm  btn-danger">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php /**PATH E:\laravel-project\ecom-final\backend\resources\views/admin/components/SpecialFeature.blade.php ENDPATH**/ ?>