<?php 

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./login.css" />
    <title>Login page</title>
  </head>
  <body>

      <header>
      <a href="./index.html">
        <h1>BockPlam</h1>
      </a>
    </header>
    <section>

      <div id="wave"></div>
      <form action="recovery_.php" method = "post" class="forget-pass"></form>
        <fieldset>
          <header><H2>Recover Password</H2></header>
          <input type="email" name="email" required placeholder="Enter User Email" />
          
          <button type="submit">Reset</button>
          
          </fieldset>
      </form>
    </section>
  </body>
</html>
