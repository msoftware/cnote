# cnote
Cnote is a simple wysiwyg html editor with cloud storage.

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

define("BASEHOST", "cnote.1br.de");
define("BASEURL", "/");
define("DBNAME", "[MY DBNAME]");
define("DBUSER", "[MY USER]");
define("DBPASS", "[MY PASSWORD]");

## Demo

[Cnote demo](https://cnote.1br.de)
