var myModule = angular.module("MyModule", []);
myModule.directive("hello", function() {
    return {
        restrict: 'E',
        template: '<h1>Hi everyone!</h1>',
        replace: true
    }
});