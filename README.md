php artisan make:model Person -mfscr - Generate a model and a migration, factory, seeder, and controller(crud)...without r just mfsc gener without crud\
and made views for index and create methods.\
Route::resources(['/' =>PersonController::class,]);(made routs for all PersonController's methods)\
you can see yours all routes - php artisan route:list\

php artisan make:controller Person -r - generate CRUD controller\

##DB

1.make .env configs
2.make models
3.make migrations
php artisan migrate
for many to many 
a.make:migration create_firstdbname_secdbname_table
b.put into             
$table->integer('firstdbname_id')->unsigned();
$table->integer('secdbname_id')->unsigned();
c.put into above models each other relations
in Firstdbname model
public function secdbnames()
{
return $this->belongsToMany(Secdbname::class);
}
appropriate into Secdbname
