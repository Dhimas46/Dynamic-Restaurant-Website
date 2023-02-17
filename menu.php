<?php
  define("TITLE", "Menu | Franklin's Fine Dining");
  include('includes/header.php');
 ?>

<div id="menu-items">

  <h1>Our Delicious Menu</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam ipsum facere laudantium dolor veniam velit, illo, accusantium error dignissimos asperiores nulla nesciunt pariatur vero iste rerum tenetur non laboriosam nisi!</p>
  <p><em>Click any menu item to learn more about it.</em></p>

  <hr>


  <ul>
    <?php foreach ($menuItems as $dish => $item) { ?>

    <li>
      <a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item["title"]; ?></a>
      <sup>$</sup><?php echo $item["price"] ?>
    </li>

    <?php } ?>
  </ul>

  <hr>

</div><!-- #menu-items -->

 <?php
  include('includes/footer.php');
  ?>
