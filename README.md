php artisan make:model Person -mfscr - Generate a model and a migration, factory, seeder, and controller(crud)...without r just mfsc gener without crud\
and made views for index and create methods.\
Route::resources(['/' =>PersonController::class,]);(made routs for all PersonController's methods)\
you can see yours all routes - php artisan route:list\

php artisan make:controller Person -r - generate CRUD controller
