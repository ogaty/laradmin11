export class NewsMediaDeleteRequest implements ApiRequest {
  url: string = "/api/newsmedia/"
  makeUrl(params: commonObject): string {
    return this.url + params['id']
  }
}
