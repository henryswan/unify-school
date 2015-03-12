/**
 * Created by kaso on 11/6/2014.
 */
var app = angular.module('UnifySchoolApp.Services', []);

app.factory('SchoolService', ['$resource', function ($resource) {
    return $resource('/resources/school/:id', {id: '@id'}, {
        'update': {method: 'PUT'}
    });
}]);

app.factory('SchoolSetupService', ['$resource', function ($resource) {
    return $resource('/resources/school-setup/:id', {id: '@id'}, {
        'update': {method: 'PUT'}
    });
}]);

app.factory('PreloadTemplates',function ($templateCache, $http,ViewBaseURL) {
    var templates = [
        ViewBaseURL+"/device-make.html",
        ViewBaseURL+"/device-model.html",
        ViewBaseURL+"/device-size.html",
        ViewBaseURL+"/device-network.html",
        ViewBaseURL+"/device-condition.html",
        ViewBaseURL+"/device-reward.html",
        ViewBaseURL+"/book-appointment.html",
        ViewBaseURL+"/book-success.html",
        ViewBaseURL+"/swap-location.html"
    ];
    return {
        run: function(){
            templates.forEach(function(currentItem){
                $http.get(currentItem, { cache: $templateCache });
            });
        }
    }
});