<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p> -->

<!-- <p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p> -->

## About ALSTORI

Aymans представляет Alstori: Ваш онлайн-магазин в Грузии

Aymans, ведущая грузинская IT-компания, с гордостью представляет Alstori - новый онлайн-магазин, созданный для того, чтобы сделать ваши покупки еще более удобными и выгодными.

### Особенности Alstori:

- **Широкий выбор товаров:** Alstori предлагает широкий ассортимент товаров, включая электронику, одежду, товары для дома, игрушки и многое другое.
- **Доступные цены:** Мы предлагаем конкурентоспособные цены на все наши товары.
- **Удобная доставка:** Различные варианты доставки доступны для вашего выбора, чтобы сделать процесс максимально удобным.
- **Безопасная оплата:** Мы предлагаем безопасные способы оплаты, гарантируя защиту ваших данных.
- **Отличное обслуживание клиентов:** Наша команда готова помочь вам в любое время.

### Почему стоит выбрать Alstori:

- **Удобство:** Вы можете делать покупки из любой точки Грузии.
- **Быстрая доставка:** Мы гарантируем быструю доставку вашего заказа.
- **Надежность:** Мы являемся надежным онлайн-магазином с безупречной репутацией.
- **Выгодные предложения:** Мы предлагаем доступные цены и регулярные скидки.

Alstori - результат кропотливой работы команды Aymans, стремящейся обеспечить комфортные и выгодные онлайн-покупки для каждого жителя Грузии.

Посетите [www.aymansltd.com](https://aymansltd.com) для получения дополнительной информации.

С уважением,
Команда Aymans

<!-- Surfside Media Laravel 8 E-commerce https://www.youtube.com/playlist?list=PLz_YkiqIHesvPtvLl2Wz5FtuW44dBt199 -->

---

### **v4.1.0-dev - Установка системы**
- Изменение файла README.md
    - Описание проекта и коментарии для проекта.
- Установка laravel/ui
- Установка astrotomic/laravel-translatable
- Установка harevine/shoppingcart
- Установка livewire/livewire
- Установка GIT

### **v4.2.0-dev - Аудентификация**
- Выполнена команда php artisan ui bootstrap --auth
- Выполнена команда npm install
- Выполнена команда npm run build
- Создан DB
- Изменен файл database/migrations/2014_10_12_000000_create_users_table.php
- Выполнена команда php artisan migrate
- Изменен файл app\Http\Controllers\Auth\RegisterController.php
- Изменен файл app\Models\User.php
- Изменен файл resources\views\auth\register.blade.php

### **v4.3.0-dev - Локализация**
- Создан файл app\Http\Controllers\LanguageController.php
- Создан файл app\Http\Middleware\Language.php
- Изменен файл app\Http\Kernel.php
- Создан файл config\languages.php
- Изменен имя файла resources\views\layouts\app-temporarily.blade.php c app.blade.php на app-temporarily.blade.php (При окончании проекта можно будет удалить)
- Изменен файл routes\web.php
    - Добавлен маршрут для локализации сайта
- Выполнена команда php artisan lang:publish
- Создан файл lang\az\auth.php (Не переведено)
- Создан файл lang\az\pagination.php (Не переведено)
- Создан файл lang\az\passwords.php (Не переведено)
- Создан файл lang\az\validation.php (Не переведено)
- Создан файл lang\ge\auth.php (Не переведено)
- Создан файл lang\ge\pagination.php (Не переведено)
- Создан файл lang\ge\passwords.php (Не переведено)
- Создан файл lang\ge\validation.php (Не переведено)
- Изменен файл resources\views\auth\passwords\confirm.blade.php
- Изменен файл resources\views\auth\passwords\email.blade.php
- Изменен файл resources\views\auth\passwords\reset.blade.php
- Изменен файл resources\views\auth\login.blade.php
- Изменен файл resources\views\auth\register.blade.php
- Изменен файл resources\views\auth\verify.blade.php
- Изменен файл resources\views\home.blade.php
- Создан файл lang\en\home-temporarily.php
- Создан файл lang\az\home-temporarily.php
- Создан файл lang\ge\home-temporarily.php

### **v4.4.0-dev - Главная страница** (Начало проекта)
- Создан файл resources\views\layouts\app.blade.php
- Создан файл app\Livewire\Front\IndexComponent.php
- Создан файл resources\views\livewire\front\index-component.blade.php
- Опубликован и изменен файл config\livewire.php
- Изменен файл routes\web.php
    - Добавлен маршрут app.index
- Добавлена папка public\assets
- Создан файл resources\views\template-component.blade.php (При окончании проекта можно удалить данный файл)
- Создан файл app\Livewire\Front\Components\PreloaderComponent.php
- Создан файл resources\views\livewire\front\components\preloader-component.blade.php
- Создан файл app\Livewire\Front\Components\BackToTopComponent.php
- Создан файл resources\views\livewire\front\components\back-to-top-component.blade.php
- Создан файл app\Livewire\Front\Components\OffcanvasAreaComponent.php
- Создан файл resources\views\livewire\front\components\offcanvas-area-component.blade.php
- Создан файл app\Livewire\Front\Components\BottomMenuStickyComponent.php
- Создан файл resources\views\livewire\front\components\bottom-menu-sticky-component.blade.php
- Создан файл app\Livewire\Front\Components\SearchAreaComponent.php
- Создан файл resources\views\livewire\front\components\search-area-component.blade.php
- Создан файл app\Livewire\Front\Components\CartminiAreaComponent.php
- Создан файл resources\views\livewire\front\components\cartmini-area-component.blade.php
- Создан файл app\Livewire\Front\Components\HeaderComponent.php
- Создан файл resources\views\livewire\front\components\header-component.blade.php
- Создан файл app\Livewire\Front\Components\HeaderStickyComponent.php
- Создан файл resources\views\livewire\front\components\header-sticky-component.blade.php
- Создан файл app\Livewire\Front\Components\FilterOffcanvasAreaComponent.php
- Создан файл resources\views\livewire\front\components\filter-offcanvas-area-component.blade.php
- Создан файл app\Livewire\Front\Components\FooterComponent.php
- Создан файл resources\views\livewire\front\components\footer-component.blade.php

### **v4.4.1-dev (FIX)**
- Изменен имя файла resources\views\layouts\guest.blade.php c app-temporarily.blade.php на guest.blade.php
- Изменен файл resources\views\layouts\guest.blade.php
- Изменен файл resources\views\auth\passwords\confirm.blade.php
- Изменен файл resources\views\auth\passwords\email.blade.php
- Изменен файл resources\views\auth\passwords\reset.blade.php
- Изменен файл resources\views\auth\login.blade.php
- Изменен файл resources\views\auth\register.blade.php
- Изменен файл resources\views\auth\verify.blade.php
- Изменен файл resources\views\home.blade.php
- Выполнена команда php artisan migrate:rollback
- Изменен файл app\Http\Controllers\Auth\RegisterController.php
- Изменен файл app\Http\Controllers\Auth\ConfirmPasswordController.php
- Изменен файл app\Http\Controllers\Auth\LoginController.php
- Изменен файл aapp\Http\Controllers\Auth\ResetPasswordController.php
- Изменен файл app\Http\Controllers\Auth\VerificationController.php
- Изменен файл database\migrations\2014_10_12_000000_create_users_table.php
- Изменен файл app\Models\User.php
- Изменен файл app\Providers\RouteServiceProvider.php
- Создан файл app\Http\Middleware\AuthAdmin.php
- Изменен файл app\Http\Kernel.php
- Создан файл app\Livewire\Front\User\MyAccountComponent.php
- Создан файл resources\views\livewire\front\user\my-account-component.blade.php
- Создан файл app\Livewire\Back\Admin\DashboardComponent.php
- Создан файл resources\views\livewire\back\admin\dashboard-component.blade.php
- Изменен файл resources\views\livewire\front\components\offcanvas-area-component.blade.php
- Изменен файл routes\web.php
    - Добавлен маршрут verification.notice
    - Добавлен маршрут verification.verify
    - Добавлен маршрут verification.send
- Изменен файл .env

### **v4.5.0-dev - Страница магазина (Не закончено)**
- Создан файл app\Livewire\Front\Shop\IndexComponent.php
- Создан файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл routes\web.php
    - Добавлен маршрут app.shop
- Изменен файл resources\views\livewire\front\components\bottom-menu-sticky-component.blade.php
- Изменен файл resources\views\livewire\front\components\cartmini-area-component.blade.php
- Изменен файл resources\views\livewire\front\components\footer-component.blade.php
- Изменен файл resources\views\livewire\front\components\header-component.blade.php
- Изменен файл resources\views\livewire\front\components\header-sticky-component.blade.php
- Изменен файл resources\views\livewire\front\components\preloader-component.blade.php
- (FIX) Перезаписана папка public\assets
- (FIX) Изменен файл resources\views\livewire\front\components\header-component.blade.php
- (FIX) Изменен файл public\assets\css\alstori-main.css
- (FIX) Изменен файл public\assets\js\main.js
- Создан файл app\Models\Category\Category.php
- Создан файл database\migrations\2024_04_01_185552_create_categories_table.php
- Создан файл app\Models\Category\CategoryTranslation.php
- Создан файл database\migrations\2024_04_01_185809_create_category_translations_table.php
- Выполнена команда php artisan migrate
- Создан файл app\Livewire\Back\Categories\AddCategoryComponent.php
- Создан файл resources\views\livewire\back\categories\add-category-component.blade.php
- Создан файл app\Livewire\Back\Categories\CategoryComponent.php
- Создан файл resources\views\livewire\back\categories\category-component.blade.php
- Создан файл app\Livewire\Back\Categories\EditCategoryComponent.php
- Создан файл resources\views\livewire\back\categories\edit-category-component.blade.php
- (FIX) Перемещена папка из resources\views\livewire\front в resources\views\livewire\components
- (FIX) Изменен файл resources\views\layouts\app.blade.php
- (FIX) Перемещена папка из app\Livewire\Front в app\Livewire\Components
- (FIX) Изменен файл app\Livewire\Components\BackToTopComponent.php
- (FIX) Изменен файл app\Livewire\Components\BottomMenuStickyComponent.php
- (FIX) Изменен файл app\Livewire\Components\CartminiAreaComponent.php
- (FIX) Изменен файл app\Livewire\Components\FilterOffcanvasAreaComponent.php
- (FIX) Изменен файл app\Livewire\Components\FooterComponent.php
- (FIX) Изменен файл app\Livewire\Components\HeaderComponent.php
- (FIX) Изменен файл app\Livewire\Components\HeaderStickyComponent.php
- (FIX) Изменен файл app\Livewire\Components\OffcanvasAreaComponent.php
- (FIX) Изменен файл app\Livewire\Components\PreloaderComponent.php
- (FIX) Изменен файл app\Livewire\Components\SearchAreaComponent.php
- (FIX) Изменен файл resources\views\layouts\guest.blade.php
- Изменен файл routes\web.php
    - Добавлен маршрут back.categories.add
    - Добавлен маршрут back.categories.category
    - Добавлен маршрут back.categories.edit
- Изменен файл app\Livewire\Back\Categories\CategoryComponent.php
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php
- Изменен файл app\Livewire\Back\Categories\AddCategoryComponent.php
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- Установлен пакет intervention/image
- Изменен файл config\filesystems.php

### **v4.5.1-dev (FIX)**
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php
- Изменен файл routes\web.php
    - Изменен маршрут back.categories.edit
- Выполнена команда php artisan migrate:rollback
- Изменен файл database\migrations\2024_04_01_185552_create_categories_table.php
- Изменен файл database\migrations\2024_04_01_185809_create_category_translations_table.php
- Выполнена команда php artisan migrate
- Изменен файл app\Livewire\Back\Categories\AddCategoryComponent.php
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- Изменен файл app\Models\Category\Category.php
- Изменен файл app\Models\Category\CategoryTranslation.php

### **v4.5.2-dev - Категории (Продолжение)**
- Изменен файл app\Livewire\Back\Categories\AddCategoryComponent.php
- Изменен файл app\Livewire\Back\Categories\EditCategoryComponent.php
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\edit-category-component.blade.php

### **v4.5.3-dev - Категории (Продолжение)**
- Изменен файл app\Livewire\Back\Categories\CategoryComponent.php

### **v4.6.0-dev - Под категории**
- Создан файл app\Livewire\Back\SubCategories\AddSubCategoryComponent.php
- Создан файл app\Livewire\Back\SubCategories\EditSubCategoryComponent.php
- Создан файл app\Livewire\Back\SubCategories\SubCategoryComponent.php
- Создан файл resources\views\livewire\back\sub-categories\add-sub-category-component.blade.php
- Создан файл resources\views\livewire\back\sub-categories\edit-sub-category-component.blade.php
- Создан файл resources\views\livewire\back\sub-categories\sub-category-component.blade.php
- Создан файл app\Models\SubCategory\SubCategory.php
- Создан файл app\Models\SubCategory\SubCategoryTranslation.php
- Создан файл database\migrations\2024_04_04_084528_create_sub_categories_table.php
- Создан файл database\migrations\2024_04_04_084541_create_sub_category_translations_table.php
- Выполнена команда php artisan migrate
- (FIX) Изменен файл app\Livewire\Back\Categories\AddCategoryComponent.php
- (FIX) Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- (FIX) Изменен файл app\Livewire\Back\Categories\CategoryComponent.php
- (FIX) Изменен файл resources\views\livewire\back\categories\category-component.blade.php
- (FIX) Изменен файл resources\views\livewire\back\categories\edit-category-component.blade.php
- (FIX) Изменен файл app\Livewire\Back\Categories\EditCategoryComponent.php
- Изменен файл routes\web.php
    - Добавлен маршрут back.sub-categories.add
    - Добавлен маршрут back.sub-categories.sub-category
    - Добавлен маршрут back.sub-categories.edit
- Изменен файл resources\views\livewire\components\header-component.blade.php

### **v4.6.1-dev - (FIX)**
- Изменен файл resources\views\livewire\back\sub-categories\edit-sub-category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php
- Изменен файл config\app.php
- Изменен файл resources\views\livewire\back\sub-categories\add-sub-category-component.blade.php
- Изменен файл resources\views\livewire\back\sub-categories\sub-category-component.blade.php

### **v4.6.2-dev - (FIX)**
- Удален файл app\Livewire\Back\SubCategories\AddSubCategoryComponent.php
- Удален файл app\Livewire\Back\SubCategories\EditSubCategoryComponent.php
- Удален файл app\Livewire\Back\SubCategories\SubCategoryComponent.php
- Удален файл resources\views\livewire\back\sub-categories\add-sub-category-component.blade.php
- Удален файл resources\views\livewire\back\sub-categories\edit-sub-category-component.blade.php
- Удален файл resources\views\livewire\back\sub-categories\sub-category-component.blade.php

### **v4.6.3-dev - (FIX)**
- Изменен файл routes\web.php
    - Удален маршрут back.sub-categories.add
    - Удален маршрут back.sub-categories.sub-category
    - Удален маршрут back.sub-categories.edit
    - Изменен название маршрута back.categories
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\edit-category-component.blade.php
- Изменен файл resources\views\livewire\components\header-component.blade.php

### **v4.6.4-dev - (FIX)**
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php

### **v4.6.5-dev - (FIX)**
- Изменен файл app\Livewire\Back\Categories\CategoryComponent.php
- Изменен файл app\Livewire\Back\Categories\EditCategoryComponent.php

### **v4.7.0-dev - Под категории**
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- Изменен файл app\Livewire\Back\Categories\AddCategoryComponent.php

- Изменен файл app\Models\Category\Category.php
- Изменен файл app\Models\SubCategory\SubCategory.php
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php

- Изменен файл routes\web.php
    - Изменен маршрут back.categories.edit
- Изменен файл app\Livewire\Back\Categories\EditCategoryComponent.php
- Изменен файл resources\views\livewire\back\categories\edit-category-component.blade.php

- Изменен файл app\Livewire\Back\Categories\CategoryComponent.php
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php

### **v4.8.0-dev - Продукция (Не закончено)**
- Создан файл app\Models\Product\Product.php
- Создан файл app\Models\Product\ProductTranslation.php
- Создан файл database\migrations\2024_04_08_131516_create_products_table.php
- Создан файл database\migrations\2024_04_08_131523_create_product_translations_table.php
- Выполнена команда php artisan migrate
- Создан файл app\Livewire\Back\Products\AddProductComponent.php
- Создан файл resources\views\livewire\back\products\add-product-component.blade.php
- (FIX) Изменен файл app\Livewire\Back\Categories\AddCategoryComponent.php
- Изменен файл routes\web.php
    - Добавлен маршрут back.products.add
- Создан файл app\Livewire\Back\Products\ProductComponent.php
- Создан файл resources\views\livewire\back\products\product-component.blade.php
- Изменен файл routes\web.php
    - Добавлен маршрут back.products
- Изменен файл resources\views\livewire\back\products\product-component.blade.php
- Изменен файл app\Models\Product\Product.php
- Изменен файл app\Models\SubCategory\SubCategory.php

### **v4.9.0-dev - Продукция**
- Изменен файл app\Livewire\Back\Products\ProductComponent.php
- (FIX) Изменен файл app\Livewire\Back\Products\AddProductComponent.php
- Создан файл app\Livewire\Back\Products\EditProductComponent.php
- Создан файл resources\views\livewire\back\products\edit-product-component.blade.php
- Изменен файл routes\web.php
    - Добавлен маршрут back.products.edit
- Изменен файл resources\views\livewire\back\products\product-component.blade.php

### **v4.9.1-dev - (FIX)**
- Создан файл resources\views\vendor\pagination\default.blade.php
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php
- Изменен файл resources\views\livewire\back\products\product-component.blade.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Изменен файл app\Livewire\Back\Categories\AddCategoryComponent.php
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- Изменен файл app\Livewire\Back\Categories\EditCategoryComponent.php
- Изменен файл resources\views\livewire\back\categories\edit-category-component.blade.php
- Изменен файл app\Livewire\Back\Products\AddProductComponent.php
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\edit-product-component.blade.php

### **v4.9.2-dev - (FIX)**
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\edit-category-component.blade.php
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\product-component.blade.php
- Изменен файл resources\views\livewire\back\admin\dashboard-component.blade.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл resources\views\livewire\front\user\my-account-component.blade.php

### **v4.9.3-dev - (FIX)**
- Изменен файл app\Livewire\Back\Categories\AddCategoryComponent.php
- Изменен файл app\Livewire\Back\Categories\CategoryComponent.php
- Изменен файл app\Livewire\Back\Categories\EditCategoryComponent.php
- Изменен файл resources\views\layouts\app.blade.php
- Изменен файл resources\views\layouts\guest.blade.php
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\edit-category-component.blade.php
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\edit-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\product-component.blade.php

### **v4.9.4-dev - (FIX)**
- Изменен файл app\Livewire\Back\Products\AddProductComponent.php
- Изменен файл app\Livewire\Back\Products\EditProductComponent.php
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\edit-product-component.blade.php

### **v4.10.0-dev - Валидация скидочной цены и количества товара на складе**
- Изменен файл app\Livewire\Back\Products\EditProductComponent.php
- Изменен файл app\Livewire\Back\Products\AddProductComponent.php
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\edit-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\product-component.blade.php

### **v4.10.1-dev - (FIX)**
- Изменен файл resources\views\layouts\app.blade.php
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\edit-category-component.blade.php
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\edit-product-component.blade.php

### **v4.11.0-dev - Вывод наименований и количество товаров категории на странице магазина в секции фильтр**
- Изменен файл app\Livewire\Components\FilterOffcanvasAreaComponent.php
- Изменен файл resources\views\livewire\components\filter-offcanvas-area-component.blade.php

### **v4.12.0-dev - Страница под категорий**
- Создан файл app\Livewire\Front\Shop\CategoryComponent.php
- Создан файл resources\views\livewire\front\shop\category-component.blade.php
- Изменен файл resources\views\livewire\components\filter-offcanvas-area-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут app.shop.category
- Изменен файл app\Livewire\Front\Shop\CategoryComponent.php
- Изменен файл resources\views\livewire\front\shop\category-component.blade.php

### **v4.13.0-dev - Вывод товаров на страницу магазина и страница под категорий с товарами**
- (FIX) Изменен файл resources\views\livewire\front\shop\category-component.blade.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл app\Livewire\Front\Shop\IndexComponent.php
- (FIX) Изменен файл public\assets\css\alstori-main.css
- Создан файл app\Livewire\Front\Shop\SubCategoryComponent.php
- Создан файл resources\views\livewire\front\shop\sub-category-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут app.shop.category.sub-category
- Изменен файл app\Livewire\Front\Shop\SubCategoryComponent.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php

### **v4.14.0-dev - Страница товара**
- Создан файл app\Livewire\Front\Shop\DetailsComponent.php
- Создан файл resources\views\livewire\front\shop\details-component.blade.php
- Изменен файл app\Livewire\Front\Shop\DetailsComponent.php
- Изменен файл resources\views\livewire\front\shop\details-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут app.shop.details
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php

### **v4.14.1-dev - (FIX)**
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\edit-product-component.blade.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php

### **v4.15.0-dev - Рейтинг товара (Не закончено)**
- Создан файл app\Models\Review\Review.php
- Создан файл database\migrations\2024_04_15_132138_create_reviews_table.php
- Изменен файл app\Models\Review\Review.php
- Изменен файл database\migrations\2024_04_15_132138_create_reviews_table.php
- Выполнена команда php artisan migrate
- Изменен файл resources\views\livewire\front\shop\details-component.blade.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php
- Изменен файл app\Models\Product\Product.php
- Изменен файл app\Livewire\Front\Shop\DetailsComponent.php

### **v4.16.0-dev - Рейтинг товара**
- Изменен файл app\Livewire\Front\Shop\DetailsComponent.php
- Изменен файл app\Models\Review\Review.php
- Изменен файл app\Models\User.php
- Изменен файл resources\views\livewire\front\shop\details-component.blade.php

### **v4.17.0-dev - Отображение рейтинга товара на странице магазина и на странице под категории**
- Изменен файл app\Livewire\Front\Shop\DetailsComponent.php
- Изменен файл resources\views\livewire\components\filter-offcanvas-area-component.blade.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php

### **v4.18.0-dev - Сортировка товаров на странице магазина и на странице под категорий**
- Изменен файл app\Livewire\Front\Shop\IndexComponent.php
- Изменен файл public\assets\js\main.js
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл app\Livewire\Front\Shop\SubCategoryComponent.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php

### **v4.19.0-dev - Поиск товаров**
- Изменен файл app\Livewire\Components\HeaderComponent.php
- Изменен файл app\Livewire\Components\SearchAreaComponent.php
- Создан файл app\Livewire\Front\Shop\SearchComponent.php
- Создан файл resources\views\livewire\front\shop\search-component.blade.php
- Изменен файл app\Livewire\Front\Shop\SearchComponent.php
- Изменен файл resources\views\livewire\front\shop\search-component.blade.php
- Изменен файл public\assets\js\main.js
- Изменен файл resources\views\livewire\components\bottom-menu-sticky-component.blade.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Изменен файл resources\views\livewire\components\search-area-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут app.shop.search

### **v4.19.1-dev - (FIX)**
- Изменен файл app\Livewire\Back\Categories\EditCategoryComponent.php

### **v4.20.0-dev - Поиск товаров на странице списка товаров для администратора**
- (FIX) Изменен файл app\Livewire\Front\Shop\SearchComponent.php
- Изменен файл app\Livewire\Back\Products\ProductComponent.php
- Создан файл app\Livewire\Back\Products\SearchComponent.php
- Создан файл resources\views\livewire\back\products\search-component.blade.php
- Изменен файл app\Livewire\Back\Products\SearchComponent.php
- Изменен файл resources\views\livewire\back\products\search-component.blade.php
- Изменен файл resources\views\livewire\back\products\product-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут back.products.search

### **v4.21.0-dev - Корзина**
- Создан файл config\cart.php
- Изменен файл config\cart.php
- Изменен файл app\Livewire\Front\Shop\DetailsComponent.php
- Изменен файл resources\views\livewire\front\shop\details-component.blade.php
- Создан файл app\Livewire\Front\Shop\CartComponent.php
- Создан файл resources\views\livewire\front\shop\cart-component.blade.php
- Изменен файл app\Livewire\Front\Shop\CartComponent.php
- Изменен файл resources\views\livewire\front\shop\cart-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут app.shop.cart
- Изменен файл resources\views\livewire\components\cartmini-area-component.blade.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Изменен файл resources\views\livewire\components\header-sticky-component.blade.php
- Создан файл app\Livewire\Components\Includes\CartCountComponent.php
- Создан файл app\Livewire\Components\Includes\WishlistCountComponent.php
- Создан файл resources\views\livewire\components\includes\cart-count-component.blade.php
- Создан файл resources\views\livewire\components\includes\wishlist-count-component.blade.php
- Изменен файл app\Livewire\Components\Includes\CartCountComponent.php
- Изменен файл app\Livewire\Components\Includes\WishlistCountComponent.php
- Изменен файл resources\views\livewire\components\includes\cart-count-component.blade.php
- Изменен файл resources\views\livewire\components\includes\wishlist-count-component.blade.php
- Изменен файл resources\views\livewire\front\shop\details-component.blade.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл resources\views\livewire\front\shop\search-component.blade.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php

### **v4.22.0-dev - Главная страница**
- (FIX) Изменен файл app\Livewire\Components\FilterOffcanvasAreaComponent.php
- (FIX) Изменен файл resources\views\livewire\components\filter-offcanvas-area-component.blade.php
- (FIX) Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл app\Livewire\Front\IndexComponent.php
- (FIX) Изменен файл app\Models\Category\Category.php
- Изменен файл resources\views\livewire\front\index-component.blade.php
- (FIX) Изменен файл app\Livewire\Back\Products\AddProductComponent.php
- (FIX) Изменен файл app\Livewire\Back\Products\EditProductComponent.php
- Изменен файл public\assets\css\alstori-main.css

### **v4.22.1-dev - (FIX)**
- Изменен файл resources\views\livewire\front\shop\details-component.blade.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл resources\views\livewire\front\shop\search-component.blade.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php
- Изменен файл resources\views\livewire\front\index-component.blade.php
- Изменен файл resources\views\livewire\back\products\product-component.blade.php
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\edit-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\search-component.blade.php
- Изменен файл app\Livewire\Back\Categories\AddCategoryComponent.php
- Изменен файл app\Livewire\Back\Categories\EditCategoryComponent.php
- Изменен файл app\Livewire\Back\Products\AddProductComponent.php
- Изменен файл app\Livewire\Back\Products\EditProductComponent.php
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php
- Изменен файл resources\views\livewire\front\shop\cart-component.blade.php
- Изменен файл app\Livewire\Front\IndexComponent.php
- Изменен файл public\assets\css\alstori-main.css

### **v4.23.0-dev - Оформление заказа**
- Создан файл app\Models\Shopping\Order.php
- Создан файл app\Models\Shopping\OrderItem.php
- Создан файл app\Models\Shopping\Shipping.php
- Создан файл app\Models\Shopping\Transaction.php
- Создан файл database\migrations\2024_04_29_125431_create_orders_table.php
- Создан файл database\migrations\2024_04_29_125438_create_order_items_table.php
- Создан файл database\migrations\2024_04_29_125509_create_shippings_table.php
- Создан файл database\migrations\2024_04_29_125524_create_transactions_table.php
- Изменен файл app\Models\Shopping\Order.php
- Изменен файл app\Models\Shopping\OrderItem.php
- Изменен файл app\Models\Shopping\Shipping.php
- Изменен файл app\Models\Shopping\Transaction.php
- Изменен файл database\migrations\2024_04_29_125431_create_orders_table.php
- Изменен файл database\migrations\2024_04_29_125438_create_order_items_table.php
- Изменен файл database\migrations\2024_04_29_125509_create_shippings_table.php
- Изменен файл database\migrations\2024_04_29_125524_create_transactions_table.php
- Выполнена команда php artisan migrate
- Создан файл app\Livewire\Front\Shop\CheckoutComponent.php
- Создан файл resources\views\livewire\front\shop\checkout-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут app.shop.checkout
- Изменен файл resources\views\livewire\front\shop\checkout-component.blade.php
- Изменен файл app\Livewire\Front\Shop\CartComponent.php
- Создан файл app\Livewire\Front\Shop\ThankyouComponent.php
- Создан файл resources\views\livewire\front\shop\thankyou-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут app.shop.thankyou
- Изменен файл app\Livewire\Front\Shop\ThankyouComponent.php
- Изменен файл resources\views\livewire\front\shop\thankyou-component.blade.php
- Изменен файл public\assets\js\main.js
- Изменен файл resources\views\livewire\front\shop\cart-component.blade.php

### **v4.24.0-dev - Отображение заказаов в админ панели**
- Создан файл app\Livewire\Back\Orders\OrderComponent.php
- Создан файл resources\views\livewire\back\orders\order-component.blade.php
- Изменен файл app\Livewire\Back\Orders\OrderComponent.php
- Изменен файл resources\views\livewire\back\orders\order-component.blade.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Создан файл app\Livewire\Back\Orders\OrderDetailsComponent.php
- Создан файл resources\views\livewire\back\orders\order-details-component.blade.php
- Изменен файл app\Livewire\Back\Orders\OrderDetailsComponent.php
- Изменен файл resources\views\livewire\back\orders\order-details-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут back.orders
    - Создан маршрут back.orders.details
- (FIX) Изменен файл app\Livewire\Front\Shop\CheckoutComponent.php

### **v4.24.1-dev - (FIX)**
- Изменен файл database\migrations\2024_04_29_125431_create_orders_table.php
- Изменен файл app\Livewire\Front\Shop\CheckoutComponent.php
- Изменен файл resources\views\livewire\back\orders\order-component.blade.php
- Изменен файл resources\views\livewire\back\orders\order-details-component.blade.php

### **v4.25.0-dev - Отображение заказов в анкете пользователя**
- Создан файл app\Livewire\Front\User\OrdersComponent.php
- Создан файл resources\views\livewire\front\user\orders-component.blade.php
- Изменен файл resources\views\livewire\front\user\orders-component.blade.php
- Изменен файл resources\views\livewire\front\user\my-account-component.blade.php
- (FIX) Изменен файл resources\views\livewire\back\orders\order-component.blade.php
- (FIX) Изменен файл resources\views\livewire\back\orders\order-details-component.blade.php
- (FIX) Изменен файл resources\views\livewire\front\shop\cart-component.blade.php
- (FIX) Изменен файл public\assets\css\alstori-main.css

### **v4.25.1-dev - (FIX)**
- Изменен файл app\Livewire\Front\User\OrdersComponent.php
- Изменен файл resources\views\livewire\front\user\orders-component.blade.php

### **v4.25.2-dev - (FIX)**
- Изменен файл resources\views\livewire\components\filter-offcanvas-area-component.blade.php
- Изменен файл resources\views\livewire\front\shop\cart-component.blade.php

### **v4.26.0-dev - Обновление статуса заказа**
- Изменен файл database\migrations\2024_04_29_125431_create_orders_table.php
- Изменен файл app\Livewire\Back\Orders\OrderComponent.php
- Изменен файл resources\views\livewire\back\orders\order-component.blade.php
- Изменен файл resources\views\livewire\back\orders\order-details-component.blade.php
- Изменен файл resources\views\livewire\front\user\orders-component.blade.php

### **v4.26.1-dev - (FIX)**
- (FIX) Создан файл app\Livewire\Front\User\PersonalDetailsComponent.php
- (FIX) Создан файл resources\views\livewire\front\user\personal-details-component.blade.php
- (FIX) Изменен файл app\Livewire\Front\User\PersonalDetailsComponent.php
- (FIX) Изменен файл resources\views\livewire\front\user\personal-details-component.blade.php
- (FIX) Изменен файл resources\views\livewire\front\user\my-account-component.blade.php

### **v4.27.0-dev - Избранные товары**
- Изменен файл app\Livewire\Front\Shop\DetailsComponent.php
- Изменен файл app\Livewire\Front\Shop\IndexComponent.php
- Изменен файл app\Livewire\Front\Shop\SearchComponent.php
- Изменен файл app\Livewire\Front\Shop\SubCategoryComponent.php
- Создан файл app\Livewire\Front\Shop\WishlistComponent.php
- Создан файл resources\views\livewire\front\shop\wishlist-component.blade.php
- Изменен файл app\Livewire\Front\Shop\WishlistComponent.php
- Изменен файл resources\views\livewire\front\shop\wishlist-component.blade.php
- Изменен файл resources\views\livewire\components\includes\wishlist-count-component.blade.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Изменен файл resources\views\livewire\components\header-sticky-component.blade.php
- Изменен файл resources\views\livewire\front\shop\category-component.blade.php
- Изменен файл resources\views\livewire\front\shop\details-component.blade.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл resources\views\livewire\front\shop\search-component.blade.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут app.shop.wishlist

### **v4.28.0-dev - Быстрый перевод без проверки**
- Изменен файл config\app.php
- Создан файл lang\az\custom.php
- Создан файл lang\en\custom.php
- Создан файл lang\ge\custom.php
- Изменен файл lang\az\custom.php
- Изменен файл lang\en\custom.php
- Изменен файл lang\ge\custom.php
- Изменен файл resources\views\auth\passwords\confirm.blade.php
- Изменен файл resources\views\auth\passwords\email.blade.php
- Изменен файл resources\views\auth\passwords\reset.blade.php
- Изменен файл resources\views\auth\login.blade.php
- Изменен файл resources\views\auth\register.blade.php
- Изменен файл resources\views\auth\verify-email.blade.php
- Изменен файл resources\views\auth\verify.blade.php
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\edit-category-component.blade.php
- Изменен файл resources\views\livewire\back\orders\order-component.blade.php
- Изменен файл resources\views\livewire\back\orders\order-details-component.blade.php
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\edit-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\product-component.blade.php
- Изменен файл resources\views\livewire\back\products\search-component.blade.php
- Изменен файл resources\views\livewire\components\bottom-menu-sticky-component.blade.php
- Изменен файл resources\views\livewire\components\cartmini-area-component.blade.php
- Изменен файл resources\views\livewire\components\filter-offcanvas-area-component.blade.php
- Изменен файл resources\views\livewire\components\footer-component.blade.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Изменен файл resources\views\livewire\components\header-sticky-component.blade.php
- Изменен файл resources\views\livewire\components\preloader-component.blade.php
- Изменен файл resources\views\livewire\components\search-area-component.blade.php
- Изменен файл resources\views\livewire\front\shop\cart-component.blade.php
- Изменен файл resources\views\livewire\front\shop\category-component.blade.php
- Изменен файл resources\views\livewire\front\shop\checkout-component.blade.php
- Изменен файл resources\views\livewire\front\shop\details-component.blade.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл resources\views\livewire\front\shop\search-component.blade.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php
- Изменен файл resources\views\livewire\front\shop\thankyou-component.blade.php
- Изменен файл resources\views\livewire\front\shop\wishlist-component.blade.php
- Изменен файл resources\views\livewire\front\index-component.blade.php

### **v4.29.0-dev - (FIX)**
- Изменен файл app\Livewire\Front\IndexComponent.php
- Изменен файл lang\az\custom.php
- Изменен файл lang\en\custom.php
- Изменен файл lang\ge\custom.php
- Изменен файл resources\views\livewire\front\index-component.blade.php

### **v4.29.1-dev - (FIX)**
- Изменен файл resources\views\livewire\components\footer-component.blade.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Изменен файл resources\views\livewire\components\header-sticky-component.blade.php
- Изменен файл resources\views\livewire\components\offcanvas-area-component.blade.php

### **v4.29.2-dev - (FIX)**
- Изменен файл lang\az\custom.php
- Изменен файл lang\en\custom.php
- Изменен файл lang\ge\custom.php
- Изменен файл public\assets\css\alstori-main.css
- Изменен файл public\assets\js\main.js
- Изменен файл resources\views\auth\passwords\email.blade.php
- Изменен файл resources\views\auth\passwords\reset.blade.php
- Изменен файл resources\views\auth\login.blade.php
- Изменен файл resources\views\auth\register.blade.php
- Изменен файл resources\views\auth\verify-email.blade.php

### **v4.29.3-dev - (FIX)**
- Изменен файл app\Livewire\Back\Orders\OrderComponent.php
- Изменен файл app\Livewire\Back\Products\SearchComponent.php
- Изменен файл app\Livewire\Front\Shop\SearchComponent.php
- Изменен файл database\migrations\2024_04_08_131516_create_products_table.php
- Изменен файл database\migrations\2024_04_29_125431_create_orders_table.php
- Изменен файл lang\az\custom.php
- Изменен файл lang\en\custom.php
- Изменен файл lang\ge\custom.php
- Изменен файл resources\views\livewire\back\orders\order-component.blade.php
- Изменен файл resources\views\livewire\back\orders\order-details-component.blade.php
- Изменен файл resources\views\livewire\components\filter-offcanvas-area-component.blade.php
- Изменен файл resources\views\livewire\front\user\orders-component.blade.php

### **v4.29.4-dev - (FIX)**
- Изменен файл app\Livewire\Front\Shop\SearchComponent.php
- Изменен файл app\Livewire\Back\Products\EditProductComponent.php
- Изменен файл app\Livewire\Front\Shop\CheckoutComponent.php
- Изменен файл app\Livewire\Front\Shop\DetailsComponent.php
- Изменен файл app\Livewire\Front\Shop\IndexComponent.php
- Изменен файл lang\az\custom.php
- Изменен файл lang\en\custom.php
- Изменен файл lang\ge\custom.php
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\edit-product-component.blade.php
- Изменен файл resources\views\livewire\front\shop\details-component.blade.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php

### **v4.29.5-dev - (FIX)**
- Изменен файл resources\views\livewire\components\footer-component.blade.php

### **v4.29.6-dev - (FIX)**
- Изменен файл app\Livewire\Front\Shop\ThankyouComponent.php
- Изменен файл lang\az\custom.php
- Изменен файл lang\en\custom.php
- Изменен файл lang\ge\custom.php
- Изменен файл resources\views\livewire\front\shop\thankyou-component.blade.php

### **v4.29.7-dev - (FIX)**
- Изменен файл app\Livewire\Components\HeaderComponent.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Изменен файл resources\views\livewire\components\offcanvas-area-component.blade.php

### **v4.29.8-dev - (FIX)**
- Изменен файл app\Livewire\Back\Orders\OrderComponent.php
- Изменен файл app\Livewire\Components\HeaderComponent.php
- Изменен файл resources\views\livewire\components\header-component.blade.php

### **v4.29.9-dev - (FIX)**
- Изменен файл app\Livewire\Front\Shop\DetailsComponent.php
- Изменен файл app\Livewire\Front\IndexComponent.php
- Изменен файл resources\views\livewire\front\index-component.blade.php

### **v4.29.10-dev - (FIX)**
- Создан файл app\Models\Terms\Terms.php
- Создан файл app\Models\Terms\TermsTranslation.php
- Создан файл database\migrations\2024_05_16_131656_create_terms_table.php
- Создан файл database\migrations\2024_05_16_131704_create_terms_translations_table.php
- Изменен файл app\Models\Terms\Terms.php
- Изменен файл app\Models\Terms\TermsTranslation.php
- Изменен файл database\migrations\2024_05_16_131656_create_terms_table.php
- Изменен файл database\migrations\2024_05_16_131704_create_terms_translations_table.php
- Создан файл app\Livewire\Back\Terms\AddTermsComponent.php
- Создан файл app\Livewire\Back\Terms\EditTermsComponent.php
- Создан файл app\Livewire\Back\Terms\TermsComponent.php
- Изменен файл routes\web.php
    - Создан маршрут back.terms.add
    - Создан маршрут back.terms
    - Создан маршрут back.terms.edit
- Изменен файл app\Livewire\Back\Terms\AddTermsComponent.php
- Изменен файл app\Livewire\Back\Terms\EditTermsComponent.php
- Изменен файл app\Livewire\Back\Terms\TermsComponent.php
- Изменен файл resources\views\livewire\back\terms\add-terms-component.blade.php
- Изменен файл resources\views\livewire\back\terms\edit-terms-component.blade.php
- Изменен файл resources\views\livewire\back\terms\terms-component.blade.php
- Изменен файл lang\az\custom.php
- Изменен файл lang\en\custom.php
- Изменен файл lang\ge\custom.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Создан файл app\Livewire\Front\Rules\TermsComponent.php
- Создан файл resources\views\livewire\front\rules\terms-component.blade.php
- Изменен файл app\Livewire\Front\Rules\TermsComponent.php
- Изменен файл resources\views\livewire\front\rules\terms-component.blade.php
- Изменен файл routes\web.php
    - Создан маршрут app.rules.terms
- Изменен файл resources\views\livewire\components\footer-component.blade.php
- Изменен файл resources\views\auth\register.blade.php

### **v4.29.11-dev - (FIX)**
- Создан файл app\Livewire\Back\Rules\Privacy\AddPrivacyPolicyComponent.php
- Создан файл app\Livewire\Back\Rules\Privacy\EditPrivacyPolicyComponent.php
- Создан файл app\Livewire\Back\Rules\Privacy\PrivacyPolicyComponent.php
- Создан файл app\Livewire\Back\Rules\Return\AddReturnPolicyComponent.php
- Создан файл app\Livewire\Back\Rules\Return\EditReturnPolicyComponent.php
- Создан файл app\Livewire\Back\Rules\Return\ReturnPolicyComponent.php
- Создан файл app\Livewire\Back\Rules\Terms\AddTermsPolicyComponent.php
- Создан файл app\Livewire\Back\Rules\Terms\EditTermsPolicyComponent.php
- Создан файл app\Livewire\Back\Rules\Terms\TermsPolicyComponent.php
- Создан файл app\Livewire\Front\Rules\PrivacyPolicyComponent.php
- Создан файл app\Livewire\Front\Rules\ReturnPolicyComponent.php
- Создан файл app\Livewire\Front\Rules\TermsPolicyComponent.php
- Создан файл app\Models\Rules\PrivacyPolicy.php
- Создан файл app\Models\Rules\PrivacyPolicyTranslation.php
- Создан файл app\Models\Rules\ReturnPolicy.php
- Создан файл app\Models\Rules\ReturnPolicyTranslation.php
- Создан файл app\Models\Rules\TermsPolicy.php
- Создан файл app\Models\Rules\TermsPolicyTranslation.php
- Создан файл database\migrations\2024_05_17_211012_create_terms_policies_table.php
- Создан файл database\migrations\2024_05_17_211034_create_terms_policy_translations_table.php
- Создан файл database\migrations\2024_05_17_211050_create_privacy_policies_table.php
- Создан файл database\migrations\2024_05_17_211057_create_privacy_policy_translations_table.php
- Создан файл database\migrations\2024_05_17_211115_create_return_policies_table.php
- Создан файл database\migrations\2024_05_17_211121_create_return_policy_translations_table.php
- Создан файл resources\views\livewire\back\rules\privacy\add-privacy-policy-component.blade.php
- Создан файл resources\views\livewire\back\rules\privacy\edit-privacy-policy-component.blade.php
- Создан файл resources\views\livewire\back\rules\privacy\privacy-policy-component.blade.php
- Создан файл resources\views\livewire\back\rules\return\add-return-policy-component.blade.php
- Создан файл resources\views\livewire\back\rules\return\edit-return-policy-component.blade.php
- Создан файл resources\views\livewire\back\rules\return\return-policy-component.blade.php
- Создан файл resources\views\livewire\back\rules\terms\add-terms-policy-component.blade.php
- Создан файл resources\views\livewire\back\rules\terms\edit-terms-policy-component.blade.php
- Создан файл resources\views\livewire\back\rules\terms\terms-policy-component.blade.php
- Создан файл resources\views\livewire\front\rules\privacy-policy-component.blade.php
- Создан файл resources\views\livewire\front\rules\return-policy-component.blade.php
- Создан файл resources\views\livewire\front\rules\terms-policy-component.blade.php
- Изменен файл app\Livewire\Back\Rules\Privacy\AddPrivacyPolicyComponent.php
- Изменен файл app\Livewire\Back\Rules\Privacy\EditPrivacyPolicyComponent.php
- Изменен файл app\Livewire\Back\Rules\Privacy\PrivacyPolicyComponent.php
- Изменен файл app\Livewire\Back\Rules\Return\AddReturnPolicyComponent.php
- Изменен файл app\Livewire\Back\Rules\Return\EditReturnPolicyComponent.php
- Изменен файл app\Livewire\Back\Rules\Return\ReturnPolicyComponent.php
- Изменен файл app\Livewire\Back\Rules\Terms\AddTermsPolicyComponent.php
- Изменен файл app\Livewire\Back\Rules\Terms\EditTermsPolicyComponent.php
- Изменен файл app\Livewire\Back\Rules\Terms\TermsPolicyComponent.php
- Изменен файл app\Livewire\Front\Rules\PrivacyPolicyComponent.php
- Изменен файл app\Livewire\Front\Rules\ReturnPolicyComponent.php
- Изменен файл app\Livewire\Front\Rules\TermsPolicyComponent.php
- Изменен файл app\Models\Rules\PrivacyPolicy.php
- Изменен файл app\Models\Rules\PrivacyPolicyTranslation.php
- Изменен файл app\Models\Rules\ReturnPolicy.php
- Изменен файл app\Models\Rules\ReturnPolicyTranslation.php
- Изменен файл app\Models\Rules\TermsPolicy.php
- Изменен файл app\Models\Rules\TermsPolicyTranslation.php
- Изменен файл database\migrations\2024_05_17_211012_create_terms_policies_table.php
- Изменен файл database\migrations\2024_05_17_211034_create_terms_policy_translations_table.php
- Изменен файл database\migrations\2024_05_17_211050_create_privacy_policies_table.php
- Изменен файл database\migrations\2024_05_17_211057_create_privacy_policy_translations_table.php
- Изменен файл database\migrations\2024_05_17_211115_create_return_policies_table.php
- Изменен файл database\migrations\2024_05_17_211121_create_return_policy_translations_table.php
- Изменен файл resources\views\livewire\back\rules\privacy\add-privacy-policy-component.blade.php
- Изменен файл resources\views\livewire\back\rules\privacy\edit-privacy-policy-component.blade.php
- Изменен файл resources\views\livewire\back\rules\privacy\privacy-policy-component.blade.php
- Изменен файл resources\views\livewire\back\rules\return\add-return-policy-component.blade.php
- Изменен файл resources\views\livewire\back\rules\return\edit-return-policy-component.blade.php
- Изменен файл resources\views\livewire\back\rules\return\return-policy-component.blade.php
- Изменен файл resources\views\livewire\back\rules\terms\add-terms-policy-component.blade.php
- Изменен файл resources\views\livewire\back\rules\terms\edit-terms-policy-component.blade.php
- Изменен файл resources\views\livewire\back\rules\terms\terms-policy-component.blade.php
- Изменен файл resources\views\livewire\front\rules\privacy-policy-component.blade.php
- Изменен файл resources\views\livewire\front\rules\return-policy-component.blade.php
- Изменен файл resources\views\livewire\front\rules\terms-policy-component.blade.php
- Изменен файл lang\az\custom.php
- Изменен файл lang\en\custom.php
- Изменен файл lang\ge\custom.php
- Изменен файл resources\views\livewire\components\footer-component.blade.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Изменен файл routes\web.php
 - Создан маршрут app.rules.privacy
 - Создан маршрут app.rules.return
 - Создан маршрут back.privacy.add
 - Создан маршрут back.privacy
 - Создан маршрут back.privacy.edit
 - Создан маршрут back.return.add
 - Создан маршрут back.return.
 - Создан маршрут back.return.edit

### **v4.29.12 - (FIX)**
- Изменен файл app\Http\Controllers\LanguageController.php
- Изменен файл app\Http\Middleware\Language.php
- Изменен файл resources\views\livewire\components\header-component.blade.php

### **v4.29.13 - (FIX)**
- Изменен файл app\Livewire\Back\Admin\DashboardComponent.php
- Изменен файл app\Livewire\Back\Categories\AddCategoryComponent.php
- Изменен файл app\Livewire\Back\Categories\EditCategoryComponent.php
- Изменен файл app\Livewire\Back\Products\EditProductComponent.php
- Изменен файл resources\views\livewire\back\admin\dashboard-component.blade.php
- Изменен файл resources\views\livewire\back\categories\add-category-component.blade.php
- Изменен файл resources\views\livewire\back\categories\edit-category-component.blade.php
- Изменен файл resources\views\livewire\back\products\add-product-component.blade.php
- Изменен файл resources\views\livewire\back\products\edit-product-component.blade.php
- Изменен файл resources\views\livewire\components\header-component.blade.php
- Изменен файл resources\views\livewire\components\header-sticky-component.blade.php

### **v4.29.14 - (FIX)**
- Изменен файл public\assets\css\alstori-main.css
- Изменен файл resources\views\livewire\front\shop\category-component.blade.php
- Изменен файл resources\views\livewire\front\index-component.blade.php

### **v4.29.15 - (FIX)**
- Изменен файл lang\az\custom.php
- Изменен файл lang\en\custom.php
- Изменен файл lang\ge\custom.php
- Изменен файл resources\views\livewire\front\shop\index-component.blade.php
- Изменен файл resources\views\livewire\front\shop\search-component.blade.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php

### **v4.29.16 - (FIX)**
- Изменен файл app\Livewire\Components\HeaderComponent.php
- Изменен файл lang\az\custom.php

### **v4.29.17 - (FIX)**
- Изменен файл resources\views\livewire\components\bottom-menu-sticky-component.blade.php

### **v4.29.18 - (FIX)**
- Изменен файл app\Livewire\Front\IndexComponent.php
- Изменен файл resources\views\livewire\front\shop\search-component.blade.php
- Изменен файл resources\views\livewire\front\shop\sub-category-component.blade.php
- Изменен файл resources\views\livewire\front\index-component.blade.php

### **v4.29.19 - (FIX)**
- Изменен файл lang\az\custom.php
- Изменен файл lang\en\custom.php
- Изменен файл lang\ge\custom.php
- Изменен файл public\assets\css\main.css
- Добавлены шрифты для азербайджанского языка
- Изменен файл resources\views\livewire\front\index-component.blade.php

### **v4.29.20 - (FIX)**
- Изменен файл resources\views\livewire\components\footer-component.blade.php




---

### Пакеты проекта:
- astrotomic/laravel-translatable, v11.12.1, Пакет Laravel для мультиязычных моделей
- brick/math, 0.11.0, Библиотека произвольной арифметики
- carbonphp/carbon-doctrine-types, 2.1.0, Типы для использования Carbon в Doctrine
- dflydev/dot-access-data, v3.0.2, При заданной глубокой структуре данных обеспечивает доступ к данным по точечной нотации.
- doctrine/inflector, 2.0.10, Небольшая библиотека Doctrine Inflector, которая может выполнять манипуляции со строками в отношении регистра букв и т. д.
- doctrine/lexer, 3.0.1, PHP библиотека парсера Doctrine Lexer, которая может использоваться в парсерах снизу вверх, рекурсивного спуска.
- dragonmantank/cron-expression, v3.3.3, CRON для PHP: вычисление следующей или предыдущей даты запуска и определение, должно ли выполняться выражение CRON
- egulias/email-validator, 4.0.2, Библиотека для валидации электронной почты согласно нескольким RFC
- fakerphp/faker, v1.23.1, Faker - это PHP библиотека, которая генерирует фальшивые данные для вас.
- filp/whoops, 2.15.4, Обработка ошибок PHP для крутых ребят
- fruitcake/php-cors, v1.3.0, Библиотека пересечения ресурсов с разным происхождением для Symfony HttpFoundation
- graham-campbell/result-type, v1.1.2, Реализация типа результата
- guzzlehttp/guzzle, 7.8.1, Guzzle - это PHP HTTP клиентская библиотека
- guzzlehttp/promises, 2.0.2, Библиотека обещаний Guzzle
- guzzlehttp/psr7, 2.6.2, Реализация сообщения PSR-7, которая также предоставляет общие утилиты
- guzzlehttp/uri-template, v1.0.3, Класс полифилла для uri_template PHP
- hamcrest/hamcrest-php, v2.0.1, Это порт Hamcrest Matchers на PHP
- hardevine/shoppingcart, 3.3, Laravel Shoppingcart
- intervention/gif, 4.1.0, Собственный PHP-кодер/декодер GIF
- intervention/image, 3.5.1, Манипулирование изображениями PHP
- laravel/framework, v10.48.4, Фреймворк Laravel.
- laravel/pint, v1.15.0, Основанный на мнениях форматтер кода для PHP.
- laravel/prompts, v0.1.17,
- laravel/sail, v1.29.1, Файлы Docker для запуска базового приложения Laravel.
- laravel/sanctum, v3.3.3, Laravel Sanctum предоставляет легковесную систему аутентификации для SPA и простых API.
- laravel/serializable-closure, v1.3.3, Laravel Serializable Closure обеспечивает простой и безопасный способ сериализации замыканий в PHP.
- laravel/tinker, v2.9.0, Мощный REPL для фреймворка Laravel.
- laravel/ui, v4.5.1, Утилиты и пресеты Laravel UI.
- league/commonmark, 2.4.2, Высокорасширяемый PHP парсер Markdown, который полностью поддерживает спецификацию CommonMark и GitHub-Flavored Markdown (GFM)
- league/config, v1.2.0, Определение массивов конфигурации с строгими схемами и доступ к значениям с точечной нотацией
- league/flysystem, 3.26.0, Абстракция хранения файлов для PHP
- league/flysystem-local, 3.25.1, Локальный адаптер файловой системы для Flysystem.
- league/mime-type-detection, 1.15.0, Обнаружение MIME-типов для Flysystem
- livewire/livewire, v3.4.9, Фронтенд-фреймворк для Laravel.
- mockery/mockery, 1.6.11, Mockery - это простой, но гибкий PHP фреймворк для мок-объектов
- monolog/monolog, 3.5.0, Отправляет ваши логи в файлы, сокеты, почтовые ящики, базы данных и различные веб-сервисы
- myclabs/deep-copy, 1.11.1, Создание глубоких копий (клонов) ваших объектов
- nesbot/carbon, 2.72.3, Расширение API для DateTime, поддерживающее 281 различный язык
- nette/schema, v1.3.0, Nette Schema: проверка структур данных по заданной схеме
- nette/utils, v4.0.4, Nette Utils: легковесные утилиты для манипуляции строками и массивами, обработки изображений, безопасного кодирования/декодирования JSON и многое другое
- nikic/php-parser, v5.0.2, PHP-парсер, написанный на PHP
- nunomaduro/collision, v7.10.0, Обработка ошибок CLI для приложений PHP в командной строке
- nunomaduro/termwind, v1.15.1, Это похоже на Tailwind CSS, но для консоли
- phar-io/manifest, 2.0.4, Компонент для чтения информации о манифесте phar.io из PHP Archive (PHAR)
- phar-io/version, 3.2.1, Библиотека для обработки информации о версии и ограничениях
- phpoption/phpoption, 1.9.2, Опционный тип для PHP
- phpunit/php-code-coverage, 10.1.14, Библиотека, которая предоставляет функции сбора, обработки и отображения информации о покрытии кода PHP.
- phpunit/php-file-iterator, 4.1.0, Реализация FilterIterator, которая фильтрует файлы на основе списка суффиксов.
- phpunit/php-invoker, 4.0.0, Вызов вызываемых объектов с тайм-аутом
- phpunit/php-text-template, 3.0.1, Простой шаблонизатор.
- phpunit/php-timer, 6.0.0, Утилитный класс для замера времени
- phpunit/phpunit, 10.5.16, Фреймворк PHP Unit Testing.
- psr/clock, 1.0.0, Общий интерфейс для считывания времени.
- psr/container, 2.0.2, Общий интерфейс контейнера (PHP FIG PSR-11)
- psr/event-dispatcher, 1.0.0, Стандартные интерфейсы для обработки событий.
- psr/http-client, 1.0.3, Общий интерфейс для HTTP-клиентов
- psr/http-factory, 1.0.2, Общие интерфейсы для фабрик сообщений PSR-7 HTTP
- psr/http-message, 2.0, Общий интерфейс для HTTP-сообщений
- psr/log, 3.0.0, Общий интерфейс для библиотек журналирования
- psr/simple-cache, 3.0.0, Общие интерфейсы для простого кэширования
- psy/psysh, v0.12.2, Интерактивная оболочка для современного PHP.
- ralouphie/getallheaders, 3.0.3, Полифилл для getallheaders.
- ramsey/collection, 2.0.0, Библиотека PHP для представления и манипуляции коллекциями.
- ramsey/uuid, 4.7.5, Библиотека PHP для генерации и работы с универсальными уникальными идентификаторами (UUID).
- sebastian/cli-parser, 2.0.1, Библиотека для разбора параметров командной строки
- sebastian/code-unit, 2.0.0, Набор значений объектов, представляющих PHP код
- sebastian/code-unit-reverse-lookup, 3.0.0, Определяет, какая функция или метод принадлежит строке кода
- sebastian/comparator, 5.0.1, Предоставляет функциональность сравнения значений PHP на равенство
- sebastian/complexity, 3.2.0, Библиотека для расчета сложности кода PHP
- sebastian/diff, 5.1.1, Реализация различий
- sebastian/environment, 6.1.0, Предоставляет функциональность для обработки окружения HHVM/PHP
- sebastian/exporter, 5.1.2, Предоставляет функциональность экспорта переменных PHP для визуализации
- sebastian/global-state, 6.0.2, Snapshotting глобального состояния
- sebastian/lines-of-code, 2.0.2, Библиотека для подсчета строк кода в исходном коде PHP
- sebastian/object-enumerator, 5.0.0, Обход структур массивов и объектов для перечисления всех ссылочных объектов
- sebastian/object-reflector, 3.0.0, Позволяет отражение атрибутов объекта, включая унаследованные и непубличные
- sebastian/recursion-context, 5.0.0, Предоставляет функциональность для рекурсивной обработки переменных PHP
- sebastian/type, 4.0.0, Набор значений объектов, представляющих типы PHP
- sebastian/version, 4.0.1, Библиотека, которая помогает управлять версией проектов PHP, хостящихся на Git
- spatie/backtrace, 1.5.3, Лучший трассировщик
- spatie/flare-client-php, 1.4.4, Отправляет ошибки PHP в Flare
- spatie/ignition, 1.13.1, Красивая страница ошибок для PHP приложений.
- spatie/laravel-ignition, 2.5.0, Красивая страница ошибок для приложений Laravel.
- symfony/console, v6.4.4, Упрощает создание красивых и тестируемых интерфейсов командной строки
- symfony/css-selector, v7.0.3, Преобразует CSS селекторы в XPath выражения
- symfony/deprecation-contracts, v3.4.0, Общая функция и соглашение для вызова уведомлений о неактуальности
- symfony/error-handler, v6.4.4, Предоставляет инструменты для управления ошибками и облегчения отладки PHP кода
- symfony/event-dispatcher, v7.0.3, Предоставляет инструменты, позволяющие компонентам вашего приложения общаться между собой путем отправки событий и прослушивания их
- symfony/event-dispatcher-contracts, v3.4.0, Общие абстракции, относящиеся к отправке событий
- symfony/finder, v6.4.0, Находит файлы и каталоги через интуитивно понятный плавный интерфейс
- symfony/http-foundation, v6.4.4, Определяет объектно-ориентированный уровень для спецификации HTTP
- symfony/http-kernel, v6.4.5, Предоставляет структурированный процесс преобразования запроса в ответ
- symfony/mailer, v6.4.4, Помогает отправлять электронные письма
- symfony/mime, v6.4.3, Позволяет манипулировать MIME-сообщениями
- symfony/polyfill-ctype, v1.29.0, Полифилл Symfony для функций ctype
- symfony/polyfill-intl-grapheme, v1.29.0, Полифилл Symfony для функций grapheme_* intl
- symfony/polyfill-intl-idn, v1.29.0, Полифилл Symfony для функций idn_to_ascii и idn_to_utf8 intl
- symfony/polyfill-intl-normalizer, v1.29.0, Полифилл Symfony для класса Normalizer и связанных функций intl
- symfony/polyfill-mbstring, v1.29.0, Полифилл Symfony для расширения Mbstring
- symfony/polyfill-php72, v1.29.0, Symfony полифилл, возвращающий некоторые функции PHP 7.2+ на более низкие версии PHP
- symfony/polyfill-php80, v1.29.0, Symfony полифилл, возвращающий некоторые функции PHP 8.0+ на более низкие версии PHP
- symfony/polyfill-php83, v1.29.0, Symfony полифилл, возвращающий некоторые функции PHP 8.3+ на более низкие версии PHP
- symfony/polyfill-uuid, v1.29.0, Symfony полифилл для функций uuid
- symfony/process, v6.4.4, Выполняет команды в дочерних процессах
- symfony/routing, v6.4.5, Отображает HTTP запрос на набор переменных конфигурации
- symfony/service-contracts, v3.4.1, Общие абстракции, относящиеся к написанию служб
- symfony/string, v7.0.4, Предоставляет объектно-ориентированный API для строк и работает с байтами, кодовыми точками UTF-8 и графемными кластерами единым образом
- symfony/translation, v6.4.4, Предоставляет инструменты для интернационализации вашего приложения
- symfony/translation-contracts, v3.4.1, Общие абстракции, относящиеся к переводу
- symfony/uid, v6.4.3, Предоставляет объектно-ориентированный API для генерации и представления UID
- symfony/var-dumper, v6.4.4, Предоставляет механизмы для обхода любой произвольной PHP переменной
- symfony/yaml, v7.0.3, Загружает и выгружает YAML файлы
- theseer/tokenizer, 1.2.3, Небольшая библиотека для преобразования токенизированного исходного кода PHP в XML и, возможно, другие форматы
- tijsverkoyen/css-to-inline-styles, v2.2.7, CssToInlineStyles - это класс, который позволяет преобразовывать HTML-страницы/файлы в HTML-страницы/файлы с встроенными стилями. Эт...
- vlucas/phpdotenv, v5.6.0, Загружает переменные окружения из файла .env в getenv(), $_ENV и $_SERVER автоматически.
- voku/portable-ascii, 2.0.1, Портативная ASCII библиотека - оптимизированные (ascii) строковые функции для php.
- webmozart/assert, 1.11.0, Утверждения для проверки ввода/вывода метода с красивыми сообщениями об ошибках.
