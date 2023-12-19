# Parking Management System - DBMS Project 🅿️🚗

## Overview

Welcome to the Parking Management System GitHub repository! This project is a comprehensive database management system for efficient and organized parking management. The system is built using HTML, CSS, JavaScript, and PHP, providing a user-friendly interface for both administrators and users.

## Features

- **User-friendly Interface:** Intuitive design for easy navigation.
- **Vehicle Registration:** Users can register their vehicles with relevant details.
- **Parking Slot Reservation:** Users can reserve parking slots in advance.
- **Transaction History:** Record of all parking transactions for transparency.

## Technologies Used

- **HTML:** Markup language for structuring web content.
- **CSS:** Stylesheet language for enhancing the presentation of the web pages.
- **JavaScript:** Programming language for dynamic content and client-side functionalities.
- **PHP:** Server-side scripting language for processing user inputs and database interactions.
- **MySQL:** Relational database management system for storing and retrieving data.

## Setup Instructions

1. **Setup Xampp**
    - download [XAMPP](https://www.apachefriends.org/download.html).
    - start Apache and Mysql server in Xampp *if sql server doesnot runs: stop sql running in background via task manager or (for mac users) `sudo killall mysqld` command in terminal*
    - run localhost in browser to check if Xampp is running

2. **Clone the Repository:**
    - open `htdocs` folder in the xampp files and run the following command
    ```bash
    git clone https://github.com/TarushGupta23/Parking-Management-System
    ```

3. **Database Setup:**
    - go to `PhpMyAdmin` in browser local host and create a new database named `ParkingManagement`
    - Import the provided SQL file (`ParkingManagement.sql`) into your MySQL server.

4. **Run the Application:**
    - Start a local server or deploy the project on a web server.

5. **Access the Application:**
    - run `index.html`
    - to login as administrator use `admin@gmail.com` and password: `admin`


## Screenshots 📸

<img align="center" alt="Loading Screenshots..." width="70%" src="https://github.com/TarushGupta23/storage/blob/main/parkingManagementSystem_slider.gif" align="center">

## Structure

1. **ER Diagram**
  
  <img alt="Loading Screenshots..." width="60%" src="https://github.com/TarushGupta23/storage/blob/main/parkingManagementSystem_ER.jpeg">
   
2. **Relational Schema**
  
  <img alt="Loading Screenshots..." width="60%" src="https://github.com/TarushGupta23/storage/blob/main/parkingManagementSystem_relational.jpeg">

Feel free to explore, contribute, and enhance the Parking Management System! If you have any issues or suggestions, please open an [issue](https://github.com/TarushGupta23/Parking-Management-System/issues).
