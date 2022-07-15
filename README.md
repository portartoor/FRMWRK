# FRMWRK v 1.0

contains:

- php framework on MVC pattern + easy configurable pattern system
- ability to load modules
- templating core with jquery 3.3.1 and normalized css included
- maximum logic and usability conception
- nothing superfluous, only really necessary functionality and code

This framework is created as alternative solution for developers to build web apps with maximum freely and easily as possible. Therefore, I left only the necessary logical and structural functions and the cleanest possible architecture. I believe that thanks to this, literally every developer gets a very convenient and understandable tool for a quick start.
More about FRMWRK project you can found at https://frmwrk.portartur.pro

# Instalation

1. clone this repository to your project root / download zip archive and unpack to your project root folder.
2. set your database access settings in config file: [core/config.php](core/config.php)

# Library functions

All framework functions is placed inside mine lib file: [core/libs/frmwrk/frmwrk.php](core/libs/frmwrk/frmwrk.php)

# Usage

routes:

> The model is presented as follows:
> https://your-domain.com/directory/page/GET_1/GET_2/GET_N/
> 
> or if directory dont exist:
> https://your-domain.com/page/GET_1/GET_2/GET_N/
>
> if you want to link to concrete files, just use this location, according the Files directory:
> 
> https://your-domain.com/custom_script.php will looking for file custom_script.php inside [core/files/](core/files/)

files:

> Because the basic framework build is assembled with MVC pattern you can easy operate with your pages by:
>
>- Models [core/models/](core/models/)
>- Views [core/views/](core/views/)
>- Controls [core/controls/](core/controls/)

> Just create files according to your url routes
> Accordingly, you should similarly create files for models and controls.
>
> If you need to use other then MVC pattern yo ucan easy change the page generation system inside [core/main.php](core/main.php) file.
>- DrawPage($FilePath) function

config:

> Inside [core/config.php](core/config.php) you can set:
>
>- $NoUImode - if the page isset in this array, page will be generated without any template.
>- $TemplateRoutes - here we have the array with association pages with concrete templates. If current page is not isset in this array, 'simple' template will be used.

modules and functions:
