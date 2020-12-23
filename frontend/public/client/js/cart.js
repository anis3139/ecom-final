// $('#CartAddConfirmBtn').click(function() {
//   var product_id = $('#product_id').val();
//   alert("hi");
//   BrandAdd(product_id);
// })


// function BrandAdd(product_id) {
//   if (product_id.length == 0) {
//       toastr.error('Cart is empty!');
//   } else {
//       $('#CartAddConfirmBtn').html(
//           "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
//       my_data = [{
//           product_id: product_id
//       }];
//       var formData = new FormData();
//       formData.append('data', JSON.stringify(my_data));
      

//       axios.post("{{ route('client.add') }}", formData)
//       .then(function(response) {
//             console.log(response.data);
//           $('#CartAddConfirmBtn').html("Save");
//           if (response.status = 200) {
//               if (response.data == 1) {
//                   toastr.success('Add New Success .');
//               } else {
//                   toastr.error('Add New Failed');
//               }
//           } else {
//               toastr.error('Something Went Wrong');
//           }
//       }).catch(function(error) {
//           toastr.error('Something Went Wrong');
//       });
//   }
// }