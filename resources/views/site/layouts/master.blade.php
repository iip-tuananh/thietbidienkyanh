<!DOCTYPE html>
<html lang="vi">

<head>
    @include('site.partials.head')
    <link rel="preload" as="script" href="/site/js/jquery.js?1753947700397" />
    <script src="/site/js/jquery.js?1753947700397" type="text/javascript"></script>
    <link rel="preload" as="script" href="/site/js/swiper.js?1753947700397" />
    <script src="/site/js/swiper.js?1753947700397" type="text/javascript"></script>
    <link rel="preload" as="script" href="/site/js/lazy.js?1753947700397" />
    <script src="/site/js/lazy.js?1753947700397" type="text/javascript"></script>
    <!-- <script>
        //notify js
        ! function(t) {
            "function" == typeof define && define.amd ? define(["jquery"], t) : t("object" == typeof exports ? require(
                "jquery") : jQuery)
        }(function(t) {
            function s(s) {
                var e = !1;
                return t('[data-notify="container"]').each(function(i, n) {
                    var a = t(n),
                        o = a.find('[data-notify="title"]').text().trim(),
                        r = a.find('[data-notify="message"]').html().trim(),
                        l = o === t("<div>" + s.settings.content.title + "</div>").html().trim(),
                        d = r === t("<div>" + s.settings.content.message + "</div>").html().trim(),
                        g = a.hasClass("alert-" + s.settings.type);
                    return l && d && g && (e = !0), !e
                }), e
            }

            function e(e, n, a) {
                var o = {
                    content: {
                        message: "object" == typeof n ? n.message : n,
                        title: n.title ? n.title : "",
                        icon: n.icon ? n.icon : "",
                        url: n.url ? n.url : "#",
                        target: n.target ? n.target : "-"
                    }
                };
                a = t.extend(!0, {}, o, a), this.settings = t.extend(!0, {}, i, a), this._defaults = i, "-" === this
                    .settings.content.target && (this.settings.content.target = this.settings.url_target), this
                    .animations = {
                        start: "webkitAnimationStart oanimationstart MSAnimationStart animationstart",
                        end: "webkitAnimationEnd oanimationend MSAnimationEnd animationend"
                    }, "number" == typeof this.settings.offset && (this.settings.offset = {
                        x: this.settings.offset,
                        y: this.settings.offset
                    }), (this.settings.allow_duplicates || !this.settings.allow_duplicates && !s(this)) && this.init()
            }
            var i = {
                element: "body",
                position: null,
                type: "info",
                allow_dismiss: !0,
                allow_duplicates: !0,
                newest_on_top: !1,
                showProgressbar: !1,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5e3,
                timer: 1e3,
                url_target: "_blank",
                mouse_over: null,
                animate: {
                    enter: "animated fadeInDown",
                    exit: "animated fadeOutUp"
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: "class",
                template: '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'
            };
            String.format = function() {
                for (var t = arguments[0], s = 1; s < arguments.length; s++) t = t.replace(RegExp("\\{" + (s - 1) +
                    "\\}", "gm"), arguments[s]);
                return t
            }, t.extend(e.prototype, {
                init: function() {
                    var t = this;
                    this.buildNotify(), this.settings.content.icon && this.setIcon(), "#" != this.settings
                        .content.url && this.styleURL(), this.styleDismiss(), this.placement(), this.bind(),
                        this.notify = {
                            $ele: this.$ele,
                            update: function(s, e) {
                                var i = {};
                                "string" == typeof s ? i[s] = e : i = s;
                                for (var n in i) switch (n) {
                                    case "type":
                                        this.$ele.removeClass("alert-" + t.settings.type), this.$ele
                                            .find('[data-notify="progressbar"] > .progress-bar')
                                            .removeClass("progress-bar-" + t.settings.type), t
                                            .settings.type = i[n], this.$ele.addClass("alert-" + i[
                                                n]).find(
                                                '[data-notify="progressbar"] > .progress-bar')
                                            .addClass("progress-bar-" + i[n]);
                                        break;
                                    case "icon":
                                        var a = this.$ele.find('[data-notify="icon"]');
                                        "class" === t.settings.icon_type.toLowerCase() ? a
                                            .removeClass(t.settings.content.icon).addClass(i[n]) : (
                                                a.is("img") || a.find("img"), a.attr("src", i[n]));
                                        break;
                                    case "progress":
                                        var o = t.settings.delay - t.settings.delay * (i[n] / 100);
                                        this.$ele.data("notify-delay", o), this.$ele.find(
                                            '[data-notify="progressbar"] > div').attr(
                                            "aria-valuenow", i[n]).css("width", i[n] + "%");
                                        break;
                                    case "url":
                                        this.$ele.find('[data-notify="url"]').attr("href", i[n]);
                                        break;
                                    case "target":
                                        this.$ele.find('[data-notify="url"]').attr("target", i[n]);
                                        break;
                                    default:
                                        this.$ele.find('[data-notify="' + n + '"]').html(i[n])
                                }
                                var r = this.$ele.outerHeight() + parseInt(t.settings.spacing) +
                                    parseInt(t.settings.offset.y);
                                t.reposition(r)
                            },
                            close: function() {
                                t.close()
                            }
                        }
                },
                buildNotify: function() {
                    var s = this.settings.content;
                    this.$ele = t(String.format(this.settings.template, this.settings.type, s.title, s
                            .message, s.url, s.target)), this.$ele.attr("data-notify-position", this
                            .settings.placement.from + "-" + this.settings.placement.align), this.settings
                        .allow_dismiss || this.$ele.find('[data-notify="dismiss"]').css("display", "none"),
                        (this.settings.delay > 0 || this.settings.showProgressbar) && this.settings
                        .showProgressbar || this.$ele.find('[data-notify="progressbar"]').remove()
                },
                setIcon: function() {
                    "class" === this.settings.icon_type.toLowerCase() ? this.$ele.find(
                            '[data-notify="icon"]').addClass(this.settings.content.icon) : this.$ele.find(
                            '[data-notify="icon"]').is("img") ? this.$ele.find('[data-notify="icon"]').attr(
                            "src", this.settings.content.icon) : this.$ele.find('[data-notify="icon"]')
                        .append('<img src="' + this.settings.content.icon + '" alt="Notify Icon" />')
                },
                styleDismiss: function() {
                    this.$ele.find('[data-notify="dismiss"]').css({
                        position: "absolute",
                        right: "10px",
                        top: "5px",
                        zIndex: this.settings.z_index + 2
                    })
                },
                styleURL: function() {
                    this.$ele.find('[data-notify="url"]').css({
                        backgroundImage: "url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)",
                        height: "100%",
                        left: 0,
                        position: "absolute",
                        top: 0,
                        width: "100%",
                        zIndex: this.settings.z_index + 1
                    })
                },
                placement: function() {
                    var s = this,
                        e = this.settings.offset.y,
                        i = {
                            display: "inline-block",
                            margin: "0px auto",
                            position: this.settings.position ? this.settings.position : "body" === this
                                .settings.element ? "fixed" : "absolute",
                            transition: "all .5s ease-in-out",
                            zIndex: this.settings.z_index
                        },
                        n = !1,
                        a = this.settings;
                    switch (t('[data-notify-position="' + this.settings.placement.from + "-" + this.settings
                            .placement.align + '"]:not([data-closing="true"])').each(function() {
                            e = Math.max(e, parseInt(t(this).css(a.placement.from)) + parseInt(t(this)
                                .outerHeight()) + parseInt(a.spacing))
                        }), this.settings.newest_on_top === !0 && (e = this.settings.offset.y), i[this
                            .settings.placement.from] = e + "px", this.settings.placement.align) {
                        case "left":
                        case "right":
                            i[this.settings.placement.align] = this.settings.offset.x + "px";
                            break;
                        case "center":
                            i.left = 0, i.right = 0
                    }
                    this.$ele.css(i).addClass(this.settings.animate.enter), t.each(["webkit-", "moz-", "o-",
                            "ms-", ""
                        ], function(t, e) {
                            s.$ele[0].style[e + "AnimationIterationCount"] = 1
                        }), t(this.settings.element).append(this.$ele), this.settings.newest_on_top === !
                        0 && (e = parseInt(e) + parseInt(this.settings.spacing) + this.$ele.outerHeight(),
                            this.reposition(e)), t.isFunction(s.settings.onShow) && s.settings.onShow.call(
                            this.$ele), this.$ele.one(this.animations.start, function() {
                            n = !0
                        }).one(this.animations.end, function() {
                            t.isFunction(s.settings.onShown) && s.settings.onShown.call(this)
                        }), setTimeout(function() {
                            n || t.isFunction(s.settings.onShown) && s.settings.onShown.call(this)
                        }, 600)
                },
                bind: function() {
                    var s = this;
                    if (this.$ele.find('[data-notify="dismiss"]').on("click", function() {
                            s.close()
                        }), this.$ele.mouseover(function() {
                            t(this).data("data-hover", "true")
                        }).mouseout(function() {
                            t(this).data("data-hover", "false")
                        }), this.$ele.data("data-hover", "false"), this.settings.delay > 0) {
                        s.$ele.data("notify-delay", s.settings.delay);
                        var e = setInterval(function() {
                            var t = parseInt(s.$ele.data("notify-delay")) - s.settings.timer;
                            if ("false" === s.$ele.data("data-hover") && "pause" === s.settings
                                .mouse_over || "pause" != s.settings.mouse_over) {
                                var i = (s.settings.delay - t) / s.settings.delay * 100;
                                s.$ele.data("notify-delay", t), s.$ele.find(
                                    '[data-notify="progressbar"] > div').attr("aria-valuenow",
                                    i).css("width", i + "%")
                            }
                            t > -s.settings.timer || (clearInterval(e), s.close())
                        }, s.settings.timer)
                    }
                },
                close: function() {
                    var s = this,
                        e = parseInt(this.$ele.css(this.settings.placement.from)),
                        i = !1;
                    this.$ele.data("closing", "true").addClass(this.settings.animate.exit), s.reposition(e),
                        t.isFunction(s.settings.onClose) && s.settings.onClose.call(this.$ele), this.$ele
                        .one(this.animations.start, function() {
                            i = !0
                        }).one(this.animations.end, function() {
                            t(this).remove(), t.isFunction(s.settings.onClosed) && s.settings.onClosed
                                .call(this)
                        }), setTimeout(function() {
                            i || (s.$ele.remove(), s.settings.onClosed && s.settings.onClosed(s.$ele))
                        }, 600)
                },
                reposition: function(s) {
                    var e = this,
                        i = '[data-notify-position="' + this.settings.placement.from + "-" + this.settings
                        .placement.align + '"]:not([data-closing="true"])',
                        n = this.$ele.nextAll(i);
                    this.settings.newest_on_top === !0 && (n = this.$ele.prevAll(i)), n.each(function() {
                        t(this).css(e.settings.placement.from, s), s = parseInt(s) + parseInt(e
                            .settings.spacing) + t(this).outerHeight()
                    })
                }
            }), t.notify = function(t, s) {
                var i = new e(this, t, s);
                return i.notify
            }, t.notifyDefaults = function(s) {
                return i = t.extend(!0, {}, i, s)
            }, t.notifyClose = function(s) {
                void 0 === s || "all" === s ? t("[data-notify]").find('[data-notify="dismiss"]').trigger("click") :
                    t('[data-notify-position="' + s + '"]').find('[data-notify="dismiss"]').trigger("click")
            }
        });
        //cookie
        ! function(e) {
            var n;
            if ("function" == typeof define && define.amd && (define(e), n = !0), "object" == typeof exports && (module
                    .exports = e(), n = !0), !n) {
                var t = window.Cookies,
                    o = window.Cookies = e();
                o.noConflict = function() {
                    return window.Cookies = t, o
                }
            }
        }(function() {
            function e() {
                for (var e = 0, n = {}; e < arguments.length; e++) {
                    var t = arguments[e];
                    for (var o in t) n[o] = t[o]
                }
                return n
            }

            function n(e) {
                return e.replace(/(%[0-9A-Z]{2})+/g, decodeURIComponent)
            }
            return function t(o) {
                function r() {}

                function i(n, t, i) {
                    if ("undefined" != typeof document) {
                        "number" == typeof(i = e({
                            path: "/"
                        }, r.defaults, i)).expires && (i.expires = new Date(1 * new Date + 864e5 * i.expires)), i
                            .expires = i.expires ? i.expires.toUTCString() : "";
                        try {
                            var c = JSON.stringify(t);
                            /^[\{\[]/.test(c) && (t = c)
                        } catch (e) {}
                        t = o.write ? o.write(t, n) : encodeURIComponent(String(t)).replace(
                                /%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent),
                            n = encodeURIComponent(String(n)).replace(/%(23|24|26|2B|5E|60|7C)/g,
                                decodeURIComponent).replace(/[\(\)]/g, escape);
                        var f = "";
                        for (var u in i) i[u] && (f += "; " + u, !0 !== i[u] && (f += "=" + i[u].split(";")[0]));
                        return document.cookie = n + "=" + t + f
                    }
                }

                function c(e, t) {
                    if ("undefined" != typeof document) {
                        for (var r = {}, i = document.cookie ? document.cookie.split("; ") : [], c = 0; c < i
                            .length; c++) {
                            var f = i[c].split("="),
                                u = f.slice(1).join("=");
                            t || '"' !== u.charAt(0) || (u = u.slice(1, -1));
                            try {
                                var a = n(f[0]);
                                if (u = (o.read || o)(u, a) || n(u), t) try {
                                    u = JSON.parse(u)
                                } catch (e) {}
                                if (r[a] = u, e === a) break
                            } catch (e) {}
                        }
                        return e ? r[e] : r
                    }
                }
                return r.set = i, r.get = function(e) {
                    return c(e, !1)
                }, r.getJSON = function(e) {
                    return c(e, !0)
                }, r.remove = function(n, t) {
                    i(n, "", e(t, {
                        expires: -1
                    }))
                }, r.defaults = {}, r.withConverter = t, r
            }(function() {})
        });
    </script> -->
    <link rel="preload" as='style' type="text/css" href="/site/css/main.scss.css?1753947700397">
    <link rel="preload" as='style' type="text/css" href="/site/css/index.scss.css?1753947700397">
    <link rel="preload" as='style' type="text/css" href="/site/css/bootstrap-4-3-min.css?1753947700397">
    <link rel="preload" as='style' type="text/css" href="/site/css/swiper.scss.css?1753947700397">
    <link rel="stylesheet" href="/site/css/bootstrap-4-3-min.css?1753947700397">
    <link href="/site/css/main.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/index.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/swiper.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link rel="preload" as='style' type="text/css" href="/site/css/quickviews_popup_cart.scss.css?1753947700397">
    <link href="/site/css/quickviews_popup_cart.scss.css?1753947700397" rel="stylesheet" type="text/css"
        media="all" />
    <script>
        $(document).ready(function($) {
            awe_lazyloadImage();
        });

        function awe_lazyloadImage() {
            var ll = new LazyLoad({
                elements_selector: ".lazyload",
                load_delay: 100,
                threshold: 0
            });
        }
        window.awe_lazyloadImage = awe_lazyloadImage;
    </script>

    @yield('css')

    <!-- Angular Js -->
    <script src="{{ asset('libs/angularjs/angular.js?v=222222') }}"></script>
    <script src="{{ asset('libs/angularjs/angular-resource.js') }}"></script>
    <script src="{{ asset('libs/angularjs/sortable.js') }}"></script>
    <script src="{{ asset('libs/dnd/dnd.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-sanitize.js"></script>
    <script src="{{ asset('libs/angularjs/select.js') }}"></script>
    <script src="{{ asset('js/angular.js') }}?version={{ env('APP_VERSION', '1') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    @stack('script')
    <script>
        app.controller('AppController', function($rootScope, $scope, cartItemSync, $interval, $compile) {
            $scope.currentUser = @json(Auth::guard('client')->user());
            $scope.isAdminClient = @json(Auth::guard('client')->check());
            // $scope.showMenuAdminClient = localStorage.getItem('showMenuAdminClient') ? localStorage.getItem('showMenuAdminClient') : false;

            // const currentUrl = window.location.href;
            // if (currentUrl != "{{ route('front.client-account') }}" && currentUrl != "{{ route('front.user-order') }}" && currentUrl != "{{ route('front.user-revenue') }}" && currentUrl != "{{ route('front.user-level') }}") {
            //     $scope.showMenuAdminClient = false;
            //     localStorage.removeItem('showMenuAdminClient');
            // }

            // $scope.changeMenuClient = function($event, url){
            //     $event.preventDefault();
            //     $scope.showMenuAdminClient = !$scope.showMenuAdminClient;
            //     if(url == '{{ route('front.user-order') }}' || url == '{{ route('front.user-revenue') }}' || url == '{{ route('front.user-level') }}') {
            //         $scope.showMenuAdminClient = true;
            //     }

            //     if($scope.showMenuAdminClient){
            //         localStorage.setItem('showMenuAdminClient', $scope.showMenuAdminClient);
            //         window.location.href = url;
            //     }else{
            //         localStorage.removeItem('showMenuAdminClient');
            //         window.location.href = '{{ route('front.home-page') }}';
            //     }
            // }

            // Biên dịch lại nội dung bên trong container
            var container = angular.element(document.getElementsByClassName('item_product_main'));
            $compile(container.contents())($scope);

            var popup = angular.element(document.getElementById('popup-cart-mobile'));
            $compile(popup.contents())($scope);

            // var quickView = angular.element(document.getElementById('quick-view-product'));
            // $compile(quickView.contents())($scope);

            // Đặt mua hàng
            $scope.hasItemInCart = false;
            $scope.cart = cartItemSync;
            $scope.item_qty = 1;
            $scope.quantity_quickview = 1;
            $scope.noti_product = {};

            $scope.addToCart = function(productId, quantity = 1) {
                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', productId);
                let item_qty = quantity;

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(item_qty)
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            // toastr.success('Thao tác thành công !')
                            $scope.noti_product = response.noti_product;
                            $scope.$applyAsync();

                            $('#popup-cart-mobile').addClass('active');
                            $('.backdrop__body-backdrop___1rvky').addClass('active');
                            $('#quick-view-product.quickview-product').hide();
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
                // if ($scope.isAdminClient) {
                // } else {
                //     window.location.href = "{{ route('front.login-client') }}";
                // }
            }

            $scope.changeQty = function(qty, product_id) {
                updateCart(qty, product_id)
            }

            $scope.incrementQuantity = function(product) {
                product.quantity = Math.min(product.quantity + 1, 9999);
            };

            $scope.decrementQuantity = function(product) {
                product.quantity = Math.max(product.quantity - 1, 0);
            };

            function updateCart(qty, product_id) {
                jQuery.ajax({
                    type: 'POST',
                    url: "{{ route('cart.update.item') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    success: function(response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            $scope.total_qty = response.count;
                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            // xóa item trong giỏ
            $scope.removeItem = function(product_id) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{ route('cart.remove.item') }}",
                    data: {
                        product_id: product_id
                    },
                    success: function(response) {
                        if (response.success) {
                            $scope.cart.items = response.items;
                            $scope.cart.count = Object.keys($scope.cart.items).length;
                            $scope.cart.totalCost = response.total;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            if ($scope.cart.count == 0) {
                                $scope.hasItemInCart = false;
                            }
                            $scope.$applyAsync();
                        }
                    },
                    error: function(e) {
                        jQuery.toast.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            // Xem nhanh
            $scope.quickViewProduct = {};
            $scope.showQuickView = function(productId) {
                $.ajax({
                    url: "{{ route('front.get-product-quick-view') }}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        product_id: productId
                    },
                    success: function(response) {
                        $('#quick-view-product .quick-view-product').html(response.html);
                        var quickView = angular.element(document.getElementById(
                            'quick-view-product'));
                        $compile(quickView.contents())($scope);
                        $scope.$applyAsync();
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            // Search product
            jQuery('#live-search').keyup(function() {
                var keyword = jQuery(this).val();
                jQuery.ajax({
                    type: 'post',
                    url: '{{ route('front.auto-search-complete') }}',
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        keyword: keyword
                    },
                    success: function(data) {
                        jQuery('.live-search-results').html(data.html);
                    }
                })
            });
        })
        app.factory('cartItemSync', function($interval) {
            var cart = {
                items: null,
                total: null
            };

            cart.items = @json($cartItems);
            cart.count = {{ $cartItems->sum('quantity') }};
            cart.total = {{ $totalPriceCart }};

            return cart;
        });

        @if (Session::has('token'))
            localStorage.setItem('{{ env('prefix') }}-token', "{{ Session::get('token') }}")
        @endif
        @if (Session::has('logout'))
            localStorage.removeItem('{{ env('prefix') }}-token');
        @endif
        var CSRF_TOKEN = "{{ csrf_token() }}";
        @if (Auth::guard('client')->check())
            const DEFAULT_CLIENT_USER = {
                id: "{{ Auth::guard('client')->user()->id }}",
                fullname: "{{ Auth::guard('client')->user()->name }}"
            };
        @else
            const DEFAULT_CLIENT_USER = null;
        @endif
    </script>
</head>

<body ng-app="App" ng-controller="AppController" ng-cloak>
    @include('site.partials.header')
    @yield('content')
    @include('site.partials.footer')

    <link rel="preload" as="style" href="/site/css/ajaxcart.scss.css?1753947700397" type="text/css">
    <link href="/site/css/ajaxcart.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <div class="backdrop__body-backdrop___1rvky"></div>
    <script type="text/javascript">
        window.theme = window.theme || {};
        var wW = $(window).width();
        var timeout;

        $('.img_hover_cart').click(function() {
            $('.cart-sidebar, .backdrop__body-backdrop___1rvky').addClass('active');
        });

        $(document).on('click', '.backdrop__body-backdrop___1rvky, .cart_btn-close, .close-popup, .close-popup-search',
            function() {
                $('.backdrop__body-backdrop___1rvky, .cart-sidebar, #popup-cart-desktop, .popup-cart-mobile, .popup-coupon, .popup-search')
                    .removeClass('active');
                $('body').removeClass('search-active');
                return false;
            })
    </script>
    <div id="popup-cart-mobile" class="popup-cart-mobile">
        <div class="header-popcart">
            <div class="top-cart-header">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="682.66669pt" viewBox="-21 -21 682.66669 682.66669"
                        width="682.66669pt">
                        <path
                            d="m322.820312 387.933594 279.949219-307.273438 36.957031 33.671875-314.339843 345.023438-171.363281-162.902344 34.453124-36.238281zm297.492188-178.867188-38.988281 42.929688c5.660156 21.734375 8.675781 44.523437 8.675781 68.003906 0 148.875-121.125 270-270 270s-270-121.125-270-270 121.125-270 270-270c68.96875 0 131.96875 26.007812 179.746094 68.710938l33.707031-37.113282c-58.761719-52.738281-133.886719-81.597656-213.453125-81.597656-85.472656 0-165.835938 33.285156-226.273438 93.726562-60.441406 60.4375-93.726562 140.800782-93.726562 226.273438s33.285156 165.835938 93.726562 226.273438c60.4375 60.441406 140.800782 93.726562 226.273438 93.726562s165.835938-33.285156 226.273438-93.726562c60.441406-60.4375 93.726562-140.800782 93.726562-226.273438 0-38.46875-6.761719-75.890625-19.6875-110.933594zm0 0" />
                    </svg>
                    Mua hàng thành công
                </span>
            </div>
            <div class="media-content bodycart-mobile">
            </div>
            <a class="noti-cart-count" href="/cart" title="Giỏ hàng"> Giỏ hàng của bạn hiện có <span
                    class="count_item_pr"></span> sản phẩm </a>
            <a title="Đóng" class="cart_btn-close iconclose">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                    x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;"
                    xml:space="preserve">
                    <g>
                        <g>
                            <path
                                d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717    L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859    c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287    l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285    L284.286,256.002z" />
                        </g>
                    </g>
                </svg>
            </a>
            <div class="bottom-action">
                <div class="cart_btn-close tocontinued">
                    Tiếp tục mua hàng
                </div>
                <a href="/checkout" class="checkout">
                    Thanh toán ngay
                </a>
            </div>
        </div>
    </div>
    <div id="quick-view-product" class="quickview-product" style="display:none;">
        <div class="quickview-overlay fancybox-overlay fancybox-overlay-fixed"></div>
        <div class="quick-view-product"></div>
        <div id="quickview-modal" style="display:none;">
            <div class="block-quickview primary_block details-product">
                <div class="row">
                    <div class="product-left-column product-images col-xs-12 col-sm-4 col-md-4 col-lg-5 col-xl-5">
                        <div class="image-block large-image col_large_default">
                            <span class="view_full_size">
                                <a class="img-product" title="" href="javascript:;">
                                    <img src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/logo.png?1753947700397"
                                        id="product-featured-image-quickview"
                                        class="img-responsive product-featured-image-quickview" alt="quickview" />
                                </a>
                            </span>
                            <div class="loading-imgquickview" style="display:none;"></div>
                        </div>
                        <div class="more-view-wrapper clearfix">
                            <div class="thumbs_quickview owl_nav_custome1 swiper-container"
                                id="thumbs_list_quickview">
                                <ul class="product-photo-thumbs quickview-more-views-owlslider not-thuongdq swiper-wrapper"
                                    id="thumblist_quickview"></ul>
                                <div class="swiper-button-prev">
                                </div>
                                <div class="swiper-button-next">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="product-center-column product-info product-item col-xs-12 col-sm-6 col-md-8 col-lg-7 col-xl-7 details-pro style_product style_border">
                        <div class="head-qv group-status">
                            <h3 class="qwp-name title-product">abc</h3>
                            <div class="vend-qv group-status">
                                <div class="left_vend">
                                    <div class="first_status ">Tình trạng:
                                        <span class="soluong status_name"></span>
                                    </div>
                                    <div class="top_sku first_status">Mã sản phẩm:
                                        <span class="sku_ status_name"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quickview-info">
                            <span class="prices price-box">
                                <span class="price product-price"></span>
                                <del class="old-price"></del>
                            </span>
                        </div>
                        <div class="product-description product-summary">
                            <div class="rte">
                            </div>
                        </div>
                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                            class="quick_option variants form-ajaxtocart form-product">
                            <span class="price-product-detail d-none" style="opacity: 0;">
                                <span class=""></span>
                            </span>
                            <select name='variantId' class="d-none" style="display:none"></select>
                            <div class="form_product_content">
                                <div class="count_btn_style quantity_wanted_p">
                                    <div class=" soluong1 clearfix">
                                        <span class="soluong_h">Số lượng:</span>
                                        <div class="sssssscustom input_number_product">
                                            <button class="btn_num num_1 button button_qty"
                                                onClick="var result = document.getElementById('quantity-detail'); var qtyqv = result.value; if( !isNaN( qtyqv ) &amp;&amp; qtyqv &gt; 1 ) result.value--;return false;">-</button>
                                            <input type="text" id="quantity-detail" name="quantity"
                                                value="1" maxlength="2" class="form-control prd_quantity"
                                                onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                onchange="if(this.value == 0)this.value=1;">
                                            <button class="btn_num num_2 button button_qty"
                                                onClick="var result = document.getElementById('quantity-detail'); var qtyqv = result.value; if( !isNaN( qtyqv )) result.value++;return false;">+</button>
                                        </div>
                                    </div>
                                    <div class="button_actions clearfix">
                                        <button type="submit"
                                            class="btn_cool btn btn_base fix_add_to_cart ajax_addtocart btn_add_cart btn-cart add_to_cart add_to_cart_detail">
                                            <span class="btn-content text_1">Thêm vào giỏ hàng</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a title="Close" class="quickview-close close-window" href="javascript:;">
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="times" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10">
                    <path fill="currentColor"
                        d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"
                        class=""></path>
                </svg>
            </a>
        </div>
    </div>
    <link rel="preload" as="script" href="/site/js/quickview.js?1753947700397" />
    <script type="text/javascript" defer src="/site/js/quickview.js?1753947700397"></script>
    <link rel="preload" as="script" href="/site/js/main.js?1753947700397" />
    <link rel="preload" as="script" href="/site/js/index.js?1753947700397" />
    <link rel="preload" as="script" href="/site/js/placeholdertypewriter.js?1753947700397" />
    <script src="/site/js/placeholdertypewriter.js?1753947700397" type="text/javascript"></script>
    <script src="/site/js/main.js?1753947700397" type="text/javascript"></script>
    <script src="/site/js/index.js?1753947700397" type="text/javascript"></script>
    <a href="javascript:;"
        class="site-header__link site-header__compare js-open-compare shadow border border-right-0 btn-show-popup-compare d-none"
        title="So sánh">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
            y="0px" viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 477.867 477.867;"
            xml:space="preserve">
            <path
                d="M409.6,0c-9.426,0-17.067,7.641-17.067,17.067v62.344C304.667-5.656,164.478-3.386,79.411,84.479c-40.09,41.409-62.455,96.818-62.344,154.454c0,9.426,7.641,17.067,17.067,17.067S51.2,248.359,51.2,238.933c0.021-103.682,84.088-187.717,187.771-187.696c52.657,0.01,102.888,22.135,138.442,60.976l-75.605,25.207c-8.954,2.979-13.799,12.652-10.82,21.606s12.652,13.799,21.606,10.82l102.4-34.133c6.99-2.328,11.697-8.88,11.674-16.247v-102.4C426.667,7.641,419.026,0,409.6,0z" />
            <path
                d="M443.733,221.867c-9.426,0-17.067,7.641-17.067,17.067c-0.021,103.682-84.088,187.717-187.771,187.696c-52.657-0.01-102.888-22.135-138.442-60.976l75.605-25.207c8.954-2.979,13.799-12.652,10.82-21.606c-2.979-8.954-12.652-13.799-21.606-10.82l-102.4,34.133c-6.99,2.328-11.697,8.88-11.674,16.247v102.4c0,9.426,7.641,17.067,17.067,17.067s17.067-7.641,17.067-17.067v-62.345c87.866,85.067,228.056,82.798,313.122-5.068c40.09-41.409,62.455-96.818,62.344-154.454C460.8,229.508,453.159,221.867,443.733,221.867z" />
        </svg>
        <span class="compareCount text-center"></span>
    </a>
    <div class="compare-sidebar">
        <div class="sidebarAllMainCompare">
            <div class="container">
                <div class="box_sidebar_compare">
                    <div class="sidebarAllHeader">
                        <div class="title">
                            <span class="closeSidebar">
                                Ẩn so sánh
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path d="M12.9996 12.9996L1 1" stroke="#292D32" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M13 1.00024L12.25 1.75022M1.00035 12.9999L7.00018 7.00007L9.50037 4.49988"
                                        stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="sidebarAllBody">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup_compare position-fixed w-100 h-100 justify-content-center align-items-center d-flex">
        <div class="position-relative max-100">
            <a href="javascript:;"
                class="close_compare position-absolute d-flex m_white_bg_module justify-content-center align-items-center"
                title="Đóng">
                <img width="24" height="24" alt="Đóng"
                    src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/closebtn.png?1753947700397"></a>
            <div class="b_video p-2 p-md-3 m_white_bg_module rounded m-auto">
                <div class="list-top-item header_compare">
                    <form action="/search" method="get" class="header-search-form input-group search-bar"
                        role="search">
                        <input type="text" name="query" required class="input-group-field form-control"
                            placeholder="Tìm sản phẩm so sánh" autocomplete="off">
                        <input type="hidden" name="type" value="product">
                        <button type="submit" class="btn icon-fallback-text" aria-label="Tìm kiếm"
                            title="Tìm kiếm">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.1404 13.4673L19.852 19.1789C20.3008 19.6276 19.6276 20.3008 19.1789 19.852L13.4673 14.1404C12.0381 15.4114 10.1552 16.1835 8.09176 16.1835C3.6225 16.1835 0 12.5613 0 8.09176C0 3.6225 3.62219 0 8.09176 0C12.561 0 16.1835 3.62219 16.1835 8.09176C16.1835 10.1551 15.4115 12.038 14.1404 13.4673ZM0.951972 8.09176C0.951972 12.0356 4.14824 15.2316 8.09176 15.2316C12.0356 15.2316 15.2316 12.0353 15.2316 8.09176C15.2316 4.14797 12.0353 0.951972 8.09176 0.951972C4.14797 0.951972 0.951972 4.14824 0.951972 8.09176Z"
                                    fill="#222222"></path>
                            </svg>
                        </button>
                        <div class="compare-suggest">
                            <div class="list-compare">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let compares = document.querySelectorAll('.itemMainCompareNone');
        let popupCompare = document.querySelector('.popup_compare');
        let close_compare = document.querySelectorAll('.close_compare');
        compares.forEach(v => v.addEventListener('click', function(e) {
            e.preventDefault();
            popupCompare.classList.add('open');
        }));
        close_compare.forEach(v => v.addEventListener('click', function(e) {
            e.preventDefault();
            popupCompare.classList.remove('open');
        }))
    </script>
    <div id="popupCartModal" class="modal fade" role="dialog">
    </div>
    <div style="visibility:hidden; position: absolute; z-index: -1; bottom: 0; left: 0;">
        <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="icon-cart">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path fill="#fff"
                        d="M253.3 35.1c6.1-11.8 1.5-26.3-10.2-32.4s-26.3-1.5-32.4 10.2L117.6 192H32c-17.7 0-32 14.3-32 32s14.3 32 32 32L83.9 463.5C91 492 116.6 512 146 512H430c29.4 0 55-20 62.1-48.5L544 256c17.7 0 32-14.3 32-32s-14.3-32-32-32H458.4L365.3 12.9C359.2 1.2 344.7-3.4 332.9 2.7s-16.3 20.6-10.2 32.4L404.3 192H171.7L253.3 35.1zM192 304v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16zm96-16c8.8 0 16 7.2 16 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16zm128 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                </svg>
            </symbol>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="icon-detail">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="#fff"
                        d="M120 256c0 30.9-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56s56 25.1 56 56zm160 0c0 30.9-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56s56 25.1 56 56zm104 56c-30.9 0-56-25.1-56-56s25.1-56 56-56s56 25.1 56 56s-25.1 56-56 56z" />
                </svg>
            </symbol>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="icon-quickview">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#fff"
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
            </symbol>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="icon-wishlist">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#ffffff"
                        d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z">
                    </path>
                </svg>
            </symbol>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="icon-wishlist-active">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#ff0000"
                        d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z">
                    </path>
                </svg>
            </symbol>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="icon-search">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="#000"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill="#000"
                        d="M14.1404 13.4673L19.852 19.1789C20.3008 19.6276 19.6276 20.3008 19.1789 19.852L13.4673 14.1404C12.0381 15.4114 10.1552 16.1835 8.09176 16.1835C3.6225 16.1835 0 12.5613 0 8.09176C0 3.6225 3.62219 0 8.09176 0C12.561 0 16.1835 3.62219 16.1835 8.09176C16.1835 10.1551 15.4115 12.038 14.1404 13.4673ZM0.951972 8.09176C0.951972 12.0356 4.14824 15.2316 8.09176 15.2316C12.0356 15.2316 15.2316 12.0353 15.2316 8.09176C15.2316 4.14797 12.0353 0.951972 8.09176 0.951972C4.14797 0.951972 0.951972 4.14824 0.951972 8.09176Z">
                    </path>
                </svg>
            </symbol>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="icon-phone">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path fill="#3257a2"
                        d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z" />
                </svg>
            </symbol>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="icon-email">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path fill="#3257a2"
                        d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                </svg>
            </symbol>
        </svg>
    </div>
    <div class="addThis_listSharing" style="display: block;">
        <div class="listSharing_action">
            <button type="button" class="addThis_close" data-dismiss="modal">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill-rule="evenodd">
                        <g transform="translate(-1341.000000, -90.000000)">
                            <g transform="translate(1341.000000, 90.000000)">
                                <polygon
                                    points="19 6.4 17.6 5 12 10.6 6.4 5 5 6.4 10.6 12 5 17.6 6.4 19 12 13.4 17.6 19 19 17.6 13.4 12">
                                </polygon>
                            </g>
                        </g>
                    </g>
                </svg>
            </button>
            <ul class="addThis_listing">
                <li class="addThis_item">
                    <a class="addThis_item--icon" href="tel:{{ str_replace(' ', '', $config->hotline) }}" rel="nofollow" aria-label="phone">
                        <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="22" cy="22" r="22" fill="url(#paint2_linear)"></circle>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.0087 9.35552C14.1581 9.40663 14.3885 9.52591 14.5208 9.61114C15.3315 10.148 17.5888 13.0324 18.3271 14.4726C18.7495 15.2949 18.8903 15.9041 18.758 16.3558C18.6214 16.8415 18.3953 17.0971 17.384 17.9109C16.9786 18.239 16.5988 18.5756 16.5391 18.6651C16.3855 18.8866 16.2617 19.3212 16.2617 19.628C16.266 20.3395 16.7269 21.6305 17.3328 22.6232C17.8021 23.3944 18.6428 24.3828 19.4749 25.1413C20.452 26.0361 21.314 26.6453 22.2869 27.1268C23.5372 27.7488 24.301 27.9064 24.86 27.6466C25.0008 27.5826 25.1501 27.4974 25.1971 27.4591C25.2397 27.4208 25.5683 27.0202 25.9268 26.5772C26.618 25.7079 26.7759 25.5674 27.2496 25.4055C27.8513 25.201 28.4657 25.2563 29.0844 25.5716C29.5538 25.8145 30.5779 26.4493 31.2393 26.9095C32.1098 27.5187 33.9703 29.0355 34.2221 29.3381C34.6658 29.8834 34.7427 30.5821 34.4439 31.3534C34.1281 32.1671 32.8992 33.6925 32.0415 34.3444C31.2649 34.9323 30.7145 35.1581 29.9891 35.1922C29.3917 35.222 29.1442 35.1709 28.3804 34.8556C22.3893 32.3887 17.6059 28.7075 13.8081 23.65C11.8239 21.0084 10.3134 18.2688 9.28067 15.427C8.67905 13.7696 8.64921 13.0495 9.14413 12.2017C9.35753 11.8438 10.2664 10.9575 10.9278 10.4633C12.0288 9.64524 12.5365 9.34273 12.9419 9.25754C13.2193 9.19787 13.7014 9.24473 14.0087 9.35552Z"
                                fill="white"></path>
                            <defs>
                                <linearGradient id="paint2_linear" x1="22" y1="-7.26346e-09" x2="22.1219"
                                    y2="40.5458" gradientUnits="userSpaceOnUse">
                                    <stop offset="50%" stop-color="#e8434c"></stop>
                                    <stop offset="100%" stop-color="#d61114"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                        <span class="tooltip-text">Gọi ngay cho chúng tôi</span>
                    </a>
                </li>
                <li class="addThis_item">
                    <a class="addThis_item--icon" href="https://zalo.me/{{ str_replace(' ', '', $config->zalo) }}" target="_blank"
                        rel="nofollow noreferrer" aria-label="zalo">
                        <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="22" cy="22" r="22" fill="url(#paint4_linear)"></circle>
                            <g clip-path="url(#clip0)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.274 34.0907C15.7773 34.0856 16.2805 34.0804 16.783 34.0804C16.7806 34.0636 16.7769 34.0479 16.7722 34.0333C16.777 34.0477 16.7808 34.0632 16.7832 34.0798C16.8978 34.0798 17.0124 34.0854 17.127 34.0965H25.4058C26.0934 34.0965 26.7809 34.0977 27.4684 34.0989C28.8434 34.1014 30.2185 34.1039 31.5935 34.0965H31.6222C33.5357 34.0798 35.0712 32.5722 35.0597 30.7209V27.4784C35.0597 27.4582 35.0612 27.4333 35.0628 27.4071C35.0676 27.3257 35.0731 27.2325 35.0368 27.2345C34.9337 27.2401 34.7711 27.2757 34.7138 27.3311C34.2744 27.6145 33.8483 27.924 33.4222 28.2335C32.57 28.8525 31.7179 29.4715 30.7592 29.8817C27.0284 31.0993 23.7287 31.157 20.2265 30.3385C20.0349 30.271 19.9436 30.2786 19.7816 30.292C19.6773 30.3007 19.5436 30.3118 19.3347 30.3068C19.3093 30.3077 19.2829 30.3085 19.2554 30.3093C18.9099 30.3197 18.4083 30.3348 17.8088 30.6877C16.4051 31.1034 14.5013 31.157 13.5175 31.0147C13.522 31.0245 13.5247 31.0329 13.5269 31.0407C13.5236 31.0341 13.5204 31.0275 13.5173 31.0208C13.5036 31.0059 13.4864 30.9927 13.4696 30.98C13.4163 30.9393 13.3684 30.9028 13.46 30.8268C13.4867 30.8102 13.5135 30.7929 13.5402 30.7757C13.5937 30.7412 13.6472 30.7067 13.7006 30.6771C14.4512 30.206 15.1559 29.6905 15.6199 28.9311C16.2508 28.1911 15.9584 27.9025 15.4009 27.3524L15.3799 27.3317C12.6639 24.6504 11.8647 21.8054 12.148 17.9785C12.486 15.8778 13.4829 14.0708 14.921 12.4967C15.7918 11.5433 16.8288 10.7729 17.9632 10.1299C17.9796 10.1198 17.9987 10.1116 18.0182 10.1032C18.0736 10.0793 18.1324 10.0541 18.1408 9.98023C18.1475 9.92191 18.0507 9.90264 18.0163 9.90264C17.3698 9.90264 16.7316 9.89705 16.0964 9.89148C14.8346 9.88043 13.5845 9.86947 12.3041 9.90265C10.465 9.95254 8.78889 11.1779 8.81925 13.3614C8.82689 17.2194 8.82435 21.0749 8.8218 24.9296C8.82053 26.8567 8.81925 28.7835 8.81925 30.7104C8.81925 32.5007 10.2344 34.0028 12.085 34.0749C13.1465 34.1125 14.2107 34.1016 15.274 34.0907ZM13.5888 31.1403C13.5935 31.1467 13.5983 31.153 13.6032 31.1594C13.7036 31.2455 13.8031 31.3325 13.9021 31.4202C13.8063 31.3312 13.7072 31.2423 13.6035 31.1533C13.5982 31.1487 13.5933 31.1444 13.5888 31.1403ZM16.5336 33.8108C16.4979 33.7885 16.4634 33.7649 16.4337 33.7362C16.4311 33.7358 16.4283 33.7352 16.4254 33.7345C16.4281 33.7371 16.4308 33.7397 16.4335 33.7423C16.4632 33.7683 16.4978 33.79 16.5336 33.8108Z"
                                    fill="white"></path>
                                <path
                                    d="M17.6768 21.6754C18.5419 21.6754 19.3555 21.6698 20.1633 21.6754C20.6159 21.6809 20.8623 21.8638 20.9081 22.213C20.9597 22.6509 20.6961 22.9447 20.2034 22.9502C19.2753 22.9613 18.3528 22.9558 17.4247 22.9558C17.1554 22.9558 16.8919 22.9669 16.6226 22.9502C16.2903 22.9336 15.9637 22.8671 15.8033 22.5345C15.6429 22.2019 15.7575 21.9026 15.9752 21.631C16.8575 20.5447 17.7455 19.4527 18.6336 18.3663C18.6851 18.2998 18.7367 18.2333 18.7883 18.1723C18.731 18.0781 18.6508 18.1224 18.582 18.1169C17.9633 18.1114 17.3388 18.1169 16.72 18.1114C16.5768 18.1114 16.4335 18.0947 16.296 18.067C15.9695 17.995 15.7689 17.679 15.8434 17.3686C15.895 17.158 16.0669 16.9862 16.2846 16.9363C16.4221 16.903 16.5653 16.8864 16.7085 16.8864C17.7284 16.8809 18.7539 16.8809 19.7737 16.8864C19.9571 16.8809 20.1347 16.903 20.3123 16.9474C20.7019 17.0749 20.868 17.4241 20.7133 17.7899C20.5758 18.1058 20.3581 18.3774 20.1404 18.649C19.3899 19.5747 18.6393 20.4948 17.8888 21.4093C17.8258 21.4814 17.7685 21.5534 17.6768 21.6754Z"
                                    fill="white"></path>
                                <path
                                    d="M24.3229 18.7604C24.4604 18.5886 24.6036 18.4279 24.8385 18.3835C25.2911 18.2948 25.7151 18.5775 25.7208 19.021C25.738 20.1295 25.7323 21.2381 25.7208 22.3467C25.7208 22.6349 25.526 22.8899 25.2453 22.973C24.9588 23.0783 24.6322 22.9952 24.4432 22.7568C24.3458 22.6404 24.3057 22.6183 24.1682 22.7236C23.6468 23.1338 23.0567 23.2058 22.4207 23.0063C21.4009 22.6848 20.9827 21.9143 20.8681 20.9776C20.7478 19.9632 21.0973 19.0986 22.0369 18.5664C22.816 18.1175 23.6067 18.1563 24.3229 18.7604ZM22.2947 20.7836C22.3061 21.0275 22.3863 21.2603 22.5353 21.4543C22.8447 21.8534 23.4348 21.9365 23.8531 21.6372C23.9218 21.5873 23.9848 21.5263 24.0421 21.4543C24.363 21.033 24.363 20.3402 24.0421 19.9189C23.8817 19.7027 23.6296 19.5752 23.3603 19.5697C22.7301 19.5309 22.289 20.002 22.2947 20.7836ZM28.2933 20.8168C28.2474 19.3923 29.2157 18.3281 30.5907 18.2893C32.0517 18.245 33.1174 19.1928 33.1632 20.5785C33.209 21.9808 32.321 22.973 30.9517 23.106C29.4563 23.2502 28.2704 22.2026 28.2933 20.8168ZM29.7313 20.6838C29.7199 20.961 29.8058 21.2326 29.9777 21.4598C30.2928 21.8589 30.8829 21.9365 31.2955 21.6261C31.3585 21.5818 31.41 21.5263 31.4616 21.4709C31.7939 21.0496 31.7939 20.3402 31.4673 19.9189C31.3069 19.7083 31.0548 19.5752 30.7855 19.5697C30.1668 19.5364 29.7313 19.991 29.7313 20.6838ZM27.7891 19.7138C27.7891 20.573 27.7948 21.4321 27.7891 22.2912C27.7948 22.6848 27.474 23.0118 27.0672 23.0229C26.9985 23.0229 26.924 23.0174 26.8552 23.0007C26.5688 22.9287 26.351 22.6349 26.351 22.2857V17.8791C26.351 17.6186 26.3453 17.3636 26.351 17.1031C26.3568 16.6763 26.6375 16.3992 27.0615 16.3992C27.4969 16.3936 27.7891 16.6708 27.7891 17.1142C27.7948 17.9789 27.7891 18.8491 27.7891 19.7138Z"
                                    fill="white"></path>
                                <path
                                    d="M22.2947 20.7828C22.289 20.0013 22.7302 19.5302 23.3547 19.5634C23.6239 19.5745 23.876 19.702 24.0364 19.9181C24.3573 20.3339 24.3573 21.0322 24.0364 21.4535C23.7271 21.8526 23.1369 21.9357 22.7187 21.6364C22.65 21.5865 22.5869 21.5255 22.5296 21.4535C22.3864 21.2595 22.3062 21.0267 22.2947 20.7828ZM29.7314 20.683C29.7314 19.9957 30.1668 19.5357 30.7856 19.569C31.0549 19.5745 31.307 19.7075 31.4674 19.9181C31.794 20.3394 31.794 21.0544 31.4617 21.4701C31.1408 21.8636 30.545 21.9302 30.1382 21.6198C30.0752 21.5754 30.0236 21.52 29.9778 21.459C29.8059 21.2318 29.7257 20.9602 29.7314 20.683Z"
                                    fill="#0068FF"></path>
                            </g>
                            <defs>
                                <linearGradient id="paint4_linear" x1="22" y1="0" x2="22"
                                    y2="44" gradientUnits="userSpaceOnUse">
                                    <stop offset="50%" stop-color="#3985f7"></stop>
                                    <stop offset="100%" stop-color="#1272e8"></stop>
                                </linearGradient>
                                <clipPath id="clip0">
                                    <rect width="26.3641" height="24.2" fill="white"
                                        transform="translate(8.78906 9.90234)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="tooltip-text">Chat với chúng tôi qua Zalo</span>
                    </a>
                </li>
                <li class="addThis_item">
                    <a class="addThis_item--icon" href="{{route('front.contact-us')}}" aria-label="Liên hệ">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="22" cy="22" r="22" fill="url(#paint5_linear)"></circle>
                            <path class="down"
                                d="M22 10C17.0374 10 13 13.7367 13 18.3297C13 24.0297 21.0541 32.3978 21.397 32.7512C21.7191 33.0832 22.2815 33.0826 22.603 32.7512C22.9459 32.3978 31 24.0297 31 18.3297C30.9999 13.7367 26.9626 10 22 10ZM22 22.5206C19.5032 22.5206 17.4719 20.6406 17.4719 18.3297C17.4719 16.0188 19.5032 14.1388 22 14.1388C24.4968 14.1388 26.528 16.0189 26.528 18.3297C26.528 20.6406 24.4968 22.5206 22 22.5206Z"
                                fill="white"></path>
                            <defs>
                                <linearGradient id="paint5_linear" x1="22" y1="0" x2="22"
                                    y2="44" gradientUnits="userSpaceOnUse">
                                    <stop offset="50%" stop-color="#fecf72"></stop>
                                    <stop offset="100%" stop-color="#ef9f00"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                        <span class="tooltip-text">Thông tin cửa hàng</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="listSharing_overlay"></div>
    </div>
    <div class="addThis_iconContact">
        <div class="box-item item-contact">
            <div class="svgico">
                <svg width="34" height="35" viewBox="0 0 34 35" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.35522 31V25.416H5.41122V30.064H7.61122V31H4.35522ZM8.97509 26.216C8.76176 26.216 8.60709 26.168 8.51109 26.072C8.42043 25.976 8.37509 25.8533 8.37509 25.704V25.544C8.37509 25.3947 8.42043 25.272 8.51109 25.176C8.60709 25.08 8.76176 25.032 8.97509 25.032C9.18309 25.032 9.33509 25.08 9.43109 25.176C9.52709 25.272 9.57509 25.3947 9.57509 25.544V25.704C9.57509 25.8533 9.52709 25.976 9.43109 26.072C9.33509 26.168 9.18309 26.216 8.97509 26.216ZM8.46309 26.824H9.48709V31H8.46309V26.824ZM12.834 24.712L13.842 25.944L13.33 26.344L12.37 25.424L11.41 26.344L10.898 25.944L11.906 24.712H12.834ZM12.362 31.096C12.0527 31.096 11.7754 31.0453 11.53 30.944C11.29 30.8373 11.0847 30.6907 10.914 30.504C10.7487 30.312 10.6207 30.0827 10.53 29.816C10.4394 29.544 10.394 29.24 10.394 28.904C10.394 28.5733 10.4367 28.2747 10.522 28.008C10.6127 27.7413 10.7407 27.5147 10.906 27.328C11.0714 27.136 11.274 26.9893 11.514 26.888C11.754 26.7813 12.026 26.728 12.33 26.728C12.6554 26.728 12.938 26.784 13.178 26.896C13.418 27.008 13.6154 27.16 13.77 27.352C13.9247 27.544 14.0394 27.768 14.114 28.024C14.194 28.2747 14.234 28.544 14.234 28.832V29.168H11.458V29.272C11.458 29.576 11.5434 29.8213 11.714 30.008C11.8847 30.1893 12.138 30.28 12.474 30.28C12.73 30.28 12.938 30.2267 13.098 30.12C13.2634 30.0133 13.41 29.8773 13.538 29.712L14.09 30.328C13.9194 30.568 13.6847 30.7573 13.386 30.896C13.0927 31.0293 12.7514 31.096 12.362 31.096ZM12.346 27.496C12.074 27.496 11.858 27.5867 11.698 27.768C11.538 27.9493 11.458 28.184 11.458 28.472V28.536H13.17V28.464C13.17 28.176 13.098 27.944 12.954 27.768C12.8154 27.5867 12.6127 27.496 12.346 27.496ZM15.135 31V26.824H16.159V27.52H16.199C16.2843 27.296 16.4176 27.1093 16.599 26.96C16.7856 26.8053 17.0416 26.728 17.367 26.728C17.799 26.728 18.1296 26.8693 18.359 27.152C18.5883 27.4347 18.703 27.8373 18.703 28.36V31H17.679V28.464C17.679 28.1653 17.6256 27.9413 17.519 27.792C17.4123 27.6427 17.2363 27.568 16.991 27.568C16.8843 27.568 16.7803 27.584 16.679 27.616C16.583 27.6427 16.495 27.6853 16.415 27.744C16.3403 27.7973 16.279 27.8667 16.231 27.952C16.183 28.032 16.159 28.128 16.159 28.24V31H15.135ZM21.7287 25.08H22.7527V27.52H22.7927C22.8781 27.296 23.0114 27.1093 23.1927 26.96C23.3794 26.8053 23.6354 26.728 23.9607 26.728C24.3927 26.728 24.7234 26.8693 24.9527 27.152C25.1821 27.4347 25.2967 27.8373 25.2967 28.36V31H24.2727V28.464C24.2727 28.1653 24.2194 27.9413 24.1127 27.792C24.0061 27.6427 23.8301 27.568 23.5847 27.568C23.4781 27.568 23.3741 27.584 23.2727 27.616C23.1767 27.6427 23.0887 27.6853 23.0087 27.744C22.9341 27.7973 22.8727 27.8667 22.8247 27.952C22.7767 28.032 22.7527 28.128 22.7527 28.24V31H21.7287V25.08ZM28.5918 24.712L29.5998 25.944L29.0878 26.344L28.1278 25.424L27.1678 26.344L26.6558 25.944L27.6638 24.712H28.5918ZM28.1198 31.096C27.8105 31.096 27.5332 31.0453 27.2878 30.944C27.0478 30.8373 26.8425 30.6907 26.6718 30.504C26.5065 30.312 26.3785 30.0827 26.2878 29.816C26.1972 29.544 26.1518 29.24 26.1518 28.904C26.1518 28.5733 26.1945 28.2747 26.2798 28.008C26.3705 27.7413 26.4985 27.5147 26.6638 27.328C26.8292 27.136 27.0318 26.9893 27.2718 26.888C27.5118 26.7813 27.7838 26.728 28.0878 26.728C28.4132 26.728 28.6958 26.784 28.9358 26.896C29.1758 27.008 29.3732 27.16 29.5278 27.352C29.6825 27.544 29.7972 27.768 29.8718 28.024C29.9518 28.2747 29.9918 28.544 29.9918 28.832V29.168H27.2158V29.272C27.2158 29.576 27.3012 29.8213 27.4718 30.008C27.6425 30.1893 27.8958 30.28 28.2318 30.28C28.4878 30.28 28.6958 30.2267 28.8558 30.12C29.0212 30.0133 29.1678 29.8773 29.2958 29.712L29.8478 30.328C29.6772 30.568 29.4425 30.7573 29.1438 30.896C28.8505 31.0293 28.5092 31.096 28.1198 31.096ZM28.1038 27.496C27.8318 27.496 27.6158 27.5867 27.4558 27.768C27.2958 27.9493 27.2158 28.184 27.2158 28.472V28.536H28.9278V28.464C28.9278 28.176 28.8558 27.944 28.7118 27.768C28.5732 27.5867 28.3705 27.496 28.1038 27.496ZM28.1038 32.552C27.8958 32.552 27.7465 32.5067 27.6558 32.416C27.5705 32.3307 27.5278 32.2213 27.5278 32.088V31.912C27.5278 31.7787 27.5705 31.6667 27.6558 31.576C27.7465 31.4907 27.8958 31.448 28.1038 31.448C28.3118 31.448 28.4585 31.4907 28.5438 31.576C28.6345 31.6667 28.6798 31.7787 28.6798 31.912V32.088C28.6798 32.2213 28.6345 32.3307 28.5438 32.416C28.4585 32.5067 28.3118 32.552 28.1038 32.552Z">
                    </path>
                    <path
                        d="M27.2212 0H10.7532C9.76511 0 8.97461 0.834345 8.97461 1.82643V12.334C8.97461 13.3487 9.78701 14.1604 10.7532 14.1604H22.1051L24.6741 16.8211C24.7839 16.9338 24.9157 17.0015 25.0693 17.0015C25.3768 17.0015 25.6402 16.7535 25.6402 16.4153V14.1604H27.2212C28.2092 14.1604 28.9997 13.3261 28.9997 12.334V1.82643C28.9997 0.811779 28.1873 0 27.2212 0ZM13.2783 9.04195C12.378 9.04195 11.6315 8.2753 11.6315 7.35077C11.6315 6.42631 12.378 5.65966 13.2783 5.65966C14.1785 5.65966 14.925 6.42631 14.925 7.35077C14.925 8.2753 14.2005 9.04195 13.2783 9.04195ZM19.0531 9.04195C18.1528 9.04195 17.4062 8.2753 17.4062 7.35077C17.4062 6.42631 18.1528 5.65966 19.0531 5.65966C19.9533 5.65966 20.6998 6.42631 20.6998 7.35077C20.6998 8.2753 19.9533 9.04195 19.0531 9.04195ZM24.8059 9.04195C23.9056 9.04195 23.1591 8.2753 23.1591 7.35077C23.1591 6.42631 23.9056 5.65966 24.8059 5.65966C25.7061 5.65966 26.4526 6.42631 26.4526 7.35077C26.4526 8.2753 25.7061 9.04195 24.8059 9.04195Z">
                    </path>
                    <path
                        d="M7.9649 12.3782V8.79297H6.16437C5.52762 8.79297 5.00066 9.33418 5.00066 9.98807V16.8878C4.97869 17.5868 5.50564 18.128 6.16437 18.128H7.19637V19.6162C7.19637 19.8192 7.37202 19.9995 7.56964 19.9995C7.67944 19.9995 7.76727 19.9544 7.83312 19.8868L9.52385 18.1505H16.9894C17.6261 18.1505 18.1531 17.6094 18.1531 16.9555V15.2418H10.7535C9.2165 15.2418 7.9649 13.9566 7.9649 12.3782Z">
                    </path>
                </svg>
                <span class="svgico--close">
                    <svg viewBox="0 0 19 19" role="presentation">
                        <path
                            d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                            fill-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
        </div>
    </div>
    <script>
        $('.addThis_iconContact .item-contact,.addThis_listSharing .addThis_close').on('click', function(e) {
            if ($('.addThis_listSharing').hasClass('active')) {
                $('.addThis_listSharing').removeClass('active');
                $('.addThis_listSharing').fadeOut(150);
            } else {
                $('.addThis_listSharing').fadeIn(100);
                $('.addThis_listSharing').addClass('active');
            }
        });
        $('.listSharing_overlay').on('click', function(e) {
            $('.addThis_listSharing').removeClass('active');
            $('.addThis_listSharing').fadeOut(150);
        })
    </script>
    <a target="_blank" class="livechat-mes" href="https://m.me/sapo.vn">
        <img width="60" height="60"
            src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/messenger.svg?1753947700397" alt="Messenger">
    </a>
</body>

</html>
