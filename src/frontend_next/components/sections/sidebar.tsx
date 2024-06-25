import React from 'react';
import SidebarSingle from './sidebarSingle'

const Sidebar : React.FC = () => {
    const newsMenu = {
        link: "/news/",
        title: "News",
        icon: "ri-vip-diamond-fill"
    }
    const downloadMenu = {
        link: "/download/",
        title: "Download",
        icon: "ri-download-line"
    }
    const uploadMenu = {
        link: "/upload/",
        title: "Upload",
        icon: "ri-upload-line"
    }
    const newsMenu2 = {
        title: "News(vaildation)",
        icon: "ri-file-close-line",
        sub: [
            {
                link: "/news1",
                title: "News(validation1)"
            },
            {
                link: "/news2",
                title: "News(validation2)"
            },
            {
                link: "/news3",
                title: "News(validation3)"
            },
            {
                link: "/news-media",
                title: "News(MediaLibrary)"
            },
            {
                link: "/news-category",
                title: "NewsCategory"
            },
        ]
    }
    const newsMenu3 = {
        title: "News(Editor)",
        icon: "ri-file-close-line",
        sub: [
            {
                link: "/news4",
                title: "News(Quill)"
            },
            {
                link: "/news5",
                title: "News(CKEditor)"
            },
            {
                link: "/news6",
                title: "News(TinyMCE)"
            },
        ]
    }
    const sliderMenu = {
        title: "Slider",
        icon: "ri-carousel-view",
        sub: [
            {
                link: "/slider/glide",
                title: "glide"
            },
            {
                link: "/slider/splide",
                title: "splide"
            },
            {
                link: "/slider/swiper",
                title: "swiper"
            },
        ]
    }
    const paginationMenu = {
        title: "Paginate",
        icon: "ri-arrow-right-double-line",
        sub: [
            {
                link: "/paginate/type1",
                title: "type1"
            },
            {
                link: "/paginate/type2",
                title: "type2"
            },
        ]
    }
    const documentMenu = {
        link: "/document/",
        title: "Documentation",
        icon: "ri-book-2-fill"
    }
    const userMenu = {
        link: "/user/",
        title: "User",
        icon: "ri-user-line"
    }
    const userTokenMenu = {
        link: "/usertoken/",
        title: "UserToken",
        icon: "ri-user-line"
    }

    // @ts-ignore
    return (
        <aside id="sidebar" className="sidebar break-point-sm">
            <div className="sidebar-layout">
                <div className="sidebar-header">
                    <div className="pro-sidebar-logo">
                        <div>L</div>
                        <h5>Laradmin Nuxt</h5>
                    </div>
                </div>
                <div className="sidebar-content">
                    <nav className="menu open-current-submenu">
                        <ul>
                            <li className="menu-header"><span> GENERAL </span></li>

                            <SidebarSingle menu={newsMenu} />
                            <SidebarSingle menu={downloadMenu} />
                            <SidebarSingle menu={uploadMenu} />
                            <li className="menu-header" style={{"paddingTop": "20px"}}><span> EXTRA </span></li>
                        <li className="menu-item">
                            <a href="/logout">
                            <span className="menu-icon">
                                <i className="ri-logout-box-line"></i>
                            </span>
                                <span className="menu-title">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div className="sidebar-footer">
                <div className="footer-box">
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
    )
}

export default Sidebar
