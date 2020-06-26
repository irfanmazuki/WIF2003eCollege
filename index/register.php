<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="reg_style.css">
    </head>
    <body>
        <div class="reg">
            <h1>Registration</h1>
        </div>
        <div class="main">
            <form action="register_check.php" method="post">
            <?php
              if (isset($_GET['err'])){
                if ($_GET['err']=='null') {
                  echo '<p id=\'null\'>Make sure all the fields are filled!</p>';
                }
                elseif ($_GET['err']=='invemail') {
                  echo "<p id=\"invemail\">Please enter a valid E-mail</p>";
                }
                elseif ($_GET['err']=='pass') {
                  echo "<p id=\"pass\">Password Mismatch!</p>";
                }
                elseif ($_GET['err']=='taken') {
                  echo "<p id=\"taken\">E-mail is already in use. Please enter another email.</p>";
                }
              }
             ?>

              <div id="name">
                <h2 class="name">Name</h2>
                <input class="firstname" type="text" name="fullname"
                <?php if (isset($_GET['err'])) {
                  echo "value=\"".$_GET['fullname']."\"";
                } ?>>
            </div>

            <h2 class="name">Gender</h2>
            <select class="gender" name="gender">
                <option disabled="disabled" selected="selected">--Select Gender</option>
                <option value="male"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['gender']=='male'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>
                > Male </option>
                <option value="female"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['gender']=='female'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>
                > Female </option>
            </select>

            <h2 class="name">Matric No.</h2>
            <input class="matric" type="text" name="matric"
            <?php if (isset($_GET['err'])) {
              echo "value=\"".$_GET['matric']."\"";
            } ?>>

            <h2 class="name">IC No.</h2>
            <input class="ic" type="text" name="ic"
            <?php if (isset($_GET['err'])) {
              echo "value=\"".$_GET['ic']."\"";
            } ?>>

            <h2 class="name">Phone No.</h2>
            <input class="number" type="text" name="phone"
            <?php if (isset($_GET['err'])) {
              echo "value=\"".$_GET['phone']."\"";
            } ?>>

            <h2 class="name">Nationality</h2>
            <select class="nation" name="nationality">
                <option disabled="disabled" selected="selected">--Choose Nationality</option>
                <option value="National Citizen"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['nationality']=='National Citizen'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>
                > National Citizen </option>
                <option value="Foreigner"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['nationality']=='Foreigner'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>
                > Foreigner </option>
            </select>

            <h2 class="name">Country</h2>
            <select class="country" name="country">
                <option disabled="disabled" selected="selected">--Choose Country</option>
                <option value="Malaysia"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['country']=='Malaysia'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Malaysia </option>
                <option value="South Korea"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['country']=='South Korea'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> South Korea </option>
                <option value="China"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['country']=='China'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> China </option>
                <option value="India"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['country']=='India'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> India </option>
                <option value="Indonesia"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['country']=='Indonesia'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Indonesia </option>
                <option value="United States"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['country']=='United States'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> United States </option>
            </select>

            <h2 class="name">Address</h2>
            <input class="address" type="text" name="address"
            <?php if (isset($_GET['err'])) {
              echo "value=\"".$_GET['address']."\"";
            } ?>>

            <h2 class="name">City</h2>
            <input class="city" type="text" name="city"
            <?php if (isset($_GET['err'])) {
              echo "value=\"".$_GET['city']."\"";
            } ?>>

            <h2 class="name">State</h2>
            <input class="state" type="text" name="state"
            <?php if (isset($_GET['err'])) {
              echo "value=\"".$_GET['state']."\"";
            } ?>>

            <h2 class="name">Poscode</h2>
            <input class="poscode" type="text" name="poscode"
            <?php if (isset($_GET['err'])) {
              echo "value=\"".$_GET['poscode']."\"";
            } ?>>

            <h2 class="res">Residential College</h2>
            <select class="rcol" name="r_college">
                <option disabled="disabled" selected="selected">--Choose Residential College</option>
                <option value="KK1"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK1'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> First Residential College </option>
                <option value="KK2"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK2'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Second Residential College </option>
                <option value="KK3"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK3'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Third Residential College </option>
                <option value="KK4"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK4'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Fourth Residential College </option>
                <option value="KK5"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK5'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Fifth Residential College </option>
                <option value="KK6"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK6'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Sixth Residential College </option>
                <option value="KK7"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK7'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Seventh Residential College </option>
                <option value="KK8"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK8'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Eigtht Residential College </option>
                <option value="KK9"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK9'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Nineth Residential College </option>
                <option value="KK10"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK10'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Tenth Residential College </option>
                <option value="KK11"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK11'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Eleventh Residential College </option>
                <option value="KK12"
                <?php
                  if (isset($_GET['err'])) {
                    if($_GET['r_college']=='KK12'){
                      echo 'selected=\'selected\'';
                    }
                  }
                 ?>> Twelve Residential College </option>
            </select>

            <h2 class="room-label">Room</h2>
            <input class="room" type="text" name="room"
            <?php if (isset($_GET['err'])) {
              echo "value=\"".$_GET['room']."\"";
            } ?>>

            <h2 class="name">Email</h2>
            <input class="email" type="text" name="email">

            <h2 class="name">Password</h2>
            <input class="pass" type="password" name="pass">

            <h2 class="name">Reenter-Password</h2>
            <input class="re-pass" type="password" name="re-pass">

            <input type="submit" name="register-check" value="Register">

            <a href="homepage.php">
                <button type="button">Cancel</button>
            </a>
            </form>
        </div>
    </body>
</html>
