<?php

// Define the Book class
class Book {
    // Private properties
    private $title;
    private $author;
    private $price;

    // Getter method for title
    public function getTitle() {
        return $this->title;
    }

    // Setter method for title with validation
    public function setTitle($title) {
        if (empty($title)) {
            echo "Title cannot be empty.<br>";
        } else {
            $this->title = $title;
        }
    }

    // Getter method for author
    public function getAuthor() {
        return $this->author;
    }

    // Setter method for author with validation
    public function setAuthor($author) {
        if (empty($author)) {
            echo "Author cannot be empty.<br>";
        } else {
            $this->author = $author;
        }
    }

    // Getter method for price
    public function getPrice() {
        return $this->price;
    }

    // Setter method for price with validation
    public function setPrice($price) {
        if ($price < 0) {
            echo "Price cannot be negative.<br>";
        } else {
            $this->price = $price;
        }
    }

    // Method to display book details
    public function displayDetails() {
        echo "Title: " . $this->getTitle() . "<br>";
        echo "Author: " . $this->getAuthor() . "<br>";
        echo "Price: $" . $this->getPrice() . "<br><br>";
    }
}

// Create multiple Book objects
$book1 = new Book();
$book2 = new Book();
$book3 = new Book();

// Set properties using setter methods
$book1->setTitle("The Great Gatsby");
$book1->setAuthor("F. Scott Fitzgerald");
$book1->setPrice(10.99);

$book2->setTitle("1984");
$book2->setAuthor("George Orwell");
$book2->setPrice(9.99);

$book3->setTitle("To Kill a Mockingbird");
$book3->setAuthor("Harper Lee");
$book3->setPrice(-5);  // Invalid price, will show error

// Display details using getter methods
$book1->displayDetails();
$book2->displayDetails();
$book3->displayDetails();  // Invalid price, may not display properly

?>
