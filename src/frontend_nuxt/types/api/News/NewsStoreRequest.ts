export class NewsStoreRequest implements ApiRequest {
  url: string = "/api/news/"
  makeUrl(params: commonObject): string {
    return this.url
  }
}
