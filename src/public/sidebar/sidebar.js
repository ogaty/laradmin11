const ANIMATION_DURATION = 300;

const SIDEBAR_EL = document.getElementById("sidebar");

const FIRST_SUB_MENUS_BTN = document.querySelectorAll(
    ".menu > ul > .menu-item.sub-menu > a"
);

const INNER_SUB_MENUS_BTN = document.querySelectorAll(
    ".menu > ul > .menu-item.sub-menu .menu-item.sub-menu > a"
);

const slideUp = (target, duration = ANIMATION_DURATION) => {
    const { parentElement } = target;
    parentElement.classList.remove("open");
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = `${duration}ms`;
    target.style.boxSizing = "border-box";
    target.style.height = `${target.offsetHeight}px`;
    target.offsetHeight;
    target.style.overflow = "hidden";
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    window.setTimeout(() => {
        target.style.display = "none";
        target.style.removeProperty("height");
        target.style.removeProperty("padding-top");
        target.style.removeProperty("padding-bottom");
        target.style.removeProperty("margin-top");
        target.style.removeProperty("margin-bottom");
        target.style.removeProperty("overflow");
        target.style.removeProperty("transition-duration");
        target.style.removeProperty("transition-property");
    }, duration);
};
const slideDown = (target, duration = ANIMATION_DURATION) => {
    const { parentElement } = target;
    parentElement.classList.add("open");
    target.style.removeProperty("display");
    let { display } = window.getComputedStyle(target);
    if (display === "none") display = "block";
    target.style.display = display;
    const height = target.offsetHeight;
    target.style.overflow = "hidden";
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.offsetHeight;
    target.style.boxSizing = "border-box";
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = `${duration}ms`;
    target.style.height = `${height}px`;
    target.style.removeProperty("padding-top");
    target.style.removeProperty("padding-bottom");
    target.style.removeProperty("margin-top");
    target.style.removeProperty("margin-bottom");
    window.setTimeout(() => {
        target.style.removeProperty("height");
        target.style.removeProperty("overflow");
        target.style.removeProperty("transition-duration");
        target.style.removeProperty("transition-property");
    }, duration);
};

const slideToggle = (target, duration = ANIMATION_DURATION) => {
    if (window.getComputedStyle(target).display === "none")
        return slideDown(target, duration);
    return slideUp(target, duration);
};

/**
 * toggle sidebar on overlay click
 */
document.getElementById("overlay").addEventListener("click", () => {
    SIDEBAR_EL.classList.toggle("toggled");
});

const defaultOpenMenus = document.querySelectorAll(".menu-item.sub-menu.open");

defaultOpenMenus.forEach((element) => {
    element.lastElementChild.style.display = "block";
});

/**
 * handle top level submenu click
 */
FIRST_SUB_MENUS_BTN.forEach((element) => {
    element.addEventListener("click", () => {
        if (SIDEBAR_EL.classList.contains("collapsed")) {

        }
        else {
            const parentMenu = element.closest(".menu.open-current-submenu");
            if (parentMenu)
                parentMenu
                    .querySelectorAll(":scope > ul > .menu-item.sub-menu > a")
                    .forEach(
                        (el) =>
                            window.getComputedStyle(el.nextElementSibling).display !==
                            "none" && slideUp(el.nextElementSibling)
                    );
            slideToggle(element.nextElementSibling);
        }
    });
});

/**
 * handle inner submenu click
 */
INNER_SUB_MENUS_BTN.forEach((element) => {
    element.addEventListener("click", () => {
        slideToggle(element.nextElementSibling);
    });
});
