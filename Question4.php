
<?php

/*
Create a PHP program that consists of two forms : one using GET
method to search for an item in a list {eg. grocery list}
nad another using the POST method to add a new item to the list
after the  new item is added via post, it should appear in the 
result of the GET search . Ensure both functionalities are 
working on the same  page.

*/

// Initialize the grocery list, either from session or default list
session_start();

if (!isset($_SESSION['grocery_list'])) {
    $_SESSION['grocery_list'] = ["Apples", "Bananas", "Oranges", "Milk"];
}

// Add new item to the list via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_item'])) {
    $new_item = trim($_POST['new_item']);
    if (!empty($new_item)) {
        $_SESSION['grocery_list'][] = $new_item;  // Add item to session
    }
}



// Handle GET search functionality
$search_result = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search_item'])) {
    $search_item = trim($_GET['search_item']);
    if (!empty($search_item)) {
        foreach ($_SESSION['grocery_list'] as $item) {
            if (stripos($item, $search_item) !== false) {
                $search_result[] = $item;
            }
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery List</title>
</head>
<body>
    <h1>Grocery List</h1>

    <!-- Form to add new item using POST -->
    <h2>Add Item to List</h2>
    <form method="POST" action="">
        <label for="new_item">New Item: </label>
        <input type="text" id="new_item" name="new_item" required>
        <button type="submit">Add Item</button>
    </form>

    <!-- Form to search for an item using GET -->
    <h2>Search for an Item</h2>
    <form method="GET" action="">
        <label for="search_item">Search: </label>
        <input type="text" id="search_item" name="search_item">
        <button type="submit">Search</button>
    </form>

    <!-- Display the search results if any -->
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search_item'])): ?>
        <h3>Search Results:</h3>
        <?php if (count($search_result) > 0): ?>
            <ul>
                <?php foreach ($search_result as $result): ?>
                    <li><?php echo htmlspecialchars($result); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No matching items found.</p>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Display the entire grocery list -->
    <h3>Full Grocery List:</h3>
    <ul>
        <?php foreach ($_SESSION['grocery_list'] as $item): ?>
            <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
    </ul>

        <!---  htmlspecialchars($item) is used to prevent XSS (Cross-site scripting) attacks
            // by encoding special characters (like <, >, and &).->
</body>
</html>
