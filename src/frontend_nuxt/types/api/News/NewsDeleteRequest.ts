export class NewsDeleteRequest implements ApiRequest {
  url: string = "/api/news/"
  makeUrl(params: commonObject): string {
    return this.url + params['id']
  }
}
