 <div class="row mt-5">
     <div class="col-12">
         <div class="fancy-title title-border title-center mb-4">
             <h4 class="text-uppercase">All Category</h4>
         </div>

         <ul class="clients-grid grid-2 grid-sm-3 grid-md-6 grid-lg-8 mb-0 justify-content-center">
             @foreach ($allCategory as $category )

                     <li class="grid-item"><a href="{{ route('client.category', $category->slug) }}"><img src="{{$category->icon}}"
                         alt="Clients"></a></li>

             @endforeach


         </ul>
     </div>
 </div>
