@extends('client.layouts.app')

@section('content')


@include('client.partials.slider')
@include('client.partials.promo')
@include('client.partials.products')


  @include('client.partials.promoOne')

  @include('client.partials.popularProducts')


  @include('client.components.specialFeatureSection')
 
  @include('client.components.testimonial')




<!--@include('client.components.client')-->


@endsection


@section('script')

    <script>

        function productDetailsModal(id) {

            axios.post('{{ route('client.getsingleProductdata') }}', {
                        id: id
                    })
                .then(function(response) {
                    if (response.status == 200) {
                        var jsonData = response.data;


                        var url= `product/${jsonData[0].product_slug}`;
                        var simpleLensImageUrl = jsonData[0].img[0].image_path;


                        var inStock = '';
                        if (jsonData[0].product_in_stock == 0) {
                            inStock = "STOCK OUT!"
                        } else {
                            inStock = "SALE!"
                        }

                        $('#pdTitle').html(jsonData[0].product_title);
                        $('#pdPrice').html("&#2547;   " + jsonData[0].product_selling_price);
                        $('#inStock').html(inStock);
                        $('#pdCategory').html(jsonData[0].cat.name);
                        $('#product_ids').val(id);
                        $('#modalSingleView').attr("href" , url );
                        $('#simpleLensImage').attr("data-lens-image" , simpleLensImageUrl );
                        $('#simpleLensBigImage').attr("src" , simpleLensImageUrl );




                        var maserment="";
                        for (let index = 0; index < jsonData[0].maserment.length; index++) {
                            const element =  jsonData[0].maserment[index];
                            checked=""
                            if (index==0) {
                                checked="checked"
                            }else{
                                checked=""
                            }

                            maserment+='<div>';
                            maserment+='<input type="radio" id="'+element.meserment_value+'" name="maserment" '+checked+' value="'+element.meserment_value+'">';
                            maserment+='<label for="'+element.meserment_value+'"><span style="background-color:#000;"></span></label>';
                            maserment+='<span>'+element.meserment_value+'</span>&nbsp;';
                            maserment+='</div>';

                        }

                        $('.meserment-choose').html(maserment);




                        var color="";
                        for (let index = 0; index < jsonData[0].color.length; index++) {
                            const elementColor =  jsonData[0].color[index];

                            colorChecked=""
                            if (index==0) {
                                colorChecked="checked"
                            }else{
                                colorChecked=""
                            }
                            color+='<div>';
                            color+='<input type="radio" id="'+elementColor.product_color_code+'" name="color" '+colorChecked+' value="'+elementColor.product_color_code+'">';
                            color+='<label for="'+elementColor.product_color_code+'"><span style="background-color:'+elementColor.product_color_code+';"></span></label>';
                            color+='</div>';

                        }

                        $('.color-choose').html(color);

                        var img="";
                        for (let i = 0; i < jsonData[0].img.length; i++) {
                            const elementImg =  jsonData[0].img[i];

                            img+='<a  href="'+elementImg.image_path+'" class="simpleLens-thumbnail-wrapper"  data-lens-image="'+elementImg.image_path+'"  data-big-image="'+elementImg.image_path+'" ><img width="50px" height="50px" src="'+elementImg.image_path+'"></a>';

                        }
                        $('.simpleLens-thumbnails-container').html(img);


                    } else {

                    }
                }).catch(function(error) {

                });
        }




  
        $('#cartForm').on('submit',function (event) {
        event.preventDefault();
        let formData=$(this).serializeArray();
        let meserment=formData[0]['value'];
        let color=formData[1]['value'];
        let quantity=formData[2]['value'];
        let product_ids=formData[3]['value'];
            
        let url="{{route('client.addCart')}}";
        axios.post(url,{
            meserment:meserment,
            color:color,
            quantity:quantity,
            product_id:product_ids
        }).then(function (response) {
          console.log(response.data);
           if(response.status==200 && response.data==1){
            $('#quick-view-modal').modal('hide');
            toastr.success('Product Add Successfully');
            window.location.href =window.location.href;
        }
           else{
               toastr.error('Product not Added ! Try Again');
           }

        }).catch(function (error) {
            toastr.error('Product not Added  ! Something Error');
        })


    })



    </script>

@endsection
