# Sanatan Guide - A Comprehensive Hindu Spiritual Platform

Sanatan Guide is a modern web application built with Laravel that serves as a comprehensive platform for Hindu spiritual content, including temples, pujas, festivals, scriptures, and more.

## Features

### 1. Temple Management
- **Temple Directory**: Browse temples by deity, city, or state
- **Detailed Temple Information**: 
  - Basic details (name, description, deity)
  - Location information (address, city, state, pincode)
  - Timings (opening/closing hours, darshan duration)
  - Special features (special darshan, dress code, rules)
  - Facilities and amenities
  - Historical and architectural information
  - Image gallery
- **CSV Import/Export**: Bulk import/export temple data
- **Featured Temples**: Highlight important temples

### 2. Puja Management
- **Puja Directory**: Browse and search pujas
- **Detailed Puja Information**:
  - Description and significance
  - Duration and price
  - Required items and materials
  - Step-by-step procedure
  - Related mantras and benefits
- **Featured Pujas**: Highlight important pujas

### 3. Festival Management
- **Festival Calendar**: Browse festivals by date
- **Detailed Festival Information**:
  - Description and significance
  - Date and duration
  - Celebration methods
  - Customs and rituals
  - Special foods and items
  - Related stories
- **Upcoming Festivals**: View upcoming events
- **Festival Categories**: Filter by region and deity

### 4. Scripture Management
- **Scripture Library**: Browse Hindu scriptures
- **Features**:
  - Multiple languages support
  - Chapter-wise organization
  - Search functionality
  - Reading progress tracking
  - Bookmarking system
- **Premium Content**: Access to detailed commentaries

### 5. Panchang (Hindu Calendar)
- **Daily Panchang**: View daily Hindu calendar information
- **Features**:
  - Tithi (lunar day)
  - Nakshatra (constellation)
  - Yoga (auspicious time)
  - Sunrise/sunset times
  - Rahu Kaal and other important timings
  - Festivals and important dates

### 6. User Management
- **User Roles**:
  - Regular Users
  - Premium Users
  - Super Admin
- **Features**:
  - User registration and authentication
  - Profile management
  - Premium subscription
  - Content access control

### 7. Blog System
- **Blog Posts**: Articles on various spiritual topics
- **Features**:
  - Rich text editor
  - Image upload
  - Categories and tags
  - Comments and discussions

### 8. Daily Wisdom
- **Daily Quotes**: Inspirational quotes and teachings
- **Features**:
  - Daily updates
  - Share functionality
  - Archive access

### 9. Meditation Resources
- **Meditation Guides**: Instructions and resources
- **Features**:
  - Different meditation techniques
  - Audio guides
  - Progress tracking

## Technical Features

### Backend
- Built with Laravel 10
- RESTful API architecture
- Role-based access control
- File upload and management
- CSV import/export functionality
- Database migrations and seeding
- Caching for performance

### Frontend
- Responsive design
- Blade templating
- Tailwind CSS
- JavaScript interactivity
- CKEditor integration
- Image optimization

### Security
- Authentication and authorization
- CSRF protection
- Input validation
- Secure file uploads
- Role-based permissions

## Installation

1. Clone the repository:
```bash
git clone https://github.com/ameetspeaks/sanatanguide.git
cd sanatan-guide
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Configure environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Set up database:
```bash
php artisan migrate
php artisan db:seed
```

5. Start the development server:
```bash
php artisan serve
npm run dev
```

## Requirements

- PHP 8.1 or higher
- MySQL 5.7 or higher
- Node.js 16 or higher
- Composer
- NPM

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is licensed under the MIT License.

## Support

For support, email support@sanatanguide.com or create an issue in the repository.

## Acknowledgments

- Laravel Framework
- Tailwind CSS
- CKEditor
- All contributors and supporters
