# OOP Webmail Coding-Project
This Repository is a Work-In-Progress Project.
It is written in PHP and JSON(Configuration-Files)

## Features
- Object oriented
- Configuration in JSON
- Namespaced Autoloading
- Platform independent: Paths are using PHP Constants [DIRECTORY_SEPARATOR, etc]

##Status:
###Ready to use
- Autoloader (including Error-Log)
- Custom Errors
- Configurator (Json-Parsing, Configuration-Parsing)
- [Twig](http://twig.sensiolabs.org/ "Twig Homepage") (use templates by issuing "$app->view->render($fil[,$parameters=array()])")

###Work in Progress
- Improvements in OOP
- Database
- SMTP
- [Symfony](https://symfony.com/ "Symfony Framework")(for Web-Frontend [using components])
- [SLIM](http://www.slimframework.com/ "SLIM Framework") integration (for [routing](http://akrabat.com/routing-to-a-controller-with-slim-framework-2/ "SLIM Controller wrapper"))

###How to Use
1. clone this repository
2. install the latest version of [Composer](https://getcomposer.org/ "Composer")
3. in the root-Directory do composer install
4. configure your webroot to /web

###Volume of this project:
####Output of cloc

	C:\www>cloc www
		2944 text files.
		2854 unique files.
		995 files ignored.
	
	http://cloc.sourceforge.net v 1.62  T=26.36 s (88.3 files/s, 15609.7 lines/s)
	-------------------------------------------------------------------------------
	Language                     files          blank        comment           code
	-------------------------------------------------------------------------------
	JSON                           901              4              0         233956
	PHP                           1396          24395          53268          95718
	XSD                              4             72             28           2601
	C                                1            157            161            781
	XML                              8             28             16            108
	YAML                             5             12              9             74
	C/C++ Header                     1              7             13             15
	HTML                             8              0              0             14
	Bourne Shell                     1              5              0             12
	TypeScript                       1              0              0             10
	m4                               1              2              1              5
	-------------------------------------------------------------------------------
	SUM:                          2327          24682          53496         333294
	-------------------------------------------------------------------------------