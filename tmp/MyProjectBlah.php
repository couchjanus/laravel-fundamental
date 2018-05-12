<?php
// Оператор namespace, внутри пространства имен
namespace MyProject;

require_once('Blah/Blah.php');

Blah\blah();

// use Blah as Mine; //импорт/создание псевдонима имени
// Mine\blah(); // вызывает функцию MyProject\blah\mine()

// class Cname
// {
//   public static function method()
//   {
//     echo "Cname::method... It's me in namespce MyProject";
//   }
// }
//
// function func()
// {
//     echo "func... It's me in namespce MyProject";
// }
//
// // namespace\Blah\blah(); // вызывает функцию MyProject\blah\mine()
//
//
// namespace\func(); // вызывает функцию MyProject\func()
// // namespace\sub\func(); // вызывает функцию MyProject\sub\func()
//
// namespace\Cname::method(); // вызывает статический метод  класса MyProject\cname
//
// // blah\mine(); // вызывает функцию MyProject\blah\mine()
//
// $a = new namespace\Cname(); // Создает экземпляр класса MyProject\cname
