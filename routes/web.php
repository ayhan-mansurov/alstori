<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Livewire\Back\Admin\DashboardComponent;
use App\Livewire\Back\Categories\AddCategoryComponent;
use App\Livewire\Back\Categories\CategoryComponent;
use App\Livewire\Back\Categories\EditCategoryComponent;
use App\Livewire\Back\Orders\OrderComponent;
use App\Livewire\Back\Orders\OrderDetailsComponent;
use App\Livewire\Back\Products\AddProductComponent;
use App\Livewire\Back\Products\EditProductComponent;
use App\Livewire\Back\Products\ProductComponent;
use App\Livewire\Back\Products\SearchComponent as ProductsSearchComponent;
use App\Livewire\Back\Rules\Privacy\AddPrivacyPolicyComponent;
use App\Livewire\Back\Rules\Privacy\EditPrivacyPolicyComponent;
use App\Livewire\Back\Rules\Privacy\PrivacyPolicyComponent;
use App\Livewire\Back\Rules\Return\AddReturnPolicyComponent;
use App\Livewire\Back\Rules\Return\EditReturnPolicyComponent;
use App\Livewire\Back\Rules\Return\ReturnPolicyComponent;
use App\Livewire\Back\Rules\Terms\AddTermsPolicyComponent;
use App\Livewire\Back\Rules\Terms\EditTermsPolicyComponent;
use App\Livewire\Back\Rules\Terms\TermsPolicyComponent;
use App\Livewire\Front\IndexComponent;
use App\Livewire\Front\Rules\PrivacyPolicyComponent as RulesPrivacyPolicyComponent;
use App\Livewire\Front\Rules\ReturnPolicyComponent as RulesReturnPolicyComponent;
use App\Livewire\Front\Rules\TermsPolicyComponent as RulesTermsPolicyComponent;
use App\Livewire\Front\Shop\CartComponent;
use App\Livewire\Front\Shop\CategoryComponent as ShopCategoryComponent;
use App\Livewire\Front\Shop\CheckoutComponent;
use App\Livewire\Front\Shop\DetailsComponent;
use App\Livewire\Front\Shop\IndexComponent as ShopIndexComponent;
use App\Livewire\Front\Shop\SearchComponent;
use App\Livewire\Front\Shop\SubCategoryComponent;
use App\Livewire\Front\Shop\ThankyouComponent;
use App\Livewire\Front\Shop\WishlistComponent;
use App\Livewire\Front\User\MyAccountComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
| Здесь вы можете зарегистрировать веб-маршруты для вашего приложения.
| Эти маршруты загружаются RouteServiceProvider и все они будут назначены группе
| промежуточного ПО 'web'. Создайте что-то великое!
|
*/

//////////////////////////////////////////////////////////////////////////////////////////////////

// Маршруты для всех пользователей
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Auth::routes();
Route::get('/', IndexComponent::class)->name('app.index');
Route::get('/shop', ShopIndexComponent::class)->name('app.shop');
Route::get('/shop/category/{slug}', ShopCategoryComponent::class)->name('app.shop.category');
Route::get('/shop/category/sub-category/{slug}', SubCategoryComponent::class)->name('app.shop.category.sub-category');
Route::get('/shop/details/{slug}', DetailsComponent::class)->name('app.shop.details');
Route::get('/search', SearchComponent::class)->name('app.shop.search');
Route::get('/cart', CartComponent::class)->name('app.shop.cart');
Route::get('/wishlist', WishlistComponent::class)->name('app.shop.wishlist');
Route::get('/terms', RulesTermsPolicyComponent::class)->name('app.rules.terms');
Route::get('/privacy',RulesPrivacyPolicyComponent::class)->name('app.rules.privacy');
Route::get('/return',RulesReturnPolicyComponent::class)->name('app.rules.return');

//////////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware('auth')->group(function() {
    //Уведомление о проверке электронной почты
    Route::get('/email/verify', [VerificationController::class, 'notice'])
    ->middleware('auth')
    ->name('verification.notice');

    //Обработчик проверки электронной почты
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

    //Повторная отправка письма с подтверждением
    Route::post('/email/verification-notification', [VerificationController::class, 'notification'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');
});

//////////////////////////////////////////////////////////////////////////////////////////////////

// Маршруты для пользователей
Route::middleware('auth', 'verified')->group(function() {
    Route::get('/my-account', MyAccountComponent::class)->name('user.myaccount');
    Route::get('/checkout', CheckoutComponent::class)->name('app.shop.checkout');
    Route::get('/thank-you', ThankyouComponent::class)->name('app.shop.thankyou');
});

//////////////////////////////////////////////////////////////////////////////////////////////////

// Маршруты для администраторов
Route::prefix('admin')->group(function () {
    Route::middleware('auth', 'verified', 'auth.admin')->group(function() {

        Route::get('/dashboard', DashboardComponent::class)->name('admin.dashboard');

        Route::get('/categories/add', AddCategoryComponent::class)->name('back.categories.add');
        Route::get('/categories', CategoryComponent::class)->name('back.categories');
        Route::get('/categories/edit/{slug}/{scategory_slug?}', EditCategoryComponent::class)->name('back.categories.edit');

        Route::get('/products/add', AddProductComponent::class)->name('back.products.add');
        Route::get('/products', ProductComponent::class)->name('back.products');
        Route::get('/products/edit/{slug}', EditProductComponent::class)->name('back.products.edit');

        Route::get('/search', ProductsSearchComponent::class)->name('back.products.search');

        Route::get('/orders', OrderComponent::class)->name('back.orders');
        Route::get('/orders/{id}', OrderDetailsComponent::class)->name('back.orders.details');

        Route::get('/terms-policy/add', AddTermsPolicyComponent::class)->name('back.terms.add');
        Route::get('/terms-policy', TermsPolicyComponent::class)->name('back.terms');
        Route::get('/terms-policy/edit/{slug}', EditTermsPolicyComponent::class)->name('back.terms.edit');

        Route::get('/privacy-policy/add', AddPrivacyPolicyComponent::class)->name('back.privacy.add');
        Route::get('/privacy-policy', PrivacyPolicyComponent::class)->name('back.privacy');
        Route::get('/privacy-policy/edit/{slug}', EditPrivacyPolicyComponent::class)->name('back.privacy.edit');

        Route::get('/return-policy/add', AddReturnPolicyComponent::class)->name('back.return.add');
        Route::get('/return-policy', ReturnPolicyComponent::class)->name('back.return');
        Route::get('/return-policy/edit/{slug}', EditReturnPolicyComponent::class)->name('back.return.edit');

    });
});
