
<div class="row mt-5">
    <div class="col-md-10 offset-md-1 border border-dark">

        <div id="mainDivTestimonial" class="container-fluid d-none">
            <div class="row">
                <div class="col-md-12 p-2">
                    <h1 class="text-center">Testimonial Section</h1>
                    <button id="addbtnTestimonial" class="btn btn-sm btn-danger my-3">Add New</button>
                    <table id="TestimonialDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Sl.</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Image</th>
                                <th class="th-sm">Date</th>
                                <th class="th-sm">Testimonial</th>
                                <th class="th-sm">Edit</th>
                                <th class="th-sm">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="Testimonial_table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="loadDivTestimonial" class="container">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

                </div>
            </div>
        </div>
        <div id="wrongDivTestimonial" class="container d-none">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <h3>Something Went Wrong!</h3>
                </div>
            </div>
        </div>




    <!-- Testimonioal add -->
    <div class="modal fade" id="addTestimonioalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-5">Add New Testimonioal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <div class="row">
                            <input id="TestimonioalName" type="text" class="form-control mb-3" placeholder="Testimonioal Name">
                            <input id="TestimonioalDate" type="text"  class="form-control mb-3"
                                placeholder="Testimonioal Designation">
                            <textarea name="" id="TestimonioalDes" cols="30" rows="10" class="form-control mb-3" placeholder="Testimonioal Description"></textarea>
                            <input type="file" id="Testimonioalimg" class="form-control mb-3" name="text-input">
                            <img id="addimagepreviewTestimonioal" style="height: 100px !important;" class="imgPreview mt-3 "
                                src="{{ asset('admin/images/default-image.png') }}" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button id="TestimonioalAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Testimonioal add -->



    <!-- Testimonioal Delete -->
    <div class="modal fade" id="deleteModalTestimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body p-3 text-center">
                    <h5 class="mt-4">Do you want to Delete</h5>
                    <h5 id="TestimonioalDeleteId" class="mt-4 d-none "></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                    <button data-id="" id="confirmDeleteTestimonioal" type="button" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonioal Delete -->



    <!-- Testimonial update -->
    <div class="modal fade" id="updateTestimonialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div id="TestimonialEditForm" class="container d-none ">
                        <h5 id="TestimonialEditId" class="mt-4 d-none"></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <input id="TestimonialNameIdUpdate" type="text" id="" class="form-control mb-3"
                                    placeholder="Testimonial Name">
                                <input id="TestimonialDateIdUpdate" type="text" id="" class="form-control mb-3"
                                    placeholder="Testimonial Designation">
                                    <textarea name="" id="TestimonioalDesIdUpdate" cols="30" rows="10" class="form-control mb-3" placeholder="Testimonioal Description"></textarea>
                            </div>
                            <div class="col-md-6">

                                <input class="form-control" id="TestimonioalimgUpdate" type="file">
                                <img id="imagepreviewTestimonioal" style="height: 200px !important;" class="imgPreview mt-3 " src="" />
                            </div>
                        </div>
                    </div>
                    <img id="TestimonialLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                    <h3 id="TestimonialwrongLoader" class="d-none">Something Went Wrong!</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button id="TestimonioalConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Testimonial update -->
