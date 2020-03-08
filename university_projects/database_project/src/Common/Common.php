<?php


namespace App\Common;


use Symfony\Component\Security\Core\User\UserInterface;

class Common
{
    /** @var UserInterface */
   private static $user = null;

   public static function setUser($user)
   {
       if(self::$user == null && $user != null)
       {
           self::$user = $user;
       }
   }

   public static function getUser()
   {
       return self::$user;
   }

}