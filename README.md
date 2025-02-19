# Game Studio Website 🎮  
![image](https://github.com/user-attachments/assets/7c60a158-a8cd-4589-9654-62e63b14b8ef)
![image](https://github.com/user-attachments/assets/01e67ba8-3850-4cf5-a7d9-9c79719641ee)
![image](https://github.com/user-attachments/assets/a4f7f43c-ad0a-4ea1-a3da-7e9d69f05664)
![image](https://github.com/user-attachments/assets/c15a4c32-d0c8-4295-91b1-2e57f8aaee25)


This project is a fictional game studio website where users can browse and "purchase" games. The website includes authentication, dynamic content loading, an email notification system, and a custom UI design.  

## Features 🚀  

### 1️⃣ Navigation Bar (Navbar)  
- A fully responsive navbar at the top of the page.  
- When hovering over an item (e.g., **Contact**), the text becomes underlined.  
![image](https://github.com/user-attachments/assets/d4c369cc-b521-489a-9bfb-174ef2ac5510)

- For a user logged in to the site, the "Login" button changes to the name specified during registration
  ![image](https://github.com/user-attachments/assets/fd2f8294-66a8-44b4-bf1e-1f1b89de6d60)
  ![image](https://github.com/user-attachments/assets/cb66305e-43c4-4dc7-8457-9bd7e6e5d6d1)


 
### 2️⃣ Slider on the Homepage  
- A self-advancing slider that also includes navigation arrows.  

### 3️⃣ User Authentication  
- Dynamic login and registration forms (switching between them using JavaScript).  
- Instant validation using jQuery (e.g., password must be at least 8 characters, invalid email format, etc.).
- When you hover the mouse, the rings around the shape change color.
![image](https://github.com/user-attachments/assets/78a526e5-a347-412e-be93-4b42a977dbb1)
![image](https://github.com/user-attachments/assets/0120a008-ade4-40bc-bd0c-4b37f0681852)


### 4️⃣ Game Purchasing System  
- Users must log in to buy games. If they are not logged in, a modal pops up prompting them to log in.  
- When purchasing a game:  
  - A confirmation modal appears.  
  - The game is added to the user's profile.  
![image](https://github.com/user-attachments/assets/cb259a02-2824-4c49-9a9e-e4638672871d)
![image](https://github.com/user-attachments/assets/8a2a7e81-ad93-47b9-8060-deb0c5bf5a16)
![image](https://github.com/user-attachments/assets/84e9af01-288f-4be2-9033-dbac28d4e08c)
![image](https://github.com/user-attachments/assets/bd5ad172-3a89-4830-be15-f30026f8aae0)


### 5️⃣ Game Pages (Dynamic Content)  
- Each game page dynamically loads:  
  - Title  
  - Description  
  - Reviews  
  - Cover image  
- All content is fetched from a MySQL database using PHP.  
![image](https://github.com/user-attachments/assets/6beb2c78-198c-458b-adec-a39fb26c28bf)
![image](https://github.com/user-attachments/assets/1dc0e5cc-770e-4802-ae48-f9d5ab5275b0)



### 6️⃣ Email Notifications  
- The system sends email confirmations upon successful game purchases.  
- Email sending is handled via PHP.
![image](https://github.com/user-attachments/assets/58d83bc3-b153-4ced-b2cc-8e999d4fa41e)
![image](https://github.com/user-attachments/assets/58a76f22-fc08-4aad-8ad8-fa211acd28b8)



## Technologies Used 🛠️  
- **Frontend:** JavaScript, jQuery, HTML, CSS  
- **Backend:** PHP, MySQL  
- **Dynamic Content:** PHP-driven game pages with database interaction  
- **Validation:** jQuery-based form validation  
- **UI Design:** Custom design by me (except for the login page)  
