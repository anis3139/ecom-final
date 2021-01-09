@extends('client.layouts.app')

@section('content')


@include('client.partials.slider')
@include('client.partials.promo')
@include('client.partials.products')

  <!-- / Promo section -->
  @include('client.partials.promoOne')
  <!-- / Products section -->
  <!-- banner section -->

  <!-- popular section -->
  @include('client.partials.popularProducts')
  <!-- / popular section -->

  @include('client.components.specialFeatureSection')
  <!-- / Support section -->
  <!-- Testimonial -->
  @include('client.components.testimonial')
  <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>LATEST BLOG</h2>
            <div class="row">
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">
                    <a href="#"><img src="{{ asset('client/img')}}/promo-banner-1.jpg" alt="img"></a>
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p>
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">
                    <a href="#"><img src="{{ asset('client/img')}}/promo-banner-3.jpg" alt="img"></a>
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p>
                     <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">
                    <a href="#"><img src="{{ asset('client/img')}}/promo-banner-1.jpg" alt="img"></a>
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p>
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Latest Blog -->

  {{-- <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-java.png" alt="java img"></a></li>
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-jquery.png" alt="jquery img"></a></li>
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-html5.png" alt="html5 img"></a></li>
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-css3.png" alt="css3 img"></a></li>
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-wordpress.png" alt="wordPress img"></a></li>
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-joomla.png" alt="joomla img"></a></li>
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-java.png" alt="java img"></a></li>
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-jquery.png" alt="jquery img"></a></li>
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-html5.png" alt="html5 img"></a></li>
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-css3.png" alt="css3 img"></a></li>
              <li><a href="#"><img src="{{ asset('client/img')}}/client-brand-wordpress.png" alt="wordPress img"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- / Client Brand -->

@endsection


@section('script')

    <script>
        //each Slider  Details data show for edit
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
                        $('#pdPrice').html("&euro; " + jsonData[0].product_selling_price);
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

    </script>

@endsection
