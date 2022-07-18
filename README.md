# HolidayHomes
Laravel PHP University Course Project

&nbsp;&nbsp;&nbsp;&nbsp;**HolidayHomes** is a system for managing holiday homes. It is developed with Laravel 8.77.1 PHP framework. The application consists of the following models:
- House\
&nbsp;&nbsp;&nbsp;&nbsp;Every house has a name, populated place, object type, descriotion, count of rooms, count of beds and image. Houses are visible for both authenticated and non-authenticated users.
- Image\
&nbsp;&nbsp;&nbsp;&nbsp;Every image is getting uploaded to the *\public\images* folder and whenever an info for a certain house is requested it gets loaded in the corresponding view.
- Object type\
&nbsp;&nbsp;&nbsp;&nbsp;Every object type has its name.
- Populated place\
&nbsp;&nbsp;&nbsp;&nbsp;Every populated place has its name.
- User\
&nbsp;&nbsp;&nbsp;&nbsp;Every user has a username, email, password and role. Every user can have one of the following roles:
    - Admin\
        &nbsp;&nbsp;&nbsp;&nbsp;Admins can make CRUD operations over populated places and object types and change users' roles.
    - Editor\
        &nbsp;&nbsp;&nbsp;&nbsp;Editors can publish and edit his houses. Every registered user automatically gets the *editor* role.
        </ul>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For the the role creation I have used the *Spatie* package.
</br>

&nbsp;&nbsp;&nbsp;&nbsp;The application has the respective migrations for creating models' tables in the database. There is also a seed that contains data about populated places and object types which can be found in *\database\seeders\InitialSeeder.php*.