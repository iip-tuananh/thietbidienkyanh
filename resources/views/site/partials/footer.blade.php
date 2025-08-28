<div class="section_chinh_sach">
    <div class="container">
        <div class="row promo-box">
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="promo-item duration-300">
                    <div class="icon aspect-1">
                        <img width="50" height="50" class="lazyload" data-src="/site/images/ser_1.png?1753947700397"
                            alt="Bean Tools"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" />
                    </div>
                    <div class="info">
                        <h3>Vận chuyển miễn phí</h3>
                        <span>Hóa đơn trên 5 triệu</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="promo-item duration-300">
                    <div class="icon aspect-1">
                        <img width="50" height="50" class="lazyload"
                            data-src="/site/images/ser_2.png?1753947700397" alt="Bean Tools"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" />
                    </div>
                    <div class="info">
                        <h3>Đổi trả miễn phí</h3>
                        <span>Trong vòng 7 ngày</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="promo-item duration-300">
                    <div class="icon aspect-1">
                        <img width="50" height="50" class="lazyload"
                            data-src="/site/images/ser_3.png?1753947700397" alt="Bean Tools"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" />
                    </div>
                    <div class="info">
                        <h3>100% Hoàn tiền</h3>
                        <span>Nếu sản phẩm lỗi</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="promo-item duration-300">
                    <div class="icon aspect-1">
                        <img width="50" height="50" class="lazyload"
                            data-src="/site/images/ser_4.png?1753947700397" alt="Bean Tools"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" />
                    </div>
                    <div class="info">
                        <h3>Hotline: {{ $config->hotline }}</h3>
                        <span>Hỗ trợ 24/7</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="mid-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 ft-info">
                    <a href="{{ route('front.home-page') }}" class="logo_foo" title="Logo">
                        <img width="378" height="96"
                            src="{{ $config->image ? $config->image->path : 'https://placehold.co/378x96' }}"
                            alt="Bean Tools">
                    </a>
                    <div class="des_foo">
                        {{ $config->web_des }}
                    </div>
                    <div class="list_phone_foo">
                        @php
                            $zalo_chat = json_decode($config->zalo_chat, true);
                        @endphp
                        @foreach ($zalo_chat as $item)
                        <a href="tel:{{ str_replace(' ', '', $item['phone']) }}" title="{{ $item['title'] }}">
                            {{ $item['title'] }} <span>{{ $item['phone'] }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-5 ft-menu">
                    <div class="row">
                        <div class="col-12 col-sm-6 link-list col-footer footer-click">
                            <h4 class="title-menu title-menu2">
                                Chính sách
                            </h4>
                            <ul class="list-menu hidden-mobile">
                                @foreach ($policies as $policy)
                                    <li><a href="{{ route('front.policy-detail', $policy->slug) }}"
                                            title="{{ $policy->title }}">{{ $policy->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6 link-list col-footer footer-click">
                            <h4 class="title-menu title-menu2">
                                Danh mục chính
                            </h4>
                            <ul class="list-menu hidden-mobile">
                                <li><a href="{{ route('front.about-us') }}" title="Về chúng tôi">Về chúng tôi</a></li>
                                @foreach ($product_categories as $category)
                                    <li><a href="{{ $category->category_url }}"
                                            title="{{ $category->name }}">{{ $category->name }}</a></li>
                                @endforeach
                                @foreach ($post_categories as $postCategory)
                                    <li><a href="{{ route('front.list-blog', $postCategory->slug) }}"
                                            title="{{ $postCategory->name }}">{{ $postCategory->name }}</a></li>
                                @endforeach
                                <li><a href="{{ route('front.contact-us') }}" title="Liên hệ">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <h4 class="title-menu">
                        Thông tin liên hệ
                    </h4>
                    <div class="list-menu toggle-mn">
                        <div class="content-contact clearfix">
                            <span class="list_footer">
                                <b>Địa chỉ: </b>
                                {{ $config->address_company }}
                            </span>
                        </div>
                        <div class="content-contact clearfix">
                            <span class="list_footer">
                                <b>Điện thoại: </b>
                                <a title="{{ $config->hotline }}" href="tel:{{ str_replace(' ', '', $config->hotline) }}">
                                    {{ $config->hotline }}
                                </a>
                            </span>
                        </div>
                        <div class="content-contact clearfix">
                            <span class="list_footer">
                                <b>Email: </b>
                                <a title="{{ $config->email }}" href="mailto:{{ $config->email }}">
                                    {{ $config->email }}
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="social-footer">
                        <div class="social toggle-mn">
                            <a class="fb" href="{{ $config->facebook }}" target="_blank"
                                aria-label="Facebook" title="Theo dõi {{ $config->title }} trên Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="25px" height="25px" viewBox="0 0 96.124 96.123"
                                    style="enable-background:new 0 0 96.124 96.123;" xml:space="preserve">
                                    <path
                                        d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803   c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654   c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246   c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"
                                        data-original="#000000" class="active-path" data-old_color="#000000"
                                        fill="#EBE7E7" />
                                </svg>
                            </a>
                            <a class="tt" href="{{ $config->twitter }}" target="_blank" aria-label="Twitter"
                                title="Theo dõi {{ $config->title }} trên Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                    xml:space="preserve" width="25px" height="25px">
                                    <path
                                        d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016    c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992    c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056    c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152    c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792    c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44    C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568    C480.224,136.96,497.728,118.496,512,97.248z"
                                        data-original="#000000" class="active-path" data-old_color="#000000"
                                        fill="#EBE7E7" />
                                </svg>
                            </a>
                            <a class="yt" href="{{ $config->youtube }}" target="_blank" aria-label="Youtube"
                                title="Theo dõi {{ $config->title }} trên Youtube">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                    style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <path d="M490.24,113.92c-13.888-24.704-28.96-29.248-59.648-30.976C399.936,80.864,322.848,80,256.064,80
                               c-66.912,0-144.032,0.864-174.656,2.912c-30.624,1.76-45.728,6.272-59.744,31.008C7.36,138.592,0,181.088,0,255.904
                               C0,255.968,0,256,0,256c0,0.064,0,0.096,0,0.096v0.064c0,74.496,7.36,117.312,21.664,141.728
                               c14.016,24.704,29.088,29.184,59.712,31.264C112.032,430.944,189.152,432,256.064,432c66.784,0,143.872-1.056,174.56-2.816
                               c30.688-2.08,45.76-6.56,59.648-31.264C504.704,373.504,512,330.688,512,256.192c0,0,0-0.096,0-0.16c0,0,0-0.064,0-0.096
                               C512,181.088,504.704,138.592,490.24,113.92z M192,352V160l160,96L192,352z" />
                                </svg>
                            </a>
                            <a class="ins" href="{{ $config->instagram }}" target="_blank"
                                aria-label="Instagram" title="Theo dõi {{ $config->title }} trên Instagram">
                                <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m75 512h362c41.355469 0 75-33.644531 75-75v-362c0-41.355469-33.644531-75-75-75h-362c-41.355469 0-75 33.644531-75 75v362c0 41.355469 33.644531 75 75 75zm-45-437c0-24.8125 20.1875-45 45-45h362c24.8125 0 45 20.1875 45 45v362c0 24.8125-20.1875 45-45 45h-362c-24.8125 0-45-20.1875-45-45zm0 0" />
                                    <path
                                        d="m256 391c74.4375 0 135-60.5625 135-135s-60.5625-135-135-135-135 60.5625-135 135 60.5625 135 135 135zm0-240c57.898438 0 105 47.101562 105 105s-47.101562 105-105 105-105-47.101562-105-105 47.101562-105 105-105zm0 0" />
                                    <path
                                        d="m406 151c24.8125 0 45-20.1875 45-45s-20.1875-45-45-45-45 20.1875-45 45 20.1875 45 45 45zm0-60c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <h4 class="title-menu">
                        Hình thức thanh toán
                    </h4>
                    <ul class="thanhtoan">
                        <li><img width="108" height="66" alt="Payment 1"
                                data-src="/site/images/payment_1.png?1753947700397"
                                class="lazyload"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC">
                        </li>
                        <li><img width="108" height="66" alt="Payment 2"
                                data-src="/site/images/payment_2.png?1753947700397"
                                class="lazyload"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC">
                        </li>
                        <li><img width="108" height="66" alt="Payment 3"
                                data-src="/site/images/payment_3.png?1753947700397"
                                class="lazyload"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC">
                        </li>
                        <li><img width="108" height="66" alt="Payment 4"
                                data-src="/site/images/payment_4.png?1753947700397"
                                class="lazyload"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="copyright" class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <span class="copy-right">© Bản quyền thuộc về <b>{{ $config->web_title }}</b></span>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="backtop" title="Lên đầu trang">
    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="angle-up" role="img"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-angle-up fa-w-10">
        <path fill="currentColor"
            d="M168.5 164.2l148 146.8c4.7 4.7 4.7 12.3 0 17l-19.8 19.8c-4.7 4.7-12.3 4.7-17 0L160 229.3 40.3 347.8c-4.7 4.7-12.3 4.7-17 0L3.5 328c-4.7-4.7-4.7-12.3 0-17l148-146.8c4.7-4.7 12.3-4.7 17 0z"
            class=""></path>
    </svg>
</a>
<div class="fixed-bottom-mobile d-lg-none d-block">
    <ul>
        <li>
            <a href="{{ route('front.home-page') }}" title="Trang chủ">
                <img width="32" height="32" class="lazyload"
                    src="/site/images/lazy.png?1753947700397"
                    data-src="/site/images/icon_poly_hea_6.png?1753947700397"
                    alt="Trang chủ" />
                <span>Trang chủ</span>
            </a>
        </li>
        <li class="menu-bar2">
            <a href="javascript:void(0)" id="btn-menu-mobile-fix" title="Danh mục">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <line y1="4.5" x2="24" y2="4.5" stroke="#000"></line>
                    <line y1="11.5" x2="24" y2="11.5" stroke="#000"></line>
                    <line y1="19.5" x2="24" y2="19.5" stroke="#000"></line>
                </svg>
                <span>Danh mục</span>
            </a>
        </li>
        <li>
            <a href="{{ route('front.contact-us') }}" title="Hệ thống">
                <img width="32" height="32" class="lazyload"
                    src="/site/images/lazy.png?1753947700397"
                    data-src="/site/images/icon_poly_hea_5.png?1753947700397"
                    alt="Hệ thống" />
                <span>Liên hệ</span>
            </a>
        </li>
        <li>
            <a href="{{ route('cart.checkout') }}" title="Giỏ hàng">
                <img width="32" height="32" class="lazyload"
                    src="/site/images/lazy.png?1753947700397"
                    data-src="/site/images/icon_poly_hea_4.png?1753947700397"
                    alt="Giỏ hàng" />
                <span class="compareCount">0</span>
                <span>Giỏ hàng</span>
            </a>
        </li>
    </ul>
</div>
