<script setup lang="ts">
    import Api from "~/libs/apiClass";
    import {MeRequest} from "~/types/api/Auth/MeRequest";
    import type {MeResponseBody} from "~/types/api/Auth/MeResponse";
    import type {User} from "~/types/model/User";
    import {useUserStore} from "~/composable/useUserStore";

    async function checkLogin() {
        const api: Api = new Api()
        const res = await api.sendPostRequest(new MeRequest(), {});
        if (!res.ok) {
            navigateTo('/auth/login')
            return
        }
        const responseBody = await res.json() as MeResponseBody

        //setLogin(true)
        let u: User = {
            id: responseBody.id,
            name: responseBody.name,
            email: responseBody.email
        }
        const store = useUserStore()
        store.set(u)
    }

    checkLogin()
</script>

<template>
    <h1>Home</h1>
</template>

<style scoped>

</style>
