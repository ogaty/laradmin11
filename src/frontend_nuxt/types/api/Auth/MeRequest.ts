const runtimeConfig = useRuntimeConfig();

export class MeRequest implements ApiRequest {
    url: string = runtimeConfig.public.apiUrl + "/api/users/me"
}
