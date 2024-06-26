export class NewsMediaListRequest implements ApiRequest {
  url: string = "/api/newsmedia/"
  makeUrl(params: commonObject): string {
    return this.url
  }
}
