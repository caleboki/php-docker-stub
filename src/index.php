<?php

print 'Creating DB entries <br>';

$db = new SQLite3('products_crud.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

// Create a table.
$db->query(
'CREATE TABLE IF NOT EXISTS "products" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "title" VARCHAR NOT NULL,
    "description" TEXT,
    "image" VARCHAR,
    "price" DECIMAL(10,2),
    "create_date" TEXT DEFAULT CURRENT_TIMESTAMP
  )'
);

// Insert some sample data.
//$db->query('INSERT INTO "products" ("title", "price") VALUES ("IPhone 11", "2000")');
//$db->query('INSERT INTO "products" ("title", "price") VALUES ("Galaxy S 20", "2000")');


// Get a count of the number of users
$productCount = $db->querySingle('SELECT COUNT(DISTINCT "id") FROM "products"');
//echo("Product count: $productCount\n");

$results = $db->query('SELECT * FROM products ORDER BY create_date DESC');
$data = [];
while ($row = $results->fetchArray()) {
  array_push($data, $row);
}
print_r($data[0]['title']);

// Close the connection
$db->close();



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet">
    <title>Products CRUD</title>
  </head>
  <body>
    <h1>Products CRUD</h1>

    <p><a href="create.php" class="btn btn-success">Create Product</a></p>

      <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Title</th>
          <th scope="col">Price</th>
          <th scope="col">Create Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $i => $result) { ?>
          <tr>
            <th scope="row"><?php print($i + 1) ?></th>
            <td> <img src="<?php print $result['image'] ?>" class="thumb-image"></td>
            <td><?php print($result['title']) ?></td>
            <td><?php print($result['price']) ?></td>
            <td><?php print($result['create_date']) ?></td>
            <td>
              <button type="button" class="btn btn-sm btn-primary">Edit</button>
              <form style = " display: inline-block" method="post" action="delete.php">
                <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        <?php }?>
      </tbody>
      </table>


  </body>
</html>
