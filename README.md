After cloning, you can follow the steps below to run this project locally:

### 1. Install dependencies
```bash
composer install
```

### 2. Create the environment file
```bash
cp .env.example .env
```

### 3. Generate the application key
```bash
php artisan key:generate
```

### 4. Run database migrations
```bash
php artisan migrate
```

### 5. Link storage for uploaded files
```bash
php artisan storage:link
```

### 6. Start the development server
```bash
php artisan serve
```