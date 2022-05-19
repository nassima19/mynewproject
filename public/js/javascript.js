/* const search =() =>{
const searchbox =document.getElementById("search-item").value.toUpperCase();
const storeitem =document.getElementById("ex1")
const product =document.querySelectorAll(".product")
const pname = storeitem.getElementsByTagName("div")

for (var i = 0; i < pname.length; i++) {
    let match = product[i].getElementsByTagName('tr')[0];

    if(match){
        let textvalue = match.textContent || match.innerHTML
     
        if (txetvalue.toUpperCase().indexOf(searchbox)>-1) {
            product[i].style.diplay="";
        }else{
            product[i].style.display="none";
        }
    }  
}
} */
  