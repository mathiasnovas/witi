# Witi - Where is the iPad?

A sensational tool for keeping track of our in-house gadgets and devies.

## Requirements

* PHP 5
* MySQL

## Installation

Clone the repository:

```bash
git clone https://github.com/mathiasnovas/witi && cd witi
```

Apply the **config/schema.sql** to your database:

```bash
mysql < config/schema.sql
```

Make a copy of the **config/database.sample.php** file and fill it with the correct settings to reflect your setup:

```bash
cp config/database.sample.php config/database.php
```

Setup storage folders:

```bash
mkdir storage storage/thumb storage/large
chmod -R 777 storage
```

## License

The MIT License

Copyright (c) 2014-2015 07 Interaktiv. http://07.no
