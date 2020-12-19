@extends('usersite.layouts.app')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{asset('asset/img/regimage.png')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Email Varified Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li class="active">Email Varified</li>
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
                <div class="alert alert-success" role="alert">
                    Your email is successfully varified.
                </div>
                <script type="text/javascript">
                    function Redirect()
                    {
                        window.location="{{url('/')}}";
                    }
                    setTimeout('Redirect()', 5000);
                </script>
         </div>
       </div>
       </div>
       </div>
     </div>
   </div>
 </section>

 <!-- / Cart view section -->
@endsection
