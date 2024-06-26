<script setup lang="ts">
    import Api from "~/libs/apiClass";
    import {LoginRequest, type LoginRequestBody} from "~/types/api/Auth/LoginRequest";
    import type {LoginResponseBody} from "~/types/api/Auth/LoginResponse";
    import type {User} from "~/types/model/User";
    import {useUserStore} from "~/composable/useUserStore";

    const emailModel = defineModel("email")
    const passwordModel = defineModel("password")

    const runtimeConfig = useRuntimeConfig();

    const handleLogin = async () => {
        console.log(runtimeConfig.public.apiUrl)
        const api: Api = new Api()
        let body: LoginRequestBody = {
            email: emailModel.value as string,
            password: passwordModel.value as string,
        }
        const res = await api.sendPostRequest(new LoginRequest(), body)
            .then((body) => {
                const responseBody = body as LoginResponseBody
                const u = {
                    id: responseBody.id,
                    name: responseBody.name,
                    email: responseBody.email
                } as User
                const store = useUserStore()
                store.set(u)

                navigateTo("/")
            }).catch((body) => {

            })
    }
</script>

<template>
    <main>
        <div class="box">
            <h1>Login</h1>
            <div>
                <form>
                    <div>
                        <label>
                            email:
                            <input type="text" name="email" v-model="emailModel" />
                        </label>
                    </div>
                    <div>
                        <label>
                            password:
                            <input type="password" name="password" v-model="passwordModel" />
                        </label>
                    </div>
                    <button type="button" class="submit" @click="handleLogin">Login</button>
                </form>
            </div>
        </div>
    </main>
</template>

<style scoped>

</style>
