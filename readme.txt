📘 CRUD APPLICATION - PHP + MySQL + Bootstrap + Javascript(jQuery)

===========================
🔧 TECHNOLOGIES USED
===========================
- PHP (Core PHP)
- MySQL (Database)
- HTML, CSS (via Bootstrap)
- JavaScript (jQuery for search)
- CSV (for Excel Import/Export)

===========================
📁 FILE STRUCTURE
===========================
|-- add.php               → Add new product form
|-- code.php              → Handles insert, update, delete logic
|-- connection.php        → Database connection
|-- view.php              → Shows product list, search bar, modals
|-- export.php            → Exports product data as CSV
|-- import.php            → Imports product data from uploaded CSV
|-- search.php            → AJAX search handler
|-- products.sql          → SQL file to create database table

===========================
🧰 DATABASE SETUP
===========================
1. Open phpMyAdmin
2. Create a database (e.g., `crud_db`)
3. Import `products.sql` to create the `products` table

TABLE: products
---------------------
id        INT AUTO_INCREMENT PRIMARY KEY
name      VARCHAR(255)
price     FLOAT
quantity  INT

===========================
🚀 FEATURES
===========================
✅ Add new product  
✅ View all products  
✅ Update product via modal  
✅ Delete product via modal  
✅ Search product by name (AJAX live search)  
✅ Export products to Excel (.csv file)  
✅ Import products from Excel (.csv file)  
✅ Bootstrap-based clean responsive UI  
✅ Input validation (empty, numeric)

===========================
📤 EXPORT TO EXCEL
===========================
- Click "Export to Excel" button
- CSV file (`products.csv`) will be downloaded

===========================
📥 IMPORT FROM EXCEL
===========================
- Create a CSV file like:

Name,Price,Quantity  
Keyboard,500,10  
Mouse,300,5

- Save it as `.csv`
- Upload it using the form on the page

===========================
✅ HOW TO RUN THIS PROJECT
===========================
1. Copy files to your `htdocs` or project folder
2. Import `products.sql` into your MySQL DB
3. Update database details in `connection.php`
4. Open `add.php` or `view.php` in your browser
5. Done! 🎉

===========================
📝 NOTES
===========================
- Make sure your PHP server is running (XAMPP)
- File must be `.csv` format when importing
- Use Chrome or modern browser for best experience

===========================
📌 CREATED BY
===========================
Anamta Zain's CRUD PHP Project
For Online Test
