function check(form)
{
    if(form.point1.value=="0"){
        switch(form.point2.value){
            case "1":
                window.open("./7htmlFile/1.html","경로","width=400, height=300, left=100, top=50");
                break;
     
            default:
                alert("Error");
        
        }
      
        
    }
    else if(form.point1.value=="1"){
        switch(form.point2.value){
            case "2":
                window.open("./7htmlFile/2.html","경로","width=400, height=300, left=100, top=50");
                break;
            case "3":
                window.open("./7htmlFile/3.html","경로","width=400, height=300, left=100, top=50");
                break;
            case "4":
                window.open("./7htmlFile/4.html","경로","width=400, height=300, left=100, top=50");
                break;
            case "5":
                window.open("./7htmlFile/5.html","경로","width=400, height=300, left=100, top=50");
                break;
            case "6":
                window.open("./7htmlFile/6.html","경로","width=400, height=300, left=100, top=50");
                break;
      
            default:
                alert("Error");
        
        }
    }else{
        alert("Error");
    }
}