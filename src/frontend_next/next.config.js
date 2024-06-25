/** @type {import('next').NextConfig} */
const nextConfig = {
    // experimental: {
    //     serverActions: true,
    // },
    // redirects: async () => {
    //     return [
    //         {
    //             source: "/github",
    //             destination: "https://github.com/admineral",
    //             permanent: true,
    //         },
    //         {
    //             source: "/deploy",
    //             destination: "https://vercel.com",
    //             permanent: true,
    //         },
    //     ];
    // },
    headers: async () => {
        return [
            {
                source: '/',
                headers: [
                    {
                        key: 'x-custom-header',
                        value: 'my custom header value',
                    },
                    {
                        key: 'x-another-custom-header',
                        value: 'my other custom header value',
                    },
                ],
            },
        ]
    }
};

module.exports = nextConfig;
