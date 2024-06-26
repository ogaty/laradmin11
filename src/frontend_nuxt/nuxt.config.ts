// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    ssr: false,
    devtools: {enabled: true},
    runtimeConfig: {
        public: {
            apiUrl: 'http://local.ogatism.com',
        }
    },
    modules: ['@pinia/nuxt'],
    app: {
      head: {
        link: [
          // <link rel="stylesheet" href="https://myawesome-lib.css">
          { rel: 'stylesheet', href: 'https://example.com/aaa.css' }
        ],
      }
    }
})
