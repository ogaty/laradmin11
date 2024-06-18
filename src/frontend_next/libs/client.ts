import axios from 'axios'

const client = axios.create({
    baseURL: process.env.NEXT_PUBLIC_API_URL + '/api/',
    timeout: 1000,
    withCredentials: true,
    withXSRFToken: true
})

export default client
