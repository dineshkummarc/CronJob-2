<!DOCTYPE html>
<html>
<head>
    <title>AngularJS ng-options Example - Bind JSON Array to HTML select Element</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
</head>

<body>
    <div ng-app="myApp" 
        ng-controller="myController">

        <select ng-model="employee"
            ng-options="emp.values.name for emp in empArray" 
            ng-change="showDetails()"
            id="emps">

            <option value="">-- Select --</option>
        </select>

        <select ng-model="employee"
            ng-options=""
            ng-change=""
            id="emps">
            <!--  <option value="" selected disabled></option> -->
             <option value="" selected disabled>--select--</option>
        </select>    

        <select ng-model="is_time_selected">
            <option ng-repeat="timeslot in empArray track by $index" ng-value="emp.values.name">{{emp.values.name}}</option>
        </select> 





        <!--SHOW OTHER DETAILS.-->
        <p style="white-space:pre-wrap;">{{details}}</p>
    </div>
</body>

<script>
    angular.module("myApp", [])
        .controller('myController', function ($scope, $filter) {

            // CREATE AN 'employees' OBJECT, WITH AN ARRAY OF DATA.
            $scope.employees = {
                "05/17/2015": { 'name': 'Alpha', 'age': 37 },
                "03/25/2016": { 'name': 'Bravo', 'age': 27 },
                "09/11/2015": { 'name': 'Charlie', 'age': 29 },
                "01/07/2016": { 'name': 'Delta', 'age': 19 },
                "03/09/2014": { 'name': 'Echo', 'age': 32 }
            }

            $scope.empArray = Object.keys($scope.employees)
                .map(function (value, index) {
                    return { joinDate: new Date(value), values: $scope.employees[value] }
                }
            );

            // SHOW EMPLOYEE DETAILS.
            $scope.showDetails = function () 
            {
                $scope.details =
                    'Name: ' + $scope.employee.values.name + '\n' +
                    'Age: ' + $scope.employee.values.age + '\n' +
                    'Date of Joining: ' + $filter('date')($scope.employee.joinDate, 'dd/MM/yyyy');
            };
        });
</script>
</html>