var myAppModule = angular.module('MyApp', ['ui.calendar', 'oitozero.ngSweetAlert','chieffancypants.loadingBar'])
myAppModule.controller('Controller', ['$scope', '$http', function ($scope, $http) {
    /* config object */

    $scope.uiConfig = {
        calendar: {
            height: 450,
            editable: true,
            header: {
                right: 'today prev,next'
            },
            select: function (start, end, allDay, jsEvent) {
                $scope.start_at = start;
                console.log(start);
            },
            dayClick: function (date, allDay, jsEvent, view) {

                if (typeof($scope.doctor) == "undefined") {
                    swal("No se puede consultar fecha", "Debes seleccionar un doctor", "error");
                }
                else {
                    $scope.appointment_date = date;
                    $http.get('/doctor/' + $scope.doctor.id + '/date/' + date)
                        .success(function (activity, status, headers, config) {
                            $scope.activities = activity;
                        })
                        .error(function (activity, status, headers, config) {
                            swal("El doctor no posee actividades este día", "El doctor no tiene horario ocupado", "success");
                        })
                }
            },
            eventDrop: $scope.alertOnDrop,
            eventResize: $scope.alertOnResize,
            selectable: true
        }
    };
    $scope.searchDoctor = function (id) {
        console.log(id);

        for (var i = $scope.events.length - 1; i >= 0; i--) {

            $scope.events.splice(i, 1);

        }
        $http.get('/doctor/' + id + '/get')
            .success(function (doctor, status, headers, config) {
                $scope.doctor = doctor;
            })
            .error(function (doctor, status, headers, config) {
                alert('error' + status);
            });

        $http.get('/doctor/' + id + '/appointments')
            .success(function (appointments, status, headers, config) {
                angular.forEach(appointments, function (event) {
                    console.log(event);
                    $scope.events.push(event);
                });
            })
            .error(function (appointments, status, headers, config) {
                alert('error' + status);
            });
    };


    $scope.events = [];
    console.log($scope.events);
    $scope.eventSources = [$scope.events];


}]);