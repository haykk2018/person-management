php artisan make:model Person -mfsc(# Generate a model and a migration, factory, seeder, and controller...)\
and made views than for index and create methods.\
Route::resources(['/' =>PersonController::class,]);(made routs for all PersonController's methods)\
you can see yours all routes - php artisan route:list\
