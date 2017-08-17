## Send Message from User
Create the profile for a specific user account.

`POST /Message`

### Headers
- **AuthSessionId** - Identifier for current session
- **AuthSessionSecret** - Secret for current session

### Parameters
- **chatRoomId** - Id of the chatroom message is being sent in
- **userId** - Id of the user sending message

### Body
- **chatRoomId** - Id of the chatroom message is being sent in
- **userId** - Id of the user sending message
- **messageContent** - Content of the message
- **messageSent** - What time and date the message was sent

### Response
- **userId** - Identifier for the user

### Errors
- **ErrorCode1** - Caused by missing identifier
- **ErrorCode2** - UserId was not given
- **ErrorCode3** - ChatID was not given
- **ErrorCode4** - Message was not given
- **ErrorCode5** - Server exploded

### Example Request
`GET /Message`

```javascript
{
	chatRoomId: 1234,
    userId: 1692,
	messageContent: "Test Message",
	messageSent: "08/16/2017"
}
```

### Example Response
`200 OK`

```javascript
{
	userId: 1692
}