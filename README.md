![Project Logo](resources/images/ARTiehlogo.png)
# 🎨ARTieh: AN INTEGRATED E-COMMERCE PLATFORM FOR LOCAL ARTISTS AND ART ENTHUSIASTS IN ALBAY

## DESCRIPTION 

<h3><strong></strong></h3>

ARTieh is a dedicated e-commerce platform that connects local artists with buyers in the Albay area. It provides a seamless marketplace where artists can showcase and sell their artworks while art enthusiasts can discover and purchase unique pieces, fostering a thriving local art community.

## OBJECTIVES
1. Streamline the showcasing and selling of artworks for better efficiency and convenience.
2. Develop a user-friendly e-commerce platform that offers personalized customer needs, allowing users to easily discover and purchase local artworks.
3. Support all types of artists, from traditional painters to digital creators, ensuring a diverse representation of Albay’s art scene.
4. Empower small and medium-sized artists in Albay by providing them with an online marketplace to increase visibility and sales, helping them grow their creative businesses.
 
## VISION
This project aims to empower local artists by providing them with a dedicated platform to showcase their work while fostering a thriving art community in Albay.

## TARGET MARKET
1. Small and medium-sized artists in Albay who need a reliable digital platform to showcase and sell their artwork.
2. Art enthusiasts and collectors from Albay and beyond, looking for unique, local artworks to add to their collection.
3. Local residents of Albay seeking to support and purchase original artwork that represents their cultural heritage.
4. People hosting events, such as exhibitions or gallery openings, who need to source local artworks for display.
5. Individuals seeking meaningful, one-of-a-kind pieces for their homes or businesses.
6. Tourists and visitors to Albay who are interested in purchasing local artwork as souvenirs or to support the local art scene.


## INSTALLATION AND USAGE INSTRUCTIONS

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- Node.js & npm
- Git

## Steps

#### 1. Clone the repository: First, clone the project from your Git repository
```sh
    git clone https://github.com/Aerraerr/ARTieh.git
    cd ARTieh
```

#### 2. Install PHP Dependencies: Use Composer to install the required PHP dependencies for Laravel
```sh
    composer install
```

#### 2.1 Install Doctrine DBAL: This package is often required for database migrations and schema management.
```sh
    composer require doctrine/dbal
```

#### 3. Install JavaScript Dependencies: Install the required JavaScript packages (Bootstrap, etc.) using npm
```sh
    npm install
```

#### 3.1 Install Laravel Mix through NPM
```sh
    npm init -y
    npm install laravel-mix --save-dev
```

#### 4. Open the webpack.mix.js file and add this following code (if it's not yet there)
```js
    let mix = require('laravel-mix');
    mix.js('src/app.js', 'dist').setPublicPath('dist');
```

#### 5. Install Livewire
```sh
    composer require livewire/livewire
```

#### 6. Set Up Environment Variables: Create a .env file by copying the example file
```sh
    cp .env.example .env
```

#### 7. Open the .env file and update the following variables to match your local environment
```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE= artiehdb
    DB_USERNAME=root
    DB_PASSWORD=""
```

#### 8. Go to your XAMPP and create a database named "artiehdb", make sure your XAMPP server is running

#### 9. Run the Artisan Key Generate Command
```sh
    php artisan key:generate
```

#### 10. Run the artisan migrate command to migrate the database to your local machine
```sh
    php artisan migrate
```

#### 11. Run the database seed command to populate your database
```sh
    php artisan db:seed
```

#### 12. Run the Application: Finally, run the application locally
```sh
    php artisan serve
```

The application will be available at [http://localhost:8000](http://localhost:8000)

## CONTRIBUTIONS

Contributions to this project are **restricted** to students enrolled in **BSIT - 3B of Bicol University College of Science**. If you are a member of this class and would like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them with descriptive messages.
4. Push your branch to your forked repository.
5. Create a pull request to the main repository.

## Note

Contributions from outside the class are currently not being accepted. Thank you for your understanding.



## Bonus -- Install Datatable ( If Not Installed)

```sh
composer require yajra/laravel-datatables-oracle

php artisan vendor:publish --tag=datatables
```


