---
# Task: Build a Simple Personal Blog

## Description
Your task is to build a basic personal blog system using **PHP** and **MySQL**. This project will help you practice the fundamentals of web development, including working with forms, database queries, and Bootstrap for styling. Be creative and add your own unique touch to the blog!
---

## Requirements

-   **Create Blog Posts**: Include fields for title, content, and date.
-   **Display All Posts**: Show a list of all blog posts in your database.
-   **Delete Posts**: Allow users to remove posts.
-   **Edit Posts**: Include functionality to update blog content.

---

## Database Table Structure

Use the following structure for your database table:

```sql
CREATE TABLE blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## Key Concepts to Use

1. **Forms**: Use the POST method for submitting data.
2. **MySQL Queries**: Practice using `SELECT`, `INSERT`, `DELETE`, and `UPDATE` statements.
3. **Basic Styling**: Apply Bootstrap for clean and responsive design.
4. **PHP Date Formatting**: Format and display dates properly.

---

## ❗Important Notes

-   **Form Validation**: Validate user inputs to ensure all fields are filled correctly.
-   **Escape User Input**: Prevent SQL injection by sanitizing input data.
-   **Use Prepared Statements**: Whenever possible, use prepared statements for secure database queries.
-   **Styling**: Use **Bootstrap** to create a professional and polished look for your pages.

---

## Deadline

**Submission Deadline**: **Monday**  
Take your time to explore PHP and approach the task logically.

---

## Help & Support

If you have any questions or need clarification, feel free to ask in the WhatsApp group.

---

## Creativity

Be innovative! Add your personal style or extra features to make your blog stand out. Have fun while learning! 😊

**Good luck! 👨‍💻👩‍💻**

---
