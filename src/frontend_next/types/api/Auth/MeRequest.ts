export class MeRequest implements ApiRequest {
    url: string = process.env.NEXT_PUBLIC_API_URL + "/api/users/me"
}
