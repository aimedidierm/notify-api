# Notify API

🚀 Welcome to Notify API! This README will guide you through the installation process and setup.
CRUD Laravel based app setting up notifications for flutter app based on data in the database with an example of Todo app.

## Installation

Follow these steps to get started with the project:

1. **Clone the repository:**

```bash
git clone https://github.com/aimedidierm/notify-api.git
```

2. **Navigate into the project directory:**

```bash
    cd notify-ap
```

3. **Install Composer dependencies:**

```bash
    composer install
```

4. **Create a copy of the .env.example file and rename it to .env:**

```bash
    cp .env.example .env
```

5. **Generate an application key:**

```bash
    php artisan key:generate
```

6. **Start the development server:**

```bash
    php artisan serve
```
To obtain the `firebase_credentials.json` file and configure it in your Laravel application, follow these steps:

## Set Up a Firebase Project

**Step 1: Create a Firebase Project**

1. **Go to the [Firebase Console](https://console.firebase.google.com/).**
2. **Click on "Add Project".**
3. **Name your project** and follow the prompts to complete the setup.
4. **Once your project is created**, you'll be directed to the Firebase project dashboard.

**Step 2: Set Up a Firebase Service Account**

1. **Navigate to Project Settings:**
   - In the Firebase console, click the gear icon next to "Project Overview" and select "Project settings."

2. **Generate a New Private Key:**
   - Click on the "Service accounts" tab.
   - Scroll down to the "Firebase Admin SDK" section.
   - Click "Generate new private key."
   - A `firebase_credentials.json` file will be downloaded to your computer.

**Step 3: Store `firebase_credentials.json` in Your Laravel Project**

1. **Move the `firebase_credentials.json` file:**
   - Move the `firebase_credentials.json` file to the `storage/app/` directory in your Laravel project. You can also choose another location, but the `storage/app/` directory is commonly used.

2. **Add Path to `.env` File:**
   - Open your `.env` file and add the following line:

     ```env
     FIREBASE_CREDENTIALS=storage/app/firebase_credentials.json
     ```

     If you stored the file in a different location, make sure to update the path accordingly.

Now that you have the Firebase credentials, you can configure Firebase in your Laravel application.

**Step 4. Testing Your Configuration**

You can test whether the Firebase integration is working correctly by triggering a notification:

1. **Create, update, or delete a to-do item** in your Laravel application using the API or through a testing tool like Postman.
2. **Check your Laravel logs** (in `storage/logs/laravel.log`) to see if any errors are thrown when trying to send the notification.
3. **Check Firebase Console** to ensure that the notifications are being sent and received.

## Contributing

🎉 Contributions are welcome! Feel free to open an issue or submit a pull request for any improvements or bug fixes.

## License

This Flutter project is distributed under the MIT License. See the [LICENSE](LICENSE) file for details.
