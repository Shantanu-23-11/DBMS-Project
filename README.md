# 🚆 Railway Reservation System

![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)

A web-based **Database Management System (DBMS) Mini Project** that enables users to register, authenticate, book train tickets, and view their booked reservations using **HTML, CSS, JavaScript, PHP, and MySQL** on a local **XAMPP** server.

---

## 📑 Table of Contents

1. [Project Overview](#-project-overview)
2. [Problem Statement & Objectives](#-problem-statement--objectives)
3. [Technologies Used](#-technologies-used)
4. [Features Implemented](#-features-implemented)
5. [Project Folder Structure](#-project-folder-structure)
6. [System Requirements & Prerequisites](#-system-requirements--prerequisites)
7. [Installation & Setup Instructions (XAMPP)](#-installation--setup-instructions-xampp)
   - [Step 1: Place Project in XAMPP `htdocs`](#step-1-place-project-in-xampp-htdocs)
   - [Step 2: Start Apache and MySQL](#step-2-start-apache-and-mysql)
   - [Step 3: Create or Import the MySQL Database (`phpMyAdmin`)](#step-3-create-or-import-the-mysql-database-phpmyadmin)
   - [Step 4: Configure PHP Database Connectivity](#step-4-configure-php-database-connectivity)
   - [Step 5: Run the Website on `localhost`](#step-5-run-the-website-on-localhost)
8. [Database Workflow & Architecture](#-database-workflow--architecture)
9. [Testing & Verification Steps](#-testing--verification-steps)
10. [Known Limitations](#-known-limitations)
11. [Future Enhancements](#-future-enhancements)
12. [Author](#-author)

---

## 📖 Project Overview

The **Railway Reservation System** is a relational database web application developed as a college **DBMS Mini Project**. It demonstrates core database operations—such as inserting user records, authenticating credentials with password hashing, recording ticket reservations linked to users and trains, and retrieving joined relational data (`INNER JOIN`)—through a clean web interface powered by PHP and MySQL.

---

## 🎯 Problem Statement & Objectives

### Problem Statement
Manual railway ticket record-keeping is error-prone, slow, and difficult to query when tracking passenger bookings across multiple train routes and travel dates. A centralized relational database system is needed to manage registered users, available train routes, and passenger ticket bookings efficiently.

### Project Objectives
- Design and implement a relational MySQL database (`train`) linking **users**, **trains**, and **tickets**.
- Provide secure user registration and login functionality using PHP password hashing (`password_hash` and `password_verify`) and session management (`$_SESSION`).
- Enable authenticated passengers to book train tickets for specific routes and dates with automatic seat number assignment.
- Retrieve and display user-specific booked ticket details by joining the `tickets` and `trains` tables using SQL `JOIN` queries.

---

## 🛠️ Technologies Used

| Layer | Technology | Purpose |
| :--- | :--- | :--- |
| **Frontend** | HTML5 | Structure for home, login, signup, ticket booking, and ticket viewing pages |
| **Styling** | CSS3 (`style.css`) | Responsive layout, header navigation, form containers, and tabular data styling |
| **Client Scripting** | JavaScript (Inline) | Browser alert notifications (`alert()`) and page redirection (`window.location`) |
| **Backend** | PHP | Server-side form handling, session management, password hashing, and SQL execution |
| **Database** | MySQL (via `mysqli`) | Relational storage for `users`, `trains`, and `tickets` tables |
| **Local Server** | XAMPP (Apache + MySQL) | Local development environment for executing PHP scripts and hosting MySQL |

---

## ✨ Features Implemented

Based on the project source code, the following features are implemented:

1. **Landing Page Navigation (`index.html`)**
   - Central navigation header and quick-action buttons linking to **Login**, **Sign Up**, **Book Ticket**, and **View Booked Ticket**.
2. **User Registration (`signup.html`, `signup.php`)**
   - Collects full name, email, phone number, and password.
   - Hashes user passwords using PHP's `password_hash($password, PASSWORD_DEFAULT)` before storing them in the `users` table.
3. **User Authentication & Sessions (`login.html`, `login.php`)**
   - Authenticates users by looking up their email in the `users` table and verifying the hashed password using `password_verify()`.
   - Stores `user_id` and `name` in PHP `$_SESSION` variables and redirects authenticated users to the ticket booking page.
4. **Train Ticket Booking (`book_ticket.html`, `book_ticket.php`)**
   - Verifies that a user is logged in via `$_SESSION['user_id']` before allowing a booking.
   - Allows selection from three train routes:
     - `Express 101 (Mumbai → Pune)`
     - `Superfast 102 (Nagpur → Delhi)`
     - `Passenger 103 (Chennai → Bangalore)`
   - Captures journey date, passenger full name, age, and gender (`Male`, `Female`, `Other`).
   - Automatically generates a seat number (`S1` to `S100`) using `"S" . rand(1, 100)` and stores the booking in the `tickets` table.
5. **Dynamic Booked Tickets View (`view_ticket.php` & static preview `view_ticket.html`)**
   - Queries all tickets belonging to the logged-in user (`WHERE t.user_id = '$user_id'`) using an SQL `JOIN` between `tickets` and `trains`.
   - Displays **Ticket ID**, **Train Name**, **From (Source)**, **To (Destination)**, **Date**, **Seat No**, and **Passenger Name** in a formatted HTML table.

---

## 📂 Project Folder Structure

```text
DBMS/
├── book_ticket.html    # Frontend form to select a train and enter passenger details
├── book_ticket.php     # Backend handler to validate session, assign seat, and insert ticket into MySQL
├── db_connect.php      # MySQL database connection script using PHP mysqli
├── index.html          # Main landing page with links to Login, Sign Up, Book Ticket, and View Ticket
├── login.html          # Frontend user login form
├── login.php           # Backend login handler (verifies password hash and starts PHP session)
├── signup.html         # Frontend user registration form
├── signup.php          # Backend registration handler (hashes password and inserts into users table)
├── style.css           # Shared stylesheet for all HTML and PHP pages
├── view_ticket.html    # Static HTML preview template for the booked tickets table
├── view_ticket.php     # Dynamic PHP page displaying the logged-in user's booked tickets via SQL JOIN
└── README.md           # Project documentation
```

---

## 💻 System Requirements & Prerequisites

- **Operating System:** Windows, macOS, or Linux
- **Web Server Environment:** [XAMPP](https://www.apachefriends.org/) (v7.4+ or v8.x recommended) containing:
  - **Apache HTTP Server**
  - **MySQL / MariaDB**
  - **PHP** (with `mysqli` extension enabled, included by default in XAMPP)
  - **phpMyAdmin**
- **Web Browser:** Google Chrome, Mozilla Firefox, Microsoft Edge, or Safari

---

## 🚀 Installation & Setup Instructions (XAMPP)

### Step 1: Place Project in XAMPP `htdocs`

1. Install **XAMPP** on your computer (default Windows path: `C:\xampp`).
2. Clone or copy this project folder into the XAMPP `htdocs` directory:
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/Shantanu-23-11/DBMS-Project.git DBMS
   ```
   *(Alternatively, copy the existing `DBMS` project folder directly into `C:\xampp\htdocs\DBMS`.)*
3. Verify that your project files (`index.html`, `db_connect.php`, etc.) are located inside:
   ```text
   C:\xampp\htdocs\DBMS\
   ```

---

### Step 2: Start Apache and MySQL

1. Open the **XAMPP Control Panel**.
2. Click **Start** next to **Apache**.
3. Click **Start** next to **MySQL**.
4. Wait until both module names turn **green**, confirming that the web server and MySQL database server are running.

---

### Step 3: Create or Import the MySQL Database (`phpMyAdmin`)

> **Note:** An exported `.sql` file is **not included** in this repository. Follow **Option A** below if you are migrating an existing database from another machine, or **Option B** to create the required `train` database and tables directly in phpMyAdmin based on the project's PHP queries.

#### Option A: Exporting & Importing an Existing Database via `phpMyAdmin`

**To Export from the Original Computer:**
1. Open your browser and go to [`http://localhost/phpmyadmin/`](http://localhost/phpmyadmin/).
2. Select the **`train`** database from the left sidebar.
3. Click the **Export** tab in the top menu.
4. Keep the export method set to **Quick** and format set to **SQL**, then click **Export** (or **Go**) to download `train.sql`.

**To Import on Another Computer:**
1. Open [`http://localhost/phpmyadmin/`](http://localhost/phpmyadmin/) on the target computer.
2. Click **New** in the left sidebar, enter **`train`** as the database name, and click **Create**.
3. Select the newly created **`train`** database and click the **Import** tab in the top menu.
4. Click **Choose File**, select your exported `train.sql` file, and click **Import** (or **Go**) at the bottom of the page.

#### Option B: Create the Database from Scratch Using SQL (Derived from Source Code)

If you do not have an existing `train.sql` file, you can recreate the exact schema referenced by `signup.php`, `login.php`, `book_ticket.html`, `book_ticket.php`, and `view_ticket.php`:

1. Open [`http://localhost/phpmyadmin/`](http://localhost/phpmyadmin/).
2. Click the **SQL** tab at the top, paste the following SQL script, and click **Go**:

```sql
-- 1. Create and select the 'train' database
CREATE DATABASE IF NOT EXISTS train;
USE train;

-- 2. Create 'users' table (used in signup.php and login.php)
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- 3. Create 'trains' table (joined in view_ticket.php and referenced in book_ticket.html)
CREATE TABLE IF NOT EXISTS trains (
    train_id INT PRIMARY KEY,
    train_name VARCHAR(100) NOT NULL,
    source VARCHAR(100) NOT NULL,
    destination VARCHAR(100) NOT NULL
);

-- 4. Insert the 3 trains matching book_ticket.html options
INSERT INTO trains (train_id, train_name, source, destination) VALUES
(1, 'Express 101', 'Mumbai', 'Pune'),
(2, 'Superfast 102', 'Nagpur', 'Delhi'),
(3, 'Passenger 103', 'Chennai', 'Bangalore');

-- 5. Create 'tickets' table (used in book_ticket.php and view_ticket.php)
CREATE TABLE IF NOT EXISTS tickets (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    train_id INT NOT NULL,
    journey_date DATE NOT NULL,
    passenger_name VARCHAR(100) NOT NULL,
    passenger_age INT NOT NULL,
    passenger_gender VARCHAR(20) NOT NULL,
    seat_no VARCHAR(10) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (train_id) REFERENCES trains(train_id) ON DELETE CASCADE
);
```

---

### Step 4: Configure PHP Database Connectivity

The database connection is managed in **`db_connect.php`**. Open `C:\xampp\htdocs\DBMS\db_connect.php` in a text editor and verify that the MySQL credentials match your local XAMPP configuration:

```php
<?php
$host = "localhost";    // MySQL server host
$user = "root";         // Default XAMPP MySQL username
$pass = "";             // Set to "" for default XAMPP (or your configured MySQL root password)
$db   = "train";        // Database name

$conn = new mysqli($host, $user, $pass, $db);
```

- **Important:** On a fresh XAMPP installation, the default `root` password (`$pass`) is an empty string (`""`). If you have configured a custom MySQL root password in XAMPP, update `$pass` accordingly. Never commit real production passwords to version control.

---

### Step 5: Run the Website on `localhost`

1. Ensure **Apache** and **MySQL** are running in the XAMPP Control Panel.
2. Open your web browser and navigate to:
   ```text
   http://localhost/DBMS/index.html
   ```
   *(If your folder inside `htdocs` is named `DBMS-Project`, visit `http://localhost/DBMS-Project/index.html` instead.)*

---

## 🔄 Database Workflow & Architecture

### Entity-Relationship Overview

```text
+-------------------+          +-------------------+          +-------------------+
|       users       |          |      tickets      |          |      trains       |
+-------------------+          +-------------------+          +-------------------+
| PK user_id        |1        *| PK ticket_id      |*        1| PK train_id       |
|    name           |----------| FK user_id        |----------|    train_name     |
|    email          |          | FK train_id       |          |    source         |
|    phone          |          |    journey_date   |          |    destination    |
|    password       |          |    passenger_name |          +-------------------+
+-------------------+          |    passenger_age  |
                               |    passenger_gender|
                               |    seat_no        |
                               +-------------------+
```

### How the Website Communicates with MySQL

1. **Database Connection (`db_connect.php`)**
   - Every backend PHP script includes `db_connect.php` using `include 'db_connect.php';`, instantiating a `$conn = new mysqli(...)` connection to the `train` database.
2. **User Sign Up (`signup.html` → `signup.php`)**
   - `signup.html` sends a `POST` request to `signup.php`.
   - `signup.php` hashes the plain-text password via `password_hash()` and executes:
     ```sql
     INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$pass')
     ```
3. **User Login (`login.html` → `login.php`)**
   - `login.html` sends `email` and `password` via `POST` to `login.php`.
   - `login.php` executes `SELECT * FROM users WHERE email='$email'`, verifies the password hash with `password_verify()`, stores `$_SESSION['user_id']` and `$_SESSION['name']`, and redirects to `book_ticket.html`.
4. **Ticket Reservation (`book_ticket.html` → `book_ticket.php`)**
   - `book_ticket.php` checks `isset($_SESSION['user_id'])` to ensure only logged-in users can book.
   - It generates a seat number (`"S" . rand(1, 100)`) and executes:
     ```sql
     INSERT INTO tickets (user_id, train_id, journey_date, passenger_name, passenger_age, passenger_gender, seat_no)
     VALUES ('$user_id', '$train_id', '$date', '$pname', '$age', '$gender', '$seat_no')
     ```
   - On success, it redirects the user to `view_ticket.php`.
5. **Viewing Booked Tickets (`view_ticket.php`)**
   - `view_ticket.php` reads `$_SESSION['user_id']` and runs a relational `INNER JOIN` query across `tickets` and `trains`:
     ```sql
     SELECT t.ticket_id, tr.train_name, tr.source, tr.destination, t.journey_date, t.seat_no, t.passenger_name 
     FROM tickets t 
     JOIN trains tr ON t.train_id = tr.train_id 
     WHERE t.user_id = '$user_id'
     ```
   - The returned rows are iterated with `$result->fetch_assoc()` and rendered dynamically inside an HTML table.

---

## ✅ Testing & Verification Steps

Follow these steps to verify that the setup and database connectivity are working end-to-end:

1. **Verify Database Connection (`db_connect.php`)**
   - Visit `http://localhost/DBMS/db_connect.php` in your browser.
   - **Expected Result:** You should see the message: `✅ Connected Successfully to train database!`.
2. **Test User Registration (`signup.html`)**
   - Visit `http://localhost/DBMS/signup.html`.
   - Fill in **Full Name**, **Email**, **Phone Number**, **Password**, and **Confirm Password**, then click **Sign Up**.
   - **Expected Result:** A browser alert `Signup Successful! Please login.` appears and redirects you to `login.html`. Check `phpMyAdmin` → `train` → `users` to verify the new row and hashed password.
3. **Test User Login (`login.html`)**
   - Enter the registered **Email** and **Password** on `http://localhost/DBMS/login.html` and click **Login**.
   - **Expected Result:** You are authenticated and redirected to `book_ticket.html`.
4. **Test Ticket Booking (`book_ticket.html`)**
   - Select a train (e.g., `Express 101 (Mumbai → Pune)`), pick a **Date of Journey**, enter **Passenger Name**, **Age**, and **Gender**, and click **Book Ticket**.
   - **Expected Result:** An alert `Ticket booked successfully!` appears and redirects you to `view_ticket.php`.
5. **Verify Dynamic Ticket Listing (`view_ticket.php`)**
   - On `http://localhost/DBMS/view_ticket.php`, verify that your newly booked ticket is listed with its generated **Ticket ID**, **Train Name**, **Source**, **Destination**, **Date**, **Seat No** (`S1`–`S100`), and **Passenger Name**.

---

## ⚠️ Known Limitations

Based on an inspection of the current codebase, the following limitations exist:

1. **No `.sql` Export File in Repository:** The repository does not include a pre-exported `.sql` dump file (use the SQL setup script in [Step 3](#step-3-create-or-import-the-mysql-database-phpmyadmin) to create the tables).
2. **Home Page "View Booked Ticket" Link Target:** In `index.html`, the **View Booked Ticket** button links to the static preview page `view_ticket.html` (which contains hardcoded sample rows) rather than the dynamic PHP page `view_ticket.php`. Navigate to `http://localhost/DBMS/view_ticket.php` (or book a ticket) to view live database records.
3. **Connection Confirmation Output in `db_connect.php`:** `db_connect.php` outputs `echo "✅ Connected Successfully to train database!";` on every connection, which prints at the top of included PHP pages and can interfere with `header("Location: ...")` redirects if PHP output buffering (`output_buffering`) is turned off.
4. **Static Train List in Booking Form:** `book_ticket.html` uses hardcoded `<option>` values (`1`, `2`, `3`) rather than fetching train routes dynamically from the `trains` table.
5. **Random Seat Assignment:** `book_ticket.php` assigns seat numbers randomly using `rand(1, 100)` without checking whether that seat is already occupied for the selected train and date.
6. **Password Confirmation & Prepared Statements:** The `confirm_password` field in `signup.html` is not validated against `password` before submission, and SQL queries use direct variable interpolation instead of parameterized prepared statements (`mysqli_prepare`).
7. **No Logout Script:** Once a session is started in `login.php`, there is no dedicated logout button or `logout.php` endpoint to destroy the session.

---

## 🔮 Future Enhancements

- **Ticket Cancellation & Modification:** Allow users to cancel booked tickets or update passenger details (`DELETE` and `UPDATE` SQL operations).
- **Dynamic Train Search & Availability:** Populate train options dynamically from the `trains` table and track real-time remaining seat counts per train and journey date.
- **Prepared Statements for SQL Security:** Refactor queries in `signup.php`, `login.php`, `book_ticket.php`, and `view_ticket.php` to use `mysqli` prepared statements (`prepare()` and `bind_param()`) to prevent SQL injection.
- **Session Logout & Navigation State:** Add a `logout.php` script (`session_destroy()`) and dynamically display the logged-in user's name in the header.
- **Admin Dashboard:** Add an administrator portal to add/edit train schedules, routes, and view all passenger reservations.
- **Printable E-Ticket / PDF Export:** Allow passengers to download or print a formatted ticket receipt with PNR/Ticket ID details.

---

## 👤 Author

**Shantanu Modi**
- GitHub: [@Shantanu-23-11](https://github.com/Shantanu-23-11)
- Repository: [DBMS-Project](https://github.com/Shantanu-23-11/DBMS-Project)

