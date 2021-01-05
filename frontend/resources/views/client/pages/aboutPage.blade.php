@extends('client.layouts.app')
@section('css')

<style>

    h1, h2, h3, h4, h5, h6{
        font-family: "Raleway", sans-serif;
        margin: 0px;
        padding: 0px;
    }
    .aboutUs{
        margin-top: 200px;
    }
    .aboutUs img{
       padding: 20px;
    }
    .aboutUs .about-content{
        text-align: justify;
        padding: 0px 30px;
    }
    .aboutUs .about-content h3{
        padding: 0px 0px 10px 0px;
        text-align: center;
        border-bottom: 2px solid #FF6666;
    }
    .aboutUs .about-content p{
        margin-top: 10px;
        font-family: "Lato", sans-serif;
    }

</style>


@endsection
@section('content')
    <!-- catg header banner section -->
  @include('client.components.hero')
    <!-- / catg header banner section -->

    <div class="container">
        <div class="row  aboutUs">
            <div class="col-md-6">
                    <img src="{{asset('client/img/polo-shirt-1.png')}}" alt="" width="100%" height="auto">
            </div>
            <div class="col-md-6 about-content">
                    <h3>About us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non animi laborum, placeat similique dolorem ipsum ab ducimus ad ut velit eum maxime dolore eaque qui consequuntur quaerat voluptas aliquid. Odit tempore optio consectetur facere consequuntur! Maxime amet repudiandae adipisci assumenda quia cum tempora cumque aliquam molestias inventore earum nisi optio sit sed illum iste, laboriosam, doloremque voluptate accusamus ratione natus consequatur itaque. Consequatur fuga doloremque eius cupiditate voluptatem esse molestias accusantium vero possimus similique dolorem deserunt at distinctio magnam nesciunt error corporis iure adipisci, molestiae tempore! Delectus esse soluta doloremque quo voluptas ea expedita. Ea, eveniet velit similique sapiente qui repellat corporis labore distinctio quod nihil quam reprehenderit, natus accusantium, quidem facilis error. Explicabo quas, sequi laboriosam, eum recusandae quaerat iure obcaecati non accusantium at possimus provident eaque. Laboriosam expedita beatae alias rem maiores, dolorum magni quia explicabo distinctio, tempora iste fugit incidunt asperiores culpa fuga earum fugiat amet cupiditate itaque doloremque nulla. Nisi tempore sequi possimus error. Dolor deserunt aliquam architecto at necessitatibus ut blanditiis hic praesentium iure minus! Quisquam officiis atque quaerat aspernatur veritatis, officia recusandae, illum voluptas cupiditate iusto sit molestiae nobis rem, distinctio magni. Officia odit voluptatem ut eum corrupti illum optio expedita corporis repudiandae quae?</p>
            </div>
        </div>
    </div>



@endsection
