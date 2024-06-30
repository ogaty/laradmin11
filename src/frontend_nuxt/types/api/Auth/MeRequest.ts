export class MeRequest implements ApiRequest {
    url: string = "/api/users/me"
    makeUrl(params: commonObject): string {
      return this.url
    }
}
