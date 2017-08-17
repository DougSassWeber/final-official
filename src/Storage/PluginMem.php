<?php

namespace Storage;

/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 9:32 PM
 */

class PluginMem implements StorageInterface
{
    protected $buf;

    public function __construct()
    {
        $this->buf = [];
    }

    public function Count()
    {
        return sizeof($this->buf);
    }

    public function Create($item)
    {
        $this->buf[] = $item;
    }

    public function Read($chatRoomId)
    {
        foreach ($this->buf as $item) {
            if ($item->chatRoomId() == $chatRoomId) {
                return $item;
            }
        }
    }

    public function ReadAllChatrooms()
    {
        return $this->buf;
    }

    public function UpdateUserRoom($chatRoomId, $userId)
    {
        $this->buf[$chatRoomId];
        $this->buf[$userId];
    }

    public function UpdateChatroom($chatRoomId)
    {
        $this->buf[$chatRoomId];
    }
}