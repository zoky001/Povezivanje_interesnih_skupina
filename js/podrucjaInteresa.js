/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
/*
 slide down prijava
 */
    $("#myBtn1").click(function () {

        $("#prijava").slideToggle();
    });

/*
 * 
 otvaranje i zatvaranje modal REgistracije
 */
    $("#myBtn").click(function () {

        $("#myModal").show();
    });
    
     $(".btnDiskusije").click(function () {

        $("#myModalDiskusije").show();
    });
      $(".close").click(function () {

        $("#myModalDiskusije").hide();
    });
    
        $("#btnZatvori").click(function () {

        $("#myModalDiskusije").hide();
    });
    
     $(".close").click(function () {

        $("#myModal").hide();
    });
    
    
    //za prikaz koda na kuponu
     $(".btnKod").click(function () {

        $("#myModalKod").show();
    });
      $(".close").click(function () {

        $("#myModalKod").hide();
    });

        $("#btnZatvori").click(function () {

        $("#myModalKod").hide();
    });


 //za prikaz nove diskusije
     $("#btnNovaDiskusija").click(function () {

        $("#myModalNovaDiskusija").show();
    });
      $(".close").click(function () {

        $("#myModalNovaDiskusija").hide();
    });

        $("#btnZatvori").click(function () {

        $("#myModalNovaDiskusija").hide();
    });



   

});