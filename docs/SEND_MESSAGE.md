## Send Message from User
Create the profile for a specific user account.

`POST /account/{userId}/{chatId}`

### Headers
- **AuthSessionId** - Identifier for current session
- **AuthSessionSecret** - Secret for current session

### Parameters
- **chatId** - Id of the chatroom message is being sent in
- **userId** - Id of the user sending message

### Body
- **userId** - Id of the user sending message
- **message** - content of the message being sent to the chatroom

### Response
- **userId** - Identifier for the user

### Errors
- **ErrorCode1** - Caused by missing identifier
- **ErrorCode2** - UserId was not given
- **ErrorCode3** - ChatID was not given
- **ErrorCode4** - Message was not given
- **ErrorCode5** - Server exploded

### Example Request
`GET /account/1692/profile`

```javascript
{
	userId: 1692,
	message: "Test Message"
}
```

### Example Response
`200 OK`

```javascript
{
	userId: 1692
}