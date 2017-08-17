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
    public function getChatRoomId()
    {
        return $this->chatRoomId;
    }

    /**
     * @return mixed
     */
    public function getChatName()
    {
        return $this->chatName;
    }

    /**
     * @return mixed
     */
    public function getChatCreationDate()
    {
        return $this->chatCreationDate;
    }

    /**
     * @return mixed
     */
    public function getChatLastActive()
    {
        return $this->chatLastActive;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $chatRoomId
     */
    public function setChatRoomId($chatRoomId)
    {
        // validation
        if ( !is_string($chatRoomId) ) {
            return false;
        }
        $this->chatRoomId = $chatRoomId;
        return true;
    }

    /**
     * @param mixed $chatName
     */
    public function setChatName($chatName)
    {
        // validation
        if ( !is_string($chatName) ) {
            return false;
        }
        $this->chatName = $chatName;
        return true;
    }

    /**
     * @param mixed $chatCreationDate
     */
    public function setChatCreationDate($chatCreationDate)
    {
        $this->chatCreationDate = $chatCreationDate;
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