$(function(){

  /*****************************************************************
  ------  menu login------
  *****************************************************************/
  function login(){
    $(".login").slideDown(300);
    $(".login").css({
      "display":"flex",
      "flex-wrap":"wrap",
      'justify-content':'center',
      "align-items":"center"
    });
    $("label").css("text-align","left");
    $(".up").fadeOut(500);
    $(".container").find("button").fadeIn();
  }
  $(".in").click(function(){
    login();
  });

  $(".up").click(function(){
    $(".register").slideDown(300);
    $(".register").css({
      "display":"flex",
      "flex-wrap":"wrap",
      'justify-content':'center',
      "align-items":"center"
    });
    $("label").css("text-align","left");
    $(".in").fadeOut(500);
    $(".container").find("button").fadeIn();
  });

  $(".cancel").click(function(){
    location.reload();
  });

  $(".subregister").click(function(){
    $.ajax({
      url:"php/register.php?action=register",
      method:'POST',
      data:{
        pseudo:$("#pseudo").val(),
        pass:$("#pass").val(),
        confirm:$("#confirm").val()
      },
      dataType:'JSON',
      success:function(ret){
        if(ret=="failed"){
          alert("error");
        }
        else{
          $(".in").fadeIn(500);
          login();
          console.log(ret);
        }
      }
    });
  });//fin function enregistrement

  $(".sublog").click(function(){
    $.ajax({
      url:"php/register.php?action=login",
      method:'POST',
      data:{
        pseudolog:$("#pseudolog").val(),
        passlog:$("#passlog").val()
      },
      dataType:'JSON',
      success:function(res){
          if(res){
       $(location).attr('href',"http://localhost/trello/trello.php");
        }
      },
      error:function(){
            alert("error connexion");
      }
    });
  });//fin function connexion

  $(".deco").click(function(){
    $.ajax({
      url:"php/register.php?action=deco",
      dataType:'html',
      success:function(res){
        if (res=="delete") {
          $(location).attr('href',"http://localhost/trello");
        }
      }
    });
  }); //fin function deco


});//fin function!
