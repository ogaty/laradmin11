import axios from 'axios'
import client from "@/libs/client";

class Api {
    constructor() {

    }
    sendGetRequest = async (request: ApiRequest, params: commonObject) => {
        let url = new URL(request.url)
        Object.keys(params).forEach(
            key => url.searchParams.append(key, params[key])
        )

        return await client.get(url.toString())
    }

    sendPostRequest = async (request: ApiRequest, body: Object) => {
        // csrf-cookie
        await client.get(process.env.NEXT_PUBLIC_API_URL + "/sanctum/csrf-cookie")

        // Login
        return await client.post(request.url, body)
    }

    sendPutRequest = (request: ApiRequest) => {

    }

    sendDeleteRequest = (request: ApiRequest) => {

    }
}

export default Api;
