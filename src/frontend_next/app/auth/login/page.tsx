"use client"

import {useRef} from "react"
import Api from "@/libs/ApiClass"
import {LoginRequest, LoginRequestBody} from "@/types/api/Auth/LoginRequest";
import {LoginResponseBody} from "@/types/api/Auth/LoginResponse";

export default function Page() {
    console.log(process.env.NEXT_PUBLIC_API_URL)
    const emailRef = useRef<HTMLInputElement | null>(null)
    const passwordRef = useRef<HTMLInputElement | null>(null)
    const handleLogin = async () => {
        const api: Api = new Api()
        let body: LoginRequestBody = {
            email: emailRef.current?.value!,
            password: passwordRef.current?.value!,
        }
        const res = await api.sendPostRequest(new LoginRequest(), body);
        console.log(res.status)
        const responseBody = res.data as LoginResponseBody
        console.log(responseBody.id)
    }

    return (
      <main>
          <div className="box">
              <h1>Login</h1>
              <div>
                  <form>
                      <div>
                          <label>
                              email:
                              <input type="text" name="email" ref={emailRef}/>
                          </label>
                      </div>
                      <div>
                          <label>
                              password:
                              <input type="password" name="password" ref={passwordRef} />
                          </label>
                      </div>
                      <button type="button" className="submit" onClick={handleLogin}>Login</button>
                  </form>
              </div>
          </div>
      </main>
    );
}
