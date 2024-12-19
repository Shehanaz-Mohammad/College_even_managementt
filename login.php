<?php
session_start();

$host = 'localhost';
$db = 'main';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo "Please fill in both fields.";
    } else {
        // Check in users table
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $passwordHash);
            $stmt->fetch();
            if (password_verify($password, $passwordHash)) {
                $_SESSION['username'] = $email;
                header('Location: student_home.php');
                exit();
            } else {
                echo "Incorrect password for users.";
            }
        } else {
            // Check in faculty table
            $stmt = $conn->prepare("SELECT id, password FROM faculty WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $passwordHash);
                $stmt->fetch();
                if (password_verify($password, $passwordHash)) {
                    $_SESSION['username'] = $email;
                    header('Location: faculty_home.php');
                    exit();
                } else {
                    echo "Incorrect password for faculty.";
                }
            } else {
                // Check in organizers table
                $stmt = $conn->prepare("SELECT id, password FROM organizers WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($id, $passwordHash);
                    $stmt->fetch();
                    if (password_verify($password, $passwordHash)) {
                        $_SESSION['username'] = $email;
                        header('Location: organizer_home.php');
                        exit();
                    } else {
                        echo "Incorrect password for organizers.";
                    }
                } else {
                    echo "No user found with this email.";
                }
            }
        }
        $stmt->close();
    }
}
$conn->close();
?>
