


<!-- start contact section -->
<section id="aa-contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-contact-area">
            <div class="aa-contact-top">
              <h2>For More Details.. <br> Please Contact With us</h2>
              <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quos.</p>-->
            </div>
          
            <!-- Contact address -->
            <div class="aa-contact-address">
              <div class="row">
                <div class="col-md-8">
                  <div class="aa-contact-address-left">
 
 
   @include('client.components.massege')
                         @include('client.components.errorMassage')
 
                    <form class="comments-form contact-form" action="{{route('client.contactSend')}}" method="post">
                        @csrf
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">                        
                           <input type="text" id="name" name="name" placeholder="Your Name" class="form-control">
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">                        
                           <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                         </div>
                       </div>
                     </div>
                      <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">                        
                           <input type="text" id="subject" name="subject" placeholder="Company Name" class="form-control">
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">                        
                           <input type="text" id="PhonNumber" name="PhonNumber" placeholder="Mobile" class="form-control">
                         </div>
                       </div>
                     </div>                  
                      
                     <div class="form-group">                        
                       <textarea class="form-control" id="massage" name="massage" rows="3" placeholder="Message"></textarea>
                     </div>
                     <button typy="submit" id="contactSubmitBtn" class="aa-secondary-btn">Send</button>
                   </form>
 
 
 
 
 
 
 
 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="aa-contact-address-right">
                    <address>
                      <h4>Address</h4>
                      <p>
                          @if ($others)
                         {!! nl2br(e($others->address)) !!}
                         @endif
                         </p>
                      <p><span class="fa fa-phone"></span><a href="tel: @if ($others)
                         {{$others->phone}}
                         @endif"> @if ($others)
                         {{$others->phone}}
                         @endif</a></p>
                      <p><span class="fa fa-envelope"></span><a href="mailto: @if ($others)
                         {{$others->email}}
                         @endif"> @if ($others)
                         {{$others->email}}
                         @endif</a></p>
                    </address>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  