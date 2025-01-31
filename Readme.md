# Sistema de Gestión de Evaluación Académica (SGEA)

## 1. Descripción del problema

La escuela necesita un sistema eficiente para gestionar las evaluaciones y el seguimiento académico de los estudiantes. Actualmente, cada profesor maneja sus propias calificaciones en diferentes formatos, lo que dificulta el seguimiento global del rendimiento estudiantil y la generación de informes académicos.

El sistema debe permitir registrar las calificaciones de diferentes tipos de evaluaciones (exámenes, trabajos, proyectos) por asignatura, calcular las notas medias, gestionar la asistencia y realizar un seguimiento del progreso de cada estudiante. Los profesores podrán añadir comentarios sobre el desempeño de los alumnos y los estudiantes podrán consultar sus calificaciones y asistencia.

Este sistema centralizará la gestión académica, proporcionando una visión clara del rendimiento estudiantil y facilitando la toma de decisiones educativas basadas en datos concretos.


# WOW

Instalar PHP y extensiones
    sudo apt update
sudo apt install php8.1 php8.1-common php8.1-mysql php8.1-xml php8.1-xmlrpc php8.1-curl php8.1-gd php8.1-imagick php8.1-cli php8.1-dev php8.1-imap php8.1-mbstring php8.1-opcache php8.1-soap php8.1-zip php8.1-intl

Instalar composer
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer

Instalar mariadb:
    sudo apt install mariadb-server
sudo mysql_secure_installation

Clonar el proyecto de git
    git clone <URL_DEL_REPOSITORIO>
    cd <NOMBRE_DEL_PROYECTO>

Instalar dependencias
    composer install

Configurar entorno:
    cp .env.example .env
php artisan key:generate

Configurar base de datos en .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=FinalProject
DB_USERNAME=root
DB_PASSWORD= m1_s3cr3t

Crear la base de datos:
    docker exec .it mariadb-server mariadb -u root -p
CREATE DATABASE FinalProject
exit;

Migrar y rellenar la base de datos
    php artisan migrate:fresh --seed

Iniciar servidor:
    php artisan migrate:fresh --seed