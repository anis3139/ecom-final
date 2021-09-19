@extends('admin.Layouts.app')
@section('title', 'Pages')
@php
$usr = Auth::guard('admin')->user();
@endphp
@section('content')

<div class="row mt-5">
    <div class="col-md-10 offset-md-1 border border-dark">
        <div id="mainDivPages" class="container-fluid d-none">
            <div class="row">
                <div class="col-md-12 p-2">
                    <button id="addbtnPages" class="btn btn-sm btn-danger my-3">Add New</button>
                    <table id="PagesDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-xs w-5 ">Sl.</th>
                                <th class="th-xs w-5">Name</th>
                                <th class="th-sm w-75">Description</th>
                                <th class="th-xs w-5">Status</th>
                                <th class="th-xs w-5 EditIcon">Edit</th>
                                <th class="th-xs w-5 DeleteIcon">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="Pages_table">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="loadDivPages" class="container">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

                </div>
            </div>
        </div>
        <div id="wrongDivPages" class="container d-none">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <h3>Something Went Wrong!</h3>
                </div>
            </div>
        </div>



        <!-- Pages add -->
        <div class="modal fade" id="addPagesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{route('admin.addpages')}}" method="post" id="pageAddForm">
                    @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ml-5">Add New Pages</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-center">
                        <div class="container">
                            <div class="row">
                                <input id="PagesName" type="text" id="" class="form-control mb-3"
                                    placeholder="Pages Name">
                                <textarea class="form-control m-5 ckeditor" name="PagesDes" id="PagesDes"  placeholder="Pages Description"></textarea>
                                <select name="status" id="status" class="form-control my-4">
                                    <option class="form-control" selected value="0">Select Status</option>
                                    <option class="form-control" value="active">Active</option>
                                    <option class="form-control" value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button id="PagesAddConfirmBtn" type="submit" class="btn  btn-sm  btn-primary">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <!-- Pages add -->

        <!-- Modal Pages Delete -->
        <div class="modal fade" id="deleteModalPages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body p-3 text-center">
                        <h5 class="mt-4">Do you want to Delete</h5>
                        <h5 id="PagesDeleteId" class="mt-4 d-none "></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                        <button data-id="" id="confirmDeletePages" type="button"
                            class="btn btn-sm btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Pages Delete -->




        <!-- Pages update -->
        <div class="modal fade" id="updatePagesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{route('admin.pagesupdate')}}" method="post" id="pageUpdateForm">
                    @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Pages</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-center">
                        <div id="PagesEditForm" class="container d-none ">
                            <h5 id="PagesEditId" class="mt-4 d-none"></h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="PagesNameIdUpdate" type="text" id="" class="form-control mb-3"
                                        placeholder="Pages Name">
                                    <textarea class="form-control m-5 ckeditor" name="PagesDesIdUpdate" id="PagesDesIdUpdate" cols="30" rows="10"   placeholder="Pages Description"></textarea>
                                    <select name="statusUpdate" id="statusUpdate" class="form-control my-4">
                                        <option class="form-control" value="active">Active</option>
                                        <option class="form-control" value="inactive">Inactive</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <img id="PagesLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                        <h3 id="PageswrongLoader" class="d-none">Something Went Wrong!</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button id="PagesupdateConfirmBtn" type="submit"
                            class="btn  btn-sm  btn-primary">Update</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


<!-- Pages update -->



@endsection

@section('script')



<script>





getPagesdata();
        function getPagesdata() {
            axios.get("{{route('admin.getpagesdata')}}")
                .then(function(response) {
                    if (response.status = 200) {
                        $('#mainDivPages').removeClass('d-none');
                        $('#loadDivPages').addClass('d-none');
                        $('#PagesDataTable').DataTable().destroy();
                        $('#Pages_table').empty();
                        var count = 1;
                        var dataJSON = response.data;
                        $.each(dataJSON, function(i, item) {
                            $('<tr>').html(
                                "<td>" + count++ + " </td>" +
                                "<td>" + dataJSON[i].title + " </td>" +
                                "<td>" + dataJSON[i].description + " </td>" +

                                "<td>" + dataJSON[i].status + " </td>" +
                                "<td><a class='PagesEditIcon' data-id=" + dataJSON[i].id +
                                "><i class='fas fa-edit'></i></a> </td>" +
                                "<td><a class='PagesDeleteIcon' data-id=" + dataJSON[i].id +
                                " ><i class='fas fa-trash-alt'></i></a> </td>"
                            ).appendTo('#Pages_table');
                        });

                        @if (!$usr->can('pages.delete') )
                         $('.DeleteIcon').empty();
                         $('.PagesDeleteIcon').hide();
                         @endif
                         @if (!$usr->can('pages.edit'))
                             $('.EditIcon').empty();
                             $('.PagesEditIcon').empty();
                         @endif
                         @if (!$usr->can('pages.create'))
                             $('#addbtnPages').empty();
                         @endif

                        //Pages click on delete icon
                        $(".PagesDeleteIcon").click(function() {
                            var id = $(this).data('id');
                            $('#PagesDeleteId').html(id);
                            $('#deleteModalPages').modal('show');
                        })
                        //Pages edit icon click
                        $(".PagesEditIcon").click(function() {
                            var id = $(this).data('id');
                            $('#PagesEditId').html(id);
                            $('#updatePagesModal').modal('show');
                            PagesUpdateDetails(id);
                        })
                        $('#PagesDataTable').DataTable({
                            "order": false
                        });
                        $('.dataTables_length').addClass('bs-select');
                    } else {
                        $('#wrongDivPages').removeClass('d-none');
                        $('#loadDivPages').addClass('d-none');
                    }
                }).catch(function(error) {
                    $('#wrongDivPages').removeClass('d-none');
                    $('#loadDivPages').addClass('d-none');
                });
        }
        //add button modal show for add new entity
        $('#addbtnPages').click(function() {
            $('#addPagesModal').modal('show');
        });




        $(document).ready(function() {
            $('#status').material_select();
        });


        //Pages Add modal save button
        $('#pageAddForm').submit(function(event) {
            event.preventDefault();
            var name = $('#PagesName').val();
            var status = $('#status').val();
            var des =  $("#PagesDes").val();;
            PagesAdd(name, des, status);
        })

        //pages Add Method
        function PagesAdd(name, des, status) {

            if (name.length == 0) {
                toastr.error('Pages name is empty!');
            } else if (des.length == 0) {
                toastr.error('Pages description is empty!');
            } else if (status == 0) {
                toastr.error('Status is empty!');
            } else {
                $('#PagesAddConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                my_data = [{
                        name: name,
                        description: des,
                        status: status,
                    }
                ];
                var formData = new FormData();
                formData.append('data', JSON.stringify(my_data));
                axios.post("{{route('admin.addpages')}}", formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function(response) {
                    $('#PagesAddConfirmBtn').html("Save");
                    if (response.status = 200) {
                        if (response.data == 1) {
                            $('#addPagesModal').modal('hide');
                            toastr.success('Add New Success .', 'Success',{
            closeButton: true,
            progressBar: true,
        });
                            $('#PagesName').val("");
                            $("#PagesDes").val(" ");
                            MyEditor.setData(' ');
                            getPagesdata();
                        } else {
                            $('#addPagesModal').modal('hide');
                            toastr.error('Add New Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                            getPagesdata();
                        }
                    } else {
                        $('#addPagesModal').modal('hide');
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    }
                }).catch(function(error) {
                    $('#addPagesModal').modal('hide');
                    toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                });
            }
        }
        //each Pages  Details data show for edit


         // Material Select Initialization
         $(document).ready(function() {
            $('#statusUpdate').material_select();
        });






        function PagesUpdateDetails(id) {
            axios.post("{{route('admin.pagesdetails')}}", {
                    id: id
                })
                .then(function(response) {
                    if (response.status == 200) {
                        $('#PagesLoader').addClass('d-none');
                        $('#PagesEditForm').removeClass('d-none');
                        var jsonData = response.data;
                        $('#PagesNameIdUpdate').val(jsonData[0].title);
                        MyEditor.setData(jsonData[0].description);
                        $('#statusUpdate option[value=' + jsonData[0].status + ']').attr('selected', 'selected');
                    } else {
                        $('#PagesLoader').addClass('d-none');
                        $('#PageswrongLoader').removeClass('d-none');
                    }
                }).catch(function(error) {
                    $('#PagesLoader').addClass('d-none');
                    $('#PageswrongLoader').removeClass('d-none');
                });
        }

        //Pages update modal save button
        $('#pageUpdateForm').submit(function(event) {
            event.preventDefault();
            var idUpdate = $('#PagesEditId').html();
            var nameUpdate = $('#PagesNameIdUpdate').val();
            var desUpdate =  $("#PagesDesIdUpdate").val();;
            var statusUpdate = $('#statusUpdate').val();
            PagesUpdate(idUpdate, nameUpdate, desUpdate, statusUpdate);
        })
        //update Pages data using modal
        function PagesUpdate(idUpdate, nameUpdate, desUpdate, statusUpdate) {
            if (nameUpdate.length == 0) {
                toastr.error('Proejct name is empty!');
            } else if (desUpdate == 0) {
                toastr.error('Proejct description is empty!');
            } else {
                $('#PagesupdateConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
                updateData = [{
                        id: idUpdate,
                        name: nameUpdate,
                        description: desUpdate,
                        statusUpdate: statusUpdate,
                    }
                ];
                var formData = new FormData();
                formData.append('data', JSON.stringify(updateData));

                axios.post("{{route('admin.pagesupdate')}}", formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function(response) {
                    $('#PagesupdateConfirmBtn').html("Update");
                    if (response.status = 200) {
                        if (response.data == 1) {
                            $('#updatePagesModal').modal('hide');
                            toastr.success('Update Success.', 'Success',{
            closeButton: true,
            progressBar: true,
        });
                            getPagesdata();
                        } else {
                            $('#updatePagesModal').modal('hide');
                            toastr.error('Update Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        })
                            getPagesdata();
                        }
                    } else {
                        $('#updatePagesModal').modal('hide');
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    }
                }).catch(function(error) {
                    $('#updatePagesModal').modal('hide');
                    toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                });
            }
        }
          //  pages delete modal yes button
          $('#confirmDeletePages').click(function() {
            var id = $('#PagesDeleteId').html();
            // var id = $(this).data('id');
            DeleteDataPages(id);
        })
        //delete Pages function
        function DeleteDataPages(id) {
            $('#confirmDeletePages').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
            axios.post("{{route('admin.pagesdelete')}}", {
                    id: id
                })
                .then(function(response) {
                    $('#confirmDeletePages').html("Yes");
                    if (response.status == 200) {
                        if (response.data == 1) {
                            $('#deleteModalPages').modal('hide');
                            toastr.warning('Delete Success.', 'Success',{
            closeButton: true,
            progressBar: true,
        });
                            getPagesdata();
                        } else {
                            $('#deleteModalPages').modal('hide');
                            toastr.error('Delete Failed', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                            getPagesdata();
                        }
                    } else {
                        $('#deleteModalPages').modal('hide');
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    }
                }).catch(function(error) {
                    $('#deleteModalPages').modal('hide');
                    toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                });
        }
</script>

@endsection
