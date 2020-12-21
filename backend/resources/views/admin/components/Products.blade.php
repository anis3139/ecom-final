@extends('admin.Layouts.app')
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
    <div id="mainDivProducts" class="container-fluid d-none">
        <div class="row">
            <div class="col-md-12 p-3">
                {{-- <button id="addBtnproduct" class="btn btn-sm btn-danger my-3">Add
                    New</button> --}}

                <button id="addBtnproduct" type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#exampleModalPreview">
                    Add New
                </button>


                <table id="productDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Sl.</th>
                            <th class="th-sm">Title</th>
                            <th class="th-sm">Price</th>
                            <th class="th-sm">Offer</th>
                            <th class="th-sm">Quantity</th>
                            <th class="th-sm">Category</th>
                            <th class="th-sm">Status</th>
                            <th class="th-sm">View</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                    </thead>
                    <tbody id="product_table">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div id="loadDivProducts" class="container">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">
            </div>
        </div>
    </div>
    <div id="wrongDivProducts" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <h3>Something Went Wrong!</h3>
            </div>
        </div>
    </div>

    <!-- Products add -->

    <!-- Modal -->

    <div class="modal fade right" id="addProductModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
        <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
            <div class="modal-content-full-width modal-content ">
                <div class=" modal-header-full-width   modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Material Design Full Screen Modal</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="pdName" type="text" id="" class="form-control mb-3" placeholder="Product Name">
                                <textarea id="pdDescription" type="text" id="" class="form-control mb-3"
                                    placeholder="Product Description" cols="30" rows="5"></textarea>
                                <input id="pdPrice" type="number" id="" class="form-control mb-3"
                                    placeholder="Product Price">
                                <input id="pdOffer" type="number" id="" class="form-control mb-3" placeholder="Offer Price">
                                <input id="pdQuantity" type="number" id="" class="form-control mb-3"
                                    placeholder="Product Quantity">
                                <select id="pdCategory" style="margin-bottom: 10px;" class="browser-default custom-select">
                                </select>
                                <select id="pdBrand" style="margin-bottom: 10px;" class="browser-default custom-select">
                                </select>

                                <select id="pdStock" style="margin-bottom: 10px;" class="browser-default custom-select">
                                    <option disabled selected>Product Stock Status</option>
                                    <option value="1">Stock In</option>
                                    <option value="0">Stock Out</option>
                                </select>

                                <!-- Material checked -->
                                <div
                                    class="switch d-flex justify-content-between py-1 px-2 my-2 mx-1 border border-secondary rounded">
                                    <span class="">Product Feature ? </span>

                                    <label class="">
                                        <input id="pdFeature" type="checkbox">
                                        <span class="lever"></span>
                                    </label>
                                </div>

                                <!-- Material checked -->
                                <div
                                    class="switch d-flex justify-content-between py-1 px-2 my-2 mx-1 border border-secondary rounded">
                                    <span class="">Product Publish Status: </span>

                                    <label class="">
                                        <input id="pdActive" type="checkbox" checked>
                                        <span class="lever"></span>
                                    </label>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header p-2 font-weight-bold text-center border border-dark">
                                        Product Images
                                    </div>
                                    <div class="card-body p-0">
                                        <table border="2" cellpadding="10px">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Preview</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="file" id="productImageOne" class="form-control mb-3"
                                                            name="productImage[]">
                                                    </td>
                                                    <td>
                                                        <img id="productImageOnePreview"
                                                            style="height: 100px !important; width: 200px !important;"
                                                            class="imgPreview mx-auto"
                                                            src="{{ asset('admin/images/default-image.png') }}" />
                                                    </td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="file" id="productImageTwo" class="form-control mb-3"
                                                            name="productImage[]">
                                                    </td>
                                                    <td>
                                                        <img id="productImageTwoPreview"
                                                            style="height: 100px !important; width: 200px !important;"
                                                            class="imgPreview mx-auto"
                                                            src="{{ asset('admin/images/default-image.png') }}" />
                                                    </td>
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="file" id="productImageThree" class="form-control mb-3"
                                                            name="productImage[]">
                                                    </td>
                                                    <td>
                                                        <img id="productImageThreePreview"
                                                            style="height: 100px !important; width: 200px !important;"
                                                            class="imgPreview mx-auto"
                                                            src="{{ asset('admin/images/default-image.png') }}" />
                                                    </td>
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="file" id="productImageFour" class="form-control mb-3"
                                                            name="productImage[]">
                                                    </td>
                                                    <td>
                                                        <img id="productImageFourPreview"
                                                            style="height: 100px !important; width: 200px !important;"
                                                            class="imgPreview mx-auto"
                                                            src="{{ asset('admin/images/default-image.png') }}" />
                                                    </td>
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="file" id="productImageFive" class="form-control mb-3"
                                                            name="productImage[]">
                                                    </td>
                                                    <td>
                                                        <img id="productImageFivePreview"
                                                            style="height: 100px !important; width: 200px !important;"
                                                            class="imgPreview mx-auto"
                                                            src="{{ asset('admin/images/default-image.png') }}" />
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer-full-width  modal-footer">
                    <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-md btn-rounded" id="productAddConfirmBtn">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Delete -->
    <div class="modal fade" id="productModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body p-3 text-center">
                    <h5 class="mt-4">Do you want to Delete</h5>
                    <h5 id="productDeleteId" class="mt-4 d-none"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                    <button data-id="" id="confirmDeleteproduct" type="button" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->



    <!-- Products update -->
    <div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div id="ProductsEditForm" class="container d-none ">
                        <h5 id="productEditId" class="mt-4 d-none"></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <input id="pdnameupdate" type="text" id="" class="form-control mb-3"
                                    placeholder="Product Name">
                                <textarea id="pddesupdate" type="text" id="" class="form-control mb-3"
                                    placeholder="Product Description" cols="30" rows="10"></textarea>
                                <input id="pdpriceupdate" type="number" id="" class="form-control mb-3"
                                    placeholder="Product Price">
                                <input id="pdofferupdate" type="number" id="" class="form-control mb-3"
                                    placeholder="Offer Price">
                                <input id="pdquantityupdate" type="number" id="" class="form-control mb-3"
                                    placeholder="Product Quantity">

                            </div>
                            <div class="col-md-6">
                                <input id="pdslugupdate" type="text" id="" class="form-control mb-3"
                                    placeholder="Product slug">
                                <select id="pdfeatureupdate" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">
                                    <option disabled selected>Select Product Feature</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>

                                </select>
                                <select id="pdcategoryupdate" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">


                                </select>
                                <select id="pdbrandupdate" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">


                                </select>

                                <select name="" id="pdstatusupdate" class="form-control mb-3">
                                    <option value="1" selected>Publish</option>
                                    <option value="0">Pending</option>
                                </select>

                                <input type="file" id="pdimageupdate" class="form-control mb-3">
                                <img id="imagepreviewproduct" style="height: 100px !important;" class="imgPreview mt-3 "
                                    src="" />

                            </div>
                        </div>
                    </div>
                    <img id="ProductsLoader" class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">
                    <h3 id="ProductswrongLoader" class="d-none">Something Went Wrong!</h3>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button id="ProductupdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        getProductsdata();


        // for Products table

        function getProductsdata() {


            axios.get("{{ route('admin.getProductData') }}")
                .then(function(response) {

                    if (response.status = 200) {

                        $('#mainDivProducts').removeClass('d-none');
                        $('#loadDivProducts').addClass('d-none');

                        $('#productDataTable').DataTable().destroy();
                        $('#product_table').empty();
                        var dataJSON = response.data;

                        var count = 1;
                        $.each(dataJSON, function(i, item) {
                            $('<tr class="text-center">').html(
                                "<td>" + count++ + " </td>" +
                                "<td>" + dataJSON[i].product_title + " </td>" +
                                "<td>" + dataJSON[i].product_price + " </td>" +
                                "<td>" + dataJSON[i].product_selling_price + " </td>" +
                                "<td>" + dataJSON[i].product_quantity + " </td>" +
                                "<td>" + dataJSON[i].product_category_id + " </td>" +
                                "<td>" + dataJSON[i].product_active + " </td>" +
                                "<td>" + "<a href=" + dataJSON[i].id + "><i class='fas fa-eye'></i></a>" +
                                " </td>" +

                                "<td><a class='productEdit' data-id=" + dataJSON[i].id +
                                "><i class='fas fa-edit'></i></a> </td>" +
                                "<td><a class='productDeleteIcon' data-id=" + dataJSON[i].id +
                                " ><i class='fas fa-trash-alt'></i></a> </td>"
                            ).appendTo('#product_table');
                        });

                        //Products click on delete icon

                        $(".productDeleteIcon").click(function() {
                            var id = $(this).data('id');
                            $('#productDeleteId').html(id);
                            $('#productModalDelete').modal('show');

                        })


                        //Products edit icon click

                        $(".productEdit").click(function() {

                            var id = $(this).data('id');
                            $('#productEditId').html(id);
                            $('#updateProductModal').modal('show');
                            ProductUpdateDetails(id);

                        })


                        $('#productDataTable').DataTable({
                            "order": false
                        });
                        $('.dataTables_length').addClass('bs-select');

                    } else {
                        $('#wrongDivProducts').removeClass('d-none');
                        $('#loadDivProducts').addClass('d-none');

                    }
                }).catch(function(error) {

                    $('#wrongDivProducts').removeClass('d-none');
                    $('#loadDivProducts').addClass('d-none');
                });

        }




        //add button modal show for add new entity

        $('#addBtnproduct').click(function() {
            $('#addProductModal').modal('show');
        });


        // Material Select Initialization
        $(document).ready(function() {
            $('#pdCategory').material_select();
        });


        // Add Category List
        axios.get("{{ route('admin.getCategoriesData') }}")
            .then(function(response) {
                var dataJSON = response.data;
                $('#pdCategory').empty();
                $('#pdCategory').append(`<option disabled selected value="0">Select Category</option>`);
                $.each(dataJSON, function(i, item) {

                    $('#pdCategory').append(
                        `<option value="${dataJSON[i].id}"> ${dataJSON[i].name} </option>`);

                    $('#pdCategory').material_select('refresh');
                });
            }).catch(function(error) {
                alert("There are no Category")
            });



        // Material Select Initialization
        $(document).ready(function() {
            $('#pdBrand').material_select();
        });


        // Add Category List
        axios.get("{{ route('admin.getBrandsData') }}")
            .then(function(response) {
                var dataJSON = response.data;

                $('#pdBrand').empty();
                $('#pdBrand').append(`<option disabled selected >Select Brand</option>`);
                $.each(dataJSON, function(i, item) {

                    $('#pdBrand').append(
                        `<option value="${dataJSON[i].id}"> ${dataJSON[i].brandName} </option>`);

                    $('#pdBrand').material_select('refresh');
                });
            }).catch(function(error) {
                alert("There are no Brand")
            });





        $('#productImageOne').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#productImageOnePreview').attr('src', ImgSource)
            }
        })

        $('#productImageTwo').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#productImageTwoPreview').attr('src', ImgSource)
            }
        })

        $('#productImageThree').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#productImageThreePreview').attr('src', ImgSource)
            }
        })

        $('#productImageFour').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#productImageFourPreview').attr('src', ImgSource)
            }
        })

        $('#productImageFive').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#productImageFivePreview').attr('src', ImgSource)
            }
        })



        //Category Add
        $('#productAddConfirmBtn').click(function() {
            var product_title = $('#pdName').val();
            var product_discription = $('#pdDescription').val();
            var product_price = $('#pdPrice').val();
            var product_selling_price = $('#pdOffer').val();
            var product_quantity = $('#pdQuantity').val();
            var product_category_id = $('#pdCategory').val();
            var product_brand_id = $('#pdBrand').val();
            var product_in_stock = $('#pdStock').val();
            var feture_products = $('#pdFeature').val();
            var product_active = $('#pdActive').val();
            var images = [];
            $("input[name='productImage[]']").each(function() {
                if ($(this).prop('files')[0] !== undefined) {
                    images.push($(this).prop('files')[0]);
                }
            });

            productAdd(product_title, product_discription, product_price, product_selling_price, product_quantity,
                product_category_id, product_brand_id, product_in_stock, feture_products, product_active,
                images);
        })

        function productAdd(product_title, product_discription, product_price, product_selling_price, product_quantity,
            product_category_id, product_brand_id, product_in_stock, feture_products, product_active, images) {

            if (product_title.length == 0) {
                toastr.error('Product Title is empty!');
                $('#pdName').focus();
                $('#pdName').css('border', '1px solid red');
            } else if (product_discription.length == 0) {
                toastr.error('Product Description is empty!');
            } else if (product_price.length == 0) {
                toastr.error('Product Price is empty!');
            } else if (product_quantity.length == 0) {
                toastr.error('Product Quantity is empty!');
            } else {
                $('#productAddConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                my_data = [{
                    product_title: product_title,
                    product_discription: product_discription,
                    product_price: product_price,
                    product_selling_price: product_selling_price,
                    product_quantity: product_quantity,
                    product_category_id: product_category_id,
                    product_brand_id: product_brand_id,
                    product_in_stock: product_in_stock,
                    feture_products: feture_products,
                    product_active: product_active

                }];
                var fm = new FormData();
                fm.append('data', JSON.stringify(my_data));
                let TotalImages = images.length; //Total Images
                images.forEach(images => {
                    fm.append('images[]', images);
                })


                axios.post("{{ route('admin.productAdd') }}", fm, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function(response) {
                    console.log(response.data)
                    $('#productAddConfirmBtn').html("Save");
                    if (response.status = 200) {
                        if (response.data == 1) {
                            $('#addProductModal').modal('hide');
                            toastr.success('Add New Success .');

                            getProductsdata();
                        } else {
                            $('#addProductModal').modal('hide');
                            toastr.error('Add New Failed');
                            getProductsdata();
                        }
                    } else {
                        $('#addProductModal').modal('hide');
                        toastr.error('Something Went Wrong');
                    }
                }).catch(function(error) {
                    $('#addProductModal').modal('hide');
                    toastr.error('Something Went Wrong.....');
                });
            }
        }













 //  Brands delete modal yes button
 $('#confirmDeleteproduct').click(function() {
            var id = $('#productDeleteId').html();
            // var id = $(this).data('id');
            DeleteProductsData(id);
        })
        //delete Brands function
        function DeleteProductsData(id) {
            $('#confirmDeleteproduct').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
            axios.post("{{ route('admin.delete') }}", {
                    id: id
                })
                .then(function(response) {

                    $('#confirmDeleteproduct').html("Yes");
                    if (response.status == 200) {
                        if (response.data == 1) {
                            $('#productModalDelete').modal('hide');
                            toastr.error('Delete Success.');
                            getProductsdata();
                        } else {
                            $('#productModalDelete').modal('hide');
                            toastr.error('Delete Failed');
                            getProductsdata();
                        }
                    } else {
                        $('#productModalDelete').modal('hide');
                        toastr.error('Something Went Wrong');
                    }
                }).catch(function(error) {
                    $('#productModalDelete').modal('hide');
                    toastr.error('Something Went Wrong');
                });
        }




    </script>

@endsection
