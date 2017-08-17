<?php
/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 9:35 PM
 */

namespace Storage;

interface StorageInterface
{
    public function Count();

    public function Create($item);

    public function Read($chatRoomId);

    public function ReadAllChatrooms();

    public function UpdateUserRoom($chatRoomId, $userId);

    public function UpdateChatroom($chatRoomId);
}