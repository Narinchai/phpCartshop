
<?php

$current_page = basename($_SERVER['PHP_SELF']); // Get the current page file name

// Define an array of menu items with their corresponding links
$menu_items = array(
    'Home' => 'index.php',
    'Member' => 'show_member.php',
    'Product' => 'show_product.php',
    'Services' => 'fr_member.php',
    'Servicess' => 'fr_product.php',
    'Cart' => 'cart.php'
);
?>
<div class="container">

<!-- Example navigation menu using Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php foreach ($menu_items as $title => $link): ?>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page === $link): ?>active<?php endif; ?>" href="<?php echo $link; ?>"><?php echo $title; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <form class="d-flex" method="POST" action="search_product.php">
      <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    </div>
</nav>
</div>