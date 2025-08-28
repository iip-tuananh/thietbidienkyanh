@extends('site.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection

@section('css')
    <link href="/site/css/breadcrumb_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/paginate.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/style_page.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
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
                    <li><strong><span>{{ $title }}</span></strong></li>
                </ul>
            </div>
        </section>
        <section class="page">
            <div class="container">
                <div class="pg_page padding-top-15">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title category-title">
                                <h1 class="title-head d-none"><a href="#">{{ $title }}</a></h1>
                            </div>
                            <div class="content-page rte">
                                {!! $content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
@endpush
