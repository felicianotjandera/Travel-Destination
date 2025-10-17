# Travel-Destination - A Dynamic Travel Website

A full-stack web application for showcasing travel destinations, built with PHP for the backend and HTML/CSS for the frontend. The project features a public-facing site to display destinations and a private admin dashboard for content management.

---

## ✨ Features

This project is divided into two main parts: a frontend for users and a backend for administrators.

###  Frontend (User View)
- Displays a list of all travel destinations in a visually appealing layout.
- Fetches data dynamically from the database, ensuring content is always up-to-date.
- Provides a simple and intuitive interface for users to browse travel spots.

### Backend (Admin Dashboard)
- **Secure Access**: A dedicated dashboard for administrators.
- **Full CRUD Functionality**:
    - **Create**: Add new travel destinations with details like name, description, and images.
    - **Read**: View a complete list of all destinations in a table.
    - **Update**: Edit the information of existing destinations.
    - **Delete**: Remove destinations from the database.
- **Dynamic Content**: Any changes made in the admin dashboard are instantly reflected on the frontend.

---

## 🛠️ Technologies Used

- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS
- **Local Server**: XAMPP

---

## 🚀 Setup and Installation Guide

Follow these steps to run the project on your local machine.

### 1. Prerequisites
- Make sure you have **XAMPP** installed and running on your computer.

### 2. Database Setup
1.  **Start XAMPP**: Open the XAMPP Control Panel and start the **Apache** and **MySQL** modules.
2.  **Open phpMyAdmin**: In your web browser, navigate to `http://localhost/phpmyadmin`.
3.  **Create Database**: Click **"New"** on the left sidebar, enter a database name (e.g., `pariwisata_db`), and click **"Create"**.
4.  **Import Data**: Select the newly created database, click the **"Import"** tab, choose the `pariwisata.sql` file from this project, and click **"Go"**. This will set up all the required tables.

### 3. Project Placement
- Place the entire `Travel-Destination` project folder inside your XAMPP installation's `htdocs` directory.
    - *Example Path (Windows):* `C:/xampp/htdocs/Travel-Destination`

---

## 🌐 How to Use

Once the setup is complete, you can access both parts of the website:

1.  **Access the Project**: Open your web browser and navigate to **`http://localhost/Travel-Destination`**.
2.  **View the Frontend**: Click on the `frontend` folder to see the public website displaying the travel destinations.
3.  **Access the Admin Dashboard**: Click on the `backend` folder to go to the admin dashboard, where you can manage the destination content.

You are now ready to explore the project!

---
