angular.module('starter.controllers',[])
   .controller('LoginCtrl',[
        '$scope', 'OAuth','$ionicPopup', '$state', '$cookies', function($scope, OAuth, $ionicPopup, $state, $cookies) {

            $scope.user = {
                username: '',
                password: ''
            };

            $scope.login = function(){
                OAuth.getAccessToken($scope.user)
                     .then(function(data){
                         $cookies.putObject('userInfo',{nome: $scope.user.username});
                          $state.go('home');
                }, function(responseError){
                      $ionicPopup.alert({
                          title: 'Atencao',
                          template: 'Login e/ou senha invalido(s)'
                      });
                });
            }
    }]);