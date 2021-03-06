<?php
if ($_COOKIE['log'] == '') {
  header('Location:../auth.php');
  exit();
}
$website_title = 'Записать выдачу';
require '../blocks/head.php';
require '../libs/connect.php';
$cookie = $_COOKIE['log'];

?>
<!DOCTYPE html>
<html lang="en">
<?php require '../blocks/header.php'; ?>
<body>
 
   <main class="container mt-4">
    <div class="row">
    <div class="col">
      </div>
      <div class="col-md-6 mb-3">
          <?php require '../blocks/breadcump_overalls.php'; ?>
        <h5 class=" mb-3"><?= $website_title; ?></h5>
        <form action="../models/overalls/extradition.php" method="post" class="form-group">
        <table class='table'>
          <td widht="75">Вид</td>
              <td><select class="form-control" name="type">
              <?php
              $sql = 'SELECT * FROM `nomenclature` ';
               $result = mysqli_query($link, $sql);

                     while ($row = mysqli_fetch_array($result))
                       {
                        echo "<option value='{$row['name']}'>{$row['name']}</option>";
                         }
                       echo mysqli_error($link);
              ?>
              </select></td>
          </tr>
         <tr>
          <td>Количество</td>
          <td><input type="hidden" name="user" value="<?= $cookie;?>"><input type="hidden" name="data" value="<?=(date('d.m.Y'))?>"><input type="text" class="form-control" name="quality"></td>
      </tr>
      <tr>
          <td>Списание на</td>
          <td><select class="form-control" name="source">
          <option widht="80" class="form-control" value="Выдача сотруднику">Выдача сотруднику</option>
                      <?php
            $sql = 'SELECT * FROM `warehouse`';
             $result = mysqli_query($link, $sql);

                   while ($row = mysqli_fetch_array($result))
                     {
                      echo "<option value='{$row['name']}'>{$row['name']}</option>";
                       }
                     echo mysqli_error($link);
            ?>
          
          </select></td>
      </tr>
      <tr>
          <td>C объекта</td>
          <td><select class="form-control" name="local">
            <?php
            $sql = 'SELECT * FROM `warehouse`';
             $result = mysqli_query($link, $sql);

                   while ($row = mysqli_fetch_array($result))
                     {
                      echo "<option value='{$row['name']}'>{$row['name']}</option>";
                       }
                     echo mysqli_error($link);
            ?>
          </select></td>
      </tr>
      </table>
      <button type="submit" class="btn btn-primary">Записать</button>
      </form>

      </div>

<div class="col">
      </div>
    </div>
  </main>

  <?php require '../blocks/footer.php'; ?>

</body>
</html>
