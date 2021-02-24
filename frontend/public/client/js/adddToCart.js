
     getcartData();

     function getcartData() {
      axios.get("{{ route('client.cartData') }}")
         .then(function(response) {
             if (response.status = 200) {
                 var dataJSON = response.data;
                 var cartData = dataJSON.cart;
                 console.log(dataJSON);
                 $('#totalPriceInCart').html(dataJSON.total);
                 $.each(cartData, function(i, item) {
                     $('<tr class="text-center">').html(
                         "<td><button class='cartDeleteIcon' data-id=" + i + "  style=' display:inline-block' type='submit' class='fa fa-times'><i class='fa fa-remove'></i></button></td>" +
                         "<td><img width='200px' height='80' class='table-img' src=" + cartData[i]
                         .image + "> </td>" +
                         "<td>" + cartData[i].title + " </td>" +
                         "<td>" + cartData[i].unit_price + " </td>" +
                         "<td>" + cartData[i].quantity + " </td>" +
                         "<td><div style=' width:20px; height:20px; border:1px solid #000; border-radius:50%; background-color:"+cartData[i].color+"'></div></td>"+
                         "<td>" + cartData[i].maserment + " </td>" +
                         "<td>" + cartData[i].total_price + " </td>"
                     ).appendTo('#cartForm');
                 });
                 //Carts click on delete icon
                 $(".cartDeleteIcon").click(function() {
                     var id = $(this).data('id');
                     $('#CartsDeleteId').html(id);
                     DeleteDataCart(id);
                 })
                 //Carts edit icon click
                 $(".cartEditIcon").click(function() {
                     var id = $(this).data('id');
                     $('#CartsEditId').html(id);
                     $('#editCartsModal').modal('show');
                     CartsUpdateDetails(id);
                 })
            
             } else {
                 toastr.error('Something Went Wrong');
             }
         }).catch(function(error) {
             console.log(error);
             toastr.error('Something Went Wrong');
         });
 }
 
 
         $('#confirmDeleteCart').click(function() {
             // var id = $('#CartDeleteId').html();
             var id = $(this).data('id');
             DeleteDataCart(id);
         })
         //delete Cart function
         function DeleteDataCart(id) {
     
             axios.post("{{route('client.cartRemove')}}", {
                 product_id: id
                 })
                 .then(function(response) {
                    console.log(response.data);
                     if (response.status == 200) {
                         getcartData();
                         window.location.href = "{{route('client.showCart')}}"
                         toastr.success('Cart Removed Success.');
                     } else {
                         toastr.error('Something Went Wrong');
                     }
                 }).catch(function(error) {
                  console.log(error);
                  toastr.error('Something Went Wrong');
                 });
         }
 