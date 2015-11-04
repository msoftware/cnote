# This is cnote 0.1.0

Cnote is a simple wysiwyg html editor with cloud storage.

You can write or edit without any permissions. Select any possible URL in cnote.

Cnote will save your contents automaicaly in the cnote cloud. Select the url you like and start writing,

[For Example] (http://cnote.1br.de/mypictures)

You want to share your contents with other people? Just copy the link from your browser and send or share with anyone.

You want to host your own cnote instance? You can fork cnote on GitHub.

# Setup

## Just create m MySQL DB 

```sql
CREATE TABLE IF NOT EXISTS `contents` (
  `crc` varchar(20) NOT NULL,
  `html` text NOT NULL,
  `version` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `contents` ADD PRIMARY KEY (`crc`);
```

## And edit php/config.php. 
```php
define("BASEHOST", "cnote.1br.de");
define("BASEURL", "/");
define("DBNAME", "[MY DBNAME]");
define("DBUSER", "[MY USER]");
define("DBPASS", "[MY PASSWORD]");
```

## Demo

[Cnote demo](http://cnote.1br.de)

## Requirements

PHP 4.1.0 or higher
MySQL 4.1.0 or higher

## Roadmap

* Delete note immediately 
* Delete note time-controlled
* Passwort protection for notes
