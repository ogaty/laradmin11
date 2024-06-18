import axios from 'axios'
import client from "@/libs/client";

class Api {
    constructor() {

    }
    sendGetRequest = (request: ApiRequest, body: Object) => {
    }

    sendPostRequest = async (request: ApiRequest, body: Object) => {
        return await client.get(process.env.NEXT_PUBLIC_API_URL + "/sanctum/csrf-cookie")
            .then(async () => await client.post(request.url, body)
                .then((response) => {
                    return response
                }))
    }

    sendPutRequest = (request: ApiRequest) => {

    }

    sendDeleteRequest = (request: ApiRequest) => {

    }
}

export default Api;
