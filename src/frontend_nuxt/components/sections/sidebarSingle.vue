<script setup lang="ts">

</script>

<template>
    <li class="menu-item">
        <a v-bind:href="props.menu['link']">
            <span class="menu-icon">
                <i class="props.menu['icon']"></i>
            </span>
            <span class="menu-title">{{ props.menu['title'] }}</span>
            <span class="menu-suffix"></span>
        </a>
    </li>
</template>

<style scoped>

</style>
