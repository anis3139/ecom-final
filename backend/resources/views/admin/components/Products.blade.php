@extends('admin.Layouts.app')
@section('title', 'Home Setting')
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
    @include('admin.partials.productPartisal')

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
                            var pdStatus=""
                            if ( dataJSON[i].product_active==1) {
                                pdStatus="Publish"
                            }else{
                                pdStatus="Panding"
                            }
                            $('<tr class="text-center">').html(
                                "<td>" + count++ + " </td>" +
                                "<td>" + dataJSON[i].product_title + " </td>" +
                                "<td>" + dataJSON[i].product_price + " </td>" +
                                "<td>" + dataJSON[i].product_selling_price + " </td>" +
                                "<td>" + dataJSON[i].product_quantity + " </td>" +
                                "<td>" + dataJSON[i].get_category.name + " </td>" +
                                "<td>" + dataJSON[i].get_brand.name + " </td>" +
                                "<td>" +pdStatus + " </td>" +
                                "<td><a class='productView' data-id=" + dataJSON[i].id +
                                "><i class='fas fa-eye'></i></a></td>" +
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

                        $(".productView").click(function() {
                            var id = $(this).data('id');
                            $('#productsViewId').html(id);
                            $('#viewProductModal').modal('show');
                            ProductsViewDetails(id);


                        })

                        //Products edit icon click

                        $(".productEdit").click(function() {
                            var id = $(this).data('id');
                            $('#productEditId').html(id);

                            $('#updateProductModal').modal('show');
                            ProductsEditDetails(id);

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



        //Product Add
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

            var selectedmesermentId =  $('#pdmeserment').val();
            var product_colors=$("input[name='pdcolor[]']").map(function(){return $(this).val();}).get();


            if (selectedmesermentId == 1) {
                pdmesermentValue=[];
                var pdmesermentValue=$("input[name='sizeValue[]']").map(function(){return $(this).val();}).get();
            } else if(selectedmesermentId == 2){
                var wightMesermentValue=$("input[name='WightmesermentValue[]']").map(function(){return $(this).val();}).get();
                var wightMesermentType=$("input[name='WightmesermentType[]']").map(function(){return $(this).val();}).get();
                pdmesermentValue=[];
                for (let m = 0; m < wightMesermentValue.length; m++) {
                    const element = (wightMesermentValue[m]).toString()+(wightMesermentType[m]).toString();
                    pdmesermentValue.push(element);
                }

            }else{
                pdmesermentValue=[];
                var diamentionValue=$("input[name='pdmesermentValue[]']").map(function(){return $(this).val();}).get();
                var diamentiontype=$("input[name='diamentionInput[]']").map(function(){return $(this).val();}).get();
                for (let d = 0; d < diamentionValue.length; d++) {
                    const element = (diamentionValue[d]).toString() + diamentiontype[d].toString();
                    pdmesermentValue.push(element);
                }
            }

            console.log(pdmesermentValue);


            productAdd(product_title, product_discription, product_price, product_selling_price, product_quantity,
                product_category_id, product_brand_id, product_in_stock, feture_products, product_active,
                images,pdmesermentValue,product_colors);
        });

        function productAdd(product_title, product_discription, product_price, product_selling_price, product_quantity,
            product_category_id, product_brand_id, product_in_stock, feture_products, product_active, images ,pdmesermentValue ,product_colors) {

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
                    product_active: product_active,
                    pdmesermentValue: pdmesermentValue,
                    product_colors: product_colors
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
                    console.log(response.data);

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






        function ProductsViewDetails(id) {
            axios.post("{{ route('admin.getEditProductsData') }}", {
                    id: id
                })
                .then(function(response) {
                    if (response.status == 200) {
                        $('#loadDivProducts').addClass('d-none');
                        $('#ProductsEditForm').removeClass('d-none');

                        var dataJSON = response.data;
                        console.log(dataJSON);
                        var productOwner=" ";
                        if (dataJSON[0].product_owner_id==0) {
                            productOwner="Admin"
                        }else{
                            productOwner=dataJSON[0].product_owner_id
                        }

                        $('#pdNameShow').html(dataJSON[0].product_title)
                        $('#pdDesShow').html(dataJSON[0].product_discription)
                        $('#pdPriceShow').html(dataJSON[0].product_price)
                        $('#pdSellPrice').html(dataJSON[0].product_selling_price)
                        $('#product_quantity').html(dataJSON[0].product_quantity)
                        $('#product_category_id').html(dataJSON[0].get_category.name)
                        $('#product_brand_id').html(dataJSON[0].get_brand.name)
                        $('#product_if_has_color').html(dataJSON[0].product_if_has_color)
                        $('#product_meserment_type').html(dataJSON[0].product_meserment_type)
                        $('#product_owner_id').html(productOwner);


                        var imageViewHtml="";
                        for (let index = 0; index < dataJSON[0].image.length; index++) {
                            const element = dataJSON[0].image[index];
                            imageViewHtml+='<div class="border border-secondary text-center">';
                            imageViewHtml+='<img clsss="mx-auto d-block" style="width:200px;height:100px"  src="'+element.image_path+'" alt="">';
                            imageViewHtml+='</div>';
                            $('.ImageView').html(imageViewHtml);
                        }

                        var masermentHtml="";
                        for (let index = 0; index < dataJSON[0].maserment.length; index++) {
                            const element = dataJSON[0].maserment[index];
                            masermentHtml+='<li class="border border-secondary text-center p-2 m-1">';
                            masermentHtml+=element.meserment_value;
                            console.log(element.meserment_value);
                            masermentHtml+='</li>';
                            $('#product_meserment_type').html(masermentHtml);
                        }


                        var colortHtml="";
                        for (let index = 0; index < dataJSON[0].color.length; index++) {
                            const element = dataJSON[0].color[index];
                            colortHtml+='<li class="border border-secondary text-center p-2 m-1" style="border-radius:50%; width:40px; height:40px; background-color:'+element.product_color_code+'">';
                            colortHtml+='</li>';
                            $('#product_if_has_color').html(colortHtml);
                        }



                    } else {
                        $('#loadDivProducts').addClass('d-none');
                        $('#wrongDivProducts').removeClass('d-none');
                    }
                }).catch(function(error) {
                    $('#loadDivProducts').addClass('d-none');
                    $('#wrongDivProducts').removeClass('d-none');
                });
        }






        // Add Category List
        axios.get("{{ route('admin.getCategoriesData') }}")
            .then(function(response) {

                var dataJSON = response.data;
                $('#pdEditCategory').empty();
                $('#pdEditCategory').append(
                    `<option  selected class='p-5 m-5' value='0'>Parent Category</option>`);
                $.each(dataJSON, function(i, item) {
                    $('#pdEditCategory').append(
                        `<option value="${dataJSON[i].id}"> ${dataJSON[i].name} </option>`);

                    $('#pdEditCategory').material_select('refresh');
                });
            }).catch(function(error) {
                alert("There are no Category")
            });





        // Add Category List
        axios.get("{{ route('admin.getBrandsData') }}")
            .then(function(response) {
                var dataJSON = response.data;

                $('#pdEditBrand').empty();
                $('#pdEditBrand').append(`<option disabled selected >Select Brand</option>`);
                $.each(dataJSON, function(i, item) {

                    $('#pdEditBrand').append(
                        `<option value="${dataJSON[i].id}"> ${dataJSON[i].brandName} </option>`);

                    $('#pdEditBrand').material_select('refresh');
                });
            }).catch(function(error) {
                alert("There are no Brand")
            });




        $('#productEditImageOne').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#productEditImageOnePreview').attr('src', ImgSource)
            }
        })

        $('#productEditImageTwo').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#productEditImageTwoPreview').attr('src', ImgSource)
            }
        })

        $('#productEditImageThree').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#productEditImageThreePreview').attr('src', ImgSource)
            }
        })

        $('#productEditImageFour').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#productImageEditFourPreview').attr('src', ImgSource)
            }
        })

        $('#productEditImageFive').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#productImageEditFivePreview').attr('src', ImgSource)
            }
        })



        function ProductsEditDetails(id) {
            axios.post("{{ route('admin.getEditProductsData') }}", {
                    id: id
                })
                .then(function(response) {


                    if (response.status == 200) {
                        $('#loadDivProducts').addClass('d-none');
                        $('#CategoryEditForm').removeClass('d-none');

                        var jsonData = response.data;

                        $('#pdEditName').val(jsonData[0].product_title);

                        $('#pdEditDescription').val(jsonData[0].product_discription);

                        $('#pdEditPrice').val(jsonData[0].product_price);

                        $('#pdEditOffer').val(jsonData[0].product_selling_price);


                        $('#pdEditQuantity').val(jsonData[0].product_quantity);

                        $('#pdEditCategory option[value=' + jsonData[0].product_category_id + ']').prop('selected',
                            'true');

                        $('#pdEditBrand option[value=' + jsonData[0].product_brand_id + ']').prop('selected', 'true');

                        $('#pdEditStock option[value=' + jsonData[0].product_in_stock + ']').prop('selected', 'true');

                        $('#pdEditFeature option[value=' + jsonData[0].feture_products + ']').prop('selected', 'true');

                        $('#pdEditStatus option[value=' + jsonData[0].product_active + ']').prop('selected', 'true');


                        var iconSource = (jsonData[0].image[0].image_path);
                        $('#productEditImageOnePreview').attr('src', iconSource)

                        var ImgSource = (jsonData[0].image[1].image_path);
                        $('#productEditImageTwoPreview').attr('src', ImgSource)

                        var ImgSource = (jsonData[0].image[2].image_path);
                        $('#productEditImageThreePreview').attr('src', ImgSource)

                        var ImgSource = (jsonData[0].image[3].image_path);
                        $('#productImageEditFourPreview').attr('src', ImgSource)

                        var ImgSource = (jsonData[0].image[4].image_path);
                        $('#productImageEditFivePreview').attr('src', ImgSource)

                    } else {
                        $('#loadDivProducts').addClass('d-none');
                        $('#wrongDivProducts').removeClass('d-none');
                    }
                }).catch(function(error) {
                    $('#loadDivProducts').addClass('d-none');
                    $('#wrongDivProducts').removeClass('d-none');
                });
        }


        $('#pdmeserment').change(function () {
    var pdmesermentId = $('#pdmeserment').val();


    var html = "";
    if (pdmesermentId == 1) {
        html+='<table class="table table-bordered"><thead clss="text-center"><tr><th>Entry</th><th>Meserments</th><th class="text-center"><button class="btn btn-success btn-sm ml-auto" onclick="addMoreBtnForMesermrntSize();">Add More</button></th></tr></thead><tbody id="MesermrntSize">';


    } else if (pdmesermentId == 2) {
        html+='<table class="table table-bordered"><thead clss="text-center"><tr><th>Entry</th><th>Meserments</th><th class="text-center"><button class="btn btn-success btn-sm ml-auto" onclick="addMoreBtnForMesermrntWight();">Add More</button></th></tr></thead><tbody id="MesermrntWight">';




    } else if (pdmesermentId == 3) {
        html+='<table class="table table-bordered"><thead clss="text-center"><tr><th>Entry</th><th>Meserments</th><th class="text-center"><button class="btn btn-success btn-sm ml-auto" onclick="addMoreBtnForMesermrntDiamention();">Add More</button></th></tr></thead><tbody id="MesermrntDiamention">';





    } else {
        html += '<h4>No Meserment Selected</h4>';
    }
    html+='</tbody><table>'

    $('.meserment_input').html(html);
    addExtraColum(pdmesermentId);
});



var size=0;
function addMoreBtnForMesermrntSize() {
    size++;

    var html2="";
    html2+='<tr class="sizediv'+size+'">';
    html2+='<td colspan="2">';
    html2+='<select id="pdmesermentValue'+size+'" onChange="sizeOnChange('+size+')" name="pdmesermentValue[]" style="margin-bottom: 10px;" class="browser-default custom-select">';
    html2+='<option value="xsm" seclected>Extra Small</option>';
    html2+='<option selected>Select Type</option>';
    html2+='<option value="sm">Small</option>';
    html2+='<option value="m">Medium</option>';
    html2+='<option value="lg">Large</option>';
    html2+='<option value="xl">Extra Large</option>';
    html2+='<option value="xxl">Dubble Extra Large</option>';
    html2+='</select><input type="hidden" id="sizeValue'+ size +'" name="sizeValue[]" />';
    html2+='</td>';
    html2+='<td class="text-center">';
    html2+='<button class="btn btn-danger btn-sm mt-0" onclick="SizeRemove('+size+')"><i class="fas fa-minus-circle"></i></button>';
    html2+='</td>';
    html2+='</tr>';

    $('#MesermrntSize').append(html2);

}
function SizeRemove(id) {
    $('.sizediv'+id).remove();
}

function sizeOnChange(id){
    console.log(id);
    var getSizeValueforPushToInput=$('#pdmesermentValue'+id).val();
    $('#sizeValue'+id).val(getSizeValueforPushToInput);

}

var Wightrow = 0;

function addMoreBtnForMesermrntWight() {
    Wightrow++;

    var html3 = "";
    html3 += '<tr class="Wightdiv'+Wightrow+'">';
    html3 += '<td>';
    html3 += '<input id="WightmesermentValue" name="WightmesermentValue[]"  type="text" class="form-control" placeholder="Product Wight"/>';
    html3 += '</td>';
    html3 += '<td>';
    html3 += '<select id="WightmesermentType'+Wightrow+'" onChange="setWightInputValue('+Wightrow+');" name="WightmesermentType[]" style="margin-bottom: 10px;" class="browser-default custom-select"><option selected>Select Wight Type</><option value="mg">Mg</option><option value="gm">Gm</option><option value="KG">Kg</option><option value="galon">Galon</option></select>';
    html3 += '<input type="hidden" id="wightValue'+Wightrow+'" name="WightmesermentType[]"/></td>';
    html3 += '<td class="text-center">';
    html3 += '<button class="btn btn-danger btn-sm mt-0" onclick="WightrowRemove('+Wightrow+')"><i class="fas fa-minus-circle"></i></button>';
    html3 += '</td>';
    html3 += '</tr>';
    $('#MesermrntWight').append(html3);
}

function WightrowRemove(id) {
    $('.Wightdiv'+id).remove();
}


function setWightInputValue(id) {
    $('#wightValue'+id).val($('#WightmesermentType'+id).val());

}

var DiamentionRow = 0;

function addMoreBtnForMesermrntDiamention() {
    DiamentionRow++;

    var html4 = "";
    html4 += '<tr class="DiamentionRow'+DiamentionRow+'">';
    html4 += '<td>';
    html4 += '<input  name="pdmesermentValue[]" type="text" class="form-control" placeholder="Product Dimension"/>';
    html4 += '</td>';
    html4 += '<td>';
    html4 += '<select id="Diamentionmeserment'+DiamentionRow+'" onchange="setDiamentionInputValue('+DiamentionRow+')" style="margin-bottom: 10px;" class="browser-default custom-select"><option>Select Type</option><option value="metter">Metter</option><option value="cm">Centi Metter</option><option value="inc">Inch</option></select>';
    html4 += '<input type="hidden" id="diamentionValue'+DiamentionRow+'" name="diamentionInput[]" /></td>';
    html4 += '<td class="text-center">';
    html4 += '<button class="btn btn-danger btn-sm mt-0" onclick="diamentionRowRemove('+DiamentionRow+');"><i class="fas fa-minus-circle"></i></button>';
    html4 += '</td>';
    html4 += '<tr>';

    $('#MesermrntDiamention').append(html4);
}

function diamentionRowRemove(id) {
    $('.DiamentionRow'+id).remove();
}

function setDiamentionInputValue(id) {
    $('#diamentionValue'+id).val($('#Diamentionmeserment'+id).val());
}


function addExtraColum(id) {

    if (id == 1 ) {
        addMoreBtnForMesermrntSize();
    } else if(id == 2){
        addMoreBtnForMesermrntWight();
    } else if(id == 3){
        addMoreBtnForMesermrntDiamention()
    }else{
        return;
    }
}




            var color = 0;

            function addInput() {
            color++;
            var html6 = "";
            html6+= '<tr id="rowid' + color + '">';
            html6+= '<td class="text-center">' + color + ' </td>';
            html6+='<td>';
            html6+='<div id="input' + color + '" class="input-group" name="colorInput" title="Using input value">';
            html6+='    <input type="text" class="form-control input-lg" name="pdcolor[]" value="#000000"/>';
            html6+='    <span class="input-group-append">';
            html6+='      <span class="input-group-text colorpicker-input-addon"><i></i></span>';
            html6+='    </span>';
            html6+='  </div>';
            html6+='</td>';
            html6 += '<td class="text-center p-0"> <button onclick="removeColorInput(' + color + ');" class="btn  btn-danger btn-sm p-o"><i class="fas fa-minus-circle fa-2x"></i></button></td>';
            html6 += '</tr>';

            $('#append_tbody').append(html6);
            $('#input'+color).colorpicker();
        }


        function removeColorInput(row_id) {
            $('#rowid' + row_id).remove();
        }

    </script>

@endsection
