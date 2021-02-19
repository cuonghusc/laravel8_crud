##GUIDE

- Clone project
`git clone https://github.com/cuonghusc/laravel8_crud`

- Create a schema on mysql. Example : `laravel8_crud`

- Copy file `.env`

- Change something
```
DB_CONNECTION=******
DB_HOST=******
DB_PORT=******
DB_DATABASE=******
DB_USERNAME=******
DB_PASSWORD=******
```

- Run migrate
`php artisan migrate`

- Run seeder
`php artisan db:seed`

- Run server
`php artisan serve`

- Open Postman to test api
    + POST      `/api/register`         => User Register
    + POST      `/api/login`            => User Login
    + GET       `/api/student`          => Get All Student
    + GET       `/api/student/{id}`     => Student By ID
    + POST      `/api/student`          => Create A New Student
    + PUT       `/api/student/{id}`     => Update Student Information
    + DELETE    `/api/student/{id}`     => Delete A Student