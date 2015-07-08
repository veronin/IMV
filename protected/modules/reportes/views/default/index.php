<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-resource.js"></script>
   
<div ng-app="abmAngularAPP" ng-controller="abmAngularController"> 

    <div class="form-group">
        <label for="idUsuario">idUsuario</label>
        <input type="text" ng-model="nuevoUsuario.idUsuario" class="form-control" id="idUsuario" >
    </div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" ng-model="nuevoUsuario.nombre" class="form-control" id="nombre" >
    </div>
<!--<div class="form-group">
        <label for="clave">Clave</label>
        <input type="text" ng-model="nuevoUsuario.clave" class="form-control" id="clave" >
    </div>
    <div class="form-group">
        <label for="legajo">Legajo</label>
        <input type="text" ng-model="nuevoUsuario.legajo" class="form-control" id="legajo" >
    </div>
    <div class="form-group">
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
        <button type="button" ng-show="agregando" ng-click="agregar()" class="btn btn-sm btn-warning">Agregar</button>
        <button type="button" ng-hide="agregando" ng-click="guardar()" class="btn btn-sm btn-success">Guardar</button>
        <button type="button" ng-hide="agregando" ng-click="cancelar()" class="btn btn-sm btn-danger">Cancelar</button>
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
            <tr ng-repeat="usuario in listaUsuarios"> 
                
                <td>{{usuario.idUsuario}}</td>
                <td>{{usuario.nombre}}</td>
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

    var app = angular.module("abmAngularAPP", ['ngResource']);
    
    app.factory('usuarioRESTFactory', function($resource) {
        return $resource('/ProyectoFINAL/index.php/api/users');
            
        } );
// ** FACTORY **    
    
    app.factory('usuarioFactory', function($http){
        
        var usuarioFactory = {};
        
        usuarioFactory.obtenerUsuarios = function(){
            return $http.get("<?php echo $this->createUrl('obtenerUsuarios'); ?>").then(function(response){
                return response;
            });
            
        }
        usuarioFactory.modificarUsuario = function(pUsuario){
            return $http.post("<?php echo $this->createUrl('modificarUsuario'); ?>", pUsuario).then(function(response){
                return response;
            });            
            
        }
        usuarioFactory.crearUsuario = function(pUsuario){
            return $http.post("<?php echo $this->createUrl('crearUsuario'); ?>", pUsuario).then(function(response){
                return response;
            });            
        }
        usuarioFactory.borrarUsuario = function(pUsuario){
            return $http.post("<?php echo $this->createUrl('borrarUsuario'); ?>", pUsuario).then(function(response){
                return response;
            });            
            
        }
        
        return usuarioFactory;
    });

// ** CONTROLLER **  

    app.controller("abmAngularController", function($scope, usuarioFactory, usuarioRESTFactory){
    
        $scope.agregando=true;
        $scope.nuevoUsuario = {idUsuario:'', nombre:''};
        
        //$scope.mensaje = 'Funciona todo';
        //OBTENER USUARIOS
        //$http.get("<?php echo $this->createUrl('obtenerUsuarios'); ?>").then(function(response){
        //    $scope.listaUsuarios = response.data;
        //});
        
       //usuarioFactory.obtenerUsuarios().then(function(response)
       //  {
       //        $scope.listaUsuarios = response.data;
       //  });
        //$scope.listaUsuarios = [{idUsuario:80, nombre:'VERONICA'},{idUsuario:90,nombre:'FABIAN'}] ;
        usuarioRESTFactory.query({}, function(data){
            $scope.listaUsuarios = data;    
        });

    //AGREGAR USUARIOS
    
        $scope.agregar = function(){
            
            //agrega elementos al formulario 
            //var nuevoElemento={idUsuario:'',nombre:''};     
            //angular.copy($scope.nuevoUsuario,nuevoElemento);
            //$scope.listaUsuarios.push(nuevoElemento);      
            //agrega al modelo de la base
            
            //$http.put("<?php echo $this->createUrl('crearUsuario'); ?>", $scope.nuevoUsuario).then(function(response){ });
            
            usuarioFactory.crearUsuario($scope.nuevoUsuario).then(function(response)
            {
                $scope.listaUsuarios.push(response.data);
                $scope.nuevoUsuario = {};
            });         
        };
        
    //GUARDA USUARIOS (NUEVO/MODIF)
     
        $scope.guardar = function(){  
            
            //agrega elementos al formulario
            //var nuevoElemento={idUsuario:'',nombre:''};
            //angular.copy($scope.nuevoUsuario,nuevoElemento);
            //$scope.listaUsuarios.push(nuevoElemento);     
            //agrega al modelo de la base

            //$http.post("<?php echo $this->createUrl('modificarUsuario'); ?>", $scope.nuevoUsuario).then(function(response){});  
            
            usuarioFactory.modificarUsuario($scope.nuevoUsuario).then(function(response)
            {
                $scope.agregando=true; 
                $scope.nuevoUsuario = {}; 
                angular.forEach($scope.listaUsuarios, function(item){
                    
                    if(item.idUsuario==response.data.idUsuario){
                        angular.copy(response.data, item);
                    }       
                });    
            });         
        };
        
    //BORRA USUARIOS
    
        $scope.borrar = function(pUsuario){
            
            //$http.post("<?php echo $this->createUrl('borrarUsuario'); ?>", pUsuario).then(function(response){});
            
            usuarioFactory.borrarUsuario(pUsuario).then(function(response)
            {
                $scope.agregando=true;
                
                $scope.nuevoUsuario = {idUsuario:'', nombre:''}; 
                
                $scope.listaUsuarios = $scope.listaUsuarios.filter(function(item){
                    
                    return item.idUsuario!==pUsuario.idUsuario;
                }); 
            });         
        };
        
    //EDITA USUARIO
    
        $scope.editar = function(pUsuario){   
            $scope.agregando=false;
            angular.copy(pUsuario, $scope.nuevoUsuario);
        };
        
     //CANCELA USUARIO  
     
        $scope.cancelar = function(pUsuario){
             $scope.nuevoUsuario = {};
             $scope.agregando=true;
        };             
    });

</script>