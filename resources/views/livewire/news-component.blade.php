@section('title')
    Tin tức
@endsection
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="page-title-heading">Tin tức sự kiện
                </h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Trang chủ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="blog blog-page pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="left-side-bar">
                    <div class="widget mb-30">
                        <div class="body-widget">
                            <div class="title-widget">
                                <h3>Tìm kiếm</h3>
                            </div>
                            <input type="text" class="mb-0" placeholder="Tìm kiếm..">
                            <button type="submit" class="btn-search" value="search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="widget mb-30">

                        <div class="widget-posts body-widget">

                            <div class="title-widget">
                                <h3>Bài viết phổ biến</h3>
                            </div>
                            @foreach ($populars as $new)
                                <div class="lastet-posts">
                                    <a href="{{ route('new.details',['new_slug' => $new->slug]) }}">
                                        <img src="{{ asset('assets/images/blog') }}/{{ $new->image }}" alt="{{ $new->title }}">
                                        <div class="inner-text">
                                            <h6>{{ $new->title }}</h6>
                                            <div class="meta">{{ $new->created_at }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget mb-30">

                        <div class="body-widget tags">
                            <div class="title-widget">
                                <h3>Chủ đề</h3>
                            </div>
                            <ul class="tags-list">
                                @foreach ($post_categories as $post_category)
                                    <li><a href="">{{ $post_category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-first col-lg-8 order-lg-last">
                <div class="row">
                    @foreach ($news as $new)
                    <div class="col-lg-12">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="{{ route('new.details',['new_slug' => $new->slug]) }}"><img src="{{ asset('assets/images/blog') }}/{{ $new->image }}" alt="{{ $new->title }}"></a>
                            </div>
                            <!-- Blog info -->
                            <div class="blog-info">
                                <ul class="date">
                                    <li>{{ $new->created_at }}</li>
                                    <li><a href="">{{ $new->post_category->name }}</a></li>
                                    <li><i class="fa fa-user" aria-hidden="true"></i>{{ $new->user->name }}</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i> {{ $new->view_count }} lượt xem</li>
                                </ul>
                                <div class="title-post">
                                    <a href="{{ route('new.details',['new_slug' => $new->slug]) }}">
                                        <h5>{{ $new->title }}</h5>
                                    </a>
                                </div>
                                <div class="post-text">
                                    <p>{{ $new->limit() }}</p>
                                </div>
                                <a href="{{ route('new.details',['new_slug' => $new->slug]) }}" class="btn-read-more">
                                    <div class="text-btn">Chi tiết</div>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12">
                        <div class="blog-pagination">
                            <ul class="pagination">
                                <li><a href="#" class="page-link active">1</a></li>
                                <li><a href="#" class="page-link">2</a></li>
                                <li><a href="#" class="page-link">3</a></li>
                                <li><a href="#"><i class="fas fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
