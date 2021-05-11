@extends('admin.Layouts.app')
@section('title', ' About page')

@section('content')


@include('admin.components.AboutSection')
@include('admin.components.SpecialFeature')
@include('admin.components.ExclusiveFeature')
@include('admin.components.Testimonial')





@endsection

@section('script')
    <script>
        // Title Add


        $('#submitTitle').click(function() {
            var title = $('#addTitle').val();
            addTitle(title);
        })

        function addTitle(title) {
            if (title.length == 0) {
                toastr.error('title is empty!');

            } else {
                $('#submitTitle').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("{{route('admin.addHAtitle')}}", {
                        title: title
                    })
                    .then(function(response) {
                        $('#submitTitle').html("Update");
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


        // Description Add


        $('#submitDescription').click(function() {
            var description = $('#addDescription').val();


            addDescription(description);
        })

        function addDescription(description) {
            if (description.length == 0) {
                toastr.error('Description is empty!');

            } else {
                $('#submitDescription').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("{{route('admin.addHADescription')}}", {
                        description: description
                    })
                    .then(function(response) {

                        $('#submitDescription').html("Update");
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


        //Image Add

        $('#submitImage').click(function() {
            var image = $('#addImage').prop('files')[0];
            addAboutImage(image);
        })

        $('#addImage').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#addimagepreview').attr('src', ImgSource)
            }
        })


        function addAboutImage(image) {


            $('#submitImage').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            var formData = new FormData();
            formData.append('photo', image);

            axios.post("{{route('admin.addHAimage')}}", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#submitImage').html("Update");
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

        //Image  2  Add

        $('#submitImage2').click(function() {
            var image2 = $('#addImage2').prop('files')[0];
            addAboutImage2(image2);
        })

        $('#addImage2').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#addimagepreview2').attr('src', ImgSource)
            }
        })


        function addAboutImage2(image2) {


            $('#submitImage2').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            var formData = new FormData();
            formData.append('photo', image2);

            axios.post("{{route('admin.addHAimage2')}}", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#submitImage2').html("Update");
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

        //Image  3  Add

        $('#submitImage3').click(function() {
            var image3 = $('#addImage3').prop('files')[0];
            addAboutImage3(image3);
        })

        $('#addImage3').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#addimagepreview3').attr('src', ImgSource)
            }
        })


        function addAboutImage3(image3) {


            $('#submitImage3').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            var formData = new FormData();
            formData.append('photo', image3);

            axios.post("{{route('admin.addHAimage3')}}", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#submitImage3').html("Update");
                if (response.status = 300) {
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




        getHomeFeaturedSpecialsData();
        // for Testimonial table

        function getHomeFeaturedSpecialsData() {


            axios.get("{{route('admin.getFSdata')}}")
                .then(function(response) {

                    if (response.status = 200) {

                        $('#mainDivProjects').removeClass('d-none');
                        $('#loadDivProjects').addClass('d-none');

                        $('#SliderDataTable').DataTable().destroy();
                        $('#Slider_table').empty();
                        var count = 1;
                        var dataJSON = response.data;
                        $.each(dataJSON, function(i, item) {
                            $('<tr>').html(
                                "<td>" + count++ + " </td>" +

                                "<td class='text-break'>" + dataJSON[i].title + " </td>" +

                                "<td class='text-break'>" + dataJSON[i].description + " </td>" +

                                "<td><a class='SliderEditIcon' data-id=" + dataJSON[i].id +
                                "><i class='fas fa-edit'></i></a> </td>" +

                                "<td><a class='SliderDeleteIcon' data-id=" + dataJSON[i].id +
                                " ><i class='fas fa-trash-alt'></i></a> </td>"
                            ).appendTo('#Slider_table');
                        });


                        //Projects click on delete icon

                        $(".SliderDeleteIcon").click(function() {

                            var id = $(this).data('id');
                            $('#FeaturedSpecialsDeleteId').html(id);
                            $('#deleteModalFeaturedSpecials').modal('show');

                        })



                        //Project edit icon click

                        $(".SliderEditIcon").click(function() {

                            var id = $(this).data('id');
                            $('#FeaturedSpecialsESEditId').html(id);

                            $('#updateFeaturedSpecialsModal').modal('show');
                            FeaturedSpecialsUpdateDetails(id);

                        })



                    } else {
                        $('#wrongDivProjects').removeClass('d-none');
                        $('#loadDivProjects').addClass('d-none');

                    }
                }).catch(function(error) {

                    $('#wrongDivProjects').removeClass('d-none');
                    $('#loadDivProjects').addClass('d-none');
                });


        }




        //add button modal show for add new entity

        $('#addbtnFeaturedSpecials').click(function() {
            $('#addFeaturedSpecialsModal').modal('show');
        });


        //Slider Add modal save button

        $('#FeaturedSpecialsAddConfirmBtn').click(function() {
            var title = $('#FeaturedSpecialsTitle').val();
            var description = $('#FeaturedSpecialsDescription').val();
            FeaturedSpecialsAdd(title, description);

        })

        function FeaturedSpecialsAdd(title, description) {

            if (title.length == 0) {

                toastr.error('Title is empty!');

            } else if (description == 0) {

                toastr.error('description is empty!');
            } else {

                $('#FeaturedSpecialsAddConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

                axios.post("{{route('admin.addFSdata')}}", {
                        title: title,
                        description: description,
                    })

                    .then(function(response) {

                        $('#FeaturedSpecialsAddConfirmBtn').html("Save");

                        if (response.status = 200) {
                            if (response.data == 1) {
                                $('#addFeaturedSpecialsModal').modal('hide');
                                toastr.success('Add New Success .');
                                getHomeFeaturedSpecialsData();
                            } else {
                                $('#addFeaturedSpecialsModal').modal('hide');
                                toastr.error('Add New Failed');
                                getHomeFeaturedSpecialsData();
                            }
                        } else {
                            $('#addFeaturedSpecialsModal').modal('hide');
                            toastr.error('Something Went Wrong');
                        }


                    }).catch(function(error) {

                        $('#addFeaturedSpecialsModal').modal('hide');
                        toastr.error('Something Went Wrong');

                    });

            }

        }





        //  Special Feature delete modal yes button

        $('#confirmDeleteFeaturedSpecials').click(function() {
            var id = $('#FeaturedSpecialsDeleteId').html();
            // var id = $(this).data('id');
            DeleteDataSlider(id);

        })


        //delete FeaturedS pecials Extra Servicess function

        function DeleteDataSlider(id) {
            $('#confirmDeleteFeaturedSpecials').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            axios.post("{{route('admin.homeFSdelete')}}", {
                    id: id
                })
                .then(function(response) {
                    $('#confirmDeleteFeaturedSpecials').html("Yes");

                    if (response.status == 200) {


                        if (response.data == 1) {
                            $('#deleteModalFeaturedSpecials').modal('hide');
                            toastr.error('Delete Success.');
                            getHomeFeaturedSpecialsData();
                        } else {
                            $('#deleteModalFeaturedSpecials').modal('hide');
                            toastr.error('Delete Failed');
                            getHomeFeaturedSpecialsData();
                        }

                    } else {
                        $('#deleteModalFeaturedSpecials').modal('hide');
                        toastr.error('Something Went Wrong');
                    }

                }).catch(function(error) {

                    $('#deleteModalFeaturedSpecials').modal('hide');
                    toastr.error('Something Went Wrong');

                });

        }







        //each FeaturedSpecials  Details data show for edit

        function FeaturedSpecialsUpdateDetails(id) {

            axios.post("{{route('admin.HomeFSEdit')}}", {
                    id: id
                })
                .then(function(response) {

                    if (response.status == 200) {


                        $('#projectLoader').addClass('d-none');
                        $('#SliderEditForm').removeClass('d-none');
                        var jsonData = response.data;


                        $('#FeaturedSpecialsESTitleIdUpdate').val(jsonData[0].title);
                        $('#FeaturedSpecialsESDesIdUpdate').val(jsonData[0].description);
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

        $('#FeaturedSpecialsESupdateConfirmBtn').click(function() {


            var idUpdate = $('#FeaturedSpecialsESEditId').html();
            var nameUpdate = $('#FeaturedSpecialsESTitleIdUpdate').val();
            var desUpdate = $('#FeaturedSpecialsESDesIdUpdate').val();



            SliderUpdate(idUpdate, nameUpdate, desUpdate);

        })





        //update Special Feature data using modal

        function SliderUpdate(idUpdate, nameUpdate, desUpdate) {



            if (nameUpdate.length == 0) {

                toastr.error('Title  is empty!');

            } else if (desUpdate == 0) {

                toastr.error(' description is empty!');

            } else {
                $('#FeaturedSpecialsESupdateConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

                updateData = [{
                        id: idUpdate,
                        name: nameUpdate,
                        description: desUpdate,
                    }

                ];

                axios.post("{{route('admin.HomeFSUpdate')}}", {
                        id: idUpdate,
                        title: nameUpdate,
                        description: desUpdate,
                    })


                    .then(function(response) {

                        $('#FeaturedSpecialsESupdateConfirmBtn').html("Update");

                        if (response.status = 200) {
                            if (response.data == 1) {
                                $('#updateFeaturedSpecialsModal').modal('hide');
                                toastr.success('Update Success.');
                                getHomeFeaturedSpecialsData();

                            } else {
                                $('#updateFeaturedSpecialsModal').modal('hide');
                                toastr.error('Update Failed');
                                getHomeFeaturedSpecialsData();

                            }
                        } else {
                            $('#updateFeaturedSpecialsModal').modal('hide');
                            toastr.error('Something Went Wrong');
                        }


                    }).catch(function(error) {

                        $('#updateFeaturedSpecialsModal').modal('hide');
                        toastr.error('Something Went Wrong');

                    });
            }
        }








        // Exclusive Feature Section





        $('#submitImageEXP').click(function() {
            var exp_image = $('#addImageEXP').prop('files')[0];
            addImageEXP(exp_image);
        })

        $('#addImageEXP').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#addimagepreviewEXP').attr('src', ImgSource)
            }
        })


        function addImageEXP(exp_image) {


$('#submitImageEXP').html(
    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


var formData = new FormData();
formData.append('photo', exp_image);

axios.post("{{route('admin.addEXPimage')}}", formData, {
    headers: {
        'Content-Type': 'multipart/form-data'
    }
}).then(function(response) {

    $('#submitImageEXP').html("Update");
    if (response.status = 300) {
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





        getHomeExclusiveSpecialsData();
        // for Exclusive table

        function getHomeExclusiveSpecialsData() {


            axios.get("{{route('admin.getEXPdata')}}")
                .then(function(response) {
                        console.log(response.data);
                    if (response.status = 200) {

                        $('#mainDivEXP').removeClass('d-none');
                        $('#loadDivEXP').addClass('d-none');

                        $('#EXPDataTable').DataTable().destroy();
                        $('#EXF_table').empty();
                        var count = 1;
                        var dataJSON = response.data;
                        console.log(dataJSON);
                        $.each(dataJSON, function(i, item) {
                            $('<tr>').html(
                                "<td>" + count++ + " </td>" +

                                "<td class='text-break'>" + dataJSON[i].exp_title + " </td>" +

                                "<td class='text-break'>" + dataJSON[i].exp_description + " </td>" +

                                "<td class='text-center'><a class='EXPEditIcon ' data-id=" + dataJSON[i].id +
                                "><i class='fas fa-edit'></i></a> </td>"

                                // + "<td><a class='EXPDeleteIcon' data-id=" + dataJSON[i].id +
                                // " ><i class='fas fa-trash-alt'></i></a> </td>"
                            ).appendTo('#EXF_table');
                        });

                        $(".EXPDeleteIcon").click(function() {

                            var id = $(this).data('id');
                            $('#ExclusiveFeatureDeleteId').html(id);
                            $('#deleteModalExclusiveFeature').modal('show');

                        })

                        $(".EXPEditIcon").click(function() {

                            var id = $(this).data('id');
                            $('#ExclusiveFeatureESEditId').html(id);

                            $('#updateExclusiveFeatureModal').modal('show');
                            ExclusiveFeatureUpdateDetails(id);

                        })


                    } else {
                        $('#wrongDivEXP').removeClass('d-none');
                        $('#loadDivEXP').addClass('d-none');

                    }
                }).catch(function(error) {

                    $('#wrongDivEXP').removeClass('d-none');
                    $('#loadDivEXP').addClass('d-none');
                });


        }










        //add button modal show for add new entity

        $('#addbtnexclusiveSpecials').click(function() {
            $('#addExclusiveFeatureModal').modal('show');
        });


        //Exclusive Add modal save button

        $('#ExclusiveFeatureAddConfirmBtn').click(function() {
            var exp_title = $('#ExclusiveFeatureTitle').val();
            var exp_description = $('#ExclusiveFeatureDescription').val();
            ExclusiveFeatureAdd(exp_title, exp_description);

        })

        function ExclusiveFeatureAdd(exp_title, exp_description) {

            if (exp_title.length == 0) {

                toastr.error('Title is empty!');

            } else if (exp_description == 0) {

                toastr.error('description is empty!');
            } else {

                $('#ExclusiveFeatureAddConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

                axios.post("{{route('admin.homeEXPAdd')}}", {
                    exp_title: exp_title,
                    exp_description: exp_description,
                    })

                .then(function(response) {
                    console.log(response.data);
                    $('#ExclusiveFeatureAddConfirmBtn').html("Save");

                    if (response.status = 200) {
                        if (response.data == 1) {
                            $('#addExclusiveFeatureModal').modal('hide');
                            toastr.success('Add New Success .');
                            getHomeExclusiveSpecialsData();
                        } else {
                            $('#addExclusiveFeatureModal').modal('hide');
                            toastr.error('Add New Failed');
                            getHomeExclusiveSpecialsData();
                        }
                    } else {
                        $('#addExclusiveFeatureModal').modal('hide');
                        toastr.error('Something Went Wrong');
                    }


                }).catch(function(error) {

                    $('#addExclusiveFeatureModal').modal('hide');
                    toastr.error('Something Went Wrong');

                });

            }

        }




        //  Exclusive Feature delete modal yes button

        $('#confirmDeleteExclusiveFeature').click(function() {
            var id = $('#ExclusiveFeatureDeleteId').html();
            // var id = $(this).data('id');
            DeleteDataEXP(id);

        })


        //delete Exclusive Feature  function

        function DeleteDataEXP(id) {
            $('#confirmDeleteExclusiveFeature').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            axios.post("{{route('admin.HomeEXFDelete')}}", {
                    id: id
                })
                .then(function(response) {
                    $('#confirmDeleteExclusiveFeature').html("Yes");

                    if (response.status == 200) {


                        if (response.data == 1) {
                            $('#deleteModalExclusiveFeature').modal('hide');
                            toastr.error('Delete Success.');
                            getHomeExclusiveSpecialsData();
                        } else {
                            $('#deleteModalExclusiveFeature').modal('hide');
                            toastr.error('Delete Failed');
                            getHomeExclusiveSpecialsData();
                        }

                    } else {
                        $('#deleteModalExclusiveFeature').modal('hide');
                        toastr.error('Something Went Wrong');
                    }

                }).catch(function(error) {

                    $('#deleteModalExclusiveFeature').modal('hide');
                    toastr.error('Something Went Wrong');

                });

        }






//Get  Update Excludive Feature Data




function ExclusiveFeatureUpdateDetails(id) {

axios.post("{{route('admin.HomeEXPEdit')}}", {
        id: id
    })
    .then(function(response) {

        if (response.status == 200) {


            $('#loadDivEXP').addClass('d-none');
            $('#EXPEditForm').removeClass('d-none');
            var jsonData = response.data;


            $('#exclusiveFeaturedTitleIdUpdate').val(jsonData[0].exp_title);
            $('#exclusiveFeaturedDesIdUpdate').val(jsonData[0].exp_description);
        } else {

            $('#loadDivEXP').addClass('d-none');
            $('#wrongDivEXP').removeClass('d-none');
        }

    }).catch(function(error) {

        $('#loadDivEXP').addClass('d-none');
        $('#wrongDivEXP').removeClass('d-none');

    });

}







        //Featured Specials update modal save button

$('#exclusiveFeaturedUpdateConfirmBtn').click(function() {


var EXPidUpdate = $('#ExclusiveFeatureESEditId').html();
var exp_title = $('#exclusiveFeaturedTitleIdUpdate').val();
var exp_description = $('#exclusiveFeaturedDesIdUpdate').val();



EXPUpdate(EXPidUpdate, exp_title, exp_description);

})





//update Special Feature data using modal

function EXPUpdate(EXPidUpdate, exp_title, exp_description) {



if (exp_title.length == 0) {

    toastr.error('Title  is empty!');

} else if (exp_description == 0) {

    toastr.error(' description is empty!');

} else {
    $('#exclusiveFeaturedUpdateConfirmBtn').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation



    axios.post("{{route('admin.HomeEXPUpdate')}}", {
            id: EXPidUpdate,
            exp_title: exp_title,
            exp_description: exp_description,
        })


        .then(function(response) {

            $('#exclusiveFeaturedUpdateConfirmBtn').html("Update");

            if (response.status = 200) {
                if (response.data == 1) {
                    $('#updateExclusiveFeatureModal').modal('hide');
                    toastr.success('Update Success.');
                    getHomeExclusiveSpecialsData();

                } else {
                    $('#updateExclusiveFeatureModal').modal('hide');
                    toastr.error('Update Failed');
                    getHomeExclusiveSpecialsData();

                }
            } else {
                $('#updateExclusiveFeatureModal').modal('hide');
                toastr.error('Something Went Wrong');
            }


        }).catch(function(error) {

            $('#updateExclusiveFeatureModal').modal('hide');
            toastr.error('Something Went Wrong');

        });
}
}



// Testimonial Section


        getHomeTestimonialData();


        function getHomeTestimonialData() {


            axios.get("{{route('admin.getTestimonialData')}}")
                .then(function(response) {

                    if (response.status = 200) {

                        $('#mainDivTestimonial').removeClass('d-none');
                        $('#loadDivTestimonial').addClass('d-none');

                        $('#TestimonialDataTable').DataTable().destroy();
                        $('#Testimonial_table').empty();
                        var count = 1;
                        var dataJSON = response.data;

                        $.each(dataJSON, function(i, item) {
                            $('<tr>').html(
                                "<td>" + count++ + " </td>" +

                                "<td class='text-break'>" + dataJSON[i].name + " </td>" +

                                "<td><img width='200px' height='80' class='table-img' src=" + dataJSON[i]
                                .image + "> </td>" +

                                "<td>" + dataJSON[i].date + " </td>" +


                                "<td class='text-break'>" + dataJSON[i].description + " </td>" +

                                "<td class='text-center'><a class='TestimonialEditIcon' data-id=" + dataJSON[i].id +
                                "><i class='fas fa-edit'></i></a> </td>" +

                                 "<td><a class='TestimonialDeleteIcon' data-id=" + dataJSON[i].id +
                                " ><i class='fas fa-trash-alt'></i></a> </td>"
                            ).appendTo('#Testimonial_table');
                        });

                        $(".TestimonialDeleteIcon").click(function() {

                            var id = $(this).data('id');
                            $('#TestimonioalDeleteId').html(id);
                            $('#deleteModalTestimonial').modal('show');

                        })

                        $(".TestimonialEditIcon").click(function() {

                            var id = $(this).data('id');
                            $('#TestimonialEditId').html(id);

                            $('#updateTestimonialModal').modal('show');
                            TestimonialUpdateDetails(id);

                        })


                    } else {
                        $('#wrongDivTestimonial').removeClass('d-none');
                        $('#loadDivTestimonial').addClass('d-none');

                    }
                }).catch(function(error) {

                    $('#wrongDivTestimonial').removeClass('d-none');
                    $('#loadDivTestimonial').addClass('d-none');
                });


        }









        //add button modal show for add new entity

        $('#addbtnTestimonial').click(function() {
            $('#addTestimonioalModal').modal('show');
        });


        //Exclusive Add modal save button

        $('#TestimonioalAddConfirmBtn').click(function() {


            var TestimonioalName = $('#TestimonioalName').val();
            var TestimonioalDate = $('#TestimonioalDate').val();
            var TestimonioalDes = $('#TestimonioalDes').val();
            var Testimonioalimg = $('#Testimonioalimg').prop('files')[0];
            sliderAdd(TestimonioalName, TestimonioalDate,TestimonioalDes, Testimonioalimg);

        })




        $('#Testimonioalimg').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#addimagepreviewTestimonioal').attr('src', ImgSource)
            }
        })

        //Exclusive Add Method


        function sliderAdd(TestimonioalName, TestimonioalDate, TestimonioalDes, Testimonioalimg) {



            if (TestimonioalName.length == 0) {

                toastr.error('Testimonioal Title is empty!');

            } else if (TestimonioalDate == 0) {

                toastr.error('Testimonioal description is empty!');
            }else if (TestimonioalDes == 0) {

                toastr.error('Testimonioal Page is empty!');
            } else {

                $('#TestimonioalAddConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation



                my_data = [{
                        name: TestimonioalName,
                        description: TestimonioalDes,
                        date: TestimonioalDate,
                    }

                ];
                var formData = new FormData();
                formData.append('data', JSON.stringify(my_data));

                formData.append('photo', Testimonioalimg);

                axios.post("{{route('admin.TestimonialAdd')}}", formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function(response) {

                    $('#TestimonioalAddConfirmBtn').html("Save");

                    if (response.status = 200) {
                        if (response.data == 1) {
                            $('#addTestimonioalModal').modal('hide');
                            toastr.success('Add New Success .');
                              getHomeTestimonialData();
                        } else {
                            $('#addTestimonioalModal').modal('hide');
                            toastr.error('Add New Failed');
                              getHomeTestimonialData();
                        }
                    } else {
                        $('#addTestimonioalModal').modal('hide');
                        toastr.error('Something Went Wrong');
                    }


                }).catch(function(error) {

                    $('#addTestimonioalModal').modal('hide');
                    toastr.error('Something Went Wrong');

                });

            }

        }


//  Testimonial delete modal yes button

        $('#confirmDeleteTestimonioal').click(function() {
            var id = $('#TestimonioalDeleteId').html();
            // var id = $(this).data('id');
            DeleteDataTestimonioal(id);

        })


        //delete courses function

        function DeleteDataTestimonioal(id) {
            $('#confirmDeleteTestimonioal').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            axios.post("{{route('admin.TestimonialDelete')}}", {
                    id: id
                })
                .then(function(response) {
                    $('#confirmDeleteTestimonioal').html("Yes");

                    if (response.status == 200) {


                        if (response.data == 1) {
                            $('#deleteModalTestimonial').modal('hide');
                            toastr.error('Delete Success.');
                            getHomeTestimonialData();
                        } else {
                            $('#deleteModalTestimonial').modal('hide');
                            toastr.error('Delete Failed');
                            getHomeTestimonialData();
                        }

                    } else {
                        $('#deleteModalTestimonial').modal('hide');
                        toastr.error('Something Went Wrong');
                    }

                }).catch(function(error) {

                    $('#deleteModalTestimonial').modal('hide');
                    toastr.error('Something Went Wrong');

                });

        }




  //each courses  Details data show for edit

function TestimonialUpdateDetails(id) {

axios.post("{{route('admin.getTestimonialEditData')}}", {
        id: id
    })
    .then(function(response) {

        if (response.status == 200) {


            $('#loadDivTestimonial').addClass('d-none');
            $('#TestimonialEditForm').removeClass('d-none');
            var jsonData = response.data;


            $('#TestimonialNameIdUpdate').val(jsonData[0].name);
            $('#TestimonialDateIdUpdate').val(jsonData[0].date);
            $('#TestimonioalDesIdUpdate').val(jsonData[0].description);
            var ImgSource = (jsonData[0].image);
            $('#imagepreviewTestimonioal').attr('src', ImgSource)
        } else {

            $('#loadDivTestimonial').addClass('d-none');
            $('#wrongDivTestimonial').removeClass('d-none');
        }

    }).catch(function(error) {

        $('#loadDivTestimonial').addClass('d-none');
        $('#wrongDivTestimonial').removeClass('d-none');

    });

}


$('#TestimonioalimgUpdate').change(function() {
var reader = new FileReader();
reader.readAsDataURL(this.files[0]);
reader.onload = function(event) {
    var ImgSource = event.target.result;
    $('#imagepreviewTestimonioal').attr('src', ImgSource)
}
})






//Testimonioal update modal save button

$('#TestimonioalConfirmBtn').click(function() {


var idUpdate = $('#TestimonialEditId').html();
var nameUpdate = $('#TestimonialNameIdUpdate').val();
var dateUpdate = $('#TestimonialDateIdUpdate').val();
var desUpdate = $('#TestimonioalDesIdUpdate').val();
var img = $('#TestimonioalimgUpdate').prop('files')[0];


TestimonioalUpdate(idUpdate, nameUpdate,dateUpdate, desUpdate, img);

})





//update project data using modal

function TestimonioalUpdate(idUpdate, nameUpdate, dateUpdate, desUpdate, img) {



if (nameUpdate.length == 0) {

    toastr.error('Testimonial name is empty!');

} else if (dateUpdate == 0) {

    toastr.error('Testimonial date is empty!');

}else if (desUpdate == 0) {

    toastr.error('Testimonial description is empty!');

} else {
    $('#TestimonioalConfirmBtn').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

    updateData = [{
            id: idUpdate,
            name: nameUpdate,
            date: dateUpdate,
            description: desUpdate,

        }

    ];
    var formData = new FormData();
    formData.append('data', JSON.stringify(updateData));
    formData.append('photo', img);


    axios.post("{{route('admin.TestimonilaUpdate')}}", formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(function(response) {
        console.log(response.data);
        $('#TestimonioalConfirmBtn').html("Update");

        if (response.status = 200) {

            if (response.data == 1) {
                $('#updateTestimonialModal').modal('hide');
                toastr.success('Update Success.');
                getHomeTestimonialData();

            } else {
                $('#updateTestimonialModal').modal('hide');
                toastr.error('Update Failed');
                getHomeTestimonialData();

            }
        } else {
            $('#updateTestimonialModal').modal('hide');
            toastr.error('Something Went Wrong');
        }


    }).catch(function(error) {

        $('#updateTestimonialModal').modal('hide');
        toastr.error('Something Went Wrong');

    });
}
}

    </script>
@endsection
