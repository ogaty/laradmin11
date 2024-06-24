'use client'

import Image from "next/image";
import Api from "@/libs/ApiClass";
import {MeRequest} from "@/types/api/Auth/MeRequest";
import {MeResponseBody} from "@/types/api/Auth/MeResponse";
import {router} from "next/client";
import { useRouter } from 'next/navigation';
import {useState} from "react";

export default function Home() {
    const [login, setLogin] = useState(false)
    const router = useRouter()
    async function checkLogin() {
        const api: Api = new Api()
        const res = await api.sendPostRequest(new MeRequest(), {});
        if (res.status != 200) {
            router.replace('/auth/login')
            return
        }
        const responseBody = res.data as MeResponseBody

        setLogin(true)
    }

    checkLogin()


    return (
        login ?
    <main>
    </main>
    : <></>
  );
}
