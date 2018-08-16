<?php

//
//MariaDB [openroom]> describe openroom.reservations;
//+---------------+--------------+------+-----+---------------------+----------------+
//| Field         | Type         | Null | Key | Default             | Extra          |
//+---------------+--------------+------+-----+---------------------+----------------+
//| reservationid | bigint(20)   | NO   | PRI | NULL                | auto_increment |
//| start         | timestamp    | NO   |     | 0000-00-00 00:00:00 |                |
//| end           | timestamp    | NO   |     | 0000-00-00 00:00:00 |                |
//| roomid        | int(11)      | NO   |     | NULL                |                |
//| username      | varchar(255) | NO   |     | NULL                |                |
//| numberingroup | int(11)      | NO   |     | NULL                |                |
//| timeofrequest | timestamp    | NO   |     | CURRENT_TIMESTAMP   |                |
//+---------------+--------------+------+-----+---------------------+----------------+
//7 rows in set (0.00 sec)

declare(strict_types=1);

namespace model;
class Reservation
{
    private $id;
    private $startTime;
    private $endTime;
    private $roomId;
    private $userName;
    private $numberInGroup;
    private $timeOfRequest;

    public function __construct($id, $startTime, $endTime, $roomId, $userName, $numberInGroup, $timeOfRequest)
    {
        $this->id = $id;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->roomId = $roomId;
        $this->userName = $userName;
        $this->numberInGroup = $numberInGroup;
        $this->timeOfRequest = $timeOfRequest;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * @param mixed $roomId
     */
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getNumberInGroup()
    {
        return $this->numberInGroup;
    }

    /**
     * @param mixed $numberInGroup
     */
    public function setNumberInGroup($numberInGroup)
    {
        $this->numberInGroup = $numberInGroup;
    }

    /**
     * @return mixed
     */
    public function getTimeOfRequest()
    {
        return $this->timeOfRequest;
    }

    /**
     * @param mixed $timeOfRequest
     */
    public function setTimeOfRequest($timeOfRequest)
    {
        $this->timeOfRequest = $timeOfRequest;
    }

    // "SELECT * FROM reservations ORDER BY timeofrequest DESC;"


    public static function get_a_specific_reservation($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT reservationid, start, end, roomid, username, numberingroup, timeofrequest FROM users WHERE reservationid = :id');
        $req->execute(array('id' => $id));
        $reservation = $req->fetch();
        return new Reservation(reservation['reservationid'], $reservation['start'], $reservation['end'], $reservation['roomid'], $reservation['numberingroup'], $reservation['timeofrequest']);
    }
}