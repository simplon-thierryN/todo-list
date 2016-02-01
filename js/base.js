function byId(elementId){
  if(typeof elementId != "string") {
    console.log("error not caractere!");
    return null;
  }
  return document.getElementById(elementId);
}

function byClass(){
  var elements = document.getElementsByClassName(className);
  return Array.prototype.slice.call(elements);
}
