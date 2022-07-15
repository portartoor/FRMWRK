# FRMWRK v 1.0

contains:

- php framework on MVC pattern + easy configurable pattern system
- ability to load modules
- templating core with jquery 3.3.1 and normalized css included
- maximum logic and usability conception
- nothing superfluous, only really necessary functionality and code

# Instalation

1. clone this repository to your hosting root, or download zip archive and unpack to your root folder.
2. set your database access settings in config file: [core/config.php](core/config.php)

# Library functions

All framework functions is placed inside mine lib file: [core/libs/frmwrk/frmwrk.php](core/libs/frmwrk/frmwrk.php)

# Usage

Because the basic framework build is assembled with MVC pattern you can easy operate with your pages by:

- Models [core/models/](core/models/)
- Views [core/views/](core/views/)
- Controls [core/controls/](core/controls/)

You can just create the file inside Views directory, which one named literally same as your wanted page in url link:

fore example: [core/views/debug.php](core/views/debug.php)
is responsible for https://your-domain.com/debug/

Inside [core/config.php](core/config.php) you can set:

- No-Ui mode ($NoUImode)
- different templates for diferrent urls ($TemplateRoutes)

