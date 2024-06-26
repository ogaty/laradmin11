<script setup lang="ts">

import type {Menu} from "~/types/model/Menu";

interface P {
    menu: Menu
}

const props = defineProps<P>()

</script>

<template>
    <li class="menu-item">
        <a v-bind:href="props.menu['link']">
            <span class="menu-icon">
                <i v-bind:class="props.menu['icon']"></i>
            </span>
            <span class="menu-title">{{ props.menu['title'] }}</span>
            <span class="menu-suffix"></span>
        </a>
    </li>
</template>

<style scoped>

</style>
