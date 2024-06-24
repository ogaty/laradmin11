import { headers } from "next/headers";

type Props = {
    params: { id: string }
    searchParams: { [key: string]: string | string[] | undefined }
}

export async function generateMetadata({ params }: Props) {
    return {
        title: params.id,
         openGraph: {
             title: 'Login1234',
             images: ['https://content.ogatism.net/ogatism.png'],
         },
    }
}

export default function TempLayout({children,}: {
    children: React.ReactNode;
}) {
    const requestUrl = headers().get("x-url");

    return (
        <div className="flex justify-center items-center h-screen"><div>{requestUrl}</div>{children}</div>
    );
}
