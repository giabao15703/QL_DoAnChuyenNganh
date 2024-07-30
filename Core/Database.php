<?php
class Database
{
   const HOST = Host;
   //const USERNAME = 'id22268848_db123';
   //const PASSWORD = 'btZ9=6E_i<nsx8Wk';
   const USERNAME = USERNAME_DB;
   const PASSWORD = PASSWORD_DB;
   const DB_NAME = DB_NAME;

   private $connect;

   public function connect()
   {
      $connect = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DB_NAME);
      mysqli_set_charset($connect, 'utf8');
      ;
      if (mysqli_connect_errno() === 0) {
         return $connect;
      }
      return false;
   }
}