# PHP Login Demo

PHP OOP Login Demo just for messing around.

The table structure is:

```
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `img` varchar(128) DEFAULT NULL,
  `blurb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
);
```

A user created with the username 'admin' will automatically have admin rights.

---

Update the include path in classes/DB.php to a file containing your DB credentials. In that file:

```
abstract class DB_CFG {
    protected $db = '<db_name>';
    protected $dbUser = '<db_username>';
    protected $dbPass = '<db_userpassword>';
}
```
