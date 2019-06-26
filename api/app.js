const express = require("express");
const mysql = require("mysql");
var app = express();

let connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "fancyclothes"
});

app.get("/fancyclothes/api/products", (req, res) => {
  console.log("Henter alle produkter");
  connection.query(
    "SELECT * FROM products JOIN categories ON products.categoryId = categories.categoryId",
    (err, rows, fields) => {
      if (rows == "" || err) {
        console.log("Der skete en fejl");
        res.sendStatus(500);
        res.end();
        return;
      }
      let formattedJson = rows.map(row => {
        return {
          id: row.productId,
          kategori: row.category,
          overskrift: row.title,
          indhold: row.text,
          stjerner: row.stars,
          pris: row.price
        };
      });
      res.json(formattedJson);
    }
  );
});

app.get("/fancyclothes/api/product/:id", (req, res) => {
  let id = req.params.id;
  console.log(`Henter produkt med id = ${id}`);
  connection.query(
    `SELECT * FROM products  JOIN categories ON products.categoryId = categories.categoryId WHERE productId = ${id}`,
    (err, rows, fields) => {
      if (rows == "" || err) {
        console.log("Der skete en fejl");
        res.sendStatus(500);
        res.end();
        return;
      }

      let formattedJson = rows.map(row => {
        return {
          id: row.productId,
          kategori: row.category,
          overskrift: row.title,
          indhold: row.text,
          stjerner: row.stars,
          pris: row.price
        };
      });
      res.json(formattedJson);
    }
  );
});

app.listen(3000, () => {
  console.log("Server is up and listening on port 3000");
});
