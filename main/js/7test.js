function check(form)
{
    if(form.point1.value=="0"){
        switch(form.point2.value){
            case "1":
                window.location.href="7htmlFile/1.html";
                break;
     
            default:
                alert("Error");
        
        }
      
        
    }
    else if(form.point1.value=="1"){
        switch(form.point2.value){
            case "2":
                window.location.href="7htmlFile/2.html";
                break;
            case "3":
                window.location.href="7htmlFile/3.html";
                break;
            case "4":
                window.location.href="7htmlFile/4.html";
                break;
            case "5":
                window.location.href="7htmlFile/5.html";
                break;
            case "6":
                window.location.href="7htmlFile/6.html";
                break;
      
            default:
                alert("Error");
        
        }
    }else{
        alert("Error");
    }
}