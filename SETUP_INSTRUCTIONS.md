# ProPlayer#10 - Football Talent Management System

## Setup Instructions

### 1. Environment Configuration

Create a `.env` file in the root directory with the following configuration:

```env
APP_NAME="ProPlayer#10"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=proplayer10
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

### 2. Database Setup

1. **Create MySQL Database:**
   ```sql
   CREATE DATABASE proplayer10;
   ```

2. **Update Database Credentials:**
   - Modify the `DB_USERNAME` and `DB_PASSWORD` in your `.env` file to match your MySQL credentials.

### 3. Application Setup

1. **Install Dependencies:**
   ```bash
   composer install
   ```

2. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

3. **Run Database Migrations:**
   ```bash
   php artisan migrate
   ```

4. **Seed the Database:**
   ```bash
   php artisan db:seed
   ```

5. **Start the Development Server:**
   ```bash
   php artisan serve
   ```

### 4. Application Features

#### User Roles
- **Admin**: Full system access and management
- **Coach**: Team and player management
- **Scout**: Talent identification and evaluation
- **Player**: Profile management and career tracking

#### Available Services
1. **Player Profile Management** - Comprehensive player profiles with performance metrics
2. **Talent Scouting Tools** - Advanced scouting tools for talent identification
3. **Performance Analytics** - Analytics dashboard for performance tracking
4. **Training Programs** - Customized training programs and drills
5. **Match Scheduling** - Organize matches and tournaments
6. **Communication Hub** - Integrated messaging system
7. **Career Development** - Guidance for career progression
8. **Team Management** - Team roster and tactical management

### 5. Application Flow

1. **Home Page**: Welcome page with athletic green and black design
2. **Sign Up**: Create account with required information (name, email, password, number, role, address)
3. **Sign In**: Authenticate with email and password
4. **Dashboard**: View user profile and available services

### 6. Technical Details

- **Framework**: Laravel 10
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript with Font Awesome icons
- **Design**: Athletic theme with green and black gradient
- **Authentication**: Laravel's built-in authentication system

### 7. File Structure

```
my_new_app/
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   └── HomeController.php
│   └── Models/
│       ├── User.php
│       └── Service.php
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   └── create_services_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── ServicesSeeder.php
├── resources/views/
│   ├── welcome.blade.php
│   ├── dashboard.blade.php
│   └── auth/
│       ├── signup.blade.php
│       └── signin.blade.php
└── routes/
    └── web.php
```

### 8. Troubleshooting

- **Database Connection Issues**: Verify MySQL is running and credentials are correct
- **Migration Errors**: Ensure database exists and user has proper permissions
- **Application Key**: Run `php artisan key:generate` if you get encryption errors
- **Permission Issues**: Ensure storage and bootstrap/cache directories are writable

### 9. Security Features

- Password hashing with Laravel's Hash facade
- CSRF protection on all forms
- Input validation and sanitization
- Session-based authentication
- Role-based access control

The application is now ready to use! Visit `http://localhost:8000` to access ProPlayer#10. 