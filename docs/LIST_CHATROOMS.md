## List all Chat Rooms
Create the profile for a specific user account.

`GET /CHAT_ROOM`

### Headers
- **AuthSessionId** - Identifier for current session
- **AuthSessionSecret** - Secret for current session

### Parameters
- **none** - 

### Body
- **none**

### Response
- **chatId** - Identifier for the chat room

### Errors
- **ErrorCode1** - Caused by missing identifier
- **ErrorCode2** - No open chat rooms
- **ErrorCode3** - Server exploded

### Example Request
`GET /CHAT_ROOM`

```javascript
{
	active: 1
}
```

### Example Response
`200 OK`

```javascript
{
	chatId: 1234,
	chatId: 5678,
	chatId: 9012
}