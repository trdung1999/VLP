@section('title')
    Sản phẩm
@endsection
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="page-title-heading">Sản phẩm</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Trang chủ</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="shop pt-120 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="left-side-bar">
                    <div class="widget mb-30">
                        <div class="body-widget tags">
                            <div class="title-widget">
                                <h3>Danh mục sản phẩm</h3>
                            </div>
                            <ul class="tags-list">
                                @foreach ($categories as $category)
                                    <li><a href="#">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget mb-30">
                        <div class="widget-posts body-widget">
                            <div class="title-widget">
                                <h3>Sản phẩm phổ biến</h3>
                            </div>
                            @foreach ($populars as $popular)
                                <div class="lastet-posts">
                                    <a href="{{ route('product.details',['slug' => $popular->slug]) }}">
                                        <img src="{{ asset('assets/images/shop') }}/{{ $popular->image }}" alt="{{ $popular->name }}">
                                        <div class="inner-text">
                                            <h6>{{ $popular->name }}</h6>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                        @foreach ($products as $product)
                            <div class="single-product-item">
                                <div class="img-product">
                                    <a href="{{ route('product.details',['slug' => $product->slug]) }}">
                                        <img src="{{ asset('assets/images/shop') }}/{{ $product->image }}" alt="{{ $product->name }}">
                                    </a>
                                    <div class="btn-product">
                                        <a href="{{ route('product.details',['slug' => $product->slug]) }}">
                                            <i class="fa fa-info-circle"></i>
                                            Chi tiết
                                        </a>
                                    </div>
                                </div>
                                <div class="content-product">
                                    <h4><a href="{{ route('product.details',['slug' => $product->slug]) }}">{{ $product->name }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
