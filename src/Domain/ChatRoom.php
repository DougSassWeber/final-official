<?php
/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 7:24 PM
 */
namespace Domain;

class ChatRoom {
    protected $chatRoomId;
    protected $chatName;
    protected $chatCreationDate;
    protected $chatLastActive;
    protected $active;

    function __construct($chatName)
    {
        // validation
        if ( !is_string($chatName) ) {
            return false;
        }
        $this->chatName = $chatName;
        $this->chatCreationDate = date("Y-m-d H:i:s");
        $this->chatLastActive = date("Y-m-d H:i:s");
        $this->active = 1;
        //run INSERT query
        $this->chatRoomId = mysqli_insert_id();
        return true;
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
    public function ChatName()
    {
        return $this->chatName;
    }

    /**
     * @return mixed
     */
    public function ChatCreationDate()
    {
        return $this->chatCreationDate;
    }

    /**
     * @return mixed
     */
    public function ChatLastActive()
    {
        return $this->chatLastActive;
    }

    /**
     * @return mixed
     */
    public function Active()
    {
        return $this->active;
    }

    /**
     * @param mixed $chatLastActive
     */
    public function setChatLastActive($chatLastActive)
    {
        $this->chatLastActive = $chatLastActive;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }
}