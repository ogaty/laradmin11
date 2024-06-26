export type {LoginRequestBody}

interface LoginRequestBody {
    email: string;
    password: string;
}

export class LoginRequest implements ApiRequest {
    url: string = "/api/auth/login"
}
