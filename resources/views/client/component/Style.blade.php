<style>
            /* Product image-New css Start  */

.product .product-image {
	 /* position: relative; 
	 margin-top: 50px; */
	 width: 100%;  
	height: 300px;
	
  }
  
  .product-image .overlay {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0);
	transition: background 0.5s ease;
  }
  
  .product-image:hover .overlay {
	display: block;
	background: rgba(0, 0, 0, .3);
  }
  
  .product-image img {
	position: absolute;
	width: 100%;
	height: 100%;
	left: 0;
	
  }
  
  .product-image .title {
	position: absolute;
	width: 500px;
	left: 0;
	top: 120px;
	font-weight: 700;
	font-size: 30px;
	text-align: center;
	text-transform: uppercase;
	color: white;
	z-index: 1;
	transition: top .5s ease;
  }
  
  .product-image:hover .title {
	top: 90px;
  }
  

  .product-image  .hoverimage{
	opacity: 0;
}
.product-image:hover .hoverimage{
  position:absolute;
  opacity: 1;
  transition: 0.5s ease;
 
}


.hoverbuttonbox{
	 /* position: relative;  
	 :shoud not use   */

	display: flex;
	 /* justify-content: space-between;  */
	align-items: flex-end;
	width: 100%;
	height:100%;
	background-color: #0000E6;
	
}


  .product-image .hoverbuttonbox .buttonaction {
	/* position: absolute; 
	 width: 500px; 
	 left:0; 
	 top: 380px;  */
	text-align: center;
	opacity: 0;
	transition: opacity .35s ease;
	z-index: 1; 
	padding:20px;
  }
    
  .product-image:hover .hoverbuttonbox .buttonaction {
	opacity: 1;
  }
  
  
  .product-image .hoverbuttonbox .button .buttonhover {
	 /* width: 200px;  */
	 /* padding: 12px 48px;  */
	/* text-align: center;
	color: white;
	border: solid 2px white;
	z-index: 1; */
	
  }


  .product-image .hoverbuttonbox .right{
	  margin-left: auto;
  }


  .product-image .buttonaction i {

	margin-right: 0px;
	 /* width: 16px;  */
	
}
.fslider, .fslider .flexslider, .fslider .slider-wrap, .fslider .slide, .fslider .slide > a, .fslider .slide > img, .fslider .slide > a > img {
	overflow: visible !important;
}
 /* Product image-New css End  */
</style>