/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 

app.controller("kontrolaPrijava", function ($scope) {


});



appKuponiModerator.controller("cjelo", function ($scope) {
    
    $scope.prikaziSve = true;
    $scope.prikaziKupljene = false;
    $scope.prikaziProvjeru = false;
    
     $scope.PrikaziSve = function () {

        
       $scope.prikaziSve = true;
    $scope.prikaziKupljene = false;
    $scope.prikaziProvjeru = false;
    }
    
        $scope.PrikaziKupljene = function () {

         
       $scope.prikaziSve = false;
    $scope.prikaziKupljene = true;
    $scope.prikaziProvjeru = false;
    
    }
    
         $scope.PrikaziProvjeru = function () {

         
       $scope.prikaziSve = false;
    $scope.prikaziKupljene = false;
    $scope.prikaziProvjeru = true;
    
    }
    
  
    
   


});


appPretplatniciModerator.controller("cjelo", function ($scope) {
    
    
    $scope.prikaziModal = false;
    
     $scope.zatvoriModal = function () {

        $scope.prikaziModal = !$scope.prikaziModal;
    }
    
     $scope.otvoriModal = function () {
         console.log("otovir");
        $scope.prikaziModal = true;
    }
    
     $scope.today = new Date();


});

appDiskusijeModerator.directive('email2', function ($q, $timeout, $http) {
    return {
        require: 'ngModel',
        link: function (scope, elm, attrs, ctrl1) {

            $http.get("./responseJSON/diskCheck.php")
                    .then(function (response) {


                        emails = [];
                        response.data.records.forEach(function (item) {
                            emails.push(item.Naziv)


                        })
                       
                        
//console.log("email provjera");



                    });


            //  = ['Jim', 'John', 'Jill', 'Jackie'];

            ctrl1.$asyncValidators.email2 = function (modelValue, viewValue) {

                if (ctrl1.$isEmpty(modelValue)) {
                    // consider empty model valid
                    return $q.resolve();
                }

                var def = $q.defer();

                $timeout(function () {
                    // Mock a delayed response
                    if (emails.indexOf(modelValue) === -1) {
                        // The username is available
                        def.resolve();
                    } else {
                        def.reject();
                    }

                }, 2000);

                return def.promise;
            };
        }
    };
});


/* tablica pagination*/
fessmodule.controller('ctrlRead', function ($http,$scope, $filter) {
    
    
      
    $scope.prikaziModal = false;
    
   
    
     $scope.today = new Date();




    // init
    $scope.sort = {       
                sortingOrder : 'id',
                reverse : false
            };
    
    $scope.gap = 5;
    
    $scope.filteredItems = [];
    $scope.groupedItems = [];
    $scope.itemsPerPage = 10;
    $scope.pagedItems = [];
    $scope.currentPage = 0;
    $scope.items=[];
    
    
     $http.get("./responseJSON/LogSustava.php")
                .then(function (response) {
                    $scope.items = response.data.records;  
        console.log("bok1");  console.log($scope.items);
         
                $scope.itemsPerPage =$scope.items[0].Stranicenje;
              
    

console.log("bok");
console.log ($scope.items);



    var searchMatch = function (haystack, needle) {
        if (!needle) {
            return true;
        }
        return haystack.toLowerCase().indexOf(needle.toLowerCase()) !== -1;
    };

    // init the filtered items
    $scope.search = function () {
        $scope.filteredItems = $filter('filter')($scope.items, function (item) {
            for(var attr in item) {
                if (searchMatch(item[attr], $scope.query))
                    return true;
            }
            return false;
        });
        // take care of the sorting order
        if ($scope.sort.sortingOrder !== '') {
            $scope.filteredItems = $filter('orderBy')($scope.filteredItems, $scope.sort.sortingOrder, $scope.sort.reverse);
        }
        $scope.currentPage = 0;
        // now group by pages
        $scope.groupToPages();
    };
    
  
    // calculate page in place
    $scope.groupToPages = function () {
        $scope.pagedItems = [];
        
        for (var i = 0; i < $scope.filteredItems.length; i++) {
            if (i % $scope.itemsPerPage === 0) {
                $scope.pagedItems[Math.floor(i / $scope.itemsPerPage)] = [ $scope.filteredItems[i] ];
            } else {
                $scope.pagedItems[Math.floor(i / $scope.itemsPerPage)].push($scope.filteredItems[i]);
            }
        }
    };
    
    $scope.range = function (size,start, end) {
        var ret = [];        
        console.log(size,start, end);
                      
        if (size < end) {
            end = size;
            start = size-$scope.gap;
        }
        for (var i = start; i < end; i++) {
            ret.push(i);
        }        
         console.log(ret);        
        return ret;
    };
    
    $scope.prevPage = function () {
        if ($scope.currentPage > 0) {
            $scope.currentPage--;
        }
    };
    
    $scope.nextPage = function () {
        if ($scope.currentPage < $scope.pagedItems.length - 1) {
            $scope.currentPage++;
        }
    };
    
    $scope.setPage = function () {
        $scope.currentPage = this.n;
    };

    // functions have been describe process the data for display
    $scope.search();
    
  
          });
          
          
          
          
     $scope.prikaziPoIntervalu = false;
    
     $scope.prikazIntervala = function () {
         var d = new Date($scope.ODinterval);
        var odDatuma= Date.parse(d);
         
         
         var d = new Date($scope.DOinterval);
        var doDatuma= Date.parse(d);
         
         
         console.log(odDatuma);
          console.log(doDatuma);
          
          
          
           $http.get("./responseJSON/LogSustava.php?od="+odDatuma+"&do="+doDatuma)
                .then(function (response) {
                    $scope.items = response.data.records;  
        console.log("bok1");  console.log($scope.items);
         
                
              
    $scope.prikaziPoIntervalu = true;
$scope.itemsPerPage =$scope.items[0].Stranicenje;
console.log("bok stranicenje");
console.log ();



    var searchMatch = function (haystack, needle) {
        if (!needle) {
            return true;
        }
        return haystack.toLowerCase().indexOf(needle.toLowerCase()) !== -1;
    };

    // init the filtered items
    $scope.search = function () {
        $scope.filteredItems = $filter('filter')($scope.items, function (item) {
            for(var attr in item) {
                if (searchMatch(item[attr], $scope.query))
                    return true;
            }
            return false;
        });
        // take care of the sorting order
        if ($scope.sort.sortingOrder !== '') {
            $scope.filteredItems = $filter('orderBy')($scope.filteredItems, $scope.sort.sortingOrder, $scope.sort.reverse);
        }
        $scope.currentPage = 0;
        // now group by pages
        $scope.groupToPages();
    };
    
  
    // calculate page in place
    $scope.groupToPages = function () {
        $scope.pagedItems = [];
        
        for (var i = 0; i < $scope.filteredItems.length; i++) {
            if (i % $scope.itemsPerPage === 0) {
                $scope.pagedItems[Math.floor(i / $scope.itemsPerPage)] = [ $scope.filteredItems[i] ];
            } else {
                $scope.pagedItems[Math.floor(i / $scope.itemsPerPage)].push($scope.filteredItems[i]);
            }
        }
    };
    
    $scope.range = function (size,start, end) {
        var ret = [];        
        console.log(size,start, end);
                      
        if (size < end) {
            end = size;
            start = size-$scope.gap;
        }
        for (var i = start; i < end; i++) {
            ret.push(i);
        }        
         console.log(ret);        
        return ret;
    };
    
    $scope.prevPage = function () {
        if ($scope.currentPage > 0) {
            $scope.currentPage--;
        }
    };
    
    $scope.nextPage = function () {
        if ($scope.currentPage < $scope.pagedItems.length - 1) {
            $scope.currentPage++;
        }
    };
    
    $scope.setPage = function () {
        $scope.currentPage = this.n;
    };

    // functions have been describe process the data for display
    $scope.search();
    
  
          });

     
    }

  $scope.prikaziAktivnosti = function () {
         
       
         
         
         var d = $scope.aktivnost;
       
         
         
         console.log("odDatuma"+d);
         
          
          
          
           $http.get("./responseJSON/LogSustava.php?aktivnost="+d)
                .then(function (response) {
                    $scope.items = response.data.records;  
        console.log("bok1");  console.log($scope.items);
         
                
              
    $scope.prikaziPoIntervalu = true;
$scope.itemsPerPage =$scope.items[0].Stranicenje;
console.log("bok stranicenje");
console.log ();



    var searchMatch = function (haystack, needle) {
        if (!needle) {
            return true;
        }
        return haystack.toLowerCase().indexOf(needle.toLowerCase()) !== -1;
    };

    // init the filtered items
    $scope.search = function () {
        $scope.filteredItems = $filter('filter')($scope.items, function (item) {
            for(var attr in item) {
                if (searchMatch(item[attr], $scope.query))
                    return true;
            }
            return false;
        });
        // take care of the sorting order
        if ($scope.sort.sortingOrder !== '') {
            $scope.filteredItems = $filter('orderBy')($scope.filteredItems, $scope.sort.sortingOrder, $scope.sort.reverse);
        }
        $scope.currentPage = 0;
        // now group by pages
        $scope.groupToPages();
    };
    
  
    // calculate page in place
    $scope.groupToPages = function () {
        $scope.pagedItems = [];
        
        for (var i = 0; i < $scope.filteredItems.length; i++) {
            if (i % $scope.itemsPerPage === 0) {
                $scope.pagedItems[Math.floor(i / $scope.itemsPerPage)] = [ $scope.filteredItems[i] ];
            } else {
                $scope.pagedItems[Math.floor(i / $scope.itemsPerPage)].push($scope.filteredItems[i]);
            }
        }
    };
    
    $scope.range = function (size,start, end) {
        var ret = [];        
        console.log(size,start, end);
                      
        if (size < end) {
            end = size;
            start = size-$scope.gap;
        }
        for (var i = start; i < end; i++) {
            ret.push(i);
        }        
         console.log(ret);        
        return ret;
    };
    
    $scope.prevPage = function () {
        if ($scope.currentPage > 0) {
            $scope.currentPage--;
        }
    };
    
    $scope.nextPage = function () {
        if ($scope.currentPage < $scope.pagedItems.length - 1) {
            $scope.currentPage++;
        }
    };
    
    $scope.setPage = function () {
        $scope.currentPage = this.n;
    };

    // functions have been describe process the data for display
    $scope.search();
    
  
          });

     
    }
    
      $scope.prikaziKorisniku =function () {
         
       
         
         
         var d = $scope.aktivnost;
       
         
         
         console.log("odDatuma"+d);
         
          
          
          
           $http.get("./responseJSON/LogSustava.php?korisnik="+d)
                .then(function (response) {
                    $scope.items = response.data.records;  
        console.log("bok1");  console.log($scope.items);
         
                
              
    $scope.prikaziPoIntervalu = true;
$scope.itemsPerPage =$scope.items[0].Stranicenje;
console.log("bok stranicenje");
console.log ();



    var searchMatch = function (haystack, needle) {
        if (!needle) {
            return true;
        }
        return haystack.toLowerCase().indexOf(needle.toLowerCase()) !== -1;
    };

    // init the filtered items
    $scope.search = function () {
        $scope.filteredItems = $filter('filter')($scope.items, function (item) {
            for(var attr in item) {
                if (searchMatch(item[attr], $scope.query))
                    return true;
            }
            return false;
        });
        // take care of the sorting order
        if ($scope.sort.sortingOrder !== '') {
            $scope.filteredItems = $filter('orderBy')($scope.filteredItems, $scope.sort.sortingOrder, $scope.sort.reverse);
        }
        $scope.currentPage = 0;
        // now group by pages
        $scope.groupToPages();
    };
    
  
    // calculate page in place
    $scope.groupToPages = function () {
        $scope.pagedItems = [];
        
        for (var i = 0; i < $scope.filteredItems.length; i++) {
            if (i % $scope.itemsPerPage === 0) {
                $scope.pagedItems[Math.floor(i / $scope.itemsPerPage)] = [ $scope.filteredItems[i] ];
            } else {
                $scope.pagedItems[Math.floor(i / $scope.itemsPerPage)].push($scope.filteredItems[i]);
            }
        }
    };
    
    $scope.range = function (size,start, end) {
        var ret = [];        
        console.log(size,start, end);
                      
        if (size < end) {
            end = size;
            start = size-$scope.gap;
        }
        for (var i = start; i < end; i++) {
            ret.push(i);
        }        
         console.log(ret);        
        return ret;
    };
    
    $scope.prevPage = function () {
        if ($scope.currentPage > 0) {
            $scope.currentPage--;
        }
    };
    
    $scope.nextPage = function () {
        if ($scope.currentPage < $scope.pagedItems.length - 1) {
            $scope.currentPage++;
        }
    };
    
    $scope.setPage = function () {
        $scope.currentPage = this.n;
    };

    // functions have been describe process the data for display
    $scope.search();
    
  
          });

     
    }
});


fessmodule.$inject = ['$scope', '$filter'];

fessmodule.directive("customSort", function() {
return {
    restrict: 'A',
    transclude: true,    
    scope: {
      order: '=',
      sort: '='
    },
    template : 
      ' <a ng-click="sort_by(order)" style="color: #555555;">'+
      '    <span ng-transclude></span>'+
      '    <i ng-class="selectedCls(order)"></i>'+
      '</a>',
    link: function(scope) {
                
    // change sorting order
    scope.sort_by = function(newSortingOrder) {       
        var sort = scope.sort;
        
        if (sort.sortingOrder == newSortingOrder){
            sort.reverse = !sort.reverse;
        }                    

        sort.sortingOrder = newSortingOrder;        
    };
    
   
    scope.selectedCls = function(column) {
        if(column == scope.sort.sortingOrder){
            return ('icon-chevron-' + ((scope.sort.reverse) ? 'down' : 'up'));
        }
        else{            
            return'icon-sort' 
        } 
    };      
  }// end link
}



/*modal*/

   

});




appDiskusijeModerator.controller("cijelo", function ($scope) {
    
    
    $scope.prikaziModal = false;
    
     $scope.zatvoriModal = function () {

        $scope.prikaziModal = !$scope.prikaziModal;
    }
     $scope.otvoriModal = function () {
         console.log("otovir");
        $scope.prikaziModal = true;
    }
    
     $scope.today = new Date();


});


appKosarica.controller("cijelo", function ($scope, $http) 

{
    //console.log($scope.slika1.toString());
    $scope.kupljeniArtikli = false;
    $scope.artikliKosarica = true;
 

    $scope.PrikaziKupljene = function () {
        
        console.log("klik1");
        
    $scope.kupljeniArtikli = true;
    $scope.artikliKosarica = false;
        
    };
    
      $scope.PrikaziKosaricu = function () {
          
          console.log("klik2");
        
    $scope.kupljeniArtikli = false;
    $scope.artikliKosarica = true;
        
    };
    
    $scope.otvoriModal = false;
    
     $scope.zatvoriModalKod = function () {

        $scope.otvoriModal = !$scope.otvoriModal;
    }
    
        $scope.otovoriModalKod= function (item) {
        console.log(item.currentTarget);
        console.log(item.currentTarget.getAttribute("data-id"));
        var id = item.currentTarget.getAttribute("data-id");
        $http.get("./responseJSON/kuponKod.php?id=" +id)
                .then(function (response) {
                    
                    console.log(response.data.records);
                    $scope.kodKupona = response.data.records;
                });


        $scope.otvoriModal = true;
    }




})

appKupon.controller("cijelo", function ($scope) 

{
    //console.log($scope.slika1.toString());
 
 
 
    $scope.PromjeniSliku = function (item) {
        
        console.log(item.currentTarget.src);
        $scope.izvor = item.currentTarget.src;
        
    };




})


appPopisDiskusija.controller("cijelo", function ($scope) {

    $scope.doTheBack = function () {
        window.history.back();
    };




})







var compareTo = function () {
    return {
        require: "ngModel",
        scope: {
            otherModelValue: "=compareTo"
        },
        link: function (scope, element, attributes, ngModel) {

            ngModel.$validators.compareTo = function (modelValue) {
                return modelValue == scope.otherModelValue;
            };

            scope.$watch("otherModelValue", function () {
                ngModel.$validate();
            });
        }
    };
};

app.directive("compareTo", compareTo);







/* Directives */



app.directive('email1', function ($q, $timeout, $http) {
    return {
        require: 'ngModel',
        link: function (scope, elm, attrs, ctrl1) {

            $http.get("./responseJSON/emailCheck.php")
                    .then(function (response) {


                        emails = [];
                        response.data.records.forEach(function (item) {
                            emails.push(item.Email)


                        })
                        console.log(emails);
//console.log("email provjera");



                    });


            //  = ['Jim', 'John', 'Jill', 'Jackie'];

            ctrl1.$asyncValidators.email1 = function (modelValue, viewValue) {

                if (ctrl1.$isEmpty(modelValue)) {
                    // consider empty model valid
                    return $q.resolve();
                }

                var def = $q.defer();

                $timeout(function () {
                    // Mock a delayed response
                    if (emails.indexOf(modelValue) === -1) {
                        // The username is available
                        def.resolve();
                    } else {
                        def.reject();
                    }

                }, 2000);

                return def.promise;
            };
        }
    };
});


app.directive('username', function ($q, $timeout, $http) {
    return {
        require: 'ngModel',
        link: function (scope, elm, attrs, ctrl) {

            $http.get("./responseJSON/usernameCheck.php")
                    .then(function (response) {


                        usernames = [];
                        response.data.records.forEach(function (item) {
                            usernames.push(item.Username)

                        })

                        console.log(usernames);



                    });


            //  = ['Jim', 'John', 'Jill', 'Jackie'];

            ctrl.$asyncValidators.username = function (modelValue, viewValue) {

                if (ctrl.$isEmpty(modelValue)) {
                    // consider empty model valid
                    return $q.resolve();
                }

                var def = $q.defer();

                $timeout(function () {
                    // Mock a delayed response
                    if (usernames.indexOf(modelValue) === -1) {
                        // The username is available
                        def.resolve();
                    } else {
                        def.reject();
                    }

                }, 2000);

                return def.promise;
            };
        }
    };
});






app.directive('velikoSlovo', function () {
    return {
        require: 'ngModel',
        link: function (scope, element, attr, mCtrl) {
            function myValidation(value) {
                if (value.indexOf("e") > -1) {
                    mCtrl.$setValidity('charE', true);
                } else {
                    mCtrl.$setValidity('charE', false);
                }
                return value;
            }
            mCtrl.$parsers.push(myValidation);
        }
    };
});

/* filter nedozvoljenih znakova*/
app.filter("purger", function () {
    return function (input) {
        return input.replace(/[^\w\s]/gi, "");
    }
});



app.controller('cjelo', function ($scope, $http, purgerFilter) {


    $scope.onChange = function (item) {
        console.log(item.currentTarget.id);
        var id = item.currentTarget.id;
        switch (item.currentTarget.id) {
            case ('ime'):
                $scope.ime = purgerFilter(item.currentTarget.value);
                break;
            case ('prezime'):
                $scope.prezime = purgerFilter(item.currentTarget.value);
                break;

            case ('name'):
                $scope.name = purgerFilter(item.currentTarget.value);
                break;



        }


    }



    $scope.login = {
        submit: function () {
            if ($scope.registracija.$invalid)
                return false;

            alert("uspjeh");
        }
    };


    $scope.velikoSlovo = /^[A-Z]/;


    $scope.showPrijava = false;

    $scope.otovoriPrijavu = function () {
        $scope.showPrijava = !$scope.showPrijava;
    }


    $scope.showRegistracija = false;
    $scope.otovoriRegistraciju = function () {
        $scope.showRegistracija = !$scope.showRegistracija;
    }
    $scope.zatvoriModal = function () {
        $scope.showRegistracija = !$scope.showRegistracija;

    }

    $scope.otvoriModal = false;

    $scope.zatvoriModalDiskusije = function () {

        $scope.otvoriModal = !$scope.otvoriModal;
    }
    /*
     * 
     * dohvaca tri diskusije prema id podrucja
     */
    $scope.otovoriModalDiskusija = function (item) {
        console.log(item.currentTarget);
        console.log(item.currentTarget.getAttribute("data-id"));
        var id = item.currentTarget.getAttribute("data-id");
        $http.get("./responseJSON/TopTriDiskusija.php?id=" + id)
                .then(function (response) {
                    $scope.triDiskusije = response.data.records;
                });


        $scope.otvoriModal = !$scope.otvoriModal;
    }




});