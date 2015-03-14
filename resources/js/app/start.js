/**
 * Created by kaso on 11/6/2014.
 */

var app = angular.module('UnifySchoolApp',
    [
        'ui.router',
        "angular-loading-bar",
        'UnifySchoolApp.Services',
        'ui.checkbox',
        'ui.bootstrap',
        'ngCookies',
        'ngAnimate',
        'ngResource',
        'ngSanitize',
        'UnifySchoolApp.Controllers',
        'UnifySchoolApp.directives'
    ]);

app.constant('ViewBaseURL', '/wizard/partials');

app.config(function ($stateProvider, $urlRouterProvider, ViewBaseURL) {

    $urlRouterProvider.otherwise("/setup/step-one");

    $stateProvider
        .state('base', {
            url: "/setup",
            abstract: true,
            template: '<div ui-view></div>',
            resolve: {
                'Config': ['SchoolSetupService', function (SchoolSetupService) {
                    return SchoolSetupService.get();
                }]
            },
            controller: ['$scope', 'Config', 'SchoolService', '$state', function ($scope, Config, SchoolService, $state) {
                $scope.config = Config;
                $scope.school = Config.school;


                $scope.removeCategory = function (selectedCategory, indexToRemove) {
                    $scope.school.school_types[selectedCategory].school_categories.splice(indexToRemove, 1);
                };

                $scope.addCategory = function (selectedCategory, school_category_name) {
                    $scope.school.school_types[selectedCategory].school_categories.push({
                        'display_name': school_category_name,
                        'name': school_category_name,
                        'arms': [
                            {
                                display_name: 'Default',
                                name: 'default',
                                arms: {
                                    default: {}
                                }
                            }
                        ]
                    });
                };

                $scope.nextStepTwo = function () {
                    SchoolService.save($scope.school, function (data) {
                        console.log(data);
                        $state.go('base.step_two');
                    }, function () {
                        console.log('error occurred');
                    });
                }
            }]
        })
        .state('base.step_one', {
            url: "/step-one",
            templateUrl: ViewBaseURL + "/step-one.html",
            controller: ['$scope', '$state', function ($scope, $state) {

            }]
        })
        .state('base.step_two', {
            url: "/step-two",
            templateUrl: ViewBaseURL + "/step-two.html",
            controller: ['$scope', function ($scope) {

                $scope.createArms = function (baseName, school_arm, count) {
                    school_arm.arms = [];
                    for (var i = 1; i <= count; i++) {
                        school_arm.arms[i - 1] = {
                            'name': baseName + '_' + i,
                            'display_name': ''
                        }
                    }
                };

                $scope.removeArm = function (school_category_arms, index) {
                    school_category_arms.splice(index, 1);
                };

                $scope.addArm = function (school_category_arms, school_category_name) {
                    school_category_arms.push({
                        'display_name': school_category_name,
                        'name': school_category_name,
                        'arms': []
                    });
                };
            }]
        });
});
