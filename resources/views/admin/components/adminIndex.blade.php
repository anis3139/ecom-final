@extends('admin.Layouts.app')
@section('title', 'Admin')
@section('content')
@php
$usr = Auth::guard('admin')->user();
@endphp
<div id="mainDivAdmin" class="container-fluid d-none">
    <div class="row">
        <div class="col-md-12 p-2">
            <button id="addbtnAdmin" class="btn btn-sm btn-danger my-3">Add New</button>
            <table id="AdminDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Sl.</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">User Name</th>
                        <th class="th-sm">Eamil</th>
                        <th class="th-sm">Role</th>
                        <th class="th-sm">Status</th>
                        <th class="th-sm EditIcon">Edit</th>
                        <th class="th-sm DeleteIcon">Delete</th>
                    </tr>
                </thead>
                <tbody id="Admin_table">


                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="loadDivAdmin" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

        </div>
    </div>
</div>
<div id="wrongDivAdmin" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Went Wrong!</h3>
        </div>
    </div>
</div>



<!--  admin add -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('admin.adminAdd') }}" method="post" id="adminAddForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-5">Add New Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <div class="row">

                            <input id="AdminName" type="text" id="" class="form-control mb-3" placeholder="Admin Name">
                            <input id="AdminEmail" type="text" id="" class="form-control mb-3"
                                placeholder="Admin Eamil">
                            <input id="AdminUsername" type="text" id="" class="form-control mb-3"
                                placeholder="Admin User Name">
                            <input id="AdminPassword" type="text" id="" class="form-control mb-3"
                                placeholder="Admin Password">
                            <select name="role" id="role" class="form-control mb-3"> </select>
                            <select name="status" id="status" class="form-control mb-3">
                                <option class="form-control" selected value="0">Select Status</option>
                                <option class="form-control" value="active">Active</option>
                                <option class="form-control" value="inactive">Inactive</option>
                            </select>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    <button id="AdminAddConfirmBtn" type="submit" class="btn  btn-sm  btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--  admin add -->


<!-- Modal  admin Delete -->
<div class="modal fade" id="deleteModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body p-3 text-center">
                <h5 class="mt-4">Do you want to Delete</h5>
                <h5 id="AdminDeleteId" class="mt-4 d-none "></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                <button data-id="" id="confirmDeleteAdmin" type="button" class="btn btn-sm btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal  admin Delete -->




<!--  admin update -->
<div class="modal fade" id="updateAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <form action="{{ route('admin.adminDataUpdate') }}" method="post" id="adminFormUpdate">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div id="AdminEditForm" class="container d-none ">
                    <h5 id="AdminEditId" class="mt-4 d-none"></h5>
                    <div class="row">
                        <div class="col-md-12">
                            <input id="AdminNameIdUpdate" type="text" id="" class="form-control mb-3"
                                placeholder="Admin Name">
                            <input id="AdminEmailIdUpdate" type="text" id="" class="form-control mb-3"
                                placeholder="Admin Email">
                            <input id="AdminUsernameIdUpdate" type="text" id="" class="form-control mb-3"
                                placeholder="Admin User Name">
                            <input id="AdminPasswordIdUpdate" type="text" id="" class="form-control mb-3"
                                placeholder="Input Admin New Password">
                            <select name="roleUpdate" id="roleUpdate" class="form-control mb-3"> </select>
                            <select name="statusUpdate" id="statusUpdate" class="form-control mb-3">
                                <option class="form-control" value="active">Active</option>
                                <option class="form-control" value="inactive">Inactive</option>
                            </select>
                        </div>

                    </div>
                </div>
                <img id="AdminLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                <h3 id="AdminwrongLoader" class="d-none">Something Went Wrong!</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="AdminupdateConfirmBtn" type="submit" class="btn  btn-sm  btn-primary">Update</button>
            </div>
        </div>
    </form>

    </div>
</div>


<!--  admin update -->



@endsection
@section('script')
<script type="text/javascript">
    getAdmindata();

    // for Admin table

    function getAdmindata() {
        axios.get("{{ route('admin.getAdminData') }}")
            .then(function(response) {

                if (response.status = 200) {
                    $('#mainDivAdmin').removeClass('d-none');
                    $('#loadDivAdmin').addClass('d-none');

                    $('#AdminDataTable').DataTable().destroy();
                    $('#Admin_table').empty();
                    var count = 1;
                    var dataJSON = response.data;

                    $.each(dataJSON, function(i, item) {

                        $('<tr>').html(
                            "<td>" + count++ + " </td>" +

                            "<td>" + dataJSON[i].name + " </td>" +
                            "<td>" + dataJSON[i].username + " </td>" +

                            "<td>" + dataJSON[i].email + " </td>" +

                            "<td>" + dataJSON[i].roles[0].name.replace(/\b[a-z]/g, match => match
                                .toUpperCase()) + " </td>" +

                            "<td>" + dataJSON[i].status + " </td>" +

                            "<td><a class='AdminEditIcon' data-id=" + dataJSON[i].id +
                            "><i class='fas fa-edit'></i></a> </td>" +

                            "<td><a class='AdminDeleteIcon' id='deletable' data-id=" + dataJSON[i].id +
                            " ><i class='fas fa-trash-alt'></i></a> </td>"
                        ).appendTo('#Admin_table');
                    });



                    $('#AdminDataTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select');

                    @if (!$usr->can('admin.delete') )
                    $('.DeleteIcon').empty();
                    $('.AdminDeleteIcon').hide();
                    @endif
                    @if (!$usr->can('admin.edit'))
                        $('.EditIcon').empty();
                        $('.AdminEditIcon').empty();
                    @endif
                    @if (!$usr->can('admin.create'))
                        $('#addbtnAdmin').empty();
                    @endif
                    //Admin click on delete icon

                    $(".AdminDeleteIcon").click(function() {

                        var id = $(this).data('id');
                        $('#AdminDeleteId').html(id);
                        $('#deleteModalAdmin').modal('show');

                    })



                    //Admin edit icon click

                    $(".AdminEditIcon").click(function() {

                        var id = $(this).data('id');
                        $('#AdminEditId').html(id);

                        $('#updateAdminModal').modal('show');
                        AdminUpdateDetails(id);

                    })




                } else {
                    $('#wrongDivAdmin').removeClass('d-none');
                    $('#loadDivAdmin').addClass('d-none');

                }
            }).catch(function(error) {

                $('#wrongDivAdmin').removeClass('d-none');
                $('#loadDivAdmin').addClass('d-none');
            });


    }




    //add button modal show for add new entity



    // Material Select Initialization
    $(document).ready(function() {
        $('#role').material_select();
    });

    $(document).ready(function() {
        $('#status').material_select();
    });



    // Add Role List
    axios.get("{{ route('admin.adminRole') }}")
        .then(function(response) {
            var dataJSON = response.data;

            $('#role').empty();
            $('#role').append(`<option  selected value="0">Select Role</option>`);
            $.each(dataJSON, function(i, item) {
                $('#role').append(
                    `<option value="${dataJSON[i].name}"> ${dataJSON[i].name.replace(/\b[a-z]/g, match => match.toUpperCase())} </option>`
                );

                $('#role').material_select('refresh');
            });
        }).catch(function(error) {
            alert("There are no Role")
        });




    $('#addbtnAdmin').click(function() {
        $('#addAdminModal').modal('show');
    });


    //Admin Add modal save button

    $('#adminAddForm').submit(function(event) {
        event.preventDefault();
        var name = $('#AdminName').val();
        var email = $('#AdminEmail').val();
        var username = $('#AdminUsername').val();
        var password = $('#AdminPassword').val();
        var role = $('#role').val();
        var status = $('#status').val();




        adminAdd(name, email, username, password, role, status);

    })

    // admin Add Method


    function adminAdd(name, email, username, password, role, status) {

        if (name.length == 0) {

            toastr.error('Admin name is empty!');

        } else if (email == 0) {

            toastr.error('Admin Email is empty!');
        } else if (username == 0) {

            toastr.error('Admin User Name is empty!');
        } else if (password == 0) {

            toastr.error('Admin Password is empty!');
        } else if (status == 0) {
            toastr.error('Status is empty!');
        } else if (role == 0) {
            toastr.error('Please Assign Role..');
        } else {

            $('#AdminAddConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            axios.post("{{ route('admin.adminAdd') }}", {
                name: name,
                email: email,
                username: username,
                password: password,
                role: role,
                status: status,
            }).then(function(response) {

                $('#AdminAddConfirmBtn').html("Save");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#addAdminModal').modal('hide');
                        toastr.success('Add New Success .', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        $('#AdminNameIdUpdate').val("");
                        $('#AdminEmailIdUpdate').val("");
                        $('#AdminUsernameIdUpdate').val("");
                        $('#AdminPasswordIdUpdate').val("");
                        getAdmindata();

                    } else {
                        $('#addAdminModal').modal('hide');
                        toastr.error('Add New Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getAdmindata();
                    }
                } else {
                    $('#addAdminModal').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }


            }).catch(function(error) {

                $('#addAdminModal').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });

            });

        }

    }



    //  Admin delete modal yes button

    $('#confirmDeleteAdmin').click(function() {
        var id = $('#AdminDeleteId').html();
        // var id = $(this).data('id');
        DeleteDataAdmin(id);

    })


    //delete  admin function

    function DeleteDataAdmin(id) {
        $('#confirmDeleteAdmin').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

        axios.post("{{ route('admin.adminDelete') }}", {
                id: id
            })
            .then(function(response) {
                $('#confirmDeleteAdmin').html("Yes");

                if (response.status == 200) {


                    if (response.data == 1) {
                        $('#deleteModalAdmin').modal('hide');
                        toastr.warning('Delete Success.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getAdmindata();
                    } else {
                        $('#deleteModalAdmin').modal('hide');
                        toastr.error('Delete Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getAdmindata();
                    }

                } else {
                    $('#deleteModalAdmin').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }

            }).catch(function(error) {

                $('#deleteModalAdmin').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });

            });

    }


    //Admin Details data show for edit





    // Material Select Initialization
    $(document).ready(function() {
        $('#roleUpdate').material_select();
    });

    // Material Select Initialization
    $(document).ready(function() {
        $('#statusUpdate').material_select();
    });



    // Add Role List
    axios.get("{{ route('admin.adminRole') }}")
        .then(function(response) {
            var dataJSON = response.data;

            $('#roleUpdate').empty();
            $.each(dataJSON, function(i, item) {
                $('#roleUpdate').append(
                    `<option value="${dataJSON[i].name}"> ${dataJSON[i].name.replace(/\b[a-z]/g, match => match.toUpperCase())} </option>`
                );

                $('#roleUpdate').material_select('refresh');
            });
        }).catch(function(error) {
            alert("There are no Role")
        });








    function AdminUpdateDetails(id) {

        axios.post("{{ route('admin.adminDetailEdit') }}", {
                id: id
            })
            .then(function(response) {

                if (response.status == 200) {

                    $('#AdminLoader').addClass('d-none');
                    $('#AdminEditForm').removeClass('d-none');
                    var jsonData = response.data;
                    $('#AdminNameIdUpdate').val(jsonData[0].name);
                    $('#AdminEmailIdUpdate').val(jsonData[0].email);
                    $('#AdminUsernameIdUpdate').val(jsonData[0].username);
                    $('#AdminPasswordIdUpdate').val(jsonData[0].password);
                    $('#roleUpdate option[value=' + jsonData[0].roles[0].name + ']').attr('selected', 'selected');
                    $('#statusUpdate option[value=' + jsonData[0].status + ']').attr('selected', 'selected');

                } else {

                    $('#AdminLoader').addClass('d-none');
                    $('#AdminwrongLoader').removeClass('d-none');
                }

            }).catch(function(error) {

                $('#AdminLoader').addClass('d-none');
                $('#AdminwrongLoader').removeClass('d-none');

            });

    }







    // admin update modal save button

    $('#adminFormUpdate').submit(function(event) {

        event.preventDefault()
        var idUpdate = $('#AdminEditId').html();
        var nameUpdate = $('#AdminNameIdUpdate').val();
        var emailUpdate = $('#AdminEmailIdUpdate').val();
        var UsernameUpdate = $('#AdminUsernameIdUpdate').val();
        var PasswordUpdate = $('#AdminPasswordIdUpdate').val();
        var roleUpdate = $('#roleUpdate').val();
        var statusUpdate = $('#statusUpdate').val();



        AdminUpdate(idUpdate, nameUpdate, emailUpdate, UsernameUpdate, PasswordUpdate, roleUpdate,
            statusUpdate);

    })





    //update Admin data using modal

    function AdminUpdate(idUpdate, nameUpdate, emailUpdate, UsernameUpdate, PasswordUpdate, roleUpdate, statusUpdate) {



        if (nameUpdate.length == 0) {

            toastr.error('Name is empty!');

        } else if (emailUpdate.length == 0) {

            toastr.error('Email is empty!');

        } else if (UsernameUpdate.length == 0) {

            toastr.error('User Name is empty!');

        } else {
            $('#AdminupdateConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            axios.post("{{ route('admin.adminDataUpdate') }}", {
                id: idUpdate,
                name: nameUpdate,
                email: emailUpdate,
                username: UsernameUpdate,
                password: PasswordUpdate,
                roleUpdate: roleUpdate,
                statusUpdate: statusUpdate,
            }).then(function(response) {

                $('#AdminupdateConfirmBtn').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#updateAdminModal').modal('hide');
                        toastr.success('Update Success.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getAdmindata();

                    } else {
                        $('#updateAdminModal').modal('hide');
                        toastr.error('Update Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        })
                        getAdmindata();

                    }
                } else {
                    $('#updateAdminModal').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }


            }).catch(function(error) {

                $('#updateAdminModal').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });

            });
        }
    }
</script>

@endsection
