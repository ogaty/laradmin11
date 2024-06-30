<script setup lang="ts">
    import Api from "~/libs/apiClass";
    import {MeRequest} from "~/types/api/Auth/MeRequest";
    import type {MeResponseBody} from "~/types/api/Auth/MeResponse";
    import type {User} from "~/types/model/User";
    import {useUserStore} from "~/composable/useUserStore";
    import AwsHandling from "~/libs/awsHandling";

    async function checkLogin() {
        const api: Api = new Api()
        await api.sendPostRequest(new MeRequest(), {})
            .then(async (body) => {
                const responseBody = body as MeResponseBody

                //setLogin(true)
                let u: User = {
                    id: responseBody.id,
                    name: responseBody.name,
                    email: responseBody.email
                }
                const store = useUserStore()
                store.set(u)
            })
            .catch(() => {
                navigateTo('/auth/login')
                return
            })
    }

    checkLogin()

    function listObject() {
        const awsHandling = new AwsHandling()

        awsHandling.listObject()
    }
</script>

<template>
    <h1>Home</h1>
    <div>
        <button v-on:click="listObject">listObject</button>
    </div>
</template>

<style scoped>

</style>
