# Sistema de Gestión de Evaluación Académica (SGEA)

## 1. Descripción del problema

La escuela necesita un sistema eficiente para gestionar las evaluaciones y el seguimiento académico de los estudiantes. Actualmente, cada profesor maneja sus propias calificaciones en diferentes formatos, lo que dificulta el seguimiento global del rendimiento estudiantil y la generación de informes académicos.

El sistema debe permitir registrar las calificaciones de diferentes tipos de evaluaciones (exámenes, trabajos, proyectos) por asignatura, calcular las notas medias, gestionar la asistencia y realizar un seguimiento del progreso de cada estudiante. Los profesores podrán añadir comentarios sobre el desempeño de los alumnos y los estudiantes podrán consultar sus calificaciones y asistencia.

Este sistema centralizará la gestión académica, proporcionando una visión clara del rendimiento estudiantil y facilitando la toma de decisiones educativas basadas en datos concretos.


# WOW

## 1. Instalar PHP y extensiones
```bash
sudo apt update
sudo apt install php8.1 php8.1-common php8.1-mysql php8.1-xml php8.1-xmlrpc php8.1-curl php8.1-gd php8.1-imagick php8.1-cli php8.1-dev php8.1-imap php8.1-mbstring php8.1-opcache php8.1-soap php8.1-zip php8.1-intl
```

## 2. Instalar Composer
```bash
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```

## 3. Instalar MariaDB
```bash
sudo apt install mariadb-server
sudo mysql_secure_installation
```

## 4. Clonar el proyecto
```bash
git clone https://github.com/Ernst-Martin/UD3FinalAD.git
cd UD3FinalAD
```

## 5. Instalar dependencias
```bash
composer install
```

## 6. Configurar el entorno
```bash
cp .env.example .env
php artisan key:generate
```

## 7. Configurar la base de datos en .env
```.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=FinalProject
DB_USERNAME=root
DB_PASSWORD=m1_s3cr3t
```

## 8. Crear la base de datos
```bash
sudo mariadb -u root -p -e "CREATE DATABASE FinalProject;"
```

## 9. Migrar y poblar la base de datos
```bash
php artisan migrate:fresh --seed
```

## 10. Iniciar el servidor
```bash
php artisan serve
```

## 11. Importar Postman

Se adjunta el fichero de postman-collection.json para importarlo