<?php
/**
 * Adminpanel routes
 */
Route::group(['namespace' => 'Admin' ,'prefix' => 'admin'] ,function (){

    Route::group(['namespace' => 'Auth'] ,function (){
        Route::get('/login' ,['as' => 'admin.auth' ,'uses' => 'LoginController@getLogin']);
        Route::post('/login' ,['as' => 'admin.auth' ,'uses' => 'LoginController@postLogin']);
        Route::get('/logout', 'LoginController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'] ,function (){

        //dashboard route
        Route::get('/' ,['as' => 'admin.dashboard' ,'uses' => 'DashboardController@getIndex']);

        /**
         * site-info routes
         */
        Route::group(['prefix' => 'site-info'] ,function (){
            Route::get('/' ,['as' => 'admin.settings' ,'uses' => 'SettingController@getIndex']);
            Route::post('/' ,['as' => 'admin.settings' ,'uses' => 'SettingController@postIndex']);
        });

        /**
         * home sections routes
         */
        Route::group(['prefix' => 'homePage'] ,function (){
            Route::get('/sections' ,['as' => 'admin.sections' ,'uses' => 'HomeSectionController@getIndex']);
            Route::post('/sections/edit/{id}' ,['as' => 'admin.sections.edit' ,'uses' => 'HomeSectionController@postEdit']);
        });

        /**
         * features routes
         */
        Route::group(['prefix' => 'features'] ,function (){
            Route::get('/' ,['as' => 'admin.features' ,'uses' => 'FeatureController@getIndex']);
            Route::post('/edit/{id}' ,['as' => 'admin.features.edit' ,'uses' => 'FeatureController@postEdit']);
        });

        /**
         * about routes
         */
        Route::group(['prefix' => 'about-us'] ,function (){
            Route::get('/' ,['as' => 'admin.about' ,'uses' => 'AboutController@getIndex']);
            Route::post('/' ,['as' => 'admin.about' ,'uses' => 'AboutController@postIndex']);
        });

        /**
         * testimonials routes
         */
        Route::group(['prefix' => 'testimonials'] ,function (){
            Route::get('/' ,['as' => 'admin.testimonials' ,'uses' => 'TestimonialController@getIndex']);
            Route::post('/' ,['as' => 'admin.testimonials' ,'uses' => 'TestimonialController@postIndex']);
            Route::get('/info/{id}' ,['as' => 'admin.testimonials.info' ,'uses' => 'TestimonialController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.testimonials.edit' ,'uses' => 'TestimonialController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.testimonials.delete' ,'uses' => 'TestimonialController@getDelete']);
        });

        /**
         * cities routes
         */
        Route::group(['prefix' => 'cities'] ,function (){
            Route::get('/' ,['as' => 'admin.cities' ,'uses' => 'CityController@getIndex']);
            Route::post('/' ,['as' => 'admin.cities' ,'uses' => 'CityController@postIndex']);
            Route::get('/info/{id}' ,['as' => 'admin.cities.info' ,'uses' => 'CityController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.cities.edit' ,'uses' => 'CityController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.cities.delete' ,'uses' => 'CityController@getDelete']);
        });

        /**
         * products routes
         */
        Route::group(['prefix' => 'products'] ,function (){
            Route::get('/' ,['as' => 'admin.products', 'uses' => 'ProductController@getIndex']);
            Route::post('/' ,['as' => 'admin.products', 'uses' => 'ProductController@postIndex']);
            Route::get('/info/{product}' ,['as' => 'admin.products.info', 'uses' => 'ProductController@getInfo']);
            Route::post('/edit/{product}' ,['as' => 'admin.products.edit', 'uses' => 'ProductController@postEdit']);
            Route::get('/delete/{product}' ,['as' => 'admin.products.delete', 'uses' => 'ProductController@getDelete']);

            /**
             * categories routes
             */
            Route::group(['prefix' => 'types'] ,function (){
                Route::get('/{id}' ,['as' => 'admin.products.categories' ,'uses' => 'ProductCategoryController@getIndex']);
                Route::post('/{id}' ,['as' => 'admin.products.categories' ,'uses' => 'ProductCategoryController@postIndex']);
                Route::get('/info/{id}' ,['as' => 'admin.products.categories.info' ,'uses' => 'ProductCategoryController@getInfo']);
                Route::post('/edit/{id}' ,['as' => 'admin.products.categories.edit' ,'uses' => 'ProductCategoryController@postEdit']);
                Route::get('/delete/{id}' ,['as' => 'admin.products.categories.delete' ,'uses' => 'ProductCategoryController@getDelete']);
            });
        });

        /**
         * checkouts routes
         */
        Route::group(['prefix' => 'checkouts'] ,function (){
            Route::get('/' ,['as' => 'admin.checkout' ,'uses' => 'CheckoutController@getIndex']);
            Route::get('/order/{id}' ,['as' => 'admin.checkout.single' ,'uses' => 'CheckoutController@getSingleOrder']);
            Route::get('/delete/{id}' ,['as' => 'admin.checkout.delete' ,'uses' => 'CheckoutController@getDelete']);
        });

        //subscribers route
        Route::get('/subscribers' ,['as' => 'admin.subscribers' ,'uses' => 'SubscriberController@getIndex']);
        Route::get('/subscribers/delete/{id}' ,['as' => 'admin.subscribers.delete' ,'uses' => 'SubscriberController@getDelete']);

        //messages route
        Route::get('/messages' ,['as' => 'admin.messages' ,'uses' => 'MessageController@getIndex']);
        Route::get('/messages/delete/{id}' ,['as' => 'admin.messages.delete' ,'uses' => 'MessageController@getDelete']);

    });
});

/**
 * site routes
 */
Route::group(['namespace' => 'Site'] ,function (){

    /**
     * index route
     */
    Route::get('/' ,['as' => 'site.index' ,'uses' => 'HomeController@getIndex']);
    Route::post('subscribe' ,['as' => 'site.subscribe' ,'uses' => 'HomeController@postSubscribe']);

    /**
     * about us route
     */
    Route::get('/about-us' ,['as' => 'site.about' ,'uses' => 'AboutController@getIndex']);

    /**
     * orders route
     */
    Route::get('/orders' ,['as' => 'site.orders' ,'uses' => 'OrderController@getIndex']);
    Route::get('/order/{product}' ,['as' => 'site.orders.single' ,'uses' => 'OrderController@getSingleOrder']);

    /**
     * contact us route
     */
    Route::get('/contact-us' ,['as' => 'site.contact' ,'uses' => 'ContactController@getIndex']);
    Route::post('/contact-us' ,['as' => 'site.contact' ,'uses' => 'ContactController@postIndex']);

    /**
     * cart routes
     */
    Route::get('/cart' ,['as' => 'site.cart' ,'uses' => 'CartController@getIndex']);
    Route::post('/cart/{product}' ,['as' => 'site.cart.add' ,'uses' => 'CartController@postCart']);
    Route::post('/cart/edit/{rowId}' ,['as' => 'site.cart.update' ,'uses' => 'CartController@postUpdate']);
    Route::get('/delete/{id}' ,['as' => 'site.cart.remove' ,'uses' => 'CartController@getDeleteCart']);

    /**
     * checkout routes
     */
    Route::get('/checkout' ,['as' => 'site.checkout' ,'uses' => 'CheckoutController@getIndex']);
    Route::post('/checkout' ,['as' => 'site.checkout' ,'uses' => 'CheckoutController@postIndex']);
});