<?php
/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 10:16 PM
 */

namespace Domain;

class USER_IN_ROOM {
    protected $userRoomID;
    protected $chatRoomId;
    protected $userId;
    protected $loggedIn;

    /**
     * @return mixed
     */
    public function UserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function ChatRoomId()
    {
        return $this->chatRoomId;
    }

    /**
     * @return mixed
     */
    public function LoggedIn()
    {
        return $this->loggedIn;
    }

    /**
     * @return mixed
     */
    public function UserRoomID()
    {
        return $this->userRoomID;
    }

    /**
     * @param mixed $loggedIn
     */
    public function SetLoggedIn($loggedIn)
    {
        if (!is_int($loggedIn)){
            return false;
        }elseif ($loggedIn != 0){
            return false;
        }elseif ($loggedIn != 1){
            return false;
        }
        $this->loggedIn = $loggedIn;
        return true;
    }

    /**
     * @param mixed $chatRoomId
     */
    public function SetChatRoomId($chatRoomId)
    {
        if (!is_int($chatRoomId)){
            return false;
        }
        $this->chatRoomId = $chatRoomId;
        return true;
    }

    /**
     * @param mixed $userId
     */
    public function SetUserId($userId)
    {
        if (!is_int($userId)){
            return false;
        }
        $this->userId = $userId;
        return true;
    }
}