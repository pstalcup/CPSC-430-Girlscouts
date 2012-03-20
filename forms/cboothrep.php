<html>
  <?php
    include "menu.php";
  ?>
<head>
  <title>Cookie Booth Sales Worksheet</title>

</head>
<body>

  INVENTORY
  <br/>

  <form action="cboothrepController.php" method="POST">
  <table>
    <tr><td>PACKAGES</td>
    <td>Savannah Smiles</td>
    <td>Trefoils</td>
    <td>Do-si-Dos</td>
    <td>Samoas</td>
    <td>Dulce de Leche</td>
    <td>Thank U Berry</td>
    <td>Tags</td>
    <td>Thin Mints</td>
    <td><i><b>Amount Due</b></i></tr>

    <tr>
    <td>Beginning Inventory</td>
    <td><input type="text" name="1-1"/></td>
    <td><input type="text" name="1-2"/></td>
    <td><input type="text" name="1-3"/></td>
    <td><input type="text" name="1-4"/></td>
    <td><input type="text" name="1-5"/></td>
    <td><input type="text" name="1-6"/></td>
    <td><input type="text" name="1-7"/></td>
    <td><input type="text" name="1-8"/></td>
    <td><input type="text" name="1-9"/></td>
    </tr>

    <tr>
    <td>Ending Inventory</td>
    <td><input type="text" name="2-1"/></td>
    <td><input type="text" name="2-2"/></td>
    <td><input type="text" name="2-3"/></td>
    <td><input type="text" name="2-4"/></td>
    <td><input type="text" name="2-5"/></td>
    <td><input type="text" name="2-6"/></td>
    <td><input type="text" name="2-7"/></td>
    <td><input type="text" name="2-8"/></td>
    <td><input type="text" name="2-9"/></td>
    </tr>

    <tr>
    <td><b>TOTAL PACKAGES DUE</b></td>
    <td><input type="text" name="3-1"/></td>
    <td><input type="text" name="3-2"/></td>
    <td><input type="text" name="3-3"/></td>
    <td><input type="text" name="3-4"/></td>
    <td><input type="text" name="3-5"/></td>
    <td><input type="text" name="3-6"/></td>
    <td><input type="text" name="3-7"/></td>
    <td><input type="text" name="3-8"/></td>
    <td><input type="text" name="3-9"/></td>
    </tr>
  </table>

  <input type="submit" value="Submit"/>
  </form>



</body>
</html>
