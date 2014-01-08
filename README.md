symfony-cli-skeleton
====================

Basic skeleton for building a Symfony CLI application.

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/38ae73e9-1c58-451c-8f55-c508dc31da27/mini.png)](https://insight.sensiolabs.com/projects/38ae73e9-1c58-451c-8f55-c508dc31da27)

License
-------

Copyright (c) 2013 Miguel Angel Gabriel (magabriel@gmail.com)

This extension is licensed under the MIT license. See `LICENSE.md`.

Description
-----------

This is a basic skeleton for a CLI application using some Symfony components:

- **Dependency injection** instead of *Pimple* because it is more flexible and allows easy configuration from a `services.yml` file.

- **Config** and **Yaml** for dealing with configuration files.

Other components, like **Filesystem** and **Finder** are also used for utility purposes.

And, of course, the greatest **Console** for, well, you know, *console* things ;)  

Basic usage
-----------

1. Clone the Git repository or download the compressed package.
2. Modify `config/config.yml` to suit your needs.
3. Install vendors with composer: `composer install`.
4. Execute `php run.php` to see if everything works.

Customization
-------------

The project is organized around two namespaces: `Skel` and `YourNamespace`. You should replace `YourNamespace` with the namespace name that you intend to use, both inside source files and `src/` subdirectory.  

### Adding commands

Directory `src/YourNamespace/Console/Command` holds all the console commands of your application. Just create the appropriate files in there and the skeleton will take care of registering them (i.e. they will be immediately available). Please use `TestCommand.php` as an example.  

Build
-----

Execute `php build.php` and a `phar` file will be automagically generated inside the `build/` project subdirectory. You can rename or/and copy this `phar` file to wherever you want and use it to execute you shinny CLI application.   

About versions
--------------

File `config/build.yml` stores the *current* application version string that is shown when it is run. The version string is incremented *after* each build following a naming pattern that can be found in the same file and that can be easily customized to suit your needs.
 
 

