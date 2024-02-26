<?php
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');



    $name = $_POST['name'];
    $price = $_POST['price'];
    $introduction = $_POST['introduction'];
    $sql = "INSERT INTO monster (name, introduction, price) VALUES ('$name', '$introduction', '$price')";
    $result = mysqli_query($link, $sql);

    $sql = "SELECT MAX(monsterID) FROM monster";
    $result = mysqli_query($link, $sql);


    $currentMonster = mysqli_fetch_array($result)[0];


    $egg_name = $_FILES['egg']['name'];
    $egg_size = $_FILES['egg']['size'];
    $egg_tmp = $_FILES['egg']['tmp_name'];
    $egg_type = $_FILES['egg']['type'];
    $egg_ext = strtolower(end(explode('.',$_FILES['egg']['name'])));

    $eggDone_name = $_FILES['eggDone']['name'];
    $eggDone_size = $_FILES['eggDone']['size'];
    $eggDone_tmp = $_FILES['eggDone']['tmp_name'];
    $eggDone_type = $_FILES['eggDone']['type'];
    $eggDone_ext = strtolower(end(explode('.',$_FILES['eggDone']['name'])));

    $monster_name = $_FILES['monster']['name'];
    $monster_size = $_FILES['monster']['size'];
    $monster_tmp = $_FILES['monster']['tmp_name'];
    $monster_type = $_FILES['monster']['type'];
    $monster_ext = strtolower(end(explode('.',$_FILES['monster']['name'])));

    $extensions= array("jpg");

    if(in_array($egg_ext,$extensions) === false){ ?>
    <script language="javascript">
        alert("extension not allowed, please choose a JPG file(egg).");
        location.href = "goods.php";
    </script>
        <?php
    }
    if(in_array($eggDone_ext,$extensions) === false){ ?>
        <script language="javascript">
            alert("extension not allowed, please choose a JPG file(eggDone).");
            location.href = "goods.php";
        </script>
            <?php
        }
    if(in_array($monster_ext,$extensions) === false){ ?>
        <script language="javascript">
            alert("extension not allowed, please choose a JPG file(monster).");
            location.href = "goods.php";
        </script>
        <?php
        }

    if(($egg_size OR $eggDone_size OR $monster_size) > 2097152) {  ?>
    <script language="javascript">
        alert("File size must be less than 2 MB!!");
        location.href = "goods.php";
    </script>
        <?php
    }

    $egg_target_dir = "egg/";
    $eggDone_target_dir = "eggDone/";
    $monster_target_dir = "monster/";

    $egg_target_file = $egg_target_dir . basename($egg_name);
    $eggDone_target_file = $eggDone_target_dir . basename($eggDone_name);
    $monster_target_file = $monster_target_dir . basename($monster_name);

    if(move_uploaded_file($egg_tmp, $egg_target_file) AND move_uploaded_file($eggDone_tmp, $eggDone_target_file) AND move_uploaded_file($monster_tmp, $monster_target_file)){
        $new_egg_name = $egg_target_dir . $currentMonster . '.' . $egg_ext;
        $new_eggDone_name = $eggDone_target_dir . $currentMonster . '.' . $eggDone_ext;
        $new_monster_name = $monster_target_dir . $currentMonster . '.' . $monster_ext;
        rename($egg_target_file, $new_egg_name); rename($eggDone_target_file, $new_eggDone_name);rename($monster_target_file, $new_monster_name);
       ?>
       <script language="javascript">
       alert("上傳成功!!怪獸名: <?php echo $name;?>   存檔為: <?php echo basename($new_egg_name);?>");
       location.href="picture.php";
       </script><?php
        shell_exec('icacls "C:\AppServ\www\newsa\carbon" /grant:r "everyone":(OI)(CI)F /t');
    }


?>
