
 {{-- Exclusive Feature --}}

 <div class="row mt-5">
    <div class="col-md-10 offset-md-1 border border-dark">

        <div id="mainDivEXP" class="container-fluid d-none">
            <div class="row">
                <div class="col-md-12 p-2">
                    <h1 class="text-center">Exclusive Special Feature Section</h1>
                  
                        {{-- Exclusive Image Table --}}

                        <table class="table table-striped table-bordered mt-2" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">Name</th>
                                    <th class="th-sm">Input</th>
                                    <th class="th-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group mb-2">
                                            <h3>Exclusive Image:</h3>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mx-sm-3 mb-2 text-center">
                                            <label for="addImageEXP" class="sr-only">Image</label>
                                            <input id="addImageEXP" required type="file" class="form-control ">
                                            <hr>
                                            <img id="addimagepreviewEXP" style="width: 200px; height:120px !important;"
                                                class="imgPreview mt-3 border rounded" src="<?php if ($results) {
                                                        echo $results->exp_image;
                                                    } ?>" />
                        
                                        </div>
                                    </td>
                                    <td>
                                        <button id="submitImageEXP" type="submit" class="btn btn-primary mb-2">Update</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>



                  {{-- Exclusive Image Table --}}






                    {{-- <button id="addbtnexclusiveSpecials" class="btn btn-sm btn-danger my-3 mt-5">Add New</button> --}}
                    <table id="EXPDataTable" class="table table-striped table-bordered mt-5" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Sl.</th>
                                <th class="th-sm">Title</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm text-center">Edit</th>
                                {{-- <th class="th-sm">Delete</th> --}}
                            </tr>
                        </thead>
                        <tbody id="EXF_table">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="loadDivEXP" class="container">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

                </div>
            </div>
        </div>
        <div id="wrongDivEXP" class="container d-none">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <h3>Something Went Wrong!</h3>
                </div>
            </div>
        </div>




<!-- ExclusiveFeature add -->
<div class="modal fade" id="addExclusiveFeatureModal" tabindex="-1" role="dialog"
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

                    <input id="ExclusiveFeatureTitle" type="text" id="" class="form-control mb-3"
                        placeholder="Title">

                    <textarea id="ExclusiveFeatureDescription" type="text" id="" class="form-control mb-3"
                        placeholder=" Description" cols="30" rows="5"></textarea>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
            <button id="ExclusiveFeatureAddConfirmBtn" type="button"
                class="btn  btn-sm  btn-danger">Save</button>
        </div>
    </div>
</div>
</div>






<!-- Modal FeaturedSpecials Delete -->
<div class="modal fade" id="deleteModalExclusiveFeature" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
 <div class="modal-content">

     <div class="modal-body p-3 text-center">
         <h5 class="mt-4">Do you want to Delete.....</h5>
         <h5 id="ExclusiveFeatureDeleteId" class="mt-4 d-none "></h5>
     </div>
     <div class="modal-footer">
         <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
         <button data-id="" id="confirmDeleteExclusiveFeature" type="button"
             class="btn btn-sm btn-danger">Yes</button>
     </div>
 </div>
</div>
</div>
<!-- Modal FeaturedSpecials Delete -->








<div class="modal fade" id="updateExclusiveFeatureModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Exclusive Featured Extra Services</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-center">
                        <div id="EXPEditForm" class="container d-none ">
                            <h5 id="ExclusiveFeatureESEditId" class="mt-4 d-none"></h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="exclusiveFeaturedTitleIdUpdate" type="text" id=""
                                        class="form-control mb-3" placeholder="Title">
                                    <textarea id="exclusiveFeaturedDesIdUpdate" type="text" id=""
                                        class="form-control mb-3" placeholder="Description" cols="30"
                                        rows="5"></textarea>

                                </div>

                            </div>
                        </div>
                        <img id="projectLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                        <h3 id="projectwrongLoader" class="d-none">Something Went Wrong!</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                        <button id="exclusiveFeaturedUpdateConfirmBtn" type="button"
                            class="btn  btn-sm  btn-danger">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



