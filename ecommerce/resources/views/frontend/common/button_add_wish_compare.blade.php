
<div class="cart clearfix animate-effect ">
    <div class="action " style="margin-left: 15px">
        <ul class="list-unstyled">


                <button class="btn btn-primary icon buton_cart" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>


            <button class="btn btn-primary icon buton_cart" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button> </a> </li>

{{--            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>--}}
        </ul>
    </div>

</div>



<style >


    .buton_cart{
        max-width:60px;
        padding: 1em;
        border-radius: 10px;
        background: linear-gradient(149deg, rgb(197, 113, 194) 0%, rgba(106,57,175,1) 42%, rgba(187,24,148,1) 72%, rgba(115,53,134,1) 100%);
        box-shadow: inset rgba(0,0,0,.5) -3px -3px 8px, inset rgba(255,255,255,.9) 3px 3px 8px, rgba(0,0,0,.8) 3px 3px 8px -3px;
    }

    .buton_cart:active{
        color:red;
        max-width:55px;
        padding: 1em;
        border-radius: 8px;
        background: rgb(100,100,100) radial-gradient(circle at 0 0, rgba(255,255,255,.65), rgba(255,255,255,.35));
    }



</style>
