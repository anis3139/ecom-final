
<?php $__env->startSection('title', 'Home Setting'); ?>

<?php $__env->startSection('content'); ?>
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
                                    <h3>Logo Upload:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2 text-center">
                                    <label for="facebook" class="sr-only">logo</label>
                                    <input id="addLogo" required type="file" class="form-control ">
                                    <hr>

                                            <img id="addimagepreview"
                                            style="height: 100px !important; width: 200px !important;"
                                            class="imgPreview mx-auto"
                                            src="<?php echo e(asset('admin/images/default-image.png')); ?>" />

                                </div>
                            </td>
                            <td>
                                <button id="submitLogo" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Banner Upload:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2 text-center">
                                    <label for="Banner" class="sr-only">Image</label>
                                    <input id="Banner" required type="file" class="form-control ">
                                    <hr>

                                            <img id="BannerImg"
                                            style="height: 100px !important; width: 200px !important;"
                                            class="imgPreview mx-auto"
                                            src="<?php echo e(asset('admin/images/default-image.png')); ?>" />

                                </div>
                            </td>
                            <td>
                                <button id="submitBanner" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Promo Image One:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2 text-center">
                                    <label for="promoImageOne" class="sr-only">Image</label>
                                    <input id="promoImageOne" required type="file" class="form-control ">
                                    <hr>

                                            <img id="promoImageOneImg"
                                            style="height: 100px !important; width: 200px !important;"
                                            class="imgPreview mx-auto"
                                            src="<?php echo e(asset('admin/images/default-image.png')); ?>" />

                                </div>
                            </td>
                            <td>
                                <button id="submitpromoImageOne" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Promo Image Two:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2 text-center">
                                    <label for="promoImageTwo" class="sr-only">Image</label>
                                    <input id="promoImageTwo" required type="file" class="form-control ">
                                    <hr>

                                            <img id="promoImageTwoImg"
                                            style="height: 100px !important; width: 200px !important;"
                                            class="imgPreview mx-auto"
                                            src="<?php echo e(asset('admin/images/default-image.png')); ?>" />

                                </div>
                            </td>
                            <td>
                                <button id="submitpromoImageTwo" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Promo Image Three:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2 text-center">
                                    <label for="promoImageThree" class="sr-only">Image</label>
                                    <input id="promoImageThree" required type="file" class="form-control ">
                                    <hr>

                                            <img id="promoImageThreeImg"
                                            style="height: 100px !important; width: 200px !important;"
                                            class="imgPreview mx-auto"
                                            src="<?php echo e(asset('admin/images/default-image.png')); ?>" />

                                </div>
                            </td>
                            <td>
                                <button id="submitpromoImageThree" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Title:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">Title</label>
                                    <input id="addTitle" required type="text" class="form-control " id="facebook" value="<?php if ($results) {
                                            echo $results->title;
                                        } ?>">

                                </div>
                            </td>
                            <td>
                                <button id="submitTitle" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>

                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Phone Number:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">mobile</label>
                                    <input id="addPhone" required type="text" class="form-control " id="facebook" value="<?php if ($results) {
                                            echo $results->phone;
                                        } ?>">

                                </div>
                            </td>
                            <td>
                                <button id="submitPhone" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>E Mail:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">E Mail</label>
                                    <input id="addEmail" required type="text" class="form-control " id="facebook" value="<?php if ($results) {
                                            echo $results->email;
                                        } ?>">

                                </div>
                            </td>
                            <td>
                                <button id="submitEmail" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Address:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">Address</label>
                                    <textarea required name="" id="addAddress" class="form-control" cols="30" rows="10"><?php if ($results) {
                                            echo $results->address;
                                        } ?></textarea>


                                </div>
                            </td>
                            <td>
                                <button id="submitAddress" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Google Map:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">Gmap</label>
                                    <textarea required name="" id="addGmap" class="form-control" cols="30" rows="10"><?php if ($results) {
                                            echo $results->gmap;
                                        } ?></textarea>

                                </div>
                            </td>
                            <td>
                                <button id="submitGmap" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>


                    </tbody>
                </table>





            </div>
        </div>
    </div>








<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        // Address Add


        $('#submitAddress').click(function() {
            var address = $('#addAddress').val();
            addAddress(address);
        })

        function addAddress(address) {
            if (address.length == 0) {
                toastr.error('address url is empty!');

            } else {
                $('#submitAddress').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("<?php echo e(route('admin.address')); ?>", {
                        address: address
                    })
                    .then(function(response) {
                        $('#submitAddress').html("Update");
                        if (response.status = 200) {
                            if (response.data == 1) {
                                toastr.success('Updated Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });


                            } else {
                                toastr.error('Updated Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                            }
                        } else {
                            toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                        }
                    }).catch(function(error) {
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    });
            }
        }


        // Phone Add


        $('#submitPhone').click(function() {
            var phone = $('#addPhone').val();
            addPhone(phone);
        })

        function addPhone(phone) {
            if (phone.length == 0) {
                toastr.error('phone url is empty!');

            } else {
                $('#submitPhone').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("<?php echo e(route('admin.phone')); ?>", {
                        phone: phone
                    })
                    .then(function(response) {
                        $('#submitPhone').html("Update");
                        if (response.status = 200) {
                            if (response.data == 1) {
                                toastr.success('Updated Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });


                            } else {
                                toastr.error('Updated Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                            }
                        } else {
                            toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                        }
                    }).catch(function(error) {
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    });
            }
        }


        // Email Add


        $('#submitEmail').click(function() {
            var email = $('#addEmail').val();
            addEmail(email);
        })

        function addEmail(email) {
            if (email.length == 0) {
                toastr.error('email url is empty!');

            } else {
                $('#submitTitle').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("<?php echo e(route('admin.email')); ?>", {
                        email: email
                    })
                    .then(function(response) {
                        $('#submitTitle').html("Update");
                        if (response.status = 200) {
                            if (response.data == 1) {
                                toastr.success('Updated Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });


                            } else {
                                toastr.error('Updated Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                            }
                        } else {
                            toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                        }
                    }).catch(function(error) {
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    });
            }
        }



        // Title Add


        $('#submitTitle').click(function() {
            var title = $('#addTitle').val();
            addTitle(title);
        })

        function addTitle(title) {
            if (title.length == 0) {
                toastr.error('title url is empty!');

            } else {
                $('#submitTitle').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("<?php echo e(route('admin.title')); ?>", {
                        title: title
                    })
                    .then(function(response) {
                        $('#submitTitle').html("Update");
                        if (response.status = 200) {
                            if (response.data == 1) {
                                toastr.success('Updated Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });


                            } else {
                                toastr.error('Updated Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                            }
                        } else {
                            toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                        }
                    }).catch(function(error) {
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    });
            }
        }




        // Title Add


        $('#submitGmap').click(function() {
            var gmap = $('#addGmap').val();
            addGmap(gmap);
        })

        function addGmap(gmap) {
            if (gmap.length == 0) {
                toastr.error('gmap url is empty!');

            } else {
                $('#submitGmap').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                axios.post("<?php echo e(route('admin.gmap')); ?>", {
                        gmap: gmap
                    })
                    .then(function(response) {
                        $('#submitGmap').html("Update");
                        if (response.status = 200) {
                            if (response.data == 1) {
                                toastr.success('Updated Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });


                            } else {
                                toastr.error('Updated Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                            }
                        } else {
                            toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                        }
                    }).catch(function(error) {
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    });
            }
        }





        //Logo Add  save button

        $('#submitLogo').click(function() {
            var img = $('#addLogo').prop('files')[0];
            addLogo(img);
        })

        $('#addLogo').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#addimagepreview').attr('src', ImgSource)
            }
        })


        function addLogo(img) {


            $('#submitLogo').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            console.log(img);
            var formData = new FormData();
            formData.append('photo', img);

            axios.post("<?php echo e(route('admin.logo')); ?>", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#submitLogo').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {

                        toastr.success('Updated Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });

                    } else {

                        toastr.error('Updated Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });

                    }
                } else {

                    toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                }


            }).catch(function(error) {


                toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });

            });



        }

        //Logo Add  save button

        $('#submitBanner').click(function() {
            var Banner = $('#Banner').prop('files')[0];
            addBanner(Banner);
        })

        $('#Banner').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#BannerImg').attr('src', ImgSource)
            }
        })


        function addBanner(Banner) {


            $('#submitBanner').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            var formData = new FormData();
            formData.append('Banner', Banner);

            axios.post("<?php echo e(route('admin.Banner')); ?>", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#submitBanner').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {

                        toastr.success('Updated Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });

                    } else {

                        toastr.error('Updated Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });

                    }
                } else {

                    toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                }


            }).catch(function(error) {


                toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });

            });



        }




        //promoImageOne Add  save button

        $('#submitpromoImageOne').click(function() {
            var Banner = $('#promoImageOne').prop('files')[0];
            addBanner(Banner);
        })

        $('#promoImageOne').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#promoImageOneImg').attr('src', ImgSource)
            }
        })


        function addpromoImageOne(promoImageOne) {


            $('#submitBanner').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            var formData = new FormData();
            formData.append('promoImageOne', promoImageOne);

            axios.post("<?php echo e(route('admin.promoImageOne')); ?>", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#submitpromoImageOne').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {

                        toastr.success('Updated Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });

                    } else {

                        toastr.error('Updated Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });

                    }
                } else {

                    toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                }


            }).catch(function(error) {


                toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });

            });



        }



         //promoImageTwo Add  save button

         $('#submitpromoImageTwo').click(function() {
            var Banner = $('#promoImageTwo').prop('files')[0];
            addBanner(Banner);
        })

        $('#promoImageTwo').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#promoImageTwoImg').attr('src', ImgSource)
            }
        })


        function addpromoImageTwo(promoImageTwo) {


            $('#submitBanner').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            var formData = new FormData();
            formData.append('promoImageTwo', promoImageTwo);

            axios.post("<?php echo e(route('admin.promoImageTwo')); ?>", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#submitpromoImageTwo').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {

                        toastr.success('Updated Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });

                    } else {

                        toastr.error('Updated Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });

                    }
                } else {

                    toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                }


            }).catch(function(error) {


                toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });

            });



        }


         //promoImageThree Add  save button

         $('#submitpromoImageThree').click(function() {
            var Banner = $('#promoImageThree').prop('files')[0];
            addBanner(Banner);
        })

        $('#promoImageThree').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#promoImageThreeImg').attr('src', ImgSource)
            }
        })


        function addpromoImageThree(promoImageThree) {


            $('#submitBanner').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            var formData = new FormData();
            formData.append('promoImageThree', promoImageThree);

            axios.post("<?php echo e(route('admin.promoImageThree')); ?>", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#submitpromoImageThree').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {

                        toastr.success('Updated Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });

                    } else {

                        toastr.error('Updated Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });

                    }
                } else {

                    toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                }


            }).catch(function(error) {


                toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });

            });



        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.Layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel-project\ecom-final\backend\resources\views/admin/components/Others.blade.php ENDPATH**/ ?>
