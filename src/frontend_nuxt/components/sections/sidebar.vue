<script setup lang="ts">
</script>

<template>
    <aside id="sidebar" class="sidebar break-point-sm">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <div class="pro-sidebar-logo">
                    <div>L</div>
                    <h5>Laradmin Nuxt</h5>
                </div>
            </div>
            <div class="sidebar-content">
                <nav class="menu open-current-submenu">
                    <ul>
                        <li class="menu-header"><span> GENERAL </span></li>

                        <SidebarSingle menu={newsMenu} />
                        <SidebarSingle menu={downloadMenu} />
                        <SidebarSingle menu={uploadMenu} />
                        <li class="menu-header" style="padding-top: 20px"><span> EXTRA </span></li>
                        <li class="menu-item">
                            <a href="/logout">
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
</template>

<style scoped>

</style>
