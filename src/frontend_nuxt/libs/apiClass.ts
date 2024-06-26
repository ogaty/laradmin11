class Api {
    constructor() {

    }
    sendGetRequest = async (request: ApiRequest, params: commonObject) => {
        let url = new URL(request.url)
        Object.keys(params).forEach(
            key => url.searchParams.append(key, params[key])
        )

        return await fetch(url.toString())
    }

    sendPostRequest = async (request: ApiRequest, body: Object) => {
        const runtimeConfig = useRuntimeConfig();

        // csrf-cookie
        await fetch(runtimeConfig.public.apiUrl + "/sanctum/csrf-cookie")

        // Login
        return await fetch(runtimeConfig.public.apiUrl + request.url,
            {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(body)
            })
    }

    sendPutRequest = (request: ApiRequest) => {

    }

    sendDeleteRequest = (request: ApiRequest) => {

    }
}

export default Api
