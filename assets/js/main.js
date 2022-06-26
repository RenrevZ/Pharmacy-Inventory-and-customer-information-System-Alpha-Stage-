$(document).ready(function(){
     $('#cloneform select').selectpicker();
})




 //checking if the selected data is the same
 //if the selected data is the same then Set the data to null
 data1 = document.getElementById('inlineFormCustomSelect1');
 data2 = document.getElementById('inlineFormCustomSelect2');
 data3 = document.getElementById('inlineFormCustomSelect3');
 data4 = document.getElementById('inlineFormCustomSelect4');
 data5 = document.getElementById('inlineFormCustomSelect5');

 //Getting the quantity of every data
 quantity1 = document.getElementById('med_quantity1');
 quantity2 = document.getElementById('med_quantity2');
 quantity3 = document.getElementById('med_quantity3');
 quantity4 = document.getElementById('med_quantity4');
 quantity5 = document.getElementById('med_quantity5');

 //Customer List Code
 let firstItem = document.getElementById('firstItem');
 let secondItem = document.getElementById('secondItem');
 let thirdItem = document.getElementById('thirdItem');
 let fourthItem = document.getElementById('fourthItem');
 let fifthItem = document.getElementById('fifthItem');

 let firstQuant = document.getElementById('firstQuant');
 let secondQuant = document.getElementById('secondQuant');
 let thirdQuant = document.getElementById('thirdQuant');
 let fourthQuant = document.getElementById('fourthQuant');
 let fifthQuant = document.getElementById('fifthQuant');



 //Listening if the data is submited or clicked
 managerSubmit = document.getElementById('managerForm');
 error = document.getElementById('error');
 success = document.getElementById('success');

// Error on medicine
errorMed = document.getElementById('errorMed');
setTimeout(()=> errorMed.style.display='none',5000);

 data1.addEventListener('change',()=>{ //data 1 value and execution
            if(data1.value == data2.value){
                error.style.display='block'
                data2.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
            if(data1.value == data3.value){
                error.style.display='block'
                data3.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
            if(data1.value == data4.value){
                error.style.display='block'
                data4.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
            if(data1.value == data5.value){
                error.style.display='block'
                data5.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
})

 data2.addEventListener('change',()=>{//data 2 value and execution
        if(data2.value == data1.value){
            error.style.display='block'
            data2.value = null;
            setTimeout(()=> error.style.display='none',2000);
            
        }
        if(data2.value == data3.value){
            error.style.display='block'
            data2.value = null;
            setTimeout(()=> error.style.display='none',2000);
            
        }
        if(data2.value == data4.value){
            error.style.display='block'
            data2.value = null;
            setTimeout(()=> error.style.display='none',2000);
            
        }
        if(data2.value == data5.value){
            error.style.display='block'
            data2.value = null;
            setTimeout(()=> error.style.display='none',2000);
            
        }
 })


 data3.addEventListener('change',()=>{//data 3 value and execution
        if(data3.value == data1.value){
            error.style.display='block'
            data3.value = null;
            setTimeout(()=> error.style.display='none',2000);
        }
        if(data3.value == data2.value){
            error.style.display='block'
            data3.value = null;
            setTimeout(()=> error.style.display='none',2000);
        }
        if(data3.value == data4.value){
            error.style.display='block'
            data3.value = null;
            setTimeout(()=> error.style.display='none',2000);
        }
        if(data3.value == data5.value){
            error.style.display='block'
            data3.value = null;
            setTimeout(()=> error.style.display='none',2000);
        }

 })

 
 data4.addEventListener('change',()=>{//data 4 value and execution
            if(data4.value == data1.value){
                error.style.display='block'
                data4.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
            if(data4.value == data2.value){
                error.style.display='block'
                data4.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
            if(data4.value == data3.value){
                error.style.display='block'
                data4.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
            if(data4.value == data5.value){
                error.style.display='block'
                data4.value = null;
                setTimeout(()=> error.style.display='none',3000);
            }
 })

 data5.addEventListener('change',()=>{//data 5 value and execution
            if(data5.value == data1.value){
                error.style.display='block'
                data5.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
            if(data5.value == data2.value){
                error.style.display='block'
                data5.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
            if(data5.value == data3.value){
                error.style.display='block'
                data5.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
            if(data5.value == data4.value){
                error.style.display='block'
                data5.value = null;
                setTimeout(()=> error.style.display='none',2000);
            }
 });

// Manager.php Code
 //modal notification
 var modal = document.getElementById("modal");
 var modalBtn =document.getElementById("modalBtn");
 var closeBtn = document.getElementById("Cancel");
 
 // Opens the modal
 modalBtn.onclick = function() {
     modal.style.display = "block";
 }
 // close the modal
 closeBtn.onclick = function() {
     modal.style.display = "none";
 }
 
 window.onclick = function(event){
     if(event.target == modal){
       modal.style.display = "none";
     }
 }
