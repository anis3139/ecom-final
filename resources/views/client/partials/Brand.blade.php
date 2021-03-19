 <div class="row mt-5">
     <div class="col-12">
         <div class="fancy-title title-border title-center mb-4">
             <h4>Brands who give Flat <span class="text-danger">40%</span> Off</h4>
         </div>

         <ul class="clients-grid grid-2 grid-sm-3 grid-md-6 grid-lg-8 mb-0">
             @foreach ($allCategory as $category )
              
                     <li class="grid-item"><a href="{{ route('client.category', $category->slug) }}"><img src="{{ $category ->image }}"
                         alt="Clients"></a></li>
               
             @endforeach
            

         </ul>
     </div>
 </div>
