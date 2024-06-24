<aside id="sidebar" class="sidebar break-point-sm">
    <div class="sidebar-layout">
        <div class="sidebar-header">
            <div class="pro-sidebar-logo">
                <div>L</div>
                <h5>Laradmin</h5>
            </div>
        </div>
        <div class="sidebar-content">
            <nav class="menu open-current-submenu">
                <ul>
                    <li class="menu-header"><span> GENERAL </span></li>
                    @php
                        $newsMenu = [
                            'link' => route('news.index'),
                            'title' => 'News',
                            'icon' => "ri-vip-diamond-fill"
                        ];
                        $downloadMenu = [
                            'link' => route('download.index'),
                            'title' => 'Download',
                            'icon' => "ri-download-line"
                        ];
                        $uploadMenu = [
                            'link' => route('upload.index'),
                            'title' => 'Upload',
                            'icon' => "ri-upload-line"
                        ];
                    @endphp
                    @php
                        $newsMenu2 = [
                            'title' => 'News(vaildation)',
                            'icon' => "ri-file-close-line",
                            'sub' => [
                                [
                                    'link' => route('news1.index'),
                                    'title' => 'News(validation1)',
                                ],
                                [
                                    'link' => route('news2.index'),
                                    'title' => 'News(validation2)',
                                ],
                                [
                                    'link' => route('news3.index'),
                                    'title' => 'News(validation3)',
                                ],
                                [
                                    'link' => route('news-media.index'),
                                    'title' => 'News(MediaLibrary)',
                                ],
                                [
                                    'link' => route('news.index'),
                                    'title' => 'Category',
                                ],
                            ]
                        ];
                        $newsMenu3 = [
                            'title' => 'News(Editor)',
                            'icon' => "ri-file-line",
                            'sub' => [
                                [
                                    'link' => route('news4.index'),
                                    'title' => 'News(Quill)',
                                ],
                                [
                                    'link' => route('news5.index'),
                                    'title' => 'News(CKEditor)',
                                ],
                                [
                                    'link' => route('news6.index'),
                                    'title' => 'News(TinyMCE)',
                                ],
                            ]
                        ];
                        $sliderMenu = [
                            'title' => 'Slider',
                            'icon' => "ri-carousel-view",
                            'sub' => [
                                [
                                    'link' => route('slider.glide'),
                                    'title' => 'glide',
                                ],
                                [
                                    'link' => route('slider.splide'),
                                    'title' => 'splide',
                                ],
                                [
                                    'link' => route('slider.swiper'),
                                    'title' => 'swiper',
                                ],
                            ]
                        ];
                        $paginationMenu = [
                            'title' => 'Paginate',
                            'icon' => "ri-arrow-right-double-line",
                            'sub' => [
                                [
                                    'link' => route('paginate.type1'),
                                    'title' => 'type1',
                                ],
                                [
                                    'link' => route('paginate.type2'),
                                    'title' => 'type2',
                                ],
                            ]
                        ];
                    @endphp
                    @include('/admin/_sidebar_single', ['menu' => $newsMenu])
                    @include('/admin/_sidebar_single', ['menu' => $downloadMenu])
                    @include('/admin/_sidebar_single', ['menu' => $uploadMenu])
                    @include('/admin/_sidebar_multi', ['menu' => $newsMenu2])
                    @include('/admin/_sidebar_multi', ['menu' => $newsMenu3])
                    @include('/admin/_sidebar_multi', ['menu' => $sliderMenu])
                    @include('/admin/_sidebar_multi', ['menu' => $paginationMenu])

                    <li class="menu-header" style="padding-top: 20px"><span> EXTRA </span></li>
                    @php
                        $documentMenu = [
                            'link' => route('document.index'),
                            'title' => 'Documentation',
                            'icon' => "ri-book-2-fill"
                        ];
                        $userMenu = [
                            'link' => route('user.index'),
                            'title' => 'User',
                            'icon' => "ri-user-line"
                        ];
                        $userTokenMenu = [
                            'link' => route('usertoken.index'),
                            'title' => 'TokenUser',
                            'icon' => "ri-user-line"
                        ];
                    @endphp
                    @include('/admin/_sidebar_single', ['menu' => $documentMenu])
                    @include('/admin/_sidebar_single', ['menu' => $userMenu])
                    @include('/admin/_sidebar_single', ['menu' => $userTokenMenu])
                    <li class="menu-item">
                        <a href="{{ route('auth.logout') }}">
                            <span class="menu-icon">
                                <i class="ri-logout-box-line"></i>
                            </span>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="sidebar-footer">
            <div class="footer-box">
                <div>
                    Original
                </div>
                <div>
                    <a href="https://github.com/azouaoui-med/pro-sidebar-template">Pro Sidebar Template</a>
                </div>
                <div>
                    Icons
                </div>
                <div>
                    <a href="https://remixicon.com/" target="_blank">Remix Icon</a>
                </div>
            </div>
        </div>
    </div>
</aside>
