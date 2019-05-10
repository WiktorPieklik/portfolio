<?php
/**
 * Created by PhpStorm.
 * User: WiktorPieklik
 * Date: 13/04/2019
 * Time: 11:40
 */

class DB_Functions
{
    private $connection;

    function __construct()
    {
        require_once  'db_connect.php';
        $db = new DB_Connect();
        $this->connection = $db->connect();
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    /*
     * Checking if user is already existing
     * returns true or false
     */
    function isUserExisting($phoneNo)
    {
        $statement = $this->connection->prepare("SELECT * FROM USERS WHERE PHONE =?");
        $statement->bind_param("s", $phoneNo);
        $statement->execute();
        $statement->store_result();

        if($statement->num_rows > 0)
        {
            $statement->close();
            return true;
        }

        else
        {
            $statement->close();
            return false;
        }
    }


    /*
     * Registers new user
     * returns User object if user was successfully created
     * returns error message if there was an exception
     */
    public function registerUser($phone, $name, $birthdate, $address)
    {
        $statement = $this->connection->prepare("INSERT INTO Users(Phone, Name, Birthdate, Address) VALUES (?,?,?,?)");
        $statement->bind_param("ssss", $phone, $name, $birthdate, $address);
        $result = $statement->execute();
        $statement->close();

        if($result)
        {
            $statement = $this->connection->prepare("SELECT * FROM Users WHERE Phone=?");
            $statement->bind_param("s", $phone);
            $statement->execute();
            $user = $statement->get_result()->fetch_assoc();
            $statement->close();
            return $user;
        }
        else
            return false;

    }

    /*
     * Get User information
     * returns User object if user exists
     * returns NULL if user is not exisiting
     */
    public function getUserInformation($phone)
    {
        $statement = $this->connection->prepare("SELECT * FROM Users WHERE Phone=?");
        $statement->bind_param("s",$phone);

        if($statement->execute())
        {
            $user = $statement->get_result()->fetch_assoc();
            $statement->close();

            return $user;
        }
        else
            return NULL;
    }

    /*
     * Get Banners
     * returns list of Banners
     */
    public function getBanners()
    {
        //selects 3 newsest banners
        $result = $this->connection->query("SELECT * FROM Banner ORDER BY Id LIMIT 3");
        $banners = array();
        while($item = $result->fetch_assoc())
            $banners[] = $item;
        return $banners;
    }

    /*
    * Get Menu
    * returns list of Menu
    */
    public function getMenu()
    {
        $result = $this->connection->query("SELECT * FROM Menu");

        $menu = array();

        while($item = $result->fetch_assoc())
            $menu[] = $item;
        return $menu;
    }

   /*
   * Get Drink base Menu Id
   * returns list of drinks
   */
    public function getDrinksByMenuId($menuId)
    {
        $query = "SELECT * FROM Drinks WHERE MenuId='".$menuId."'";
        $result = $this->connection->query($query);

        $drinks = array();
        while($item = $result->fetch_assoc())
            $drinks[] = $item;
        return $drinks;
    }

    /*
     * Uploads users avatar
     * Returns TRUE or FALSE
     */
    public function uploadAvatar($phone, $fileName)
    {
        return $result = $this->connection->query("UPDATE Users SET AvatarUrl='$fileName' WHERE Phone='$phone'");
    }



}

