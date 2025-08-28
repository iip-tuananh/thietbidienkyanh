@extends('site.layouts.master')
@section('title')
    {{ $cate_title }}
@endsection
@section('description')
    {{ $cate_des ?? '' }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection

@section('css')
    <link href="/site/css/breadcrumb_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/paginate.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/blog_article_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/sidebar_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <style>
        .text-limit-3-line {
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <div class="bodywrap">
        <section class="bread-crumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="home">
                        <a href="{{ route('front.home-page') }}"><span>Trang chủ</span></a>
                        <span class="mr_lr">
                            &nbsp;
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="svg-inline--fa fa-chevron-right fa-w-10">
                                <path fill="currentColor"
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                    class=""></path>
                            </svg>
                            &nbsp;
                        </span>
                    </li>
                    <li><strong><span>{{ $cate_title }}</span></strong></li>
                </ul>
            </div>
        </section>
        <div class="blog_wrapper layout-blog" itemscope itemtype="https://schema.org/Blog">
            <div class="container">
                <h1 class="title-page d-none">
                    <span>{{ $cate_title }}</span>
                </h1>
                <div class="row">
                    <div class="right-content col-lg-9 col-12">
                        <div class="list-blogs">
                            <div class="row row-fix">
                                @foreach ($blogs as $blog)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-fix">
                                    <div class="item-blog">
                                        <div class="block-thumb">
                                            <a class="thumb" href="{{ route('front.detail-blog', $blog->slug) }}"
                                                title="{{ $blog->name }}">
                                                <img width="600" height="380" class="lazyload"
                                                    src="/site/images/lazy.png"
                                                    data-src="{{ $blog->image ? $blog->image->path : 'https://placehold.co/600x400' }}"
                                                    alt="{{ $blog->name }}">
                                            </a>
                                        </div>
                                        <div class="day_time">
                                            <span class="day_item">{{ $blog->created_at->format('d') }}</span>
                                            <span class="myear_item">{{ $blog->created_at->format('m/Y') }}</span>
                                        </div>
                                        <div class="block-content">
                                            <h3><a href="{{ route('front.detail-blog', $blog->slug) }}"
                                                    title="{{ $blog->name }}">{{ $blog->name }}</a></h3>
                                            <p class="justify">
                                                {!! $blog->intro !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-center">
                                <nav class="clearfix relative nav_pagi w_100 ">
                                    {{ $blogs->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="blog_left_base col-lg-3 col-12">
                        @include('site.blogs.nav-blog', [
                            'newBlogs' => $newBlogs,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
