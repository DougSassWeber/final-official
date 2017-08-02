## User Enters Chat Room
Create the profile for a specific user account.

`POST /account/{userId}/{chatId}`

### Headers
- **AuthSessionId** - Identifier for current session
- **AuthSessionSecret** - Secret for current session

### Parameters
- **none**

### Body
- **chatId** - ChatID for the chat room
- **userId** - UserID entering the chat room

### Response
- **chatId** - Identifier for the chat room

### Errors
- **ErrorCode1** - Caused by missing identifier
- **ErrorCode2** - ChatID was not given
- **ErrorCode3** - UserID was not given
- **ErrorCode4** - Server exploded

### Example Request
`GET /account/1234/chatInfo`

```javascript
{
	chatId: "4567",
	userId: "0123"
}
```

### Example Response
`200 OK`

```javascript
{
	chatId: 1234
}