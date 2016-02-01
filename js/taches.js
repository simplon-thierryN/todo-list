$(function(){
  var tableaux;
  var deleteTable;
  var addTask;
  var ul;
  var id;
  var input;
  /*XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  function refresh
  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX*/
  function refresh(table){
    tableaux=$("<div>");
    tableaux.html("<p># "+table.table_name+"</p>");
    tableaux.draggable({grid:[10,10]});
    tableaux.attr("data-id",table.id);
    tableaux.addClass("taskList");


    /*  deleteTable=$("<button>");
    deleteTable.text("delete");
    deleteTable.attr("data-id",table.id);
    deleteTable.addClass("deleteTable");
    deleteTable.css({
    "align-self":"flex-end"
  });

  tableaux.append(deleteTable);*/
  $(".container2").append(tableaux);
}

$(".container3").droppable({
  drop:function(){
    console.log("id div :",id);
    $.ajax({
      url:"php/main.php?action=deleteTable",
      method:"POST",
      data:{
        tableId:id
      },
      success:function(ret){
        $(".container2").find("div[data-id='"+id+"']").remove();
        $(".container4").find("div[data-id='"+id+"']").remove();
      }
    });
  }
});

$(".container4").droppable({
  drop:function(){
    $(".container2").find("div[data-id='"+id+"']").css({
      "left":"0 ",
      "top":"0"
    });

    $(".container2").find("div[data-id='"+id+"']").appendTo(".container4");
    console.log(id);
  }
});

$.ajax({
  url:'php/main.php',
  method:"POST",
  data:{
    user_id:$(".addTable").val()
  },
  dataType:'JSON',
  success:function(res){
    for(i=0; i<res.length;i++){
      refresh(res[i]);
    }
  }
});

/*XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function addTable
XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX*/
$(".addTable").click(function(){
  console.log($(".addTable").val());
  $.ajax({
    url:"php/main.php?action=addTable",
    method:"POST",
    data:{
      nomTableau:$(".tableaux").val(),
      user_id:$(".addTable").val()
    },
    dataType:"JSON",
    success:function(res){
      refresh(res);
    }
  });
});//fin addTable

/*XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function deleteTable
XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX*/
/*  $(".container2").on("click",".deleteTable",function(){
console.log($(this).data("id"));
var tableId = $(this).data("id");
$.ajax({
url:"php/main.php?action=deleteTable",
method:"POST",
data:{
tableId:$(this).data("id")
},
success:function(ret){
$(".container2").find("button[data-id='"+tableId+"']").parent().remove();
}
});
});*/

$(".container2").on("mouseover",".taskList",function(){
  console.log($(this).data("id"));

  id=$(this).data("id");
});

$(".container4").on("mouseover",".taskList",function(){
  console.log($(this).data("id"));

  id=$(this).data("id");
});



});//fin function
