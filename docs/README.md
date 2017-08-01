Build a chat application as a ReSTful API
=========================================

### Description

The final for CS-3620 is to delevelop *half* a chat tool.  The server component should allow clients to:

- Create chat-rooms
- List chat-rooms
- Join chat-rooms
- Send messages to chat-rooms
- Leave a chat-room

Once created a chat-room stores all the data (messages sent to the room, who has been in the room) for as long as they exist.  If a chat-room has not been used in a week it, should be archived.  The server should support up to 10 concurrent clients.

### Features

- Identify themselves via an **alias** and **email**
- Create a chat-room
- List chat-rooms
- Join a chat-room
- Send a message to a joined chat-room
- View all messages in the joined chat-room based on date range
- Leave a chat-room
- Chat-room archived after a week of no use

### Requirements

| Points | Requirement |
|:------:|:------------|
|05|Use PHP as the programming language|
|05|Use the *jacks* and *plugins* architecture for data persistence|
|20|Achieve **50%** or more code coverage on *unit-tests*|
|05|Use *MySQL* to store data for the chat-rooms|
|05|Use *Redis* to store the user data|
|10|Turn-in markdown file(s) that defines your ReST API (Webservice) end-points|
|15|All features work|
|15|All end-points work|
|20|Have integration tests for all the end-points|
|100| **TOTAL** |

