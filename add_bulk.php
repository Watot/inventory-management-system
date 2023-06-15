<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<html>
<head>
  <title>Add Item Form</title>
  <script>
    function addItem() {
    var itemnum = document.getElementById("itemnumber").value;
      var item = document.getElementById("item").value;
      var discount = document.getElementById("discount").value;
      var quantity = document.getElementById("quantity").value;
      var price = document.getElementById("price").value;
      var description = document.getElementById("description").value;

      var table = document.getElementById("itemTable");
      var newRow = table.insertRow(table.rows.length);

      var itemnumCell = newRow.insertCell(0);
      itemnumCell.innerHTML = itemnum;
      var itemCell = newRow.insertCell(1);
      itemCell.innerHTML = item;
      var dicCell = newRow.insertCell(2);
      dicCell.innerHTML = discount;
      var quanCell = newRow.insertCell(3);
      quanCell.innerHTML = quantity;
      var priceCell = newRow.insertCell(4);
      priceCell.innerHTML = price;
      var descriptionCell = newRow.insertCell(5);
      descriptionCell.innerHTML = description;
      // Clear the input fields after adding a row
    document.getElementById("itemnumber").value = "";
    document.getElementById("item").value = "";
    document.getElementById("discount").value = "";
    document.getElementById("quantity").value = "";
    document.getElementById("price").value = "";
    document.getElementById("description").value = "";
    // Store table data in an array
    updateTableData();
}

function updateTableData() {
  var table = document.getElementById("itemTable");
  var rows = table.getElementsByTagName("tr");

  var tableData = [];
  for (var i = 1; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var rowData = [];
    for (var j = 0; j < cells.length; j++) {
      rowData.push(cells[j].innerHTML);
    }
    tableData.push(rowData);
  }

  document.getElementById("tableDataInput").value = JSON.stringify(tableData);
}
  </script>
  <style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: "Poppins" , sans-serif;
}
table {
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      padding: 8px;
    }

  </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-6">
            <form class="mt-3">
                <h4>Add items</h4>
                <div class="card p-3">
                    <label for="item">Item Number:</label>
                    <input type="text" class="form-control" id="itemnumber" name="itemNumber"><br>
                    <label for="item">Item:</label>
                    <input type="text" class="form-control" id="item" name="item"><br>
                    <label for="item">Discount:</label>
                    <input type="number" class="form-control" id="discount" name="discount"><br>
                    <label for="item">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"><br>
                    <label for="item">Price:</label>
                        <input type="number" class="form-control" id="price" name="unitPrice"><br>
                    <label for="description">Description:</label>
                    <textarea id="description" class="form-control" name="description" rows="4" cols="50"></textarea><br>
                    <input type="button" class="btn btn-primary" value="Submit" onclick="addItem()">
                </div>     
            </form>
        </div>
        <div class="col-6">
            
            <div class="card mt-3 p-3">
                <h4>List of Bulk</h4>
                <form action="insert_data.php" method="post">
                    <table id="itemTable" class="table table-sm  table-bordered table-hover " style="width:100%">
                        <tr>
                            <th>Item Number</th>
                            <th>Item</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Description</th>
                        </tr>
                    </table>
                    <input type="hidden" name="tableData" id="tableDataInput">
                    <input type="submit" class="btn btn-primary w-100" value="submit">
                </form>
                
            </div>
            
        </div>
    </div>
</div>

 

  
  
</body>
</html>