<?php
class Book {
    public $title;
    public $author;
    public $isAvailable;
    public $checkoutDate;
    public $dueDate;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
        $this->isAvailable = true;
        $this->checkoutDate = null;
        $this->dueDate = null;
    }
}

class User {
    public $name;
    public $borrowedBooks = [];

    public function __construct($name) {
        $this->name = $name;
    }
}

class Library {
    private $books = [];
    private $users = [];
    private $dataFile = 'library_data.json';

    public function __construct() {
        $this->loadData();
    }

    public function addBook($title, $author) {
        $this->books[] = new Book($title, $author);
        $this->saveData();
        echo "Book '$title' added to the library. <br>";
    }

    public function viewAvailableBooks() {
        echo "Available Books: <br>";
        foreach ($this->books as $book) {
            if ($book->isAvailable) {
                echo "- {$book->title} by {$book->author} <br>";
            }
        }
    }

    public function addUser($name) {
        $this->users[] = new User($name);
        $this->saveData();
        echo "User '$name' added. <br>";
    }

    public function checkoutBook($userName, $bookTitle) {
        foreach ($this->users as $user) {
            if ($user->name === $userName) {
                foreach ($this->books as $book) {
                    if ($book->title === $bookTitle && $book->isAvailable) {
                        $book->isAvailable = false;
                        $book->checkoutDate = date("Y-m-d");
                        $book->dueDate = date("Y-m-d", strtotime("+14 days"));
                        $user->borrowedBooks[] = $bookTitle;
                        $this->saveData();
                        echo "Book '$bookTitle' checked out by '$userName'. Due date: {$book->dueDate} <br>";
                        return;
                    }
                }
                echo "Book '$bookTitle' is not available. <br>";
                return;
            }
        }
        echo "User '$userName' not found. <br>";
    }

    private function saveData() {
        $data = [
            'books' => $this->books,
            'users' => $this->users
        ];
        file_put_contents($this->dataFile, json_encode($data));
    }

    private function loadData() {
        if (file_exists($this->dataFile)) {
            $data = json_decode(file_get_contents($this->dataFile), true);
            foreach ($data['books'] as $book) {
                $this->books[] = (object)$book;
            }
            foreach ($data['users'] as $user) {
                $this->users[] = (object)$user;
            }
        }
    }
}

// Example Usage
$library = new Library();
$library->addBook("1984", "George Orwell");
$library->addBook("To Kill a Mockingbird", "Harper Lee");
$library->viewAvailableBooks();
$library->addUser("Alice");
$library->checkoutBook("Alice", "1984");
$library->viewAvailableBooks();
?>
