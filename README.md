# Urban Bites (PHP + MySQL)

A simple PHP web app for the **Urban Bites** site (pages like About/Services/Gallery/Contact) with authentication and a small admin/dashboard area.

## Requirements

- Windows + **XAMPP** (Apache + MySQL)
- PHP (via XAMPP)
- MySQL/MariaDB (via XAMPP)

## Local setup (XAMPP)

1. Copy/keep this project folder at:
   - `C:\xampp\htdocs\urban_bites`
2. Open **XAMPP Control Panel** and start:
   - **Apache**
   - **MySQL**
3. Create the database:
   - Open `http://localhost/phpmyadmin`
   - Create a database for the project (name should match your config).
4. Configure the DB connection:
   - Edit `includes/db.php`
   - Set your host/user/password/database name to match step 3.
5. Open the app:
   - `http://localhost/urban_bites/`

## Pages / routes

- Public pages:
  - `index.php`, `about.php`, `services.php`, `gallery.php`, `contact.php`
- Auth:
  - `register.php`, `login.php`, `logout.php`
- App/admin area (depends on your auth rules):
  - `dashboard.php`, `users.php`, `edit_user.php`, `order.php`

## Project structure

- `includes/`
  - `db.php` (database connection)
- `Images/` (static images)
- `style.css` (styles)
- `main.js` (client-side JS)

## Troubleshooting

- **Blank page / 500 error**: check Apache error log in XAMPP (`Logs`), and confirm PHP is enabled.
- **Database connection errors**: verify credentials and database name in `includes/db.php`, and ensure MySQL is running.
- **404 at /urban_bites/**: confirm the folder is inside `C:\xampp\htdocs\` and Apache is started.

## Notes

- If you have an SQL export for the schema/sample data, add it to the repo (e.g., `database.sql`) and import it via phpMyAdmin.
