@extends('admin.Layouts.appLogin')
@section('title','Admin Login')
@section('content')

<div class="container ">
<div class="row justify-content-center d-flex mt-5 mb-5">

<div class="col-md-10 card">
  <div class="row">
    <div style="height: 450px" class="col-md-6 p-3">
      <form  action=" "  class="m-5 loginForm">

        <div class="form-group">
        <label for="exampleInputEmail1">User Name</label>
         <input required="" name="username" value="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter User Name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input  required="" name="password"  value="" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <button name="submit" type="submit" class="btn btn-block btn-danger">Login</button>
        </div>
    </form>
</div>

<div style="height: 450px" class="col-md-6 bg-light">
@php
$setting=App\Models\Setting::first();
@endphp
<img class="w-75 m-5" src="{{$setting->logo ?? asset('/admin/images/login.jpg')}}">
</div>
</div>
</div>




</div>
</div>


@endsection




@section('script')
<script type="text/javascript">
    $('.loginForm').on('submit',function (event) {
        event.preventDefault();
        let formData=$(this).serializeArray();
        let userName=formData[0]['value'];
        let password=formData[1]['value'];
        let url="{{route('admin.onLogin')}}";
        axios.post(url,{
          username:userName,
          password:password
        }).then(function (response) {
        
           if(response.status==200 && response.data==1){
            toastr.success('Login Success.', 'Success',{
            closeButton: true,
            progressBar: true,
        });
               window.location.href="{{route('admin.adminHome')}}";
           }
           else{
               toastr.error('Login Fail ! Try Again');
           }
        }).catch(function (error) {
            toastr.error('Login Fail ! Try Again');
        })
    })
</script>
@endsection
