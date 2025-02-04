# JIS RFMO - Research & Development Website 🚀

## Table of Contents 📑
- [Introduction](#introduction)
- [Objectives](#objectives)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Installation](#installation)
- [Usage](#usage)
- [Future Enhancements](#future-enhancements)

## Introduction 📖
JIS RFMO (Research Facilitation & Monitoring Office) is a web-based platform designed to streamline research grant applications and project management for JIS Group faculty members. It provides a centralized system to manage research grants, track project progress, and facilitate communication between researchers and administrators.

## Objectives 🎯
- Provide a user-friendly interface for faculty to apply for research grants and track progress.
- Enable RFMO to manage, review, and sanction research projects.
- Ensure transparency and efficiency in the research project lifecycle.

## Features ✨
- 🔒 Secure user authentication and registration.
- 🖥️ Faculty dashboard for grant applications and progress tracking.
- 🛠️ Admin dashboard for reviewing and approving applications.
- 📈 Project management tools including milestone tracking.
- 📝 Automated report submission and review system.
- 📨 Integrated feedback and support system.

## Technology Stack 🛠️
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Local Development Environment:** Laragon (for Windows users)

## Installation 🛠️
### Prerequisites 📋
- 🪟 Windows OS
- [Laragon](https://laragon.org/) installed
- Code editor (VS Code, Sublime Text, Notepad++)

### Steps to Set Up Locally 🖥️
1. **Install Laragon:**
   - Download and install [Laragon Full](https://laragon.org/).
   - Start Apache and MySQL.

2. **Clone or Copy Project Files:**
   - Place the project folder in `C:\laragon\www\`.

3. **Setup Database:**
   - Open Laragon → Menu → MySQL → phpMyAdmin.
   - Create a new database (e.g., `rnd_website`).
   - Import the provided `.sql` file.

4. **Update Database Credentials:**
   - Open `config.php` and update:
     ```php
     $servername = "localhost";
     $username = "root";
     $password = ""; // Default Laragon password
     $dbname = "rnd_website";
     ```

5. **Run the Project:**
   - Open a browser and visit: `http://localhost/project-folder/`

## Usage 🧑‍💻
- **Faculty Members:**
  - Register, apply for research grants, and submit progress reports.
- **Principal:**
  - Track project progress.
- **RFMO Administrators:**
  - Approve applications, allocate funding, and monitor research activities.

## Future Enhancements 🔮
- 🤖 AI-based grant recommendations.
- ⏰ Automated deadline reminders.
- 🤝 Research collaboration tools and digital libraries.

