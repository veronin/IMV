<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-resource.js"></script>
   
<div ng-app="abmAngularAPP" ng-controller="abmAngularController"> 
 
<div>
    <div class="form-group">
        <label for="idUsuario">idUsuario</label>
        <input type="text" ng-model="nuevoUsuario.idUsuario" class="form-control" id="idUsuario" >
    </div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" ng-model="nuevoUsuario.nombre" class="form-control" id="nombre" >
    </div>
    <div class="form-group">
        <label for="clave">Clave</label>
        <input type="text" ng-model="nuevoUsuario.clave" class="form-control" id="clave" >
    </div>
    <div class="form-group">
        <label for="legajo">Legajo</label>
        <input type="text" ng-model="nuevoUsuario.legajo" class="form-control" id="legajo" >
    </div>
    <!--<div class="form-group">
        <label for="idPersona">idPersona</label>
        <input type="text" ng-model="nuevoUsuario.idPersona" class="form-control" id="idPersona" >
    </div>
    <div class="form-group">
        <label for="area">Area</label>
        <input type="text" ng-model="nuevoUsuario.area" class="form-control" id="area" >
    </div>
    <div class="form-group">
        <label for="ocupacion">Ocupacion</label>
        <input type="text" ng-model="nuevoUsuario.ocupacion" class="form-control" id="ocupacion" >
    </div>
    -->
    <div class="form-group">
        <button type="button" ng-show="agregando" ng-click="agregar()" class="btn btn-sm btn-warning">Agregar
            <i class="glyphicon glyphicon-plus">
                        </i>
        </button>
        <button type="button" ng-hide="agregando" ng-click="guardar()" class="btn btn-sm btn-success">Guardar
            <i class="glyphicon glyphicon-save">
                        </i>
        </button>
        <button type="button" ng-hide="agregando" ng-click="cancelar()" class="btn btn-sm btn-danger">Cancelar
            <i class="glyphicon glyphicon-remove-sign">
                        </i>
        </button>
        </br></br>

    </div>

    <!--Relaciones-->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID USUARIO</th>
                <th>NOMBRE</th>
                <th>OPERACIONES</th>
            </tr>
        </thead>
        <tbody>
<!--            <tr ng-repeat="usuario in listaUsuarios">
            <tr> 
                <td>{{usuario.idUsuario}}</td>
                <td>{{usuario.nombre}}</td>-->
            <td>1</td>
            <td>VERONICA</td>
        
                <td>
                    <button type="button" ng-click="borrar(usuario)" class="btn btn-sm">Borrar
                        <i class="glyphicon glyphicon-remove-circle">
					</i>
                    </button>
                    <button type="button" ng-click="editar(usuario)" class="btn btn-sm">Editar
                        <i class="glyphicon glyphicon-edit">
					</i>
                    </button>
                </td>
            </tr>

                
        </tbody>
    </table>
</div>

<script>

    var app = angular.module("abmAngularAPP", []);
    
/*    app.factory('personaRESTFactory', function($resource) {
        return $resource('/index.php/api/users/:id', null, {
            'update': { method:'PUT' }
        } );
    });
    
    app.factory('sessionInjector',  function() {  
        var sessionInjector = {
            request: function(config) {
                config.headers['x-username'] = 'pepe';
                config.headers['x-password'] = 'pepe';
                return config;
            }
        };
        return sessionInjector;
    });

    app.config(['$httpProvider', function($httpProvider) {  
        $httpProvider.interceptors.push('sessionInjector');
    }]);    
    
    
    
    app.controller("abmAngularController", function($scope, personaFactory, personaRESTFactory){
        $scope.mensaje = 'Funciona todo';
        $scope.agregando = true;
        $scope.nuevoUsuario = {id:'', username:'', password:'', email:''};

       // personaFactory.obtenerUsuarios().then(function(response)
       //    {
       //         $scope.listaUsuarios = response.data;
       //    }
       // );
        
        personaRESTFactory.query({}, function(data){
            $scope.listaUsuarios = data;    
        });

        
        $scope.agregar = function()
        {
            personaRESTFactory.save($scope.nuevoUsuario, function(data){
                $scope.listaUsuarios.push(data);
                $scope.nuevoUsuario = {};
            });
//            personaFactory.nuevoUsuario($scope.nuevoUsuario).then(function(response){
//                $scope.listaUsuarios.push(response.data);
//                $scope.nuevoUsuario = {};
//            });

        }
        
        $scope.editar = function(pUsuario)
        {
            angular.copy(pUsuario, $scope.nuevoUsuario);
            $scope.agregando = false;
        }
        
        $scope.guardar = function()
        {
            personaRESTFactory.update({id:$scope.nuevoUsuario.id}, $scope.nuevoUsuario, function(data){
                $scope.agregando=true;
                $scope.nuevoUsuario = {};
                angular.forEach($scope.listaUsuarios, function(item){
                    if(item.id==data.id)
                    {
                        angular.copy(data, item);
                    }
                });
                alert('datos guardados');
                
            });
//            personaFactory.modificarUsuario($scope.nuevoUsuario).then(function(response){
//                $scope.agregando=true;
//                $scope.nuevoUsuario = {};
//                angular.forEach($scope.listaUsuarios, function(item){
//                    if(item.id==response.data.id)
//                    {
//                        angular.copy(response.data, item);
//                    }
//                });
//                alert('datos guardados');
//            });
        }
        
        $scope.cancelar = function(){
            $scope.nuevoUsuario = {};
            $scope.agregando = true;
        }
        
        $scope.borrar = function(pUsuario)
        {
            personaRESTFactory.delete({id: pUsuario.id}, function(response){
                $scope.agregando=true;
                $scope.nuevoUsuario = {};
                $scope.listaUsuarios = $scope.listaUsuarios.filter(function(item){
                    return item.id!==pUsuario.id;
                });
                alert('persona borrad');
                
            });
//            personaFactory.borrarUsuario(pUsuario).then(function(response){
//                $scope.agregando=true;
//                $scope.nuevoUsuario = {};
//                $scope.listaUsuarios = $scope.listaUsuarios.filter(function(item){
//                    return item.id!==pUsuario.id;
//                });
//                alert('persona borrad');
//                
//            })

        }
        
    });
    
</script>