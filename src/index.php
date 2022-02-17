<?php

print 'Creating DB entries <br>';

$db = new SQLite3('testing.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

// Create a table.
$db->query(
'CREATE TABLE IF NOT EXISTS "users" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "name" VARCHAR
  )'
);

// Insert some sample data.
$db->query('INSERT INTO "users" ("name") VALUES ("Karl")');
$db->query('INSERT INTO "users" ("name") VALUES ("Linda")');
$db->query('INSERT INTO "users" ("name") VALUES ("John")');

// Get a count of the number of users
$userCount = $db->querySingle('SELECT COUNT(DISTINCT "id") FROM "users"');
echo("User count: $userCount\n");

// Close the connection
$db->close();
