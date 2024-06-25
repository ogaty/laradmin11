import React from 'react';

interface Menu {
    title: string,
    icon: string,
    link: string
}
interface P {
    menu: Menu
}

const SidebarSingle = (props: P) => {
    return <li className="menu-item">
        <a href={ props.menu['link'] }>
            <span className="menu-icon">
                <i className={ props.menu['icon'] }></i>
            </span>
            <span className="menu-title">{ props.menu['title'] }</span>
            <span className="menu-suffix">
            </span>
        </a>
    </li>

}

export default SidebarSingle
