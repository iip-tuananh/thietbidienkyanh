<div class="opacity_menu"></div>
<div class="topbarhea">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 d-none d-md-block">
                <div class="topbar-slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach (explode("\n", $config->text_top_header) as $text)
                            <div class="swiper-slide"> <span class="pulsingButton rounded-circle"></span>
                                {{ $text }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 text-hea-right">
                <div class="box_top_hea">
                    <a title="{{ $config->hotline }}" href="tel:{{ str_replace(' ', '', $config->hotline) }}"
                        class="opaci_href"></a>
                    <span>Hotline</span> <b>{{ $config->hotline }}</b>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-12 logo_mobile col-3-fix">
                <div class="menu-bar d-lg-none d-inline-block">
                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="bars" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-bars fa-w-14">
                        <path fill="#ffffff"
                            d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"
                            class=""></path>
                    </svg>
                </div>
                <a href="{{ route('front.home-page') }}" class="logo" title="Logo">
                    <img width="378" height="96"
                        src="{{ $config->image ? $config->image->path : 'https://placehold.co/378x96' }}"
                        alt="Bean Tools">
                </a>
                <div class="box_poy_mb d-lg-none d-inline-block">
                    <div class="item_poly_mb">
                        <a href="{{ route('cart.checkout') }}" title="Giỏ hàng" class="opaci_href"></a>
                        <img width="32" height="32" class="lazyload" src="/site/images/lazy.png?1753947700397"
                            data-src="/site/images/icon_poly_hea_4.png?1753947700397" alt="Giỏ hàng" />
                        <span class="count count_item_pr"><% cart.count %></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-12 col-9-fix">
                <div class="header-menu header-menu-right">
                    {{-- <div class="box_poly_hea hid-mb">
                        <a href="/he-thong" title="Hệ thống" class="opaci_href"></a>
                        <p class="box_icon_hea">
                            <img width="32" height="32" class="lazyload"
                                src="/site/images/lazy.png?1753947700397"
                                data-src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/icon_poly_hea_5.png?1753947700397"
                                alt="Hệ thống" />
                        </p>
                        <div class="item-policy-content">
                            <p>Hệ thống</p>
                            <span class="sub-text"><span class="count-text ">8</span> cửa hàng</span>
                        </div>
                    </div> --}}
                    {{-- <div class="box_poly_hea hid-mb">
                        <a href="/so-sanh-san-pham" title="So sánh" class="opaci_href"></a>
                        <p class="box_icon_hea">
                            <img width="32" height="32" class="lazyload"
                                src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/lazy.png?1753947700397"
                                data-src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/icon_poly_hea_2.png?1753947700397"
                                alt="So sánh" />
                        </p>
                        <div class="item-policy-content">
                            <p>So sánh</p>
                            <span class="sub-text"><span class="count-text js-compare-count">0</span> sản phẩm</span>
                        </div>
                    </div> --}}
                    {{-- <div class="box_poly_hea hid-mb">
                        <a href="/san-pham-yeu-thich" title="Yêu thích" class="opaci_href"></a>
                        <p class="box_icon_hea">
                            <img width="32" height="32" class="img_wisth lazyload"
                                src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/lazy.png?1753947700397"
                                data-src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/icon_poly_hea_1.png?1753947700397"
                                alt="Yêu thích" />
                        </p>
                        <div class="item-policy-content">
                            <p>Yêu thích</p>
                            <span class="sub-text"><span class="count-text js-wishlist-count">0</span> sản phẩm</span>
                        </div>
                    </div> --}}
                    <div class="box_poly_hea hid-mb">
                        <a href="{{ route('cart.checkout') }}" title="Giỏ hàng" class="opaci_href"></a>
                        <p class="box_icon_hea">
                            <img width="32" height="32" class="lazyload"
                                src="/site/images/lazy.png?1753947700397"
                                data-src="/site/images/icon_poly_hea_4.png?1753947700397" alt="Giỏ hàng" />
                        </p>
                        <div class="item-policy-content">
                            <p>Giỏ hàng</p>
                            <span class="sub-text">
                                <span class="count-text count count_item_pr"><% cart.count %></span> sản phẩm
                            </span>
                        </div>
                    </div>
                    <div class="search-smart">
                        <form action="{{ route('front.search') }}" method="get"
                            class="header-search-form input-group search-bar" role="search">
                            <input type="text" name="keyword" required
                                class="input-group-field auto-search search-auto form-control"
                                placeholder="Nhập tên sản phẩm..." autocomplete="off">
                            <button type="submit" class="btn icon-fallback-text" aria-label="Tìm kiếm"
                                title="Tìm kiếm">
                                <svg class="icon">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                            <div class="box_search">
                                <div class="search-suggest">
                                    <div class="list-search list-search-style">
                                    </div>
                                    <div class="list-search2 list-search-style">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-12 header-menu col-3-fix">
                <div class="menu_mega indexs">
                    <div class="title_menu">
                        <div class="bg_menu_bar">
                            <div class="menu_bar"></div>
                        </div>
                        <span class="title_">Danh mục sản phẩm</span>
                    </div>
                    <div class="blog-aside">
                        <div class="aside-content">
                            <div class="ul_menu">
                                @foreach ($productCategories as $category)
                                    <div class="nav_item nav-item lv1 li_check">
                                        <a href="{{ $category->category_url }}"
                                            title="{{ $category->name }}"
                                            style="background-image: url('{{ $category->image ? $category->image->path : 'https://placehold.co/480x480' }}')">
                                            {{ $category->name }}
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path
                                                    d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                                            </svg>
                                        </a>
                                        @if ($category->childs->count() > 0)
                                            <div class="ul_content_right_1">
                                                <div class="row">
                                                    @foreach ($category->childs as $child)
                                                        <div class="nav_item nav-item lv2 col-lg-4 col-md-4">
                                                            <a href="{{ $child->category_url }}"
                                                                title="{{ $child->name }}">{{ $child->name }}</a>
                                                            @if ($child->childs->count() > 0)
                                                                <div class="ul_content_right_2">
                                                                    @foreach ($child->childs as $child2)
                                                                        <div class="nav_item nav-item lv3"><a
                                                                                href="{{ $child2->category_url }}"
                                                                                title="{{ $child2->name }}">{{ $child2->name }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="menu_mobs">
                        <ul id="nav-mobile" class="nav">
                            @foreach ($productCategories as $category)
                                <li class="nav-item has-childs">
                                    <a href="{{ $category->category_url }}"
                                        class="nav-link navlink-level1" title="{{ $category->name }}"
                                        style="background-image: url('{{ $category->image ? $category->image->path : 'https://placehold.co/378x96' }}')">{{ $category->name }}</a>
                                    @if ($category->childs->count() > 0)
                                        <i class="open_mnu down_icon"></i>
                                        <ul class="dropdown-menu">
                                            @foreach ($category->childs as $child)
                                                <li class="dropdown-submenu nav-item-lv2 has-childs2">
                                                    <a class="nav-link nav-link-2"
                                                        href="{{ $child->category_url }}"
                                                        title="{{ $child->name }}">{{ $child->name }}</a><i
                                                        class="open_mnu down_icon"></i>
                                                    @if ($child->childs->count() > 0)
                                                        <ul class="dropdown-menu">
                                                            @foreach ($child->childs as $child2)
                                                                <li class="nav-item-lv3">
                                                                    <a class="nav-link"
                                                                        href="{{ $child2->category_url }}"
                                                                        title="{{ $child2->name }}">{{ $child2->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12 col-9-fix">
                <div class=" header-menu header-menu-left">
                    <div class="header-menu-des">
                        <nav class="header-nav">
                            <div class="title_menu">
                                <span class="title_">Menu chính</span>
                            </div>
                            <ul class="item_big">
                                <li class="nav-item active  ">
                                    <a class="a-img a-index" href="{{ route('front.home-page') }}"
                                        title="Trang chủ">
                                        Trang chủ
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a class="a-img a-index" href="{{ route('front.about-us') }}"
                                        title="Về chúng tôi">
                                        Về chúng tôi
                                    </a>
                                </li>
                                <li class="nav-item   has-mega">
                                    <a class="a-img caret-down a-index" href="javascript:void(0)" title="Sản phẩm">
                                        Sản phẩm
                                    </a>
                                    <i class="fa fa-caret-down"></i>
                                    <div class="mega-content d-lg-block d-none">
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <ul class="level0">
                                                    @foreach ($productCategories as $category)
                                                        <li class="level1 parent item fix-navs"
                                                            data-title="{{ $category->name }}"
                                                            data-link="{{ $category->category_url }}">
                                                            <a class="hmega"
                                                                href="{{ $category->category_url }}"
                                                                title="{{ $category->name }}">{{ $category->name }}</a>
                                                            @if ($category->childs->count() > 0)
                                                                <ul class="level1">
                                                                    @foreach ($category->childs as $child)
                                                                        <li class="level2">
                                                                            <a href="{{ $child->category_url }}"
                                                                                title="{{ $child->name }}">{{ $child->name }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="item_small d-lg-none d-block">
                                        @foreach ($productCategories as $category)
                                            <li>
                                                <a class="caret-down"
                                                        href="{{ $category->category_url }}"
                                                        title="{{ $category->name }}">
                                                    {{ $category->name }}
                                                </a>
                                                @if ($category->childs->count() > 0)
                                                    <i class="fa fa-caret-down"></i>
                                                    <ul>
                                                        @foreach ($category->childs as $child)
                                                            <li>
                                                                <a href="{{ $child->category_url }}"
                                                                    title="{{ $child->name }}"
                                                                    class="a3">{{ $child->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @foreach ($postCategories as $category)
                                    <li class="nav-item  ">
                                        <a class="a-img a-index"
                                            href="{{ route('front.list-blog', $category->slug) }}"
                                            title="{{ $category->name }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                                <li class="nav-item  ">
                                    <a class="a-img caret-down a-index" href="javascript:void(0)" title="Chính sách">
                                        Chính sách
                                    </a>
                                    <i class="fa fa-caret-down"></i>
                                    <ul class="item_small">
                                        @foreach ($policies as $policy)
                                            <li>
                                                <a class=""
                                                    href="{{ route('front.policy-detail', $policy->slug) }}"
                                                    title="{{ $policy->title }}">
                                                    {{ $policy->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a class="a-img a-index" href="{{ route('front.contact-us') }}" title="Liên hệ">
                                        Liên hệ
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="control-menu d-none">
                            <a href="#" id="prev">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="#000"
                                        d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                                </svg>
                            </a>
                            <a href="#" id="next">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="#000"
                                        d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
