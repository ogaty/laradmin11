import {S3Client, ListObjectsCommand, type ListObjectsCommandInput} from "@aws-sdk/client-s3"; // ES Modules import
// const { S3Client, ListObjectsCommand } = require("@aws-sdk/client-s3"); // CommonJS import

class AwsHandling {
  constructor() {

  }

  config = {

  }

  options = {
    region: 'ap-northeast-1',
    credentials: {
      accessKeyId: 'AKIAT5BNZ5X2Y7K535GU',
      secretAccessKey:'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',
    },
  }

  listObject = async () => {
    const client = new S3Client(this.options);
    const input = { // ListObjectsRequest
      Bucket: "ogatism-storage", // required
    } as ListObjectsCommandInput
    const command = new ListObjectsCommand(input);
    const response = await client.send(command);
    console.log(response)
  }
}

export default AwsHandling
