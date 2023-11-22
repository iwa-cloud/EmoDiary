const element = document.getElementById("first");
const element_1 = document.getElementById("first1_1");
const element_2 = document.getElementById("first1_2");
const element_3 = document.getElementById("first2_1");
const element_4 = document.getElementById("first2_2");
const Button = document.getElementById("parent");
Button.addEventListener("click",function(){
 if(element_1.classList.contains("visible")) {
     element_1.classList.remove("visible");
    element_1.classList.add("hidden");
     element_2.classList.remove("visible");
     element_2.classList.add("hidden");
     element_3.classList.remove("hidden");
     element_3.classList.add("visible");
     element_4.classList.remove("hidden");
     element_4.classList.add("visible");
   }else{
     element_1.classList.remove("hidden");
    element_1.classList.add("visible");
     element_2.classList.remove("hidden");
     element_2.classList.add("visible");
     element_3.classList.remove("visible");
     element_3.classList.add("hidden");
     element_4.classList.remove("visible");
     element_4.classList.add("hidden");
   }
});