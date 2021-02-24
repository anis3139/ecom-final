
//      getcartData();

//      function getcartData() {
//       axios.get("{{ route('client.cartData') }}")
//          .then(function(response) {
//              if (response.status = 200) {
//                  var dataJSON = response.data;
//                  var cartData = dataJSON.cart;
//                  console.log(dataJSON);
//                  $('#cart_quantity').html(dataJSON.total);
                
//                  $.each(cartData, function(i, item) {
//                      $('<li class="text-center">').html(      
//                         '<a class="aa-cartbox-img" href="#"><img src=" '+ cartData[i] .image +' " alt="img"></a>'+
//                         '<div class="aa-cartbox-info"> <h4><a href="#">'+ cartData[i].title + '</a> </h4> <p>'+ cartData[i].quantity + '" x &#2547;"'+ cartData[i].unit_price + '</p>  </div>'+

//                         '<div class="aa-remove-product"><button class="cartDeleteIcon" data-id=' + i + '  style=" display:inline-block" type="submit" class="fa fa-times"><i class="fa fa-remove"></i></button> </div> '    
//                      ).appendTo('#headerCart');

//                  });
//                  //Carts click on delete icon
//                  $(".cartDeleteIcon").click(function() {
//                      var id = $(this).data('id');
//                      $('#CartsDeleteId').html(id);
//                      DeleteDataCart(id);
//                  })
                
            
//              } else {
//                  toastr.error('Something Went Wrong...');
//              }
//          }).catch(function(error) {
//              console.log(error);
//              toastr.error('Something Went Wrong...');
//          });
//  }
 
 
//          $('#confirmDeleteCart').click(function() {
//              // var id = $('#CartDeleteId').html();
//              var id = $(this).data('id');
//              DeleteDataCart(id);
//          })
//          //delete Cart function
//          function DeleteDataCart(id) {
     
//              axios.post("{{route('client.cartRemove')}}", {
//                  product_id: id
//                  })
//                  .then(function(response) {
//                     console.log(response.data);
//                      if (response.status == 200) {
//                          getcartData();
//                          window.location.href = "{{route('client.showCart')}}"
//                          toastr.success('Cart Removed Success.');
//                      } else {
//                          toastr.error('Something Went Wrong');
//                      }
//                  }).catch(function(error) {
//                   console.log(error);
//                   toastr.error('Something Went Wrong');
//                  });
//          }
 