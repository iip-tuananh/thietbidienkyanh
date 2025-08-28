
<div class="aside-blog-right">
    <div class="search-blog">
        <form action="" method="get" class="blog-search-form input-group search-bar"
            role="search">
            <input type="text" name="query" required class="input-group-field form-control"
                placeholder="Tìm kiếm bài viết..." autocomplete="off">
            <input type="hidden" name="type" value="article">
            <button type="submit" class="btn icon-fallback-text" aria-label="Tìm kiếm"
                title="Tìm kiếm">
                <svg width="20" height="20" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill="#ffffff"
                        d="M14.1404 13.4673L19.852 19.1789C20.3008 19.6276 19.6276 20.3008 19.1789 19.852L13.4673 14.1404C12.0381 15.4114 10.1552 16.1835 8.09176 16.1835C3.6225 16.1835 0 12.5613 0 8.09176C0 3.6225 3.62219 0 8.09176 0C12.561 0 16.1835 3.62219 16.1835 8.09176C16.1835 10.1551 15.4115 12.038 14.1404 13.4673ZM0.951972 8.09176C0.951972 12.0356 4.14824 15.2316 8.09176 15.2316C12.0356 15.2316 15.2316 12.0353 15.2316 8.09176C15.2316 4.14797 12.0353 0.951972 8.09176 0.951972C4.14797 0.951972 0.951972 4.14824 0.951972 8.09176Z">
                    </path>
                </svg>
            </button>
        </form>
    </div>
    <div class="blog_noibat">
        <h2 class="h2_sidebar_blog">
            <a href="javascript:void(0)" title="Bài viết mới">Bài viết mới</a>
        </h2>
        <div class="blog_content">
            @foreach ($newBlogs as $blog)
            <div class="item clearfix">
                <div class="post-thumb">
                    <a class="image-blog scale_hover"
                        href="{{ route('front.detail-blog', $blog->slug) }}"
                        title="{{ $blog->name }}">
                        <img width="600" height="380" class="img_blog lazyload"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="{{ $blog->image ? $blog->image->path : 'https://placehold.co/600x400' }}"
                            alt="{{ $blog->name }}">
                    </a>
                </div>
                <div class="contentright">
                    <h3><a title="{{ $blog->name }}"
                            href="{{ route('front.detail-blog', $blog->slug) }}">{{ $blog->name }}</a></h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="clearfix clear-fix"></div>
</div>
