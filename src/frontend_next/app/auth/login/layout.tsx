import { Metadata } from "next";
import Page from "./page";   // import your Demo's page

export const metadata: Metadata = {
    title: 'Login',
    description:
        "Login",
    openGraph: {
        title: 'Login',
        images: ['https://content.ogatism.net/ogatism.png'],
    },
};
export default Page;
