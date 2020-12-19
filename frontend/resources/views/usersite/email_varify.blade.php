@extends('usersite.layouts.app')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{asset('asset/img/regimage.png')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Email Varify Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li class="active">Email Varify</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">
            <div class="row">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                {{ session('status') }}
                </div>
                @endif

                <form class="aa-login-form" action="{{route('verification.send')}}" method="POST">
                    @csrf
                    <button id="modal"  style="visibility: hidden;"  class="aa-browse-btn" type="submit">Resent Email</button>
                </form>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#modal").click();
                    });
                </script>

                <div class="alert alert-success" role="alert">
                    A email varification link sent to your email address.Please check your Email and Verify your email address.
                </div>
        </form>
         </div>
       </div>
       </div>
       </div>
     </div>
   </div>
 </section>

 <!-- / Cart view section -->
@endsection
