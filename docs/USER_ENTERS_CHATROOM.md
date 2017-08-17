## User Enters Chat Room
Create the profile for a specific user account.

`POST /USER_IN_ROOM/{userId}/{chatId}`

### Headers
- **AuthSessionId** - Identifier for current session
- **AuthSessionSecret** - Secret for current session

### Parameters
- **none**

### Body
- **chatId** - ChatID for the chat room
- **userId** - UserID entering the chat room
- **loggedIn** - States whether user was logged in to chat

### Response
- **loggedIn** - States whether user was logged in to chat

### Errors
- **ErrorCode1** - Caused by missing identifier
- **ErrorCode2** - ChatID was not given
- **ErrorCode3** - UserID was not given
- **ErrorCode4** - Server exploded

### Example Request
`GET /USER_IN_ROOM/0123/4567`

```javascript
{
	chatId: "4567",
	userId: "0123",
	loggedIn: 1
}
```

### Example Response
`200 OK`

```javascript
{
	loggedIn: 1
}