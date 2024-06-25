import {useRecoilValue} from "recoil";
import {userState} from "@/atoms/userState";
import Sidebar from "@/components/sections/sidebar";
import Script from "next/script";

export default function Main() {
    const user = useRecoilValue(userState)

    const currentYear = (new Date()).getFullYear()

    return <div className="layout has-sidebar fixed-sidebar fixed-header">
        <link
            href="/remixicon/remixicon.css"
            rel="stylesheet"
        />
        <link
            href="https://local.ogatism.com/sidebar/sidebar.css"
            rel="stylesheet"
        />
        <Sidebar/>
        <div id="overlay" className="overlay"></div>
        <div className="layout">
            <main className="content">
                <div>
                    <a id="btn-toggle" href="#" className="sidebar-toggler break-point-sm">
                        <i className="ri-menu-line ri-xl"></i>
                    </a>
                </div>

                welcome, {user?.name}

                <footer className="footer">
                    <small style={{"marginBottom": "20px", "display": "inline-block"}}>
                        {`© 2023-` + currentYear}
                    </small>
                    <br/>
                    <div className="social-links">
                        <a href="https://github.com/ogaty/laradmin11" target="_blank">
                            <i className="ri-github-fill ri-xl"></i>
                        </a>
                    </div>
                </footer>
            </main>
        </div>
        <Script src="http://local.ogatism.com/sidebar/sidebar.js"></Script>
    </div>


}
