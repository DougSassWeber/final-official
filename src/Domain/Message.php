<?php
/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 9:58 PM
 */

namespace Domain;

class Message {
    protected $ID;
    protected $chatRoomId;
    protected $userId;
    protected $messageContent;
    protected $messageSent;

    function __construct($chatRoomId,$userId,$messageContent)
    {
        // validation
        if ( !is_int($chatRoomId) ) {
            return false;
        }elseif (!is_int($userId)) {
            return false;
        }elseif (!is_string($messageContent)){
            return false;
        }
        $this->chatRoomId = $chatRoomId;
        $this->userId = $userId;
        $this->messageContent = $messageContent;
        $this->messageSent = date("Y-m-d H:i:s");
        return true;
    }

    /**
     * @return int
     */
    public function ChatRoomId()
    {
        return $this->chatRoomId;
    }

    /**
     * @return mixed
     */
    public function ID()
    {
        return $this->ID;
    }

    /**
     * @return string
     */
    public function MessageContent()
    {
        return $this->messageContent;
    }

    /**
     * @return false|string
     */
    public function MessageSent()
    {
        return $this->messageSent;
    }

    /**
     * @return int
     */
    public function UserId()
    {
        return $this->userId;
    }
}