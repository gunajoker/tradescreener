function a() {
    var buyprice = document.getElementById('buyprice').value;
    var Sellprice= document.getElementById('Sellprice').value;
    var qty= document.getElementById('qty').value;    
    var todayhigh= document.getElementById('todayHigh').value;
    
    var outcome= "NA"
    if (Sellprice != "" )
    {
        outcome=(Sellprice-buyprice)*qty; 
    }
    
    document.getElementById('Outcome').textContent=outcome;
   
    document.getElementById('target').textContent=(buyprice*qty+600)/qty;
    document.getElementById('SL').textContent=(buyprice*qty-800)/qty;
    
}

function calculateSignal() {
    var previosdayHigh = document.getElementById('previosdayHigh').value;
    var previosdayClose= document.getElementById('previosdayClose').value;
   
    var todayOpen= document.getElementById('todayOpen').value;
    var todayhigh= document.getElementById('todayHigh').value;
    var todayLow= document.getElementById('todayLow').value;

    var percent =  todayOpen -previosdayClose;
    var changevalue = todayOpen - previosdayClose ;
    document.getElementById('percentageChange').textContent=changevalue;
    document.getElementById('valueChange').textContent=changevalue;
    
    var buy = document.getElementById('signal_buy'); 
    var sell = document.getElementById('signal_sell'); 
    var hold = document.getElementById('signal_be_ready'); 

    
    console.log(todayOpen);
    console.log(todayhigh);
    
if ( todayOpen !="" && todayhigh !="" && todayLow !="" && previosdayClose !="")
{

    if (todayOpen == todayhigh && todayOpen !="" && todayhigh !=""  )
    {

       sell.style = "display:initial" ;
       buy.style = "display:none" ;
       hold.style = "display:none" ;
    }
   
    else if (todayOpen == todayLow && todayOpen !="" && todayLow !="")
    {
       sell.style = "display:none" ;
       buy.style = "display:initial" ;
       hold.style = "display:none" ;
    }

    else if (previosdayClose < todayOpen && todayOpen !="" && previosdayClose !="")
    {
       sell.style = "display:none" ;
       buy.style = "display:initial" ;
       hold.style = "display:none" ;
    }

    else if (previosdayClose > todayOpen && todayOpen !="" && previosdayClose !="")
    {
       sell.style = "display:initial" ;
       buy.style = "display:none" ;
       hold.style = "display:none" ;
    }
}
}

function getValue(option,elementId,color)
{
    document.getElementById(elementId).textContent=option;
    document.getElementById(elementId).style="color:"+color
}

