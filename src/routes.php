<?php
/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 7:55 PM
 * GET /Message/{id}
 * GET /CHAT_ROOM
 * POST /CHAT_ROOM
 * POST /Message
 * POST /USER
 * PUT /CHAT_ROOM/{id}
 * PUT /USER_IN_ROOM/{id}
 */

$app->get('/Message/{id}', function ($req, $resp, $args) {
    $st = $this->db->prepare("SELECT * FROM tasks WHERE chatRoomId=:id");
    $st->bindParam("id", $args['id']);
    $st->execute();
    $Message = $st->fetchObject();
    return $resp->withJson($Message);
});

$app->get('/CHAT_ROOM', function ($req, $resp) {
    $st = $this->db->prepare("SELECT * FROM CHAT_ROOM WHERE active = 1 ORDER BY chatRoomId");
    $st->execute();
    $todos = $st->fetchAll();
    return $resp->withJson($todos);
});

$app->post('/CHAT_ROOM', function ($req, $resp, $args) {
    $body = $req->getBody();
    $json = json_decode($body, true);
    if ($json === NULL) {
        return $resp->withStatus(400);
    }
    $sql = "INSERT INTO CHAT_ROOM (chatName, chatCreationDate, chatLastActive, active) VALUES (:chatName, :chatCreationDate, :chatLastActive, :active)";
    $st = $this->db->prepare($sql);
    $st->bindParam(":chatName", $json['chatName']);
    $st->bindParam(":chatCreationDate", $json['chatCreationDate']);
    $st->bindParam(":chatLastActive", $json['chatLastActive']);
    $st->bindParam(":active", $json['active']);
    $st->execute();
    $id = $this->db->lastInsertId();
    $uri = $req->getRequestTarget();
    $url = $req->getUri()->getScheme() . "://" . $req->getUri()->getHost() . $uri . "/" . $id;
    $nResp = $resp->withHeader('Location', $url);
    return $nResp->withStatus(201);
});


$app->post('/Message', function ($req, $resp, $args) {
    $body = $req->getBody();
    $json = json_decode($body, true);
    if ($json === NULL) {
        return $resp->withStatus(400);
    }
    $sql = "INSERT INTO Message (chatRoomId, userId, messageContent, messageSent) VALUES (:chatRoomId, :userId, :messageContent, :messageSent)";
    $st = $this->db->prepare($sql);
    $st->bindParam(":chatRoomId", $json['chatRoomId']);
    $st->bindParam(":userId", $json['userId']);
    $st->bindParam(":messageContent", $json['messageContent']);
    $st->bindParam(":messageSent", $json['messageSent']);
    $st->execute();
    $id = $this->db->lastInsertId();
    $uri = $req->getRequestTarget();
    $url = $req->getUri()->getScheme() . "://" . $req->getUri()->getHost() . $uri . "/" . $id;
    $nResp = $resp->withHeader('Location', $url);
    return $nResp->withStatus(201);
});

$app->post('/USER', function ($req, $resp, $args) {
    $body = $req->getBody();
    $json = json_decode($body, true);
    if ($json === NULL) {
        return $resp->withStatus(400);
    }
    $sql = "INSERT INTO USER (alias, email) VALUES (:alias, :email)";
    $st = $this->db->prepare($sql);
    $st->bindParam(":alias", $json['alias']);
    $st->bindParam(":email", $json['email']);
    $st->execute();
    $id = $this->db->lastInsertId();
    $uri = $req->getRequestTarget();
    $url = $req->getUri()->getScheme() . "://" . $req->getUri()->getHost() . $uri . "/" . $id;
    $nResp = $resp->withHeader('Location', $url);
    return $nResp->withStatus(201);
});

$app->put('/CHAT_ROOM/{id}', function ($req, $resp, $args) {
    $body = $req->getBody();
    $json = json_decode($body, true);
    if ($json === NULL) {
        return $resp->withStatus(204);
    }
    $sql = "UPDATE CHAT_ROOM SET chatLastActive = date(\"Y-m-d H:i:s\"), active = 0 WHERE chatRoomId=:id";
    $st = $this->db->prepare($sql);
    $st->bindParam(":chatLastActive", $json['chatLastActive']);
    $st->bindParam(":active", $json['active']);
    $st->execute();
    $id = $this->db->lastInsertId();
    $uri = $req->getRequestTarget();
    $url = $req->getUri()->getScheme() . "://" . $req->getUri()->getHost() . $uri . "/" . $id;
    $nResp = $resp->withHeader('Location', $url);
    return $nResp->withStatus(200);
});

$app->put('/USER_IN_ROOM/{cid}/{uid}', function ($req, $resp, $args) {
    $body = $req->getBody();
    $json = json_decode($body, true);
    if ($json === NULL) {
        return $resp->withStatus(204);
    }
    $sql = "UPDATE USER_IN_ROOM SET loggedIn = 0 WHERE chatRoomId=:cid AND userId=:uid";
    $st = $this->db->prepare($sql);
    $st->bindParam(":loggedIn", $json['loggedIn']);
    $st->execute();
    $id = $this->db->lastInsertId();
    $uri = $req->getRequestTarget();
    $url = $req->getUri()->getScheme() . "://" . $req->getUri()->getHost() . $uri . "/" . $id;
    $nResp = $resp->withHeader('Location', $url);
    return $nResp->withStatus(200);
});
