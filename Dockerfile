# ใช้ PHP 8.1 (หรือเปลี่ยนเป็น 7.4-apache ตามเวอร์ชันที่คุณใช้)
FROM php:8.1-apache

# ติดตั้ง System Dependencies รวมถึง Ghostscript และ GD (สำหรับตัดรูป)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    ghostscript \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# ติดตั้ง PHP Extensions ที่ Laravel ต้องใช้
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# เปิดใช้งานโหมด Rewrite ของ Apache (สำคัญสำหรับ Laravel)
RUN a2enmod rewrite

# ย้าย Document Root ของ Apache ไปที่โฟลเดอร์ /public ของ Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy ไฟล์ทั้งหมดในโปรเจกต์ไปไว้ใน Server
WORKDIR /var/www/html
COPY . .

# ติดตั้ง Composer เพื่อดึง Package (เช่น mPDF)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# ตั้งค่า Permission ให้ Laravel เขียนไฟล์ชั่วคราวได้
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache