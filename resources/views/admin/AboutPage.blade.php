@extends('admin.Layouts.app')
@section('title', ' About page')
@php
$usr = Auth::guard('admin')->user();
@endphp
@section('css')



@endsection
@section('content')

@include('admin.components.AboutSection')
@include('admin.components.SpecialFeature')
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
            axios.post("{{ route('admin.addHAtitle') }}", {
                    title: title
                })
                .then(function(response) {
                    $('#submitTitle').html("Update");
                    if (response.status = 200) {
                        if (response.data == 1) {
                            toastr.success('Updated Success .', 'Success', {
                                closeButton: true,
                                progressBar: true,
                            });


                        } else {
                            toastr.error('Updated Failed', 'Error', {
                                closeButton: true,
                                progressBar: true,
                            });
                        }
                    } else {
                        toastr.error('Something Went Wrong', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                    }
                }).catch(function(error) {
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                });
        }
    }


    // Description Add


    $('#submitDescription').click(function() {
        var description = $('#addDescription').val();
        console.log(description);
        addDescription(description);
    })

    function addDescription(description) {
        if (description.length == 0) {
            toastr.error('Description is empty!');

        } else {
            $('#submitDescription').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
            axios.post("{{ route('admin.addHADescription') }}", {
                    description: description
                })
                .then(function(response) {

                    $('#submitDescription').html("Update");
                    if (response.status = 200) {
                        if (response.data == 1) {
                            toastr.success('Updated Success .', 'Success', {
                                closeButton: true,
                                progressBar: true,
                            });


                        } else {
                            toastr.error('Updated Failed', 'Error', {
                                closeButton: true,
                                progressBar: true,
                            });
                        }
                    } else {
                        toastr.error('Something Went Wrong', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                    }
                }).catch(function(error) {
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
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

        axios.post("{{ route('admin.addHAimage') }}", formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(function(response) {

            $('#submitImage').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {

                    toastr.success('Updated Success .', 'Success', {
                        closeButton: true,
                        progressBar: true,
                    });

                } else {

                    toastr.error('Updated Failed', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });

                }
            } else {

                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            }


        }).catch(function(error) {


            toastr.error('Something Went Wrong', 'Error', {
                closeButton: true,
                progressBar: true,
            });

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

        axios.post("{{ route('admin.addHAimage2') }}", formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(function(response) {

            $('#submitImage2').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {

                    toastr.success('Updated Success .', 'Success', {
                        closeButton: true,
                        progressBar: true,
                    });

                } else {

                    toastr.error('Updated Failed', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });

                }
            } else {

                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            }


        }).catch(function(error) {


            toastr.error('Something Went Wrong', 'Error', {
                closeButton: true,
                progressBar: true,
            });

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

        axios.post("{{ route('admin.addHAimage3') }}", formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(function(response) {

            $('#submitImage3').html("Update");
            if (response.status = 300) {
                if (response.data == 1) {

                    toastr.success('Updated Success .', 'Success', {
                        closeButton: true,
                        progressBar: true,
                    });

                } else {

                    toastr.error('Updated Failed', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });

                }
            } else {

                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            }


        }).catch(function(error) {


            toastr.error('Something Went Wrong', 'Error', {
                closeButton: true,
                progressBar: true,
            });

        });



    }




    getSpecialFeatureData();
    // for Testimonial table

    function getSpecialFeatureData() {


        axios.get("{{ route('admin.getFSdata') }}")
            .then(function(response) {

                if (response.status = 200) {

                    $('#mainDivProjects').removeClass('d-none');
                    $('#loadDivProjects').addClass('d-none');

                    $('#SliderDataTable').DataTable().destroy();
                    $('#SPTable').empty();
                    var count = 1;
                    var dataJSON = response.data;
                    $.each(dataJSON, function(i, item) {
                        $('<tr>').html(
                            "<td>" + count++ + " </td>" +

                            "<td class='text-break'>" + dataJSON[i].title + " </td>" +

                            "<td class='text-break'>" + dataJSON[i].description + " </td>" +

                            "<td><a class='SPEditIcon' data-id=" + dataJSON[i].id +
                            "><i class='fas fa-edit'></i></a> </td>" +

                            "<td><a class='SPDeleteIcon' data-id=" + dataJSON[i].id +
                            " ><i class='fas fa-trash-alt'></i></a> </td>"
                        ).appendTo('#SPTable');
                    });

                   
                    

                    //Projects click on delete icon

                    $(".SPDeleteIcon").click(function() {

                        var id = $(this).data('id');
                        $('#FeaturedSpecialsDeleteId').html(id);
                        $('#deleteModalSpecialsFeatured').modal('show');

                    })



                    //Project edit icon click

                    $(".SPEditIcon").click(function() {

                        var id = $(this).data('id');
                        $('#FeaturedSpecialsESEditId').html(id);

                        $('#updateFeaturedSpecialsModal').modal('show');
                        SpecialFeaturedUpdateDetails(id);

                    })

                    @if (!$usr->can('about.delete') )
                    $('.DeleteIcon').empty();
                    $('.SPDeleteIcon').hide();
                    @endif
                    @if (!$usr->can('about.edit'))
                        $('.EditIcon').empty();
                        $('.SPEditIcon').empty();
                    @endif
                    @if (!$usr->can('about.create'))
                        $('#addbtnFeaturedSpecials').empty();
                    @endif

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

    $('#specialFeatureDataAddConfirmBtn').click(function() {
        var title = $('#FeaturedSpecialsTitle').val();
        var description = $('#FeaturedSpecialsDescription').val();
        addSpecialFeatureData(title, description);

    })

    function addSpecialFeatureData(title, description) {

        if (title.length == 0) {

            toastr.error('Title is empty!');

        } else if (description == 0) {

            toastr.error('description is empty!');
        } else {

            $('#specialFeatureDataAddConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            axios.post("{{ route('admin.addFSdata') }}", {
                    title: title,
                    description: description,
                })

                .then(function(response) {

                    $('#specialFeatureDataAddConfirmBtn').html("Save");

                    if (response.status = 200) {
                        if (response.data == 1) {
                            $('#addFeaturedSpecialsModal').modal('hide');
                            toastr.success('Add New Success .', 'Success', {
                                closeButton: true,
                                progressBar: true,
                            });
                            getSpecialFeatureData();
                        } else {
                            $('#addFeaturedSpecialsModal').modal('hide');
                            toastr.error('Add New Failed', 'Error', {
                                closeButton: true,
                                progressBar: true,
                            });
                            getSpecialFeatureData();
                        }
                    } else {
                        $('#addFeaturedSpecialsModal').modal('hide');
                        toastr.error('Something Went Wrong', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                    }


                }).catch(function(error) {

                    $('#addFeaturedSpecialsModal').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });

                });

        }

    }





    //  Special Feature delete modal yes button

    $('#confirmDeleteSpecialsFeatured').click(function() {
        var id = $('#FeaturedSpecialsDeleteId').html();
        // var id = $(this).data('id');
        DeleteSpecialFeatureData(id);

    })


    //delete FeaturedS pecials Extra Servicess function

    function DeleteSpecialFeatureData(id) {
        $('#confirmDeleteSpecialsFeatured').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

        axios.post("{{ route('admin.homeFSdelete') }}", {
                id: id
            })
            .then(function(response) {
                $('#confirmDeleteSpecialsFeatured').html("Yes");

                if (response.status == 200) {


                    if (response.data == 1) {
                        $('#deleteModalSpecialsFeatured').modal('hide');
                        toastr.warning('Delete Success.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getSpecialFeatureData();
                    } else {
                        $('#deleteModalSpecialsFeatured').modal('hide');
                        toastr.error('Delete Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getSpecialFeatureData();
                    }

                } else {
                    $('#deleteModalSpecialsFeatured').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }

            }).catch(function(error) {

                $('#deleteModalSpecialsFeatured').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });

            });

    }







    //each FeaturedSpecials  Details data show for edit

    function SpecialFeaturedUpdateDetails(id) {

        axios.post("{{ route('admin.HomeFSEdit') }}", {
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

    $('#SpecialFeaturedUpdateConfirmBtn').click(function() {


        var idUpdate = $('#FeaturedSpecialsESEditId').html();
        var nameUpdate = $('#FeaturedSpecialsESTitleIdUpdate').val();
        var desUpdate = $('#FeaturedSpecialsESDesIdUpdate').val();

        SpecialFeaturedUpdate(idUpdate, nameUpdate, desUpdate);

    })





    //update Special Feature data using modal

    function SpecialFeaturedUpdate(idUpdate, nameUpdate, desUpdate) {



        if (nameUpdate.length == 0) {

            toastr.error('Title  is empty!');

        } else if (desUpdate == 0) {

            toastr.error(' description is empty!');

        } else {
            $('#SpecialFeaturedUpdateConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            updateData = [{
                    id: idUpdate,
                    name: nameUpdate,
                    description: desUpdate,
                }

            ];

            axios.post("{{ route('admin.HomeFSUpdate') }}", {
                    id: idUpdate,
                    title: nameUpdate,
                    description: desUpdate,
                })


                .then(function(response) {

                    $('#SpecialFeaturedUpdateConfirmBtn').html("Update");

                    if (response.status = 200) {
                        if (response.data == 1) {
                            $('#updateFeaturedSpecialsModal').modal('hide');
                            toastr.success('Update Success.', 'Success', {
                                closeButton: true,
                                progressBar: true,
                            });
                            getSpecialFeatureData();

                        } else {
                            $('#updateFeaturedSpecialsModal').modal('hide');
                            toastr.error('Update Failed', 'Error', {
                                closeButton: true,
                                progressBar: true,
                            })
                            getSpecialFeatureData();

                        }
                    } else {
                        $('#updateFeaturedSpecialsModal').modal('hide');
                        toastr.error('Something Went Wrong', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                    }


                }).catch(function(error) {

                    $('#updateFeaturedSpecialsModal').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });

                });
        }
    }












    // Testimonial Section


    getTestimonialData();


    function getTestimonialData() {


        axios.get("{{ route('admin.getTestimonialData') }}")
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

                            "<td class='text-center'><a class='TestimonialEditIcon' data-id=" +
                            dataJSON[i].id +
                            "><i class='fas fa-edit'></i></a> </td>" +

                            "<td><a class='TestimonialDeleteIcon' data-id=" + dataJSON[i].id +
                            " ><i class='fas fa-trash-alt'></i></a> </td>"
                        ).appendTo('#Testimonial_table');
                    });

               

                    $(".TestimonialDeleteIcon").click(function() {

                        var id = $(this).data('id');
                        $('#TestimonialDeleteId').html(id);
                        $('#deleteModalTestimonial').modal('show');

                    })

                    $(".TestimonialEditIcon").click(function() {

                        var id = $(this).data('id');
                        $('#TestimonialEditId').html(id);

                        $('#updateTestimonialModal').modal('show');
                        TestimonialUpdateDetails(id);

                    })
                    @if (!$usr->can('about.delete') )
                    $('.TMDeleteIcon').empty();
                    $('.TestimonialDeleteIcon').empty();
                    @endif
                    @if (!$usr->can('about.edit'))
                        $('.TMEditIcon').empty();
                        $('.TestimonialEditIcon').empty();
                    @endif
                    @if (!$usr->can('about.create'))
                        $('#addbtnTestimonial').empty();
                    @endif

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
        $('#addTestimonialModal').modal('show');
    });


    //Exclusive Add modal save button

    $('#testimonialAddForm').submit(function(event) {
        event.preventDefault();

        let TestimonialName = $('#TestimonialName').val();
        let TestimonialDesignation = $('#TestimonialDesignation').val();
        let Description = $('#Description').val();
        let Testimonialimg = $('#Testimonialimg').prop('files')[0];
        addTestimonial(TestimonialName, TestimonialDesignation, Description, Testimonialimg);

    })




    $('#Testimonialimg').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#addimagepreviewTestimonial').attr('src', ImgSource)
        }
    })

    //Exclusive Add Method


    function addTestimonial(TestimonialName, TestimonialDesignation, Description, Testimonialimg) {

        if (TestimonialName.length == 0) {
            toastr.error(' Title is empty!');
        } else if (TestimonialDesignation.length == 0) {
            toastr.error(' Designation is empty!');
        } else if (Description.length == 0) {

            toastr.error(' Description is empty!');
        } else {

            $('#TestimonialAddConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation



            my_data = [{
                    name: TestimonialName,
                    description: Description,
                    date: TestimonialDesignation,
                }

            ];
            var formData = new FormData();
            formData.append('data', JSON.stringify(my_data));

            formData.append('photo', Testimonialimg);

            axios.post("{{ route('admin.TestimonialAdd') }}", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#TestimonialAddConfirmBtn').html("Save");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#addTestimonialModal').modal('hide');
                        toastr.success('Add New Success .', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });




                        $('#TestimonialName').val("");
                        $('#TestimonialDesignation').val("");
                        $('#Testimonialimg').val("");
                        $('#Description').val("");
                        document.getElementById("Testimonialimg").src = window.location.protocol + "//" +
                        window.document.location.host + "/public/admin/images/default-image.png";
                
                        getTestimonialData();
                    } else {
                        $('#addTestimonialModal').modal('hide');
                        toastr.error('Add New Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getTestimonialData();
                    }
                } else {
                    $('#addTestimonialModal').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }


            }).catch(function(error) {

                $('#addTestimonialModal').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });

            });

        }

    }


    //  Testimonial delete modal yes button

    $('#confirmDeleteTestimonial').click(function() {
        var id = $('#TestimonialDeleteId').html();
        // var id = $(this).data('id');
        DeleteDataTestimonial(id);

    })


    //delete courses function

    function DeleteDataTestimonial(id) {
        $('#confirmDeleteTestimonial').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

        axios.post("{{ route('admin.TestimonialDelete') }}", {
                id: id
            })
            .then(function(response) {
                $('#confirmDeleteTestimonial').html("Yes");

                if (response.status == 200) {


                    if (response.data == 1) {
                        $('#deleteModalTestimonial').modal('hide');
                        toastr.warning('Delete Success.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getTestimonialData();
                    } else {
                        $('#deleteModalTestimonial').modal('hide');
                        toastr.error('Delete Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getTestimonialData();
                    }

                } else {
                    $('#deleteModalTestimonial').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }

            }).catch(function(error) {

                $('#deleteModalTestimonial').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });

            });

    }




    //each courses  Details data show for edit

    function TestimonialUpdateDetails(id) {

        axios.post("{{ route('admin.getTestimonialEditData') }}", {
                id: id
            })
            .then(function(response) {

                if (response.status == 200) {


                    $('#loadDivTestimonial').addClass('d-none');
                    $('#TestimonialEditForm').removeClass('d-none');
                    var jsonData = response.data;


                    $('#TestimonialNameIdUpdate').val(jsonData[0].name);
                    $('#DesignationUpdate').val(jsonData[0].date);
                    $('#TestimonialDesIdUpdate').val(jsonData[0].description);
                    var ImgSource = (jsonData[0].image);
                    $('#imagepreviewTestimonial').attr('src', ImgSource)
                } else {

                    $('#loadDivTestimonial').addClass('d-none');
                    $('#wrongDivTestimonial').removeClass('d-none');
                }

            }).catch(function(error) {

                $('#loadDivTestimonial').addClass('d-none');
                $('#wrongDivTestimonial').removeClass('d-none');

            });

    }


    $('#TestimonialimgUpdate').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#imagepreviewTestimonial').attr('src', ImgSource)
        }
    })






    //Testimonial update modal save button

    $('#testimonialUpdateForm').submit(function(event) {
        event.preventDefault();
        var idUpdate = $('#TestimonialEditId').html();
        var nameUpdate = $('#TestimonialNameIdUpdate').val();
        var DesignationUpdate = $('#DesignationUpdate').val();
        var desUpdate = $('#TestimonialDesIdUpdate').val();
        var img = $('#TestimonialimgUpdate').prop('files')[0];


        TestimonialUpdate(idUpdate, nameUpdate, DesignationUpdate, desUpdate, img);

    })





    //update project data using modal

    function TestimonialUpdate(idUpdate, nameUpdate, DesignationUpdate, desUpdate, img) {



        if (nameUpdate.length == 0) {

            toastr.error('Name is empty!');

        } else if (DesignationUpdate == 0) {

            toastr.error('Designation is empty!');

        } else if (desUpdate == 0) {

            toastr.error('Description is empty!');

        } else {
            $('#TestimonialConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            updateData = [{
                    id: idUpdate,
                    name: nameUpdate,
                    date: DesignationUpdate,
                    description: desUpdate,

                }

            ];
            var formData = new FormData();
            formData.append('data', JSON.stringify(updateData));
            formData.append('photo', img);


            axios.post("{{ route('admin.TestimonilaUpdate') }}", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#TestimonialConfirmBtn').html("Update");

                if (response.status = 200) {

                    if (response.data == 1) {
                        $('#updateTestimonialModal').modal('hide');
                        toastr.success('Update Success.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getTestimonialData();

                    } else {
                        $('#updateTestimonialModal').modal('hide');
                        toastr.error('Update Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        })
                        getTestimonialData();

                    }
                } else {
                    $('#updateTestimonialModal').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }


            }).catch(function(error) {

                $('#updateTestimonialModal').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });

            });
        }
    }
</script>
@endsection
