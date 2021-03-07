@extends('admin.Layouts.app')
@section('title','User')
@section('content')

<div id="mainDivUser" class="container-fluid d-none">
    <div class="row">
        <div class="col-md-12 p-2">
            <button id="addbtnUser" class="btn btn-sm btn-danger my-3">Add New</button>
            <table id="UserDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Sl.</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Eamil</th>
                        <th class="th-sm">Mobile</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="User_table">


                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="loadDivUser" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

        </div>
    </div>
</div>
<div id="wrongDivUser" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Went Wrong!</h3>
        </div>
    </div>
</div>



<!--  User add -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ml-5">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <div class="row">

                        <input id="UserName" type="text" id="" class="form-control mb-3" placeholder="User Name">
                        <input id="UserEmail" type="text" id="" class="form-control mb-3" placeholder="User Eamil">
                        <input id="phone_number" type="text" id="" class="form-control mb-3" placeholder="User Mobile">
                        
                        <input id="UserPassword" type="text" id="" class="form-control mb-3" placeholder="User Password">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="UserAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<!--  User add -->


<!-- Modal  User Delete -->
<div class="modal fade" id="deleteModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body p-3 text-center">
                <h5 class="mt-4">Do you want to Delete</h5>
                <h5 id="UserDeleteId" class="mt-4 d-none "></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button data-id="" id="confirmDeleteUser" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal  User Delete -->




<!--  User update -->
<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div id="UserEditForm" class="container d-none ">
                    <h5 id="UserEditId" class="mt-4 d-none"></h5>
                    <div class="row">
                        <div class="col-md-12">
                            <input id="UserNameIdUpdate" type="text" id="" class="form-control mb-3" placeholder="User Name">
                            <input id="UserEmailIdUpdate" type="text" id="" class="form-control mb-3" placeholder="User Email">
                            <input id="phone_number_edit" type="text" id="" class="form-control mb-3" placeholder="User Mobile">
                            

                        </div>

                    </div>
                </div>
                <img id="UserLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                <h3 id="UserwrongLoader" class="d-none">Something Went Wrong!</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="UserupdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
            </div>
        </div>
    </div>
</div>


<!--  User update -->



@endsection
@section('script')
<script type="text/javascript">
    getUserdata();

    // for User table

    function getUserdata() {


        axios.get("{{route('admin.getUserdata')}}")
            .then(function(response) {

                if (response.status = 200) {

                    $('#mainDivUser').removeClass('d-none');
                    $('#loadDivUser').addClass('d-none');

                    $('#UserDataTable').DataTable().destroy();
                    $('#User_table').empty();
                    var count = 1;
                    var dataJSON = response.data;

                    $.each(dataJSON, function(i, item) {

                       
                        $('<tr>').html(
                            "<td>" + count++ + " </td>" +

                            "<td>" + dataJSON[i].name + " </td>" +

                            "<td>" + dataJSON[i].email + " </td>" +
                            "<td>" + dataJSON[i].phone_number + " </td>" +
                            

                            "<td><a class='UserEditIcon' data-id=" + dataJSON[i].id +
                            "><i class='fas fa-edit'></i></a> </td>" +

                            "<td><a class='UserDeleteIcon' data-id=" + dataJSON[i].id +
                            " ><i class='fas fa-trash-alt'></i></a> </td>"
                        ).appendTo('#User_table');
                    });


                    //User click on delete icon

                    $(".UserDeleteIcon").click(function() {

                        var id = $(this).data('id');
                        $('#UserDeleteId').html(id);
                        $('#deleteModalUser').modal('show');

                    })



                    //User edit icon click

                    $(".UserEditIcon").click(function() {

                        var id = $(this).data('id');
                        $('#UserEditId').html(id);

                        $('#updateUserModal').modal('show');
                        UserUpdateDetails(id);

                    })




                    $('#UserDataTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select');


                } else {
                    $('#wrongDivUser').removeClass('d-none');
                    $('#loadDivUser').addClass('d-none');

                }
            }).catch(function(error) {

                $('#wrongDivUser').removeClass('d-none');
                $('#loadDivUser').addClass('d-none');
            });


    }




    //add button modal show for add new entity

    $('#addbtnUser').click(function() {
        $('#addUserModal').modal('show');
    });


    //User Add modal save button

    $('#UserAddConfirmBtn').click(function() {


        var name = $('#UserName').val();
        var email = $('#UserEmail').val();
        var phone_number = $('#phone_number').val();
    
        var password = $('#UserPassword').val();




        userAdd(name, email, password,phone_number);

    })

    // user Add Method


    function userAdd(name, email, password,phone_number) {



        if (name.length == 0) {

            toastr.error('User name is empty!');

        } else if (email.length == 0) {

            toastr.error('User Email is empty!');
        } else if (phone_number.length == 0) {
            toastr.error('Mobile is empty!');
        }  else if (password == 0) {

            toastr.error('User Password is empty!');
        } else {

            $('#UserAddConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            axios.post("{{route('admin.userAdd')}}", {
                name: name,
                email: email,
                phone_number: phone_number,
                
                password: password
            }).then(function(response) {

                $('#UserAddConfirmBtn').html("Save");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#addUserModal').modal('hide');
                        toastr.success('Add New Success .');
                        $('#UserName').val("");
                         $('#UserEmail').val("");
                         $('#phone_number').val("");
                         $('#UserPassword').val("");
                        

                        getUserdata();

                    } else {
                        $('#addUserModal').modal('hide');
                        toastr.error('Add New Failed');
                        getUserdata();
                    }
                } else {
                    $('#addUserModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }


            }).catch(function(error) {

                $('#addUserModal').modal('hide');
                toastr.error('Something Went Wrong');

            });

        }

    }



    //  User delete modal yes button

    $('#confirmDeleteUser').click(function() {
        var id = $('#UserDeleteId').html();
        // var id = $(this).data('id');
        DeleteDataUser(id);

    })


    //delete  user function

    function DeleteDataUser(id) {
        $('#confirmDeleteUser').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

        axios.post("{{route('admin.userDelete')}}", {
                id: id
            })
            .then(function(response) {
                $('#confirmDeleteUser').html("Yes");

                if (response.status == 200) {


                    if (response.data == 1) {
                        $('#deleteModalUser').modal('hide');
                        toastr.error('Delete Success.');
                        getUserdata();
                    } else {
                        $('#deleteModalUser').modal('hide');
                        toastr.error('Delete Failed');
                        getUserdata();
                    }

                } else {
                    $('#deleteModalUser').modal('hide');
                    toastr.error('Something Went Wrong');
                }

            }).catch(function(error) {

                $('#deleteModalUser').modal('hide');
                toastr.error('Something Went Wrong');

            });

    }


    //User Details data show for edit

    function UserUpdateDetails(id) {

        axios.post("{{route('admin.userDetailEdit')}}", {
                id: id
            })
            .then(function(response) {

                if (response.status == 200) {
                    $('#UserLoader').addClass('d-none');
                    $('#UserEditForm').removeClass('d-none');
                    var jsonData = response.data;
                    $('#UserNameIdUpdate').val(jsonData[0].name);
                    $('#UserEmailIdUpdate').val(jsonData[0].email);
                    $('#phone_number_edit').val(jsonData[0].phone_number);
                    $('#UserPasswordIdUpdate').val(jsonData[0].password);

                } else {

                    $('#UserLoader').addClass('d-none');
                    $('#UserwrongLoader').removeClass('d-none');
                }

            }).catch(function(error) {

                $('#UserLoader').addClass('d-none');
                $('#UserwrongLoader').removeClass('d-none');

            });

    }







    // user update modal save button

    $('#UserupdateConfirmBtn').click(function() {


        var idUpdate = $('#UserEditId').html();
        var nameUpdate = $('#UserNameIdUpdate').val();
        var emailUpdate = $('#UserEmailIdUpdate').val();
        var phone_number_edit = $('#phone_number_edit').val();



        UserUpdate(idUpdate, nameUpdate, emailUpdate, phone_number_edit );

    })





    //update User data using modal

    function UserUpdate(idUpdate, nameUpdate, emailUpdate, phone_number_edit) {



        if (emailUpdate.length == 0) {

            toastr.error(' Email is empty!');

        } else if (nameUpdate.length == 0) {
                 toastr.error('User name is empty!');
        }else if (phone_number_edit.length == 0) {
                 toastr.error('User Mobile Number is empty!');
        }else {
            $('#UserupdateConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            axios.post("{{route('admin.userDataUpdate')}}", {
                id: idUpdate,
                name: nameUpdate,
                email: emailUpdate,
                phone_number_edit: phone_number_edit
              
            }).then(function(response) {
                    console.log(response.data);
                $('#UserupdateConfirmBtn').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#updateUserModal').modal('hide');
                        toastr.success('Update Success.');
                        getUserdata();

                    } else {
                        $('#updateUserModal').modal('hide');
                        toastr.error('Update Failed');
                        getUserdata();

                    }
                } else {
                    $('#updateUserModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }


            }).catch(function(error) {

                $('#updateUserModal').modal('hide');
                toastr.error('Something Went Wrong');

            });
        }
    }
</script>

@endsection
