# Laravel Corporate CMS

A corporate website content management system built with Laravel, focused on managing pages, site content, and frontend presentation.

## Features

- Content/page management
- Blade-based templating
- Frontend assets with JavaScript, CSS, and SCSS
- Corporate website structure (home, about, services, contact, etc.)
- Easy local development with Laravel tooling

> Update this section with your exact modules (e.g., Blog, Slider, Team, Testimonials, SEO settings, Media library).

---

## Tech Stack

- **Backend:** Laravel (PHP)
- **Templating:** Blade
- **Frontend:** JavaScript, HTML, CSS, SCSS
- **Package Management:** Composer, NPM

---

## Requirements

Make sure you have these installed:

- PHP (version compatible with your Laravel version)
- Composer
- Node.js + npm
- MySQL/MariaDB (or your configured DB)
- Git

---

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/seydakaratekeli/laravel-corporate-cms.git
   cd laravel-corporate-cms
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install frontend dependencies**
   ```bash
   npm install
   ```

4. **Create environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate app key**
   ```bash
   php artisan key:generate
   ```

6. **Configure database**
   - Edit `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

7. **Run migrations (and seeders if available)**
   ```bash
   php artisan migrate
   # php artisan db:seed
   ```

8. **Build assets**
   ```bash
   npm run dev
   ```

9. **Start local server**
   ```bash
   php artisan serve
   ```

App will be available at: `http://127.0.0.1:8000`

---

## Development

### Run backend server
```bash
php artisan serve
```

### Watch frontend assets
```bash
npm run dev
```

### Build production assets
```bash
npm run build
```

---

## Project Structure (Laravel)

- `app/` - Application logic (controllers, models, services)
- `routes/` - Web/API route definitions
- `resources/views/` - Blade templates
- `resources/js/` - Frontend JavaScript
- `resources/css/` - Stylesheets/SCSS
- `public/` - Public assets and entry point
- `database/` - Migrations and seeders
- `config/` - App configuration

---

## Environment Notes

- Never commit `.env`
- Set `APP_ENV=production` and `APP_DEBUG=false` on production
- Configure cache/session/queue/mail drivers for production use

---

## Deployment (General)

1. Set production `.env`
2. Run:
   ```bash
   composer install --no-dev --optimize-autoloader
   php artisan migrate --force
   npm run build
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
3. Configure web server (Nginx/Apache) to point to `public/`

---

## Contributing

1. Fork the repo
2. Create a feature branch
3. Commit changes
4. Open a Pull Request

---

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).

Yönetici Giriş Ekranı
<img width="917" height="394" alt="image" src="https://github.com/user-attachments/assets/d25edb6d-ff5d-454b-9635-75568e65f17b" />

Laravel Yönetim Paneli Dashboard Arayüzü
<img width="925" height="407" alt="image" src="https://github.com/user-attachments/assets/af50bf3d-c520-486d-8c45-92d48542fb26" />

Kategori Yönetim Ekranı
<img width="904" height="508" alt="image" src="https://github.com/user-attachments/assets/0efa9bb9-7316-4e48-8c62-e33876446774" />

Müşteri Tarafı Ürün Detay Sayfası
<img width="1023" height="583" alt="image" src="https://github.com/user-attachments/assets/93d98d28-9677-4305-a043-7f8b59c70f1d" />

Kurumsal Site Kategori ve Hizmet Süreci Arayüzü
<img width="975" height="460" alt="image" src="https://github.com/user-attachments/assets/7119862a-c89d-49f5-9ada-fd135a48f24d" />


