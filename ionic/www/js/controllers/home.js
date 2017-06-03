angular.module('starter.controllers')
    .controller('HomeCtrl', ['$scope', '$cookies', function ($scope, $cookies) {
        $scope.userInfo = $cookies.getObject('userInfo');
}]);