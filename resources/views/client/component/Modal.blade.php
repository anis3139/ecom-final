<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <div class="single-product shop-quick-view-ajax">
                <div class="ajax-modal-title text-center w-100">
                    <h2 id="pdTitle"></h2>
                </div>

                <div class="product modal-padding">

                    <div class="row col-mb-50">
                        <div class="col-md-6">
                            <div class="product-image">
                                <div class="fslider" data-pagi="false">
                                    <div class="flexslider">
                                        <div class="slider-wrap">
                                            <div class="slide22"><a href="#"
                                                    title="Pink Printed Dress - Front View"><img src=""
                                                        id="modalSingleImage" alt="Pink Printed Dress"></a></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="sale-flash badge badge-danger p-2" id="inStock"></div>

                            </div>
                        </div>
                        <div class="col-md-6 product-desc">
                            <div class="product-price"><del id="pdMainPrice"></del> <ins class="font-weight-semibold"
                                    id="pdPrice"></ins></div>

                            <div class="clear"></div>
                            <div class="line"></div>
                            <form class="cart mb-0" method="post" enctype='multipart/form-data' id="cartForm">

                                <div class="product-color">
                                    <span>Mezerment:</span>
                                    <div class="meserment-choose">

                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="line"></div>
                                <div class="product-color">
                                    <span>Color:</span>
                                    <div class="color-choose">
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="line"></div>


                                <div class="quantity clearfix">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" step="1" min="1" name="quantity" id="quantity" value="1"
                                        title="Qty" class="qty" size="4" />
                                    <input type="button" value="+" class="plus">
                                </div>

                                <input type="hidden" id="product_ids" name="product_ids">
                                <button type="submit" class="add-to-cart button m-0">Add to cart</button>
                            </form>

                            <div class="clear"></div>

                            <div class="line"></div>
                            <p id="pDescription"></p>

                            <div class="card product-meta mb-0">
                                <div class="card-body">
                                    <span class="posted_in">Category: <a href="#" rel="tag" id="pdCategory"></a> &nbsp;
                                        &nbsp; <a href="" id="modalSingleView" class="add-to-cart button m-0">View
                                            Details</a></span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
