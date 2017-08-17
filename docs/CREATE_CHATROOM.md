## Create Chat Room
Create the profile for a specific user account.

`POST /CHAT_ROOM`

### Headers
- **AuthSessionId** - Identifier for current session
- **AuthSessionSecret** - Secret for current session

### Parameters
- **none**

### Body
- **chatName** - Name for the chat room
- **userId** - UserID starting the chat room

### Response
- **chatId** - Identifier for the chat room

### Errors
- **ErrorCode1** - Caused by missing identifier
- **ErrorCode2** - Chat room name was not given
- **ErrorCode3** - UserID was not given
- **ErrorCode4** - Server exploded

### Example Request
`GET /CHAT_ROOM/1234`

```javascript
{
	chatName: "NewChatroom"
}
```

### Example Response
`200 OK`

```javascript
{
	chatId: 1234
}