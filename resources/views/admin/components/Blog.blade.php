@extends('admin.Layouts.app')
@php
$usr = Auth::guard('admin')->user();
@endphp
@section('title', 'Blog')
@section('content')
<div class="row mt-5">
    <div class="col-md-10 offset-md-1 border border-dark">
        <button id="addbtnBlog" class="btn btn-sm btn-danger my-3">Add New</button>
        <div id="mainDivBlog" class="container-fluid d-none">
            <div class="row">
                <div class="col-md-12 p-2">
                    <h1 class="text-center">Blog Section</h1>
                    <table id="BlogDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Sl.</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Title</th>
                                <th class="th-sm">Post</th>
                                <th class="th-sm">Image</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm EditIcon">Edit</th>
                                <th class="th-sm DeleteIcon">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="Blog_table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="loadDivBlog" class="container">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

                </div>
            </div>
        </div>
        <div id="wrongDivBlog" class="container d-none">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <h3>Something Went Wrong!</h3>
                </div>
            </div>
        </div>


        <!-- Blog add -->
        <div class="modal fade" id="addBlogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{route('admin.blog.store')}}" method="post" id="blogAddForm">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title ml-5">Add New Blog</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body  text-center">
                            <div class="container">
                                <div class="row">

                                    <input id="BlogName" type="text" class="form-control mb-3" placeholder="Blog Title">

                                    <textarea name="BlogDescription" id="BlogDescription" cols="30" rows="10"
                                        placeholder="Description" class="form-control mb-3 ckeditor"></textarea>

                                    <input required type="file" id="imageBlog" class="form-control mb-3" name="text-input">
                                    <img id="addBlogImagePreview" style="height: 100px !important;"
                                        class="imgPreview mt-3 "
                                        src="{{ asset('admin/images/default-image.png') }}" />


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                            <button id="BlogsAddConfirmBtn" type="submit" class="btn  btn-sm  btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Blog add -->


        <!-- Modal Blog Delete -->
        <div class="modal fade" id="deleteModalBlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body p-3 text-center">
                        <h5 class="mt-4">Do you want to Delete</h5>
                        <h5 id="BlogDeleteId" class="mt-4 d-none "></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                        <button data- id="confirmDeleteBlog" type="button" class="btn btn-sm btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Blog Delete -->




        <!-- Blog update -->
        <div class="modal fade" id="updateBlogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <form action="{{route('admin.blog.update')}}" method="post" id="blogUpdateForm">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Blog Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-center">
                        <div id="BlogEditForm" class="container d-none">
                            <h5 id="BlogEditId" class="mt-4 d-none"></h5>

                            <div class="row">

                                <div class="col-md-12">
                                    <input readonly id="name" type="text" class="form-control mb-3 mt-2"
                                        placeholder="Name">
                                    <input required id="title" type="text" class="form-control mb-3 mt-2"
                                        placeholder="Title">
                                    <textarea name="post" id="post" cols="30" rows="10"
                                        class="form-control mb-3 ckeditor"></textarea>

                                </div>
                                <div class="col-md-12">
                                    <input type="file" name="image" id="blogImageUpdate" class="form-control mb-3 mt-2">
                                    <img src="{{ asset('default-image.png') }}" id="blogImageUpdatePreview" alt=""
                                        width="100%">
                                    <select name="status" id="status" class="form-control mb-3 mt-2">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <img id="blogLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                        <h3 id="blogwrongLoader" class="d-none">Something Went Wrong!</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button id="BlogupdateConfirmBtn" type="submit" class="btn  btn-sm  btn-primary">Update</button>
                    </div>
                </div>
            </form>
            </div>
        </div>

    </div>
</div>





@endsection

@section('script')


<script>
    getBlogData();
    // for Testimonial table

    function getBlogData() {

        axios.get("{{ route('admin.blogData') }}")
            .then(function(response) {
                if (response.status = 200) {
                    $('#mainDivBlog').removeClass('d-none');
                    $('#loadDivBlog').addClass('d-none');

                    $('#BlogDataTable').DataTable().destroy();
                    $('#Blog_table').empty();
                    var count = 1;
                    var dataJSON = response.data;

                    $.each(dataJSON, function(i, item) {
                        let status = '';
                        if (dataJSON[i].status == 1) {
                            status = "Active"
                        } else {
                            status = "Inactive"
                        }
                        let blogImage = dataJSON[i].image
                        if (blogImage == null) {
                            blogImage = window.location.protocol + "//" +
                                window.document.location.host + "/public/default-image.png";
                        }


                        $('<tr>').html(

                            "<td>" + count++ + " </td>" +
                            "<td class='text-break'>" + dataJSON[i].name + " </td>" +
                            "<td class='text-break'>" + dataJSON[i].title + " </td>" +
                            "<td class='text-break'>" + dataJSON[i].post + " </td>" +
                            "<td class='text-break'> <img width='150px' src=" + blogImage + "> </td>" +
                            "<td class='text-break'>" + status + " </td>" +
                            "<td><a class='BlogEditIcon' data-id=" + dataJSON[i].id +
                            "><i class='fas fa-edit'></i></a> </td>" +

                            "<td><a class='BlogDeleteIcon' data-id=" + dataJSON[i].id +
                            " ><i class='fas fa-trash-alt'></i></a> </td>"
                        ).appendTo('#Blog_table');
                    });
                    @if (!$usr->can('product.delete') )
                    $('.DeleteIcon').empty();
                    $('.BlogDeleteIcon').hide();
                    @endif
                    @if (!$usr->can('blog.edit'))
                        $('.EditIcon').empty();
                        $('.BlogEditIcon').empty();
                    @endif
                    @if (!$usr->can('blog.create'))
                        $('#addbtnBlog').empty();
                    @endif

                    //Blog click on delete icon

                    $(".BlogDeleteIcon").click(function() {

                        var id = $(this).data('id');
                        $('#BlogDeleteId').html(id);
                        $('#deleteModalBlog').modal('show');

                    })

                    //Blog edit icon click

                    $(".BlogEditIcon").click(function() {

                        var id = $(this).data('id');
                        $('#BlogEditId').html(id);

                        $('#updateBlogModal').modal('show');
                        BlogUpdateDetails(id);

                    })



                } else {
                    $('#wrongDivBlog').removeClass('d-none');
                    $('#loadDivBlog').addClass('d-none');

                }
            }).catch(function(error) {

                $('#wrongDivBlog').removeClass('d-none');
                $('#loadDivBlog').addClass('d-none');
            });
    }


    //Blog Add

    $('#addbtnBlog').click(function() {
        $('#addBlogModal').modal('show');
    });


    $('#imageBlog').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#addBlogImagePreview').attr('src', ImgSource)
        }
    })

    $('#blogAddForm').submit(function(event) {
        event.preventDefault();
        var BlogName = $('#BlogName').val();
        var BlogDescription = $("#BlogDescription").val();
        var imageBlog = $('#imageBlog').prop('files')[0];
        console.log(BlogDescription);
        BlogAdd(BlogName, BlogDescription, imageBlog);
    })

    function BlogAdd(BlogName, BlogDescription, imageBlog) {
        if (BlogName.length == 0) {
            toastr.error('Blog Title is empty!');
        } else if (BlogDescription.length == 0) {
            toastr.error('Blog description is empty!');
        } else {
            $('#BlogsAddConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
            my_data = [{
                title: BlogName,
                post: BlogDescription
            }];
            var formData = new FormData();
            formData.append('data', JSON.stringify(my_data));
            formData.append('photo', imageBlog);

            // blog.store
            axios.post("{{ route('admin.blog.store') }}", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#BlogsAddConfirmBtn').html("Save");
                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#addBlogModal').modal('hide');
                        toastr.success('Add New Success .', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        $('#BlogName').val("");
                        $('#BlogDescription').val("");
                        $("#BlogDescription").val(' ');
                        $('#imageBlog').val("");
                        document.getElementById("addBlogImagePreview").src = window.location.protocol + "//" +
                            window.document.location.host + "/public/admin/images/default-image.png";
                        getBlogData();
                    } else {
                        $('#addBlogModal').modal('hide');
                        toastr.error('Add New Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getBlogData();
                    }
                } else {
                    $('#addBlogModal').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }
            }).catch(function(error) {
                $('#addBlogModal').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            });
        }
    }






    //  Special Feature delete modal yes button

    $('#confirmDeleteBlog').click(function() {
        var id = $('#BlogDeleteId').html();

        DeleteDataBlog(id);

    })


    //delete FeaturedS pecials Extra Servicess function

    function DeleteDataBlog(id) {
        $('#confirmDeleteBlog').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

        axios.post("{{ route('admin.blog.delete') }}", {
                id: id
            })
            .then(function(response) {
                $('#confirmDeleteBlog').html("Yes");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#deleteModalBlog').modal('hide');
                        toastr.warning('Delete Success.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getBlogData();
                    } else {
                        $('#deleteModalBlog').modal('hide');
                        toastr.error('Delete Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getBlogData();
                    }

                } else {
                    $('#deleteModalBlog').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }

            }).catch(function(error) {

                $('#deleteModalBlog').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });

            });

    }






    $(document).ready(function() {
        $('#status').material_select();
    });

    //each Blog  Details data show for edit

    function BlogUpdateDetails(id) {

        axios.post("{{ route('admin.blog.edit') }}", {
                id: id
            })
            .then(function(response) {
                if (response.status == 200) {


                    $('#blogLoader').addClass('d-none');
                    $('#BlogEditForm').removeClass('d-none');
                    let jsonData = response.data;
                    $('#name').val(jsonData[0].name);
                    $('#title').val(jsonData[0].title);
                    MyEditor.setData(jsonData[0].post);

                    let ImgSource = (jsonData[0].image);
                    $('#blogImageUpdatePreview').attr('src', ImgSource)
                    $('#status option[value=' + jsonData[0].status + ']').attr('selected', 'selected');

                } else {

                    $('#blogLoader').addClass('d-none');
                    $('#blogwrongLoader').removeClass('d-none');
                }

            }).catch(function(error) {

                $('#blogLoader').addClass('d-none');
                $('#blogwrongLoader').removeClass('d-none');

            });

    }








    $('#blogImageUpdate').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#blogImageUpdatePreview').attr('src', ImgSource)
        }
    })


    $('#blogUpdateForm').submit(function(event) {
        event.preventDefault();
        var id = $('#BlogEditId').html();
        var title = $('#title').val();
        var post = $("#post").val();;
        var status = $('#status').val();
        var blogImageUpdate = $('#blogImageUpdate').prop('files')[0];

        BlogUpdate(id, post, title, status, blogImageUpdate);

    })


    //update Special Feature data using modal

    function BlogUpdate(id, post, title, status, blogImageUpdate) {

        if (post.length == 0) {

            toastr.error('Post  is empty!');

        } else {
            $('#BlogupdateConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            updateData = {
                id: id,
                post: post,
                title: title,
                status: status,
            }
            var formData = new FormData();
            formData.append('data', JSON.stringify(updateData));
            formData.append('photo', blogImageUpdate);

            axios.post("{{ route('admin.blog.update') }}", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {
                $('#BlogupdateConfirmBtn').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#updateBlogModal').modal('hide');
                        toastr.success('Update Success.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getBlogData();

                    } else {
                        $('#updateBlogModal').modal('hide');
                        toastr.error('Update Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        })
                        getBlogData();

                    }
                } else {
                    $('#updateBlogModal').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }


            }).catch(function(error) {

                $('#updateBlogModal').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });

            });
        }
    }
</script>
@endsection
