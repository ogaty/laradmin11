export type {LoginRequestBody}

interface LoginRequestBody {
    email: string;
    password: string;
}

export class LoginRequest implements ApiRequest {
    url: string = process.env.NEXT_PUBLIC_API_URL + "/api/auth/login"
}
